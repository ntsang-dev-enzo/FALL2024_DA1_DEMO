<?php

namespace App\Controllers\Client;

use App\Models\Order;
use App\Models\OrderDetail; // Để lấy chi tiết sản phẩm
use App\Helpers\NotificationHelper;
use App\Views\Client\Pages\Product\DetailCheckout;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Helpers\AuthHelper;

class OrderController
{
    // Xử lý tạo đơn hàng khi bấm thanh toán
    public static function createOrder()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!AuthHelper::checkLogin()) {
            header('Location: /login');
            exit;
        }

        // Dữ liệu đơn hàng từ form
        $orderData = [
            'customer_id' => $_SESSION['user']['id'],  // ID của khách hàng (có thể lấy từ session hoặc đăng nhập)
            'order_date' => date('Y-m-d H:i:s'),      // Ngày giờ đặt đơn
            'status' => 'pending',                    // Trạng thái đơn hàng ban đầu
            'shipping_address' => $_POST['ward'] . ' ' . $_POST['district'] . ' ' . $_POST['city'] . ' ' . $_POST['street'], // Địa chỉ giao hàng
            'payment_method' => $_POST['paymentMethod'],     // Phương thức thanh toán
            'total_amount' => 50000, // Tổng tiền đơn hàng (ví dụ)
            // Các sản phẩm trong giỏ hàng, bạn có thể lấy từ session giỏ hàng hoặc form
            'items' => [
                [
                    'product_id' => 1,
                    'price' => 50000,
                    'quantity' => 2
                ],
                [
                    'product_id' => 12,
                    'price' => 30000,
                    'quantity' => 1
                ]
            ]
        ];

        // Tạo đơn hàng
        $orderModel = new Order();
        $orderId = $orderModel->createOrder($orderData);  // Gọi hàm tạo đơn hàng từ model Order

        // Nếu tạo đơn hàng thành công
        if ($orderId) {
            // Thêm chi tiết sản phẩm vào bảng order_detail
            foreach ($orderData['items'] as $item) {
                $orderDetailData = [
                    'order_id' => $orderId,        // ID của đơn hàng
                    'product_id' => $item['product_id'],   // ID sản phẩm
                    'quantity' => $item['quantity'],       // Số lượng sản phẩm
                    'price' => $item['price']             // Giá của sản phẩm
                ];

                // Tạo chi tiết đơn hàng trong bảng order_detail
                $orderDetailModel = new OrderDetail();
                $orderDetailModel->createOrderDetail($orderDetailData);  // Gọi hàm tạo chi tiết đơn hàng
            }

            // Thông báo thành công
            NotificationHelper::success('create', 'Đơn hàng đã được tạo thành công!');
            // Chuyển hướng đến trang chi tiết đơn hàng
            header("Location: /order/detail/$orderId");
            exit;
        } else {
            // Nếu có lỗi, thông báo thất bại và chuyển hướng lại về trang checkout
            NotificationHelper::error('create', 'Tạo đơn hàng thất bại!');
            header("Location: /checkout");
            exit;
        }
    }

    // Hiển thị chi tiết đơn hàng
    public static function orderDetail($orderId)
    {
        $orderModel = new Order();
        $orderData = $orderModel->getOrderById($orderId);

        if (!$orderData) {
            NotificationHelper::error('detail', 'Không tìm thấy đơn hàng!');
            header('Location: /orders');
            exit;
        }

        // Lấy danh sách sản phẩm trong đơn hàng
        $orderDetailModel = new OrderDetail();
        $orderItems = $orderDetailModel->getOrderDetailsByOrderId($orderId);

        // Tính tổng tiền của các sản phẩm
        $totalAmount = 0;
        foreach ($orderItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Giả sử phí vận chuyển cố định là 32.000 đ
        $shippingFee = 32000;

        // Tính tổng cộng (tiền sản phẩm + phí vận chuyển)
        $totalAmountWithShipping = $totalAmount + $shippingFee;

        // Thêm thông tin tính toán vào dữ liệu
        $orderData['items'] = $orderItems;
        $orderData['totalAmount'] = $totalAmount;
        $orderData['shippingFee'] = $shippingFee;
        $orderData['totalAmountWithShipping'] = $totalAmountWithShipping;

        // Render view chi tiết đơn hàng
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        DetailCheckout::render($orderData);
        Footer::render();
    }
}
