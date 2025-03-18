<?php
namespace App\Helpers;

class VNPAYHelper
{
    private static $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private static $vnp_TmnCode = "A3BTCJO4"; // Mã website trên VNPAY
    private static $vnp_HashSecret = "KS1ES5AFOBZQ6113DRX669ZPRHXAHFJJ"; // Chuỗi bí mật

    public static function createPaymentUrl($orderId, $totalAmount)
    {
        $vnp_ReturnUrl = "http://127.0.0.1:8080/payment/return";

        $vnp_TxnRef = $orderId;
        $vnp_OrderInfo = "Thanh toán đơn hàng #$orderId";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = "vn";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => self::$vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef
        ];
        ksort($inputData);
        $query = urldecode(http_build_query($inputData));
        $secureHash = hash_hmac('sha512', $query, self::$vnp_HashSecret);
        return self::$vnp_Url . "?" . $query . "&vnp_SecureHash=" . $secureHash;
    }
}
