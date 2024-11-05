<?php
namespace App\Validations;
use App\Helpers\NotificationHelper;

class UserValidation{
    public static function create():bool{
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
        // trạng thái
        if (!isset(($_POST['status']))||$_POST['status']==='') {
            NotificationHelper::error('status','Trạng thái không được trống!');
            $is_valid=false;
        }

        return $is_valid;
    }
    public static function edit():bool{
        $is_valid=true;
        if (isset(($_POST['password']))&&$_POST['password']!=='') {
            if (strlen($_POST['password'])<3) {
                NotificationHelper::error('password','Mật khẩu phải ít nhất 3 kí tự!');
                $is_valid=false;
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
        // trạng thái
        if (!isset(($_POST['status']))||$_POST['status']==='') {
            NotificationHelper::error('status','Trạng thái không được trống!');
            $is_valid=false;
        }

        return $is_valid;
    }
    public static function uploadAvatar(){
        return AuthValidation::uploadAvatar();
    }
}