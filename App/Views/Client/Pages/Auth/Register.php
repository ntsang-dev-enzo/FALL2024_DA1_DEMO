<?php namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="/public/assets/client/css/register.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-register">
        <div class="signup-form-register">
            <h2>Đăng ký</h2>
            <form action="/registerform" method="POST" enctype="multipart/form-data" >
            <div class="form-group-register">
                <input type="hidden" name="method" value="POST" id="">
                    <input type="text" class="form-control-register" name="name" placeholder="Tên người dùng" >
                </div>    
            <div class="form-group-register">
                    <input type="text" class="form-control-register" name="username" placeholder="Tên đăng nhập" >
                </div>
                <div class="form-group-register">
                    <input type="text" class="form-control-register" name="email" placeholder="Email" >
                </div>
                <div class="form-group-register">
                    <input type="password" class="form-control-register" name="password" placeholder="Mật khẩu" >
                </div>
                <div class="form-group-register">
                    <input type="password" class="form-control-register" name="re_password" placeholder="Xác nhận mật khẩu" >
                </div>
                <span><?php  if (isset($error) && ($error != "")) {
                            echo '<h3 style="color:red;">' . $error . '</h3>';
                        } ?></span>
                <div class="form-group-register">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Đăng ký</button>
                </div>
            </form>
            <p class="text-center">Đã có tài khoản? <a href="/login">Đăng nhập</a></p>
        </div>
    </div>
    <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
</body>
</html>

<?php

    }
}