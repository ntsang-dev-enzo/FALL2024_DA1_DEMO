<?php
namespace App\Validations;
use App\Helpers\NotificationHelper;

class CheckoutValidation {

    public static function validate(): bool {
        $is_valid = true;

        // Kiểm tra họ và tên người nhận
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Tên người nhận không được trống!');
            $is_valid = false;
        }

        // Kiểm tra email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được trống!');
            $is_valid = false;
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('email', 'Email không hợp lệ!');
            $is_valid = false;
        }

        // Kiểm tra số điện thoại
        if (!isset($_POST['phone']) || $_POST['phone'] === '') {
            NotificationHelper::error('phone', 'Số điện thoại không được trống!');
            $is_valid = false;
        } elseif (!preg_match('/^\d{10}$/', $_POST['phone'])) {
            NotificationHelper::error('phone', 'Số điện thoại phải có 10 chữ số!');
            $is_valid = false;
        }

        // Kiểm tra địa chỉ
        if (!isset($_POST['street']) || $_POST['street'] === '') {
            NotificationHelper::error('street', 'Địa chỉ giao hàng không được trống!');
            $is_valid = false;
        }

        // Kiểm tra phương thức vận chuyển
        if (!isset($_POST['shippingMethod']) || $_POST['shippingMethod'] === '') {
            NotificationHelper::error('shippingMethod', 'Phương thức vận chuyển không được trống!');
            $is_valid = false;
        }

        // Kiểm tra phương thức thanh toán
        if (!isset($_POST['paymentMethod']) || $_POST['paymentMethod'] === '') {
            NotificationHelper::error('paymentMethod', 'Phương thức thanh toán không được trống!');
            $is_valid = false;
        }

        return $is_valid;
    }
}
?>
