<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = "orders";

    // Tạo đơn hàng mới
    public function createOrder($orderData)
    {
        $orderId = false;
        try {
            if (empty($orderData['items']) || !is_array($orderData['items'])) {
                throw new \Exception("Dữ liệu sản phẩm không hợp lệ.");
            }

            $totalAmount = $this->calculateTotalAmount($orderData['items']);
            $orderData['total_amount'] = $totalAmount + 0; // Cộng phí vận chuyển

            $sql = "INSERT INTO $this->table (customer_id, name, email, phone, order_date, status, total_amount, shipping_address, payment_method, created_at, updated_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "issssidss",
                $orderData['customer_id'],
                $orderData['name'],
                $orderData['email'],
                $orderData['phone'],
                $orderData['order_date'],
                $orderData['status'],
                $orderData['total_amount'],
                $orderData['shipping_address'],
                $orderData['payment_method']
            );

            if ($stmt->execute()) {
                $orderId = $conn->insert_id;
                $this->insertOrderDetails($orderId, $orderData['items'], $orderData);
            }
        } catch (\Throwable $th) {
            error_log('Lỗi khi tạo đơn hàng: ' . $th->getMessage());
        }
        return $orderId;
    }

    private function insertOrderDetails($orderId, $items, $customerData)
    {
        try {
            $sql = "INSERT INTO order_detail (order_id, name, email, phone, address, product_id, quantity, price)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            foreach ($items as $item) {
                $stmt->bind_param(
                    "issssiid",
                    $orderId,
                    $customerData['name'],
                    $customerData['email'],
                    $customerData['phone'],
                    $customerData['shipping_address'],
                    $item['product_id'],
                    $item['quantity'],
                    $item['price']
                );
                $stmt->execute();
            }
            return true;
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm chi tiết đơn hàng: ' . $th->getMessage());
            return false;
        }
    }

    public function getOrderById($orderId)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE id = ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy đơn hàng: ' . $th->getMessage());
        }
        return $result;
    }

    public function searchOrderByKeyword($keyword){

        $sql = "SELECT *
        FROM orders
        WHERE orders.name REGEXP '$keyword' or orders.email REGEXP '$keyword' ";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    

    public function updateOrder($id, $data)
    {
        $sql = "UPDATE orders SET 
                status = ?, 
                updated_at = NOW() 
            WHERE id = ?";

        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            'is',
            $data['status'],
            $id
        );

        return $stmt->execute();
    }

    public function deleteOrder($orderId)
    {
        try {
            $conn = $this->_conn->MySQLi();
            $conn->begin_transaction();

            $stmt = $conn->prepare("DELETE FROM order_detail WHERE order_id = ?");
            $stmt->bind_param("i", $orderId);
            $stmt->execute();

            $stmt = $conn->prepare("DELETE FROM $this->table WHERE id = ?");
            $stmt->bind_param("i", $orderId);
            $stmt->execute();

            $conn->commit();
            return true;
        } catch (\Throwable $th) {
            $conn->rollback();
            error_log('Lỗi khi xóa đơn hàng: ' . $th->getMessage());
            return false;
        }
    }
    public function getOrderDetailsByOrderId($orderId)
    {
        try {
            $sql = "SELECT 
            o.id AS order_id, 
            o.customer_id, 
            o.name AS customer_name, 
            o.email AS customer_email, 
            o.phone AS customer_phone, 
            o.shipping_address, 
            o.order_date, 
            o.status, 
            o.total_amount, 
            o.payment_method, 
            p.name AS product_name, 
            p.image AS product_image, 
            od.product_id, 
            od.quantity, 
            od.price
        FROM order_detail od
        LEFT JOIN products p ON od.product_id = p.id
        LEFT JOIN orders o ON od.order_id = o.id
        WHERE od.order_id = ?;
        ";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị SQL: ' . $conn->error);
            }

            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $result = $stmt->get_result();

            $orderItems = [];
            while ($row = $result->fetch_assoc()) {
                $orderItems[] = $row;
            }

            return $orderItems;
        } catch (\Throwable $th) {
            error_log('Lỗi lấy chi tiết đơn hàng: ' . $th->getMessage());
            return [];
        }
    }

    public function updateOrderStatus($orderId, $status)
    {
        $result = false;
        try {
            $sql = "UPDATE $this->table SET status = ? WHERE id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $status, $orderId);
            $result = $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật trạng thái đơn hàng: ' . $th->getMessage());
        }
        return $result;
    }
    public function getPendingOrderByUserId($userId)
{
    $result = [];
    try {
        $sql = "SELECT * FROM $this->table WHERE customer_id = ? AND status = 0 ORDER BY order_date DESC";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        error_log('Lỗi khi lấy đơn hàng chờ xử lý: ' . $th->getMessage());
    }
    return $result;
}


    public function getOrdersByUser($userId)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE customer_id = ? ORDER BY order_date DESC";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy lịch sử mua hàng: ' . $th->getMessage());
        }
        return $result;
    }

    public function getAllOrders()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table ORDER BY order_date DESC";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách đơn hàng: ' . $th->getMessage());
        }
        return $result;
    }
    public function getOrderItems($orderId)
    {
        $result = [];
        try {
            $sql = "SELECT od.order_detail_id, od.product_id, od.quantity, od.price, p.name 
                    FROM order_detail od
                    LEFT JOIN products p ON od.product_id = p.id
                    WHERE od.order_id = ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy sản phẩm của đơn hàng: ' . $th->getMessage());
        }
        return $result;
    }

    private function calculateTotalAmount($items)
    {
        $total = 0;
        foreach ($items as $item) {
            if (!isset($item['price'], $item['quantity']) || $item['price'] <= 0 || $item['quantity'] <= 0) {
                throw new \Exception("Giá hoặc số lượng sản phẩm không hợp lệ.");
            }
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
