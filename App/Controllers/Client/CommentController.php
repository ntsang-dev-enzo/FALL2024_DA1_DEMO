<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;


class CommentController
{
    // xử lý chức năng thêm
    public static function store()
    {
        //validation các trường dữ liệu
        $is_valid = CommentValidation::createClient();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm bình luận thất bại!');
            if (isset($_POST['product_id']) && $_POST['product_id']) {
                $product_id = $_POST['product_id'];
                header("location: /products/$product_id");
            } else {
                header('location: /products');
            }

            exit;
        }
        $product_id = $_POST['product_id']; 
               echo '<pre>';
            var_dump($product_id);
            echo '</pre>';
        $data = [
            'content' => $_POST['content'],
            'product_id' => $product_id,
            'user_id' => $_POST['user_id'],
        ];            

        $comment = new Comment();
        $result = $comment->createComment($data);
        if(!empty($_SESSION['access_token'])){
            NotificationHelper::error('store', 'Vui lòng đăng nhập tài khoản TSBooks để bình luận!');
        }
        elseif ($result) {
            NotificationHelper::success('store', 'Thêm bình luận thành công!');
        } else {

            NotificationHelper::error('store', 'Thêm bình luận thất bại!');
        }
        header("location: /products/$product_id");
    }



    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //validation các trường dữ liệu
        $is_valid=CommentValidation::editClient();
            if (!$is_valid) {
                NotificationHelper::error('update', 'Cập nhật bình luận thất bại!');
                if (isset($_POST['product_id']) && $_POST['product_id']) {
                    $product_id = $_POST['product_id'];
                    header("location: /products/$product_id");
                } else {
                    header('location: /products');
                }
    
            exit;
        }
        // cập nhật
        $data=[
            'content' => $_POST['content'],

        ];
        $comment=new Comment();
        $result=$comment->updateComment($id, $data);
        if ($result) {
            NotificationHelper::success('update','Cập nhật bình luận thành công!');
        }
        else{
            NotificationHelper::error('update','Cập nhật bình luận thất bại!');
        }
        if (isset($_POST['product_id']) && $_POST['product_id']) {
            $product_id = $_POST['product_id'];
            header("location: /products/$product_id");
        } else {
            header('location: /products');
        }

    }

    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment= new Comment();
        $result=$comment->deleteComment($id);
        if ($result) {
            NotificationHelper::success('delete','Xóa bình luận thành công!');
        }else{
            NotificationHelper::error('delete','Xóa bình luận thất bại!');
        }
        if (isset($_POST['product_id']) && $_POST['product_id']) {
            $product_id = $_POST['product_id'];
            header("location: /products/$product_id");
        } else {
            header('location: /products');
        }

    }
}
