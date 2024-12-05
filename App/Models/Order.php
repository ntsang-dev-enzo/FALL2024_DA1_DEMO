<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';  // Tên bảng orders
    protected $id = 'id';         // Khoá chính của bảng orders

    // Thêm đơn hàng vào bảng orders
    public function createOrder($orderData)
    {
        // Kiểm tra dữ liệu đầu vào
        if (empty($orderData['items']) || !is_array($orderData['items'])) {
            throw new \Exception("Dữ liệu sản phẩm không hợp lệ.");
        }

        // Tính tổng tiền của đơn hàng từ các sản phẩm
        $totalAmount = $this->calculateTotalAmount($orderData['items']);

        // Cập nhật tổng tiền trong dữ liệu đơn hàng
        $orderData['total_amount'] = $totalAmount;

        // Thêm đơn hàng vào bảng orders
        $orderId = $this->insertOrder($orderData);

        // Nếu không thêm được đơn hàng, trả về false
        if (!$orderId) {
            return false;
        }

        // Thêm các sản phẩm vào bảng order_detail
        $this->insertOrderDetails($orderId, $orderData);

        return $orderId;  // Trả về ID của đơn hàng vừa tạo
    }

    // Tính tổng tiền từ các sản phẩm trong đơn hàng
    private function calculateTotalAmount($items)
    {
        $totalAmount = 0;
        foreach ($items as $item) {
            if (!isset($item['price'], $item['quantity']) || $item['price'] <= 0 || $item['quantity'] <= 0) {
                throw new \Exception("Giá hoặc số lượng sản phẩm không hợp lệ.");
            }
            $totalAmount += $item['price'] * $item['quantity']; // price * quantity
        }
        return $totalAmount;
    }

    // Thêm đơn hàng vào bảng orders
    private function insertOrder($orderData)
    {
        $sql = "INSERT INTO orders (customer_id, name, email, phone, order_date, status, total_amount, shipping_address, payment_method, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            'isssssdss',
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
            return $conn->insert_id;  // Trả về ID của đơn hàng mới
        }

        return false;  // Nếu không thể thêm đơn hàng
    }

    // Thêm chi tiết đơn hàng vào bảng order_detail
    private function insertOrderDetails($orderId, $orderData)
    {
        $sql = "INSERT INTO order_detail (order_id, name, email, phone, address, product_id, quantity, price)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        // Duyệt qua các sản phẩm và thêm từng sản phẩm vào bảng order_detail
        foreach ($orderData['items'] as $item) {
            $stmt->bind_param(
                'issssiid',
                $orderId,
                $orderData['customer_name'],  // Tên khách hàng
                $orderData['customer_email'], // Email khách hàng
                $orderData['customer_phone'], // Số điện thoại khách hàng
                $orderData['shipping_address'], // Địa chỉ giao hàng
                $item['product_id'],  // ID sản phẩm
                $item['quantity'],    // Số lượng sản phẩm
                $item['price']        // Giá sản phẩm
            );

            if (!$stmt->execute()) {
                error_log('Lỗi khi thêm chi tiết đơn hàng: ' . $stmt->error);
                return false;  // Nếu có lỗi khi thêm chi tiết đơn hàng, dừng lại
            }
        }
        return true;  // Thêm thành công tất cả chi tiết đơn hàng
    }

    // Lấy thông tin đơn hàng theo ID
    public function getOrderById($orderId)
    {
        try {
            $sql = "SELECT * FROM orders WHERE id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy thông tin đơn hàng: ' . $th->getMessage());
            return null;
        }
    }

    // Lấy thông tin các sản phẩm của đơn hàng từ bảng order_detail
    public function getOrderItems($orderId)
    {
        try {
            $sql = "SELECT od.order_detail_id, od.product_id, od.quantity, od.price, p.name 
                    FROM order_detail od
                    LEFT JOIN products p ON od.product_id = p.id
                    WHERE od.order_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $result = $stmt->get_result();

            $items = [];
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }

            return $items;  // Trả về danh sách sản phẩm
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy thông tin sản phẩm của đơn hàng: ' . $th->getMessage());
            return [];
        }
    }
    public function getOrderHistoryByUserId($userId)
    {
        try {
            // SQL để lấy thông tin lịch sử đơn hàng của người dùng
            $sql = "SELECT 
    o.id AS order_id, 
    o.customer_id, 
    o.name, 
    o.email, 
    o.phone, 
    o.address, 
    o.order_date, 
    o.status, 
    o.total_amount, 
    o.shipping_address, 
    o.payment_method
FROM orders o
WHERE o.customer_id = ? 
ORDER BY o.order_date DESC;
"; // Sắp xếp theo ngày đặt hàng

            // Kết nối cơ sở dữ liệu
            $conn = $this->_conn->MySQLi();

            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
            }

            // Gán tham số vào câu lệnh
            $stmt->bind_param('i', $userId);

            // Thực thi câu lệnh
            $stmt->execute();
            $result = $stmt->get_result();

            // Lấy kết quả và trả về dưới dạng mảng
            $orderHistory = [];
            while ($row = $result->fetch_assoc()) {
                $orderHistory[] = $row;
            }

            return $orderHistory; // Trả về lịch sử đơn hàng của người dùng
        } catch (\Throwable $th) {
            // Ghi lỗi vào log và trả về mảng rỗng nếu có lỗi
            error_log('Lỗi khi lấy lịch sử đơn hàng của người dùng: ' . $th->getMessage());
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }
}
