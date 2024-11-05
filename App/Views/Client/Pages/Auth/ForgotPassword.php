<?php namespace App\Views\Client\Pages\Auth;
use App\Views\BaseView;

class ForgotPassword extends BaseView
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
    <title>Quên mật khẩu</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    <link rel="stylesheet" href="/public/assets/client/css/register.css">
</head>

    <div class="container-register">
        <div class="signup-form-register">
            <h2>Quên mật khẩu</h2>
            <form action="/forgot-password" method="POST">
            <div class="form-group-register">
                <label for="username">Tên đăng nhập: </label>
                <input type="hidden" name="method" value="POST" id="">
                    <input type="text" class="form-control-register" name="username" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group-register">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control-register" name="email" placeholder="Email">
                </div>
                <div class="form-group-register">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Gửi yêu cầu</button>
                </div>
            </form>
            <p class="text-center">Quay lại trang <a href="/login">Đăng nhập</a></p>
        </div>
    </div>
</body>
</html>
    <?php }}?>