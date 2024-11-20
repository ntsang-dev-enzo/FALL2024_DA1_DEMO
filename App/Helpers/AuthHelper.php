<?php
namespace App\Helpers;

use App\Models\User;

class AuthHelper{
    public static function register($data){
        $user = new User();
        // bắt đầu tồn tại username
        $is_exist=$user->getOneUserByUsername($data['username']);

        if ($is_exist) {
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại!');
            return false;
        }
        $result=$user->createUser( $data);
        if ($result) {
            NotificationHelper::success('register', 'Đăng ký thành công!');
            return true;
        }
        NotificationHelper::error('register', 'Đăng ký thất bại!');
        return false;
    }
    public static function login($data){
        // kiểm tra có tồn tại username trong dtb không > không thông báo tài khoản không tồn tại > trả về false
        $user = new User();
        $is_exist = $user->getOneUserByUsername($data['username']);
        if (!$is_exist){
            NotificationHelper::error('username', 'Tài khoản không tồn tại!');
            return false;
        }
        
        
        // có thì kiểm tra pass nếu k trùng trả về false
        // nhập trong $data ['pasword']
        //pass trong cldl $is exist trường password

        if (!password_verify($data['password'],$is_exist['password'])) {
            NotificationHelper::error('password','Mật khẩu không chính xác!');
            return false;
        }
        // nếu có kiểm tra status = 1 > nếu không thông báo tk bị khóa false
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa!');
            return false;
        }
        // nếu có kiểm tra remember nếu có lưu sesson hoặc cookie thông báo thành công
        if ($data['remember']) {
            //lưu cookie và session
            //chuyển aray thành 1 string json để lưu vào cookie
           self::updateCookie($is_exist['id']);
        }
        else{
            //lưu session
           self::updateSession($is_exist['id']);
        }
        NotificationHelper::success('login','Đăng nhập thành công!');
        return true;
    }
    public static function updateCookie(int $id){
        $user = new User();
        $result=$user->getOneUser($id);
        if ($result) {
            $user_data=json_encode($result);
            //lưu ck
            setcookie('user', $user_data, time() + 3600*24*30*12, '/');
            //lueu ss
            $_SESSION['user'] = $result;
        }
    }
    public static function updateSession(int $id){
        $user = new User();
        $result=$user->getOneUser($id);
        if ($result) {
            $_SESSION['user'] = $result;
        }
    }
    public static function checkLogin():bool{
        if (isset($_COOKIE['user'])) {
            $user=$_COOKIE['user'];
            $user_data=json_decode($user);
            // $_SESSION['user']=(array)$user_data;
            self::updateCookie($user_data->id);
            return true;
        }
        if (isset($_SESSION['user'])) {
            self::updateSession($_SESSION['user']['id']);
            return true;
        }
        return false;
    }
    public static function logout(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_COOKIE['user'])) {
           setcookie('user','',time()-3600*24*30*12,'/');
        }
    }
    public static function edit($id):bool{
        if (!self::checkLogin()) {
            NotificationHelper::error('login','Vui lòng đăng nhập để xem thông tin!');
            return false;
        }
        $data = $_SESSION['user'];
        $user_id =$data['id'];
        if (isset($_COOKIE['user'])) {
            self::updateCookie($user_id);
        }
        self::updateSession($user_id);
        if ($user_id!=$id) {
            NotificationHelper::error('user_id','Không có quyền xem thông tin!');
            return false;
        }
        return true;
    
    }
    public static function update($id,$data){
        $user =  new User();
        $result = $user->updateUser($id,$data);
        if (!$result) {
            NotificationHelper::error('update_user','Cập nhật thông tin thất bại!');
            return false;
        }

        if ($_SESSION['user']) {
            self::updateSession($id);

        }
        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }
        NotificationHelper::success('update_user','Cập nhật thông tin tài khoản thành công!');
        return true;
    }
    public static function changePassword($id,$data){
        //kt tồn tại
        $user= new User();
        $result = $user->getOneUser($id);
        if (!$result) {
            NotificationHelper::error('account','Tài khoản không tồn tại!');
            return false;
        }
        // kiểm tra có trùng với database
        if (!password_verify($data['old_password'],$result['password'])) {
            NotificationHelper::error('password_vertify','Mật khẩu cũ không chính xác!');
            return false;
        }
        // mã hóa mật khẩu
        $hash_password=password_hash($data['new_password'],PASSWORD_DEFAULT);
        $data_update=[
            'password'=>$hash_password,
        ];

        $result_update=$user->updateUser($id, $data_update);
        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }
            self::updateSession($id);
            NotificationHelper::success('change-password','Đổi mật khẩu thành công!');
            
            return true;
        }
        else{
            NotificationHelper::error('change-password','Đổi mật khẩu thất bại!');
            return false;
        }
    }
    public static function forgotPassword($data){
        $user= new User();
        $result=$user->getOneUserByUsername($data['username']);
        return $result;
    }
    public static function resetPassword($data){
    $user=new User();
    $result=$user->updateUserByUsernameAndEmail($data);
    return $result;
    }

    public static function middleware(){
        //  var_dump($_SERVER['REQUEST_URI']);
        $admin=explode('/',$_SERVER['REQUEST_URI']);
        // var_dump($admin);
        $admin=$admin[1];
        if ($admin == 'admin') {
            // if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập!');
            //     header('location: /login');
            //     exit;
            // }
            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin','Vui lòng đăng nhập!');
                header('location: /login');
                exit;
            }

            if ($_SESSION['user']['role'] != 1) {
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập!');
                header('location: /login');
                exit;
            }
        }
    }
}
