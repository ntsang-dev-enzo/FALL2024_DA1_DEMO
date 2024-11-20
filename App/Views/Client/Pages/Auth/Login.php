<?php namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Đăng nhập</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
<link rel="stylesheet" href="/public/assets/client/css/register.css">
        <!-- Bootstrap CSS v5.2.1 -->
         
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main> <div class="container-register">
        <div class="signup-form-register">
        <form action="/loginform" method="post" enctype="multipart/form-data" >
            <h2>Đăng Nhập</h2>
            <div class="form-group-register">
                <input type="hidden" name="method" value="POST" id="">
                <input type="text" class="form-control-register" name="username" placeholder="Tên người dùng">
            </div>
            <div class="form-group-register">
                <input type="password" class="form-control-register" autocomplete="current-password" name="password" placeholder="Mật khẩu">
            </div>
            <div class="form-group-register">
                <input type="checkbox" name="remember" id="rememberMe">
                <label for="rememberMe">Nhớ mật khẩu</label>
            </div>
            <span><?php  if (isset($error) && ($error != "")) {
                            echo '<h6 style="color:red;">' . $error . '</h6>';
                        } ?></span> 
            <div class="text-center">
                <button  style="width:50%" type="submit" name="submit" class="btn btn-primary">Đăng Nhập</button>
            </div>
            <div class="text-footer text-center">
                        <p class="mt-4">Chưa có tài khoản? <a href="/register" class="text-primary">Đăng ký</a></p>
                        <p><a href="/forgot-password" class="text-primary">Quên mật khẩu?</a></p>
                    </div>  
        </form>
        <div class="card-footer bg-transparent text-muted text-center">
                <a href="/" class="text-secondary"><button  style="width:35%" class="btn btn-secondary" >Đóng</button></a>
            </div>
        </div>
    </div></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
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