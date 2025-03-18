<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Page404;

class HomeController
{
    // hiển thị danh sách
    public static function index()
{
    $product = new Product();
    $products = $product->getAllProductIsFeatured();
    $productsv2 = $product->getAllProductIsFeaturedV2();
    $productsv3 = $product->getAllProductIsFeaturedV3();
    $data = [
        'products' => $products,   
        'productsV2' => $productsv2,
        'productsV3' => $productsv3, 
    ];

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Home::render($data);
    Footer::render();
}
public static function page404()
{
   
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Page404::render();
    Footer::render();
}
}
