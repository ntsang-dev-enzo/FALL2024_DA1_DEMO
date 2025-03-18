<?php

namespace App\Controllers\Client;

use App\Core\Controller;
use App\Helpers\AuthHelper;
use App\Models\Order;
use App\Helpers\NotificationHelper;
use App\Helpers\VNPAYHelper;
use App\Models\Cart;
use App\Controllers\Client\OrderController;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\ThankYou;

class PaymentController
{
    public function checkout()
    {
        $orderModel = new Order();

        $orderId = $_POST['order_id'] ?? null;
        $amount = $_POST['amount'] ?? null;
        $paymentMethod = $_POST['payment_method'] ?? 'cod';

        if (!$orderId || !$amount) {
            NotificationHelper::error('payment', 'Thiếu thông tin đơn hàng.');
            header("Location: /checkout");
            exit;
        }


        if ($paymentMethod === 'cod') {
            $orderModel->updateOrderStatus($orderId, 0); 
            NotificationHelper::success('payment', "Đơn hàng #$orderId đã được tạo thành công.");
            header("Location: /order-success");
            exit;
        }

        if ($paymentMethod === 'vnpay') {
            $paymentUrl = VNPAYHelper::createPaymentUrl($orderId, $amount);
            header("Location: $paymentUrl");
            exit;
        }
    }

    public function returnUrl()
    {
        $orderModel = new Order();

        $vnp_ResponseCode = $_GET['vnp_ResponseCode'] ?? '';
        $orderId = $_GET['vnp_TxnRef'] ?? '';
        $amount = $_GET['vnp_Amount'] ?? 0;

        if ($vnp_ResponseCode == "00") { 
            $orderModel->updateOrderStatus($orderId, 1); 
            NotificationHelper::success('payment', "Thanh toán thành công cho đơn hàng #$orderId.");
        } else { 
            $orderModel->updateOrderStatus($orderId, 4);
            NotificationHelper::error('payment', "Thanh toán thất bại cho đơn hàng #$orderId.");
        }

        header("Location: /order-success");
        exit;
    }

    public function vnpayPayment($orderId, $amount)
    {
        if (!AuthHelper::checkLogin()) {
            header('Location: /login');
            exit;
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8080/payment/vnpay/callback";
        $vnp_TmnCode = "A3BTCJO4";
        $vnp_HashSecret = "KS1ES5AFOBZQ6113DRX669ZPRHXAHFJJ";

        $vnp_TxnRef = $orderId;
        $vnp_OrderInfo = "Thanh toán đơn hàng " . $orderId;
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $amount * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        header('Location: ' . $vnp_Url);
        exit;
    }

    public function vnpayCallback()
{
    $vnp_HashSecret = "KS1ES5AFOBZQ6113DRX669ZPRHXAHFJJ";
    $inputData = [];

    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    $vnp_SecureHash = $_GET['vnp_SecureHash'] ?? '';
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);

    $hashData = "";
    foreach ($inputData as $key => $value) {
        $hashData .= "&" . urlencode($key) . "=" . urlencode($value);
    }
    $hashData = ltrim($hashData, "&");

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    if ($secureHash === $vnp_SecureHash) {
        if ($_GET['vnp_ResponseCode'] == '00') { 
            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('payment', "Bạn chưa đăng nhập!");
                header("Location: /login");
                exit;
            }

            $user_id = $_SESSION['user']['id'];
            $customerInfo = $_SESSION['user'] ?? [];
            
            $cartModel = new Cart();
            $orderModel = new Order();
            $cart_data = $cartModel->getCartByUserId($user_id);
    
            if (empty($cart_data)) {
                NotificationHelper::error('empty-cart', 'Giỏ hàng trống, không thể đặt hàng!');
                header("Location: /cart");
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
            $street=$_SESSION['checkout']['street'];
            $district=$_SESSION['checkout']['district'];
            $ward=$_SESSION['checkout']['ward'];
            $city=$_SESSION['checkout']['city'];
            
            $newOrderId = $orderModel->createOrder([
                'customer_id' => $user_id,
                'name' => $customerInfo['name'] ?? 'Khách hàng',
                'email' => $customerInfo['email'] ?? '',
                'phone' => $customerInfo['phone'] ?? '',
                'order_date' => date('Y-m-d H:i:s'),
                'status' => 1, 
                'total_amount' => (int) $_GET['vnp_Amount'] / 100, 
                'shipping_address' => $street . ', ' . $district . ', ' . $ward . ', ' . $city,
                'payment_method' => 'vnpay',
                'items' => $items, 
            ]);
    //         echo '<pre>';
    // var_dump($street . ', ' . $district . ', ' . $ward . ', ' . $city);
    // echo '</pre>';
    // die;
            $cartModel->clearCart($user_id);
            NotificationHelper::success('payment', "Thanh toán thành công! Đơn hàng #$newOrderId đã được tạo.");
            header("Location: /thankyou");
            unset($_SESSION['checkout']);
            exit;
        } else {
            NotificationHelper::error('payment', "Thanh toán không thành công!");
            header("Location: /cart");
            exit;
        }
    } else {
        NotificationHelper::error('payment', "Dữ liệu không hợp lệ!");
        header("Location: /cart");
        exit;
    }
}

}
