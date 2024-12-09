<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Validations\OrderValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Order\Create;
use App\Views\Admin\Pages\Order\Edit;
use App\Views\Admin\Pages\Order\Index;
use App\Views\Admin\Pages\Order\Detail;

class OrderController
{


    // hiển thị danh sách
    public static function index()
    {


        $order = new Order();
        $data = $order->getAll();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }
   
public static function edit(int $id)
{
    $order = new Order();
    $data = $order->getOneOrder($id);
    
    if (!$data) {
        NotificationHelper::error('edit', 'Không thể xem đơn hàng này!');
        header('location: /admin/orders');
        exit;
    }

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    // Hiển thị giao diện form sửa đơn hàng
    Edit::render($data);
    Footer::render();
}


// Xử lý chức năng sửa (cập nhật đơn hàng)
public static function update(int $id)
{
    // Validate các trường dữ liệu
    // (Bạn có thể áp dụng validation tại đây nếu cần)

    $order = new Order();

    // Dữ liệu cần cập nhật
    $data = [
        'status' => $_POST['status'],
    ];

    // Cập nhật đơn hàng
    $result = $order->updateOrder($id, $data);

    if ($result) {
        NotificationHelper::success('update', 'Cập nhật đơn hàng thành công!');
        header('location: /admin/orders');
        exit;
    } else {
        NotificationHelper::error('update', 'Cập nhật đơn hàng thất bại!');
        header("location: /admin/orders/$id");
        exit;
    }
}


//     // thực hiện xoá
    public static function deleteOrder(int $id)
    {
        $order= new Order();
        $result=$order->deleteOrder($id);
        
        if ($result) {
            NotificationHelper::success('delete','Xóa người dùng thành công!');
            header('location: /admin/orders');
            exit;
        }else{
            NotificationHelper::error('delete','Xóa người dùng thất bại!');
            header('location: /admin/orders');
            exit;
        }

    }
    public static function search()
    {
        // Lấy từ khóa tìm kiếm từ form
        $keyword = $_GET['keyword'] ?? '';
        $keyword = trim($keyword);

        $order = new Order();
        $data = [];

        if (!empty($keyword)) {
            // Gọi đến model để tìm kiếm
            $data = $order->searchOrderByKeyword($keyword);
        }

        // Hiển thị giao diện danh sách kết quả
        Header::render();
        Index::render($data);
        Footer::render();
    }
    public static function showOrderDetail(int $orderId)
    {
        // Tạo đối tượng OrderDetail
        $orderDetail = new OrderDetail();

        // Lấy thông tin chi tiết đơn hàng từ model
        $data = $orderDetail->getOrderDetailsByOrderIdAdmin($orderId);
//  echo'<pre>';
//         var_dump($data) ;
        // Hiển thị view với dữ liệu chi tiết đơn hàng
        Header::render();
        Detail::render($data);
        Footer::render();
    }
}
