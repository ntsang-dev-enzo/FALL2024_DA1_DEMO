<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Blogs;
use App\Models\news;
use App\Validations\BlogsValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Blogs\Create;
use App\Views\Admin\Pages\Blogs\Index;
use App\Views\Admin\Pages\Blogs\Edit;


class BlogsController
{


    // hiển thị danh sách
    public static function index()
    {
    
        $news = new Blogs();
        $data = $news->getAllNew();
 
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }


    public static function create()
    {
        // var_dump($_SESSION);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // // xử lý chức năng thêm
    public static function store()
    {
        // Validation các trường dữ liệu
        $is_valid = BlogsValidation::create();
        // Nếu không hợp lệ, thông báo lỗi và chuyển hướng
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm bài viết thất bại!');
            header('location: /admin/news/create');
            exit;
        }
    
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $short_description = $_POST['short_description'];
        $status = $_POST['status'];
        $content = $_POST['content'];
        $publish_date = $_POST['publish_date'];


    
        // Kiểm tra bài viết với tiêu đề đã tồn tại chưa
        $news = new Blogs();
        $is_exist = $news->getOneNewsByName($name); // Sửa tên phương thức để phù hợp với logic kiểm tra
        if ($is_exist) {
            NotificationHelper::error('store', 'Tiêu đề bài viết đã tồn tại!');
            header('location: /admin/news/create');
            exit;
        }
    
        // Chuẩn bị dữ liệu để thêm mới
        $data = [
            'name' => $name,
            // 'image_url' => $image_url,
            'short_description' => $short_description,
            // 'publish_date' => $publish_date,
            'status' => $status,
            'content' => $content,
            'publish_date' => $publish_date
        ];
        
        // Gọi phương thức thêm bài viết
        $is_upload=BlogsValidation::uploadImage();
        if($is_upload){
            $data['image_url'] = $is_upload;
        }
        $result = $news->createNew($data);

        
        if ($result) {
            NotificationHelper::success('store', 'Thêm bài viết thành công!');
            header('location: /admin/news');
            exit;
        } else {
            NotificationHelper::error('store', 'Thêm bàiádfg  viết thất bại!');
            header('location: /admin/news/create');
            exit;
        }
    }
    


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $blogs=new Blogs();
        $data = $blogs->getOneNew($id);
        // echo '<pre>';
        // var_dump($data);
        if (!$data) {
            NotificationHelper::error('edit','Không thể xem tin tức này!');
            header('location: /admin/news');
            exit;
        } 
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }



    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // Validate dữ liệu
        $is_valid = BlogsValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật tin tức thất bại do dữ liệu không hợp lệ!');
            header("location: /admin/news/edit/$id");
            exit;
        }
    
        // Lấy tiêu đề từ form
        $title = $_POST['name'];
        $news = new Blogs();
    
        // Kiểm tra tiêu đề đã tồn tại hay chưa
        $is_exist = $news->getOneNewsByName($title);
        if ($is_exist && $is_exist['id'] != $id) {
            NotificationHelper::error('update', 'Tiêu đề bài viết đã tồn tại!');
            header("location: /admin/news/edit/$id");
            exit;
        }
    
        // Dữ liệu cập nhật
        $data = [
            'name' => $title,
            'short_description' => $_POST['short_description'],
            'content' => $_POST['content'],
            'publish_date' => $_POST['publish_date'],
            'status' => $_POST['status'],
        ];
    
        // Kiểm tra và upload ảnh mới (nếu có)
        $is_upload = BlogsValidation::uploadImage();
        if ($is_upload) {
            $data['image_url'] = $is_upload;
        }

        // echo '<pre>';
        // var_dump($data);

        // Thực hiện cập nhật
        $result = $news->updateNews($id, $data);
    
        // Kiểm tra kết quả và phản hồi
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật tin tức thành công!');
            header('location: /admin/news');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật tin tức thất bại!');
            header("location: /admin/news/edit/$id");
            exit;
        }
    }
    


    // thực hiện xoá
    public static function delete(int $id)
    {
        $blogs= new Blogs();
        $result=$blogs->deleteNews($id);

        if ($result) {
            NotificationHelper::success('delete','Xóa bài viết thành công!');
            header('location: /admin/news');
            exit;
        }else{
            NotificationHelper::error('delete','Xóa bài viết thất bại!');
            header('location: /admin/news');
            exit;
        }
        
    }
}
