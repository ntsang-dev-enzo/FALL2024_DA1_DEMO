<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Home;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class HomeController
{
    // hiển thị trang thống kê
    public static function index()
    {
        $user = new User();
        $totalUser = $user->countTotalUser();
        $category = new Category();
        $totalCategory = $category->countTotalCategory();
        $product = new Product();
        $totalProduct = $product->countTotalProduct();
        $comment = new Comment();
        $totalComment = $comment->countTotalComment();
        $comment_by_product = $comment->countCommentByProduct();


        $data = [
            'total_user' => $totalUser['total'],
            'total_category' => $totalCategory['total'],
            'total_product' => $totalProduct['total'],
            'total_comment' => $totalComment['total'],
            'comment_by_product' => $comment_by_product,
        ];
        // echo '<pre>';
        // var_dump($totalUser, $totalCategory, $totalProduct, $totalComment, $comment_by_product);
        // echo '</pre>';
        // die();
        
        Header::render();
        Home::render($data);
        Footer::render();
    }
}
