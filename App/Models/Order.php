<?php
namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';  // Tên bảng orders
    protected $id = 'id';         // Khoá chính của bảng orders

    // Thêm đơn hàng vào bảng orders
    public function createOrder($orderData)
    {
        try {
            // Kiểm tra xem 'items' có trong dữ liệu không
            if (!isset($orderData['items']) || !is_array($orderData['items'])) {
                throw new \Exception("Dữ liệu sản phẩm không hợp lệ.");
            }

            // Lấy danh sách các sản phẩm
            $items = $orderData['items'];
            $totalAmount = 0;

            // Tính tổng tiền của đơn hàng từ các sản phẩm
            foreach ($items as $item) {
                // Kiểm tra giá trị hợp lệ của price và quantity
                if (isset($item['price'], $item['quantity']) && $item['price'] > 0 && $item['quantity'] > 0) {
                    $totalAmount += $item['price'] * $item['quantity']; // price * quantity
                } else {
                    throw new \Exception("Giá hoặc số lượng sản phẩm không hợp lệ.");
                }
            }

            // Cập nhật total_amount trong dữ liệu đơn hàng
            $orderData['total_amount'] = $totalAmount;

            // Thêm đơn hàng vào bảng orders
            $sql = "INSERT INTO orders (customer_id, order_date, status, total_amount, shipping_address, payment_method, created_at, updated_at)
                    VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('issdss', 
                $orderData['customer_id'],
                $orderData['order_date'],
                $orderData['status'],
                $orderData['total_amount'],
                $orderData['shipping_address'],
                $orderData['payment_method']
            );

            $stmt->execute();
            $orderId = $conn->insert_id;  // ID của đơn hàng mới

            // Thêm các sản phẩm vào bảng order_detail
            foreach ($items as $item) {
                $orderDetailData = [
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];

                // Tạo chi tiết đơn hàng trong bảng order_detail
                $this->addOrderDetail($orderDetailData);
            }

            return $orderId;  // Trả về ID của đơn hàng vừa tạo
        } catch (\Throwable $th) {
            // Ghi log lỗi chi tiết nếu có
            error_log('Lỗi khi tạo đơn hàng: ' . $th->getMessage());
            return false;
        }
    }

    // Thêm chi tiết đơn hàng vào bảng order_detail
    public function addOrderDetail($orderDetailData)
    {
        try {
            $sql = "INSERT INTO order_detail (order_id, product_id, quantity, price)
                    VALUES (?, ?, ?, ?)";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('iiid',
                $orderDetailData['order_id'],
                $orderDetailData['product_id'],
                $orderDetailData['quantity'],
                $orderDetailData['price']
            );

            // Thực thi và kiểm tra lỗi
            if (!$stmt->execute()) {
                throw new \Exception("Lỗi khi thêm chi tiết đơn hàng: " . $stmt->error);
            }
        } catch (\Throwable $th) {
            // Ghi log lỗi chi tiết nếu có
            error_log('Lỗi khi thêm chi tiết đơn hàng: ' . $th->getMessage());
        }
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
            // Truy vấn thông tin sản phẩm từ bảng order_detail
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
            // Duyệt qua kết quả để lấy thông tin sản phẩm
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
            return $items; // Trả về danh sách sản phẩm
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy thông tin sản phẩm của đơn hàng: ' . $th->getMessage());
            return [];
        }
    }
}
