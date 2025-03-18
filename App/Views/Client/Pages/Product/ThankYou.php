<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class ThankYou extends BaseView
{
    public static function render($orders = [])
    {
?>

    <div class="bg-dark" style="height: 110px;"></div>
    <div class="container text-center mt-5 py-6">
        <h2>Cảm ơn bạn đã đặt hàng!</h2>
        <p>Đơn hàng của bạn đã được ghi nhận. Chúng tôi sẽ sớm liên hệ để xác nhận.</p>
        <a href="/" class="btn btn-primary mt-3">Quay về trang chủ</a>
    </div>


<?php
    }}
?>