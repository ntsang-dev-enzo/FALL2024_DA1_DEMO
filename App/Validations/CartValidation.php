<?php
namespace App\Validations;
use App\Helpers\NotificationHelper;

class CartValidation {

    public static function validate(): bool {
        $is_valid = true;

        // Kiểm tra họ và tên người nhận
        if (!isset($_POST['selected_products']) || $_POST['selected_products'] === '') {
            NotificationHelper::error('selected_products', 'Vui lòng chon sản phẩm!');
            $is_valid = false;
        }
        return $is_valid;
    }
}
?>
