<?php
namespace App\Controllers\Client;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Views\Client\Pages\Blogs\Index;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Models\News;
class BlogsController{
    public static function index()
    {
        $news = new News();
        $data = $news->getAllNew();
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
}