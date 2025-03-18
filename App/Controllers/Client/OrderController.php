<?php

namespace App\Controllers\Client;

use App\Models\Order;
use App\Models\Cart;
use App\Helpers\NotificationHelper;
use App\Helpers\VNPAYHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\DetailCheckout;
use App\Views\Client\Pages\Product\OrderHistory;

class OrderController
{

    public function storeSession()
    {
        // echo '<pre>';
        // var_dump($_POST['payment_method']);
        // echo '</pre>';
        // die;
        $order_id = $_POST['order_id'];
        $total_amount = $_POST['total_amount'];
        $_SESSION['checkout'] = [
            'user_id' => $_POST['user_id'] ?? '',
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'street' => $_POST['street'] ?? '',
            'city' => $_POST['cityName'] ?? '',
            'district' => $_POST['districtName'] ?? '',
            'ward' => $_POST['wardName'] ?? '',
        ];

        if ($_POST['payment_method'] == 'vnpay') {
            header("Location: /payment/vnpay/$order_id/$total_amount");
            exit;
        } else {
            $this->checkout();
            unset($_SESSION['checkout']);
            exit;
        }
    }

    public function checkout()
    {
        if (!isset($_SESSION['user']['id'])) {
            NotificationHelper::error('fail-login', 'Bạn cần đăng nhập để đặt hàng!');
            header("Location: /login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $street = $_POST['street'] ?? '';
        // $_SESSION['street']=$_POST['street'];
        $city = $_POST['cityName'] ?? '';
        // $_SESSION['cityName']=$_POST['cityName'];
        $district = $_POST['districtName'] ?? '';
        // $_SESSION['districtName']=$_POST['districtName'];
        $ward = $_POST['wardName'] ?? '';
        // $_SESSION['wardName'] = $_POST['wardName'];
        $shipping_address = trim("$street, $ward, $district, $city");
        // $_SESSION['shippingAddress'] = $shipping_address;
        $total_amount = $_POST['totalPrice'] ?? 0;
        $payment_method = $_POST['payment-method'] ?? 'cod';
        if (empty($name) || empty($email) || empty($phone) || empty($shipping_address)) {
            NotificationHelper::error('fail-order-info', 'Vui lòng nhập đầy đủ thông tin!');
            header("Location: /checkout");
            exit;
        }

        $cartModel = new Cart();
        $cart_data = $cartModel->getCartByUserId($user_id);

        if (empty($cart_data)) {
            NotificationHelper::error('empty-cart', 'Giỏ hàng trống, không thể đặt hàng!');
            header("Location: /cart");
            exit;
        }

        // Kiểm tra phương thức thanh toán hợp lệ
        $payment_method = strtolower($payment_method);
        if (!in_array($payment_method, ['cod', 'vnpay'])) {
            NotificationHelper::error('invalid-payment', 'Phương thức thanh toán không hợp lệ!');
            header("Location: /checkout");
            exit;
        }

        $items = [];
        foreach ($cart_data as $cart) {
            $items[] = [
                'product_id' => $cart['product_id'],
                'price' => $cart['price'],
                'quantity' => $cart['quantity']
            ];
        }

        $orderModel = new Order();
        $order_id = $orderModel->createOrder([
            'customer_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'order_date' => date('Y-m-d H:i:s'),
            'status' => ($payment_method === 'cod') ? 0 : 1,
            'total_amount' => $total_amount,
            'shipping_address' => $shipping_address,
            'payment_method' => $payment_method,
            'items' => $items
        ]);

        if ($order_id) {
            if ($payment_method === "vnpay") {
                $paymentURL = VNPAYHelper::createPaymentUrl($order_id, $total_amount);
                header('Location: ' . $paymentURL);
                exit;
            } else {
                $cartModel->clearCart($user_id);
                NotificationHelper::success('order-success', 'Đặt hàng thành công! Bạn sẽ thanh toán khi nhận hàng.');
                header("Location: /thankyou");
                exit;
            }
        } else {
            NotificationHelper::error('fail-order', 'Đặt hàng thất bại!');
            header("Location: /cart");
            exit;
        }
    }

    public static function deleteOrder(int $id)
    {
        $order = new Order();
        $order_detail = $order->getOrderById($id);

        if (!$order_detail) {
            NotificationHelper::error('delete', 'Đơn hàng không tồn tại!');
            header('location: /history-orders');
            exit;
        }

        if ($order_detail['status'] != 0) {
            NotificationHelper::error('delete', 'Không thể hủy đơn hàng khi trạng thái đã xác nhận!');
            header('location: /history-orders');
            exit;
        }

        $result = $order->deleteOrder($id);

        if ($result) {
            NotificationHelper::success('delete', 'Hủy đơn hàng thành công!');
        } else {
            NotificationHelper::error('delete', 'Hủy đơn hàng thất bại!');
        }

        header('location: /history-orders');
        exit;
    }

    public function historyOrders()
    {
        if (!isset($_SESSION['user']['id'])) {
            NotificationHelper::error('fail-login', 'Cần đăng nhập để xem lịch sử đơn hàng!');
            header("Location: /login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $orderHistoryModel = new Order();
        $userOrders = $orderHistoryModel->getOrdersByUser($user_id);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        OrderHistory::render($userOrders);
        Footer::render();
    }

    public function orderDetails($orderId)
    {
        if (!isset($_SESSION['user']['id'])) {
            NotificationHelper::error('fail-login', 'Cần đăng nhập để xem chi tiết đơn hàng!');
            header("Location: /login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $orderModel = new Order();
        $orderDetails = $orderModel->getOrderDetailsByOrderId($orderId);

        if (empty($orderDetails) || $orderDetails[0]['customer_id'] != $user_id) {
            NotificationHelper::error('unauthorized', 'Bạn không có quyền xem đơn hàng này!');
            header("Location: /history-orders");
            exit;
        }

        $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $orderDetails));
        $shippingFee = 0;
        $totalAmountWithShipping = $totalAmount + $shippingFee;

        $orderInfo = [
            'customer_name' => $orderDetails[0]['customer_name'] ?? 'Không có dữ liệu',
            'phone' => $orderDetails[0]['customer_phone'] ?? 'Không có dữ liệu',
            'shipping_address' => $orderDetails[0]['shipping_address'] ?? 'Không có dữ liệu',
            'items' => $orderDetails,
            'totalAmount' => $totalAmount,
            'shippingFee' => $shippingFee,
            'totalAmountWithShipping' => $totalAmountWithShipping,
            'payment_method' => $orderDetails[0]['payment_method'] ?? 'Không có dữ liệu',
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        DetailCheckout::render($orderInfo);
        Footer::render();
    }
}
