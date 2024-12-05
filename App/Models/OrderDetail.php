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
            // Câu lệnh SQL để thêm dữ liệu vào bảng order_detail
            $sql = "INSERT INTO order_detail (order_id, product_id, quantity, price, name, email, phone, address) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Kết nối cơ sở dữ liệu
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Kiểm tra câu lệnh chuẩn bị
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
            }

            // Gán các tham số vào câu lệnh SQL
            $stmt->bind_param('iiidssss', 
                $data['order_id'],  // order_id
                $data['product_id'], // product_id
                $data['quantity'],   // quantity
                $data['price'],      // price
                $data['name'],       // name
                $data['email'],      // email
                $data['phone'],      // phone
                $data['address']     // address
            );

            // Thực thi câu lệnh SQL
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
            $sql = "SELECT od.product_id, 
               SUM(od.quantity) AS total_quantity, 
               od.price, 
               p.name AS product_name, 
               p.image
        FROM order_detail od
        LEFT JOIN products p ON od.product_id = p.id
        WHERE od.order_id = ?
        GROUP BY od.product_id, od.price, p.name, p.image";

            // Kết nối cơ sở dữ liệu
            $conn = $this->_conn->MySQLi();

            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
            }

            // Gán tham số vào câu lệnh
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

