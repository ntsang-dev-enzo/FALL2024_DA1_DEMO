<?php
namespace App\Validations;
use App\Helpers\NotificationHelper;

class ContactValidation{
public static function create(): bool{
    $is_valid=true;

    //tên loại
    if (!isset(($_POST['name']))||$_POST['name']==='') {
        NotificationHelper::error('name','Không được để trống tên người dùng!');
        $is_valid=false;
    } 
    if (!isset(($_POST['email']))||$_POST['email']==='') {
        NotificationHelper::error('email','Không được để trống email!');
        $is_valid=false;
    } 
    if (!isset(($_POST['message']))||$_POST['message']==='') {
        NotificationHelper::error('message','Không được để trống tin nhắn!');
        $is_valid=false;
    } 
    
    return $is_valid;
}

}