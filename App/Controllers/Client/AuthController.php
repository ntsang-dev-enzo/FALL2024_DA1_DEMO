<?php
namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Admin\Layouts\Header;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Myaccount;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController{
    // hiển thị đăng ký
    public static function register(){
        Notification::render();
        NotificationHelper::unset();
        Register::render();
    }
    public static function registerAction(){
        //kiểm tra đk, nếu không, chuyển trang, nếu có báo lỗi
        $is_valid=AuthValidation::register();

        if (!$is_valid) {
            NotificationHelper::error('register_valid', 'Đăng ký không thành công!');
            header('Location: /register');
            exit();
        }


        //lấy data ng dùng nhập
        $username=$_POST['username'];
        $password=$_POST['password'];
        $hash_password= password_hash ($password, PASSWORD_DEFAULT);
        $email=$_POST['email'];
        $name=$_POST['name'];
        $data = [
            'username' => $username,
            'password' => $hash_password,
            'email' => $email,
            'name' => $name
        ];
        $result=AuthHelper::register($data);
        if($result){
            header('Location: /login ');
        }else{
            header('Location: /register');
            // $error= "Đăng ký thất bại";
            // var_dump($result);
        }
    }
    public static function login(){
        Notification::render();
        NotificationHelper::unset();
        Login::render();
    }
    public static function loginAction(){
       // bắt lỗi 
       $is_valid= AuthValidation::login();
       if (!$is_valid) {
           NotificationHelper::error('login', 'Đăng nhập không thành công!');
           header('Location: /login');
           exit();
       }
       $data=[
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'remember'=> isset($_POST['remember'])
       ];
       $result=AuthHelper::login($data);
       if ($result) {
        // NotificationHelper::success('login','Đăng nhập thành công!');
        header('Location: /');
       }else{
        // NotificationHelper::error('login','Đăng nhập không thành công!');
        header('Location: /login');
       }
    }
    // public static function checkLogin():bool{
    //     if (isset($_COOKIE['user'])) {
    //         $user = $_COOKIE['user'];
    //         $user_data = json_decode($user);
    //         $_SESSION['user'] = (array)$user_data;
    //         return true;
    //     }
    //     if (isset($_SESSION['user'])) {
    //         return true;
    //     }
    //     return false;
    // }
    public static function logout(){
        AuthHelper::logout();
        NotificationHelper::success('logout','Đăng xuất thành công!');
        header('Location: /');
    }
    public static function edit($id){
        $result = AuthHelper::edit($id);
        if (!$result) {
            if (isset($_SESSION['error']['login'])) {
                header('Location: /login');
                exit;
            }
            if (isset($_SESSION['error']['user_id'])) {
                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("Location: /users/$user_id");
                exit;
            }
        }
        $data=$_SESSION['user'];
       
        Notification::render();
        NotificationHelper::unset();
        Myaccount::render($data);
    }

public static function update($id){
    $is_valid=AuthValidation::edit();
    if (!$is_valid) {
        NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại!');
        header("Location: /users/$id");
        exit();
    }
    $data = [
        'email' => $_POST['email'],
        'name' => $_POST['name'],
    ];

    // kiểm tra có upload hình ảnh không nếu có thì kiểm tr5a xem có hợp lệ khoong
    $is_upload=AuthValidation::uploadAvatar();
    if ($is_upload) {
        $data['avatar'] = $is_upload;
    }
    // gọi helper để update
    $result = AuthHelper::update($id, $data);
    // kt kết quả và chuyển hướng
    header("Location: /users/$id");
}
// hiển thị form đổi mật khẩu
public static function changePassword(){
    $is_login=AuthHelper::checkLogin();
    if (!$is_login) {
        NotificationHelper::error('login','Vui lòng đăng nhập để đổi mật khẩu!');
        header('Location: /login');
        exit;
    }
    $data=$_SESSION['user'];
    Notification::render();
    NotificationHelper::unset();
    ChangePassword::render($data);

    
}
public static function changePasswordAction(){
    $is_valid=AuthValidation::changePassword();
    if (!$is_valid) {
        NotificationHelper::error('change-password','Đổi mật khẩu thất bại!');
        header("Location: /change-password");
        exit;
    }
    $id = $_SESSION['user']['id'];
    $data=[
        'old_password' => $_POST['old_password'],
        'new_password' => $_POST['new_password'],
    ];
    // gọi authhelper
    $result=AuthHelper::changePassword($id,$data);
    header('Location: /change-password');
}

//hiển thị giao diện lấy lại mk
public static function forgotPassword(){
    Notification::render();
    NotificationHelper::unset();
    ForgotPassword::render();
}

// thực hiện lấy lại mk
public static function forgotPasswordAction(){
//validation
$is_valid=AuthValidation::forgotPassword();
    if (!$is_valid) {
        NotificationHelper::error('forgot_password','Lấy lại mật khẩu thất bại!');
        header("Location: /forgot-password");
        exit;
    }
    $username=$_POST['username'];
    $email=$_POST['email'];
    $data=[
        'username'=>$username
    ];
//authhelper
    $result=AuthHelper::forgotPassword($data);
    if (!$result) {
        NotificationHelper::error('username_exist','Không tồn tại tài khoản này!');
        header("Location: /forgot-password");
        exit;
    }

    if ($result['email']!=$email) {
        NotificationHelper::error('email_exist','Email không đúng!');
        header("Location: /forgot-password");
        exit;
    }

    $_SESSION['reset_password']=[
        'username'=>$username,
        'email'=>$email
    ];
    header("Location: /reset-password");

}

public static function resetPassword(){
    if (!isset($_SESSION['reset_password'])) {
        NotificationHelper::error('reset_password','Vui lòng nhập đầy đủ thông tin của form dưới đây!');
        header("Location: /forgot-password");
        exit;
    }
    Notification::render();
    NotificationHelper::unset();
    ResetPassword::render();
}
public static function resetPasswordAction(){
    $is_valid=AuthValidation::resetPassword();
    if (!$is_valid) {
        NotificationHelper::error('reset_password','Đặt lại mật khẩu thất bại!');
        header("Location: /reset-password");
        exit;
    }
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $data=[
        'username'=>$_SESSION['reset_password']['username'],
        'email'=>$_SESSION['reset_password']['email'],
        'password'=>$hash_password
    ];
    $result=AuthHelper::resetPassword($data);
    if ($result) {
        NotificationHelper::success('reset_password','Đặt lại mật khẩu thành công!');
        unset($_SESSION['reset_password']);
        header("Location: /login");
    }else{
        NotificationHelper::error('reset_password','Đặt lại mật khẩu thất bại!');
        header("Location: /reset-password");
    }
}
}