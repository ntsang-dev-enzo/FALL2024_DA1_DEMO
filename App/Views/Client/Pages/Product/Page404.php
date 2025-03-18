<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Page404 extends BaseView
{
    public static function render($orders = [])
    {
?>

    <div class="bg-dark" style="height: 110px;"></div>
    <div class="container text-center mt-5 py-6">
        <h2>404 trang không tồn tại</h2>
        <a href="/" class="btn btn-primary mt-3">Quay về trang chủ</a>
    </div>


<?php
    }}
?>