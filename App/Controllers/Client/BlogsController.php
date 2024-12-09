<?php
namespace App\Controllers\Client;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Blogs;
use App\Views\Client\Pages\Blogs\Index;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
class BlogsController{
    public static function index()
    {
        $news = new Blogs();
        $data = $news->getAllByStatus();
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
}