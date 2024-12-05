<?php 
namespace App\Models;

class OrderDetail extends BaseModel
{
    protected $table = 'order_detail';  // Tên bảng order_detail
    protected $id = 'order_detail_id';  // Khoá chính của bảng order_detail

    // Hàm thêm chi tiết đơn hàng vào bảng order_detail
    public function createOrderDetail($data)
    {
        try {
            $sql = "INSERT INTO order_detail (order_id, product_id, quantity, price) 
                    VALUES (?, ?, ?, ?)";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Kiểm tra ràng buộc các tham số
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
            }

            $stmt->bind_param('iiid', 
                $data['order_id'],  // order_id
                $data['product_id'], // product_id
                $data['quantity'],   // quantity
                $data['price']       // price
            );

            // Thực thi câu lệnh SQL và kiểm tra
            if (!$stmt->execute()) {
                throw new \Exception('Lỗi khi thực thi câu lệnh SQL: ' . $stmt->error);
            }

            return true; // Nếu thành công
        } catch (\Throwable $th) {
            // Ghi lỗi vào log và ném ra lỗi để tiện theo dõi
            error_log('Lỗi khi thêm chi tiết đơn hàng: ' . $th->getMessage());
            return false; // Nếu có lỗi
        }
    }

    // Lấy các chi tiết đơn hàng theo order_id
    public function getOrderDetailsByOrderId($orderId)
    {
        try {
            // Câu lệnh SQL để lấy chi tiết đơn hàng
            $sql = "SELECT od.order_detail_id, od.product_id, od.quantity, od.price, p.name, p.image 
                    FROM order_detail od
                    LEFT JOIN products p ON od.product_id = p.id
                    WHERE od.order_id = ?";

            // Lấy kết nối cơ sở dữ liệu từ lớp cha (BaseModel)
            $conn = $this->_conn->MySQLi();

            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
            }

            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $result = $stmt->get_result();

            // Lấy kết quả và trả về dưới dạng mảng
            $orderItems = [];
            while ($row = $result->fetch_assoc()) {
                $orderItems[] = $row;
            }

            return $orderItems; // Trả về danh sách chi tiết đơn hàng
        } catch (\Throwable $th) {
            // Ghi lỗi vào log và trả về mảng rỗng nếu có lỗi
            error_log('Lỗi khi lấy chi tiết đơn hàng: ' . $th->getMessage());
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }
}
