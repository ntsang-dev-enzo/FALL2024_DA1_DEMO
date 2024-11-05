<?php namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
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
    <title>Lấy lại mật khẩu</title>
    <link rel="stylesheet" href="/public/assets/client/css/register.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-register">
        <div class="signup-form-register">
            <h2>Lấy lại mật khẩu</h2>
            <form action="/reset-password" method="POST" enctype="multipart/form-data" >
            <label for="password">Mật khẩu mới</label>
            <div class="form-group-register"><input type="hidden" name="method" value="PUT" id="">
                    <input type="password" class="form-control-register" id="password" name="password" placeholder="Nhập mật khẩu" >
                </div>
                <div class="form-group-register">
                    <label for="re_password">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control-register" id="re_password" name="re_password" placeholder="Xác nhận mật khẩu" >
                </div>
                <div class="form-group-register">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Đặt lại mật khẩu</button>
                </div>
            </form>
            <p class="text-center"><a href="/forgot-password">Quay lại</a></p>
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