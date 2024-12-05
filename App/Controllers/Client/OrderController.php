<?php
namespace App\Controllers\Client;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Helpers\NotificationHelper;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\DetailCheckout;
use App\Views\Client\Pages\Product\OrderHistory;

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

        // Lấy giỏ hàng từ cookie
        $cart_data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        if (empty($cart_data)) {
            NotificationHelper::error('cart_empty', 'Giỏ hàng của bạn đang trống.');
            header('Location: /cart');
            exit;
        }

        // Tính tổng tiền và xử lý các sản phẩm
        $total_amount = 0;
        $items = [];
        foreach ($cart_data as $cart) {
            // Kiểm tra xem sản phẩm đã tồn tại trong mảng items chưa
            $product_exists = false;
            foreach ($items as &$existing_item) {
                if ($existing_item['product_id'] == $cart['product_id']) {
                    $existing_item['quantity'] += $cart['quantity'];  
                    $product_exists = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa có trong mảng items, thêm mới
            if (!$product_exists) {
                $items[] = [
                    'product_id' => $cart['product_id'],
                    'price' => $cart['price'],
                    'quantity' => $cart['quantity']
                ];
            }

            // Tính tổng tiền
            $total_amount += $cart['quantity'] * $cart['price'];
        }

        // Dữ liệu đơn hàng từ form
        $orderData = [
            'customer_id' => $_SESSION['user']['id'],
            'order_date' => date('Y-m-d H:i:s'),
            'status' => 'pending',
            'shipping_address' =>  $_POST['street']. ' - ' . $_POST['wardName'] . ' - ' . $_POST['districtName'] . ' - ' . $_POST['cityName'] ,
            'payment_method' => $_POST['paymentMethod'],
            'total_amount' => $total_amount,
            'name' => $_POST['name'], 
            'email' => $_POST['email'], 
            'phone' => $_POST['phone'], 
            'items' => $items,  // Dữ liệu items cho việc thêm vào bảng order_detail
        ];

        // Tạo đơn hàng
        $orderModel = new Order();
        $orderId = $orderModel->createOrder($orderData);

        // Nếu tạo đơn hàng thành công
        if ($orderId) {
            // Thêm chi tiết sản phẩm vào bảng order_detail
            $orderDetailModel = new OrderDetail();
            foreach ($items as $item) {
                $orderDetailData = [
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'name' => $orderData['name'],  
                    'email' => $orderData['email'],
                    'phone' => $orderData['phone'],
                    'address' => $orderData['shipping_address'],
                ];
                // Thêm chi tiết đơn hàng vào database
                $orderDetailModel->createOrderDetail($orderDetailData);
            }
            setcookie('cart', '', time() - 3600, '/');
            // Thông báo thành công
            NotificationHelper::success('create', 'Đơn hàng đã được tạo thành công!');
            header("Location: /order/detail/$orderId");
            exit;
        } else {
            NotificationHelper::error('create', 'Tạo đơn hàng thất bại!');
            header("Location: /checkout");
            exit;
        }
    }

    // Hiển thị chi tiết đơn hàng
    public static function orderDetail($orderId)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!AuthHelper::checkLogin()) {
            NotificationHelper::error('auth', 'Vui lòng đăng nhập để xem đơn hàng.');
            header('Location: /login');
            exit;
        }

        // Lấy thông tin người dùng hiện tại
        $userId = $_SESSION['user']['id'];

        // Lấy dữ liệu đơn hàng
        $orderModel = new Order();
        $orderData = $orderModel->getOrderById($orderId);

        // Kiểm tra xem đơn hàng có tồn tại không
        if (!$orderData) {
            NotificationHelper::error('detail', 'Không tìm thấy đơn hàng!');
            header('Location: /');
            exit;
        }

        // Kiểm tra xem người dùng có quyền truy cập vào đơn hàng này không
        if ($orderData['customer_id'] !== $userId) {
            NotificationHelper::error('permission', 'Bạn không có quyền xem đơn hàng này.');
            header('Location: /');
            exit;
        }

        // Lấy chi tiết các sản phẩm trong đơn hàng
        $orderDetailModel = new OrderDetail();
        $orderItems = $orderDetailModel->getOrderDetailsByOrderId($orderId);
        
        // Tính tổng tiền của các sản phẩm trong đơn hàng
        $totalAmount = 0;
        foreach ($orderItems as $item) {
            $totalAmount += $item['price'] * ($item['total_quantity'] - ($item['total_quantity']/2)); 
        }
        $shippingFee = 32000;

        // Tính tổng cộng (tiền sản phẩm + phí vận chuyển)
        $totalAmountWithShipping = $totalAmount + $shippingFee;

        // Thêm thông tin tính toán vào dữ liệu đơn hàng
        $orderData['items'] = $orderItems;
        $orderData['totalAmount'] = $totalAmount;
        $orderData['shippingFee'] = $shippingFee;
        $orderData['totalAmountWithShipping'] = $totalAmountWithShipping;
        // echo '<pre>';
        // var_dump($totalAmount);

        // Render view chi tiết đơn hàng
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        DetailCheckout::render($orderData);
        Footer::render();
    }
    public static function orderHistory()
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!AuthHelper::checkLogin()) {
            NotificationHelper::error('auth', 'Vui lòng đăng nhập để xem lịch sử mua hàng.');
            header('Location: /login');
            exit;
        }

        // Lấy thông tin người dùng hiện tại
        $userId = $_SESSION['user']['id'];

        // Lấy lịch sử mua hàng
        $orderDetailModel = new Order();
        $orderHistory = $orderDetailModel->getOrderHistoryByUserId($userId);

        // Nếu không có lịch sử mua hàng
        if (empty($orderHistory)) {
            NotificationHelper::error('history', 'Bạn chưa có đơn hàng nào.');
            header('Location: /');
            exit;
        }

        // Render view lịch sử đơn hàng
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        OrderHistory::render($orderHistory);  // Đảm bảo bạn có view OrderHistory để hiển thị dữ liệu
        Footer::render();
    }
}
