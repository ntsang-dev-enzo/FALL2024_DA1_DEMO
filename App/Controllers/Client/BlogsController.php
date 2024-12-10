<?php
namespace App\Controllers\Client;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Blogs;
use App\Views\Client\Pages\Blogs\Index;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Blogs\Detail;
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

    public static function Detail($id)
    {
        // Lấy danh sách các bài viết từ model Blogs
        $blogsModel = new Blogs();
        $data = $blogsModel->getOneNew($id);
        $data = [
            'new' => $data,
        ];
        
        // Render Header, Notification và Footer
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        
        // Gọi view trang Blogs với dữ liệu bài viết
        Detail::render($data);
        Footer::render();
    }
}
