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
            'content' => $content
        ];
        
        // Gọi phương thức thêm bài viết
        $result = $news->createNew($data);
        // var_dump($result);
        // die;
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
    // public static function edit(int $id)
    // {

    //     $comment=new Comment();
    //     $data = $comment->getOneCommentJoinProductAndUser($id);
    //     if (!$data) {
    //         NotificationHelper::error('edit','Không thể xem bình luận này!');
    //         header('location: /admin/comments');
    //         exit;
    //     } 
    //     Header::render();
    //     Notification::render();
    //     NotificationHelper::unset();
    //     Edit::render($data);
    //     Footer::render();
    // }



    // // xử lý chức năng sửa (cập nhật)
    // public static function update(int $id)
    // {
    //     //validation các trường dữ liệu
    //     $is_valid=CommentValidation::edit();
    //     if(!$is_valid){
    //         NotificationHelper::error('update','Cập nhật bình luận thất bại!');
    //         header("location: /admin/comments/$id");
    //         exit;
    //     }
    //     // echo 'ucii';
    //     $status = $_POST['status'];
    //     //kiểm tra tên loại tồn tại chưa, không được trùng
    //     $comment=new Comment();
    //     // cập nhật
    //     $data=[
    //        'status' => $status
    //     ];
    //     $result=$comment->updateComment($id, $data);
    //     if ($result) {
    //         NotificationHelper::success('update','Cập nhật bình luận thành công!');
    //         header('location: /admin/comments');
    //         exit;
    //     }
    //     else{
    //         NotificationHelper::error('update','Cập nhật bình luận thất bại!');
    //         header("location: /admin/comments/$id");
    //         exit;
    //     }

    // }


    // // thực hiện xoá
    // public static function delete(int $id)
    // {
    //     $comment= new Comment();
    //     $result=$comment->deleteComment($id);
    //     if ($result) {
    //         NotificationHelper::success('delete','Xóa bình luận thành công!');
    //         header('location: /admin/comments');
    //         exit;
    //     }else{
    //         NotificationHelper::error('delete','Xóa bình luận thất bại!');
    //         header('location: /admin/comments');
    //         exit;
    //     }
        
    // }
}
