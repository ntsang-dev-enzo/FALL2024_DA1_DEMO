<?php
namespace App\Validations;
use App\Helpers\NotificationHelper;
class AuthValidation{
    public static function register():bool{
        $is_valid=true;
        if (!isset(($_POST['username']))||$_POST['username']==='') {
            NotificationHelper::error('username','Tên đăng nhập không được trống!');
            $is_valid=false;
        } 
        if (!isset(($_POST['password']))||$_POST['password']==='') {
            NotificationHelper::error('password','Mật khẩu không được trống!');
            $is_valid=false;
        }  else {
            if (strlen($_POST['password'])<3) {
                NotificationHelper::error('password','Mật khẩu phải ít nhất 3 kí tự!');
                $is_valid=false;
            }
        }
        //nhập lại mk
        if (!isset(($_POST['re_password']))||$_POST['re_password']==='') {
            NotificationHelper::error('re_password','Xác nhận mật khẩu không được trống!');
            $is_valid=false;
        }else{
            if ($_POST['password']!= $_POST['re_password']) {
                NotificationHelper::error('re_password','Xác nhận mật khẩu không trùng khớp!');
                $is_valid=false;
            }
        }
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được trống!');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }
        if (!isset(($_POST['name']))||$_POST['name']==='') {
            NotificationHelper::error('name','Tên người dùng không được trống!');
            $is_valid=false;
        }
        return $is_valid;
    }


    public static function login():bool{
        $is_valid=true;
        if (!isset(($_POST['username']))||$_POST['username']==='') {
            NotificationHelper::error('username','Tên đăng nhập không được trống!');
            $is_valid=false;
        } 
        if (!isset(($_POST['password']))||$_POST['password']==='') {
            NotificationHelper::error('password','Mật khẩu không được trống!');
            $is_valid=false;
        }  
        return $is_valid;
    }
    public static function edit():bool{
        $is_valid=true;
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được trống!');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }
        if (!isset(($_POST['name']))||$_POST['name']==='') {
            NotificationHelper::error('name','Tên người dùng không được trống!');
            $is_valid=false;
        }

        return $is_valid;
    }
    public static function uploadAvatar(){
        if (!file_exists($_FILES['avatar']['tmp_name'])||!is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            return false;
        }
        // nơi lưu trữ hình ảnh trong sourcecode 
        $target_dir='public/uploads/users/';
        // kiểm tra loại file có hợp lệ không
        $imageFileType = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
        if ($imageFileType!= 'jpg' && $imageFileType!='png' && $imageFileType !='webp' && $imageFileType != 'gif' && $imageFileType!= 'jpeg') {
            NotificationHelper::error('type_upload','Chỉ nhận file JPG, WEBP, PNG, GIF, JPEG');
            return false;
        }
        // thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage=date('YmdHmi') . '.' . $imageFileType;

        // đường dẫn đày đủ để di chuyển file
        $target_file = $target_dir. $nameImage;
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'],$target_file)) {
            NotificationHelper::error('move_upload','Không thể tải ảnh vào thư mục lưu trữ!');
            return false;
        }
        return $nameImage;
    }
    public static function changePassword():bool{
        $is_valid=true;
        if (!isset(($_POST['old_password']))||$_POST['old_password']==='') {
            NotificationHelper::error('old_password','Mật khẩu cũ không được trống!');
            $is_valid=false;
        }
        if (!isset(($_POST['new_password']))||$_POST['new_password']==='') {
            NotificationHelper::error('new_password','Mật khẩu mới không được trống!');
            $is_valid=false;
        }  else {
            if (strlen($_POST['new_password'])<3) {
                NotificationHelper::error('new_password','Mật khẩu mới phải ít nhất 3 kí tự!');
                $is_valid=false;
            }
        }
        //nhập lại mk
        if (!isset(($_POST['re_password']))||$_POST['re_password']==='') {
            NotificationHelper::error('re_password','Xác nhận mật khẩu không được trống!');
            $is_valid=false;
        }else{
            if ($_POST['new_password']!= $_POST['re_password']) {
                NotificationHelper::error('re_password','Xác nhận mật khẩu không trùng khớp!');
                $is_valid=false;
            }
        }
        return $is_valid;
    }
    public static function forgotPassword():bool{
        $is_valid=true;
        if (!isset(($_POST['username']))||$_POST['username']==='') {
            NotificationHelper::error('username','Tên đăng nhập không được trống!');
            $is_valid=false;
        } 
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được trống!');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }
        return $is_valid;
    }
    public static function resetPassword():bool{
        $is_valid=true;
        if (!isset(($_POST['password']))||$_POST['password']==='') {
            NotificationHelper::error('password','Mật khẩu không được trống!');
            $is_valid=false;
        }  else {
            if (strlen($_POST['password'])<3) {
                NotificationHelper::error('password','Mật khẩu phải ít nhất 3 kí tự!');
                $is_valid=false;
            }
        }
        //nhập lại mk
        if (!isset(($_POST['re_password']))||$_POST['re_password']==='') {
            NotificationHelper::error('re_password','Xác nhận mật khẩu không được trống!');
            $is_valid=false;
        }else{
            if ($_POST['password']!= $_POST['re_password']) {
                NotificationHelper::error('re_password','Xác nhận mật khẩu không trùng khớp!');
                $is_valid=false;
            }
        }
        return $is_valid;
    }

}
