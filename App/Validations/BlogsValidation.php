<?php
namespace App\Validations;
use App\Helpers\NotificationHelper;

class BlogsValidation{
    public static function create(): bool
    {
        $is_valid = true;

        // Tiêu đề
        if (!isset($_POST['name']) || trim($_POST['name']) === '') {
            NotificationHelper::error('name', 'Tiêu đề tin tức không được để trống!');
            $is_valid = false;
        }

        // Mô tả ngắn
        if (!isset($_POST['short_description']) || trim($_POST['short_description']) === '') {
            NotificationHelper::error('short_description', 'Mô tả ngắn không được để trống!');
            $is_valid = false;
        }

        // Nội dung
        if (!isset($_POST['content']) || trim($_POST['content']) === '') {
            NotificationHelper::error('content', 'Nội dung không được để trống!');
            $is_valid = false;
        }

        // Ngày xuất bản
        if (!isset($_POST['publish_date']) || trim($_POST['publish_date']) === '') {
            NotificationHelper::error('publish_date', 'Ngày xuất bản không được để trống!');
            $is_valid = false;
        }

        // Trạng thái
        if (!isset($_POST['status']) || trim($_POST['status']) === '') {
            NotificationHelper::error('status', 'Trạng thái không được để trống!');
            $is_valid = false;
        }

        return $is_valid;
    }
public static function edit(): bool
    {
        $is_valid = true;

        // Tiêu đề
        if (!isset($_POST['name']) || trim($_POST['name']) === '') {
            NotificationHelper::error('name', 'Tiêu đề tin tức không được để trống!');
            $is_valid = false;
        }

        // Mô tả ngắn
        if (!isset($_POST['short_description']) || trim($_POST['short_description']) === '') {
            NotificationHelper::error('short_description', 'Mô tả ngắn không được để trống!');
            $is_valid = false;
        }

        // Nội dung
        if (!isset($_POST['content']) || trim($_POST['content']) === '') {
            NotificationHelper::error('content', 'Nội dung không được để trống!');
            $is_valid = false;
        }

        // Ngày xuất bản
        if (!isset($_POST['publish_date']) || trim($_POST['publish_date']) === '') {
            NotificationHelper::error('publish_date', 'Ngày xuất bản không được để trống!');
            $is_valid = false;
        }

        // Trạng thái
        if (!isset($_POST['status']) || trim($_POST['status']) === '') {
            NotificationHelper::error('status', 'Trạng thái không được để trống!');
            $is_valid = false;
        }

        return $is_valid;
    }
public static function uploadImage(){
    if (!file_exists($_FILES['image']['tmp_name'])||!is_uploaded_file($_FILES['image']['tmp_name'])) {
        return false;
    }
    // nơi lưu trữ hình ảnh trong sourcecode 
    $target_dir='public/uploads/blogs/';
    // kiểm tra loại file có hợp lệ không
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if ($imageFileType!= 'jpg' && $imageFileType!='png' && $imageFileType !='webp' && $imageFileType != 'gif' && $imageFileType!= 'jpeg') {
        NotificationHelper::error('type_upload','Chỉ nhận file JPG, WEBP, PNG, GIF, JPEG');
        return false;
    }
    // thay đổi tên file thành dạng năm tháng ngày giờ phút giây
    $nameImage=date('YmdHmi') . '.' . $imageFileType;

    // đường dẫn đày đủ để di chuyển file
    $target_file = $target_dir. $nameImage;
    if (!move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) {
        NotificationHelper::error('move_upload','Không thể tải ảnh vào thư mục lưu trữ!');
        return false;
    }
    return $nameImage;
}
}