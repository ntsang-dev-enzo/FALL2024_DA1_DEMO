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
    public function getOneOrder($id)
{
    $sql = "SELECT * FROM orders WHERE id = ?";
    $conn = $this->_conn->MySQLi();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
public function updateOrder($id, $data)
{
    $sql = "UPDATE orders SET 
                status = ?, 
                updated_at = NOW() 
            WHERE id = ?";

    $conn = $this->_conn->MySQLi();
    $stmt = $conn->prepare($sql);
    
    // Đảm bảo số lượng tham số đúng
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
    
            // Bắt đầu giao dịch
            $conn->begin_transaction();
    
            // Xóa dữ liệu liên quan trong bảng order_detail
            $sqlDetail = "DELETE FROM order_detail WHERE order_id = ?";
            $stmtDetail = $conn->prepare($sqlDetail);
            $stmtDetail->bind_param('i', $orderId);
    
            if (!$stmtDetail->execute()) {
                throw new \Exception('Lỗi khi xóa chi tiết đơn hàng: ' . $stmtDetail->error);
            }
    
            // Xóa đơn hàng trong bảng orders
            $sqlOrder = "DELETE FROM orders WHERE id = ?";
            $stmtOrder = $conn->prepare($sqlOrder);
            $stmtOrder->bind_param('i', $orderId);
    
            if (!$stmtOrder->execute()) {
                throw new \Exception('Lỗi khi xóa đơn hàng: ' . $stmtOrder->error);
            }
    
            // Commit giao dịch
            $conn->commit();
    
            return true; // Xóa thành công
        } catch (\Throwable $th) {
            // Rollback nếu có lỗi
            $conn->rollback();
            error_log('Lỗi khi xóa đơn hàng: ' . $th->getMessage());
            return false;
        }
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
    public function searchOrderByKeyword(string $keyword)
    {

        // Truy vấn tìm kiếm dựa trên số điện thoại hoặc email
        $sql = "SELECT * FROM orders WHERE phone LIKE ? OR email LIKE ?";
        $conn = $this->_conn->MySQLi();

        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);

        // Thêm ký tự `%` vào từ khóa để tìm kiếm
        $like_keyword = '%' . $keyword . '%';
        $stmt->bind_param('ss', $like_keyword, $like_keyword);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
