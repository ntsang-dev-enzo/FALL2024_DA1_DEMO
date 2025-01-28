<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <!-- link css -->
            <link rel="stylesheet" href="/public/assets/client/css/login-logout.css">

            <!-- link icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Đăng nhập - Đăng ký</title>
        </head>

        <body>
            <div class="container">
                <div class="box">
                    <div class="form sign_in">
                        <h3>Đăng nhập</h3>
                        <span>Thanh Xuân CAKE</span>
                        <form action="/loginform" method="post" enctype="multipart/form-data" id="form_input">
                            <div class="type">
                                <input type="hidden" name="method" value="POST" id="">
                                <input type="email" placeholder="Email" name="email" id="email">
                            </div>
                            <div class="type">
                                <input type="password" placeholder="Mật khẩu" name="password" id="password">
                            </div>
                            <div class="forgot">
                                <input type="checkbox" name="remember" id="rememberMe">
                                <label for="rememberMe">Nhớ mật khẩu</label>
                                <span><?php if (isset($error) && ($error != "")) {
                                            echo '<h6 style="color:red;">' . $error . '</h6>';
                                        } ?></span>
                            </div>
                            <div class="forgot">
                                <a href="/forgot-password"><span>Quên mật khẩu?</span></a>
                            </div>
                            <button class="btn bkg">Đăng nhập</button>
                        </form>
                        <br>
                        <a href="/login-google" class="btn-google-login">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" alt="Đăng nhập với Google">
                        </a>
                    </div>
                    <a href="/" class="text-secondary"><button style="width:35%" class="btn btn-secondary">Đóng</button></a>
                    <div class="form sign_up">
                        <h3>Đăng ký</h3>
                        <span>Thanh Xuân CAKE</span>
                        <form action="/registerform" method="POST" enctype="multipart/form-data"  id="form_input">
                            <div class="type">
                            <input type="hidden" name="method" value="POST" id="">
                                <input type="text" name="name" placeholder="Name" id="name">
                            </div>
                            <div class="type">
                                <input type="email" name="email" placeholder="Email" id="email">
                            </div>
                            <div class="type">
                                <input type="password" name="password" placeholder="Mật khẩu" id="password">
                            </div>
                            <div class="type">
                                <input type="password" name="re_password" placeholder="Xác nhận mật khẩu" id="password">
                            </div>
                            <span><?php  if (isset($error) && ($error != "")) {
                            echo '<h3 style="color:red;">' . $error . '</h3>';
                        } ?></span>
                            <button type="submit" class="btn bkg">Đăng ký</button>
                        </form>
                    </div>
                </div>
                <div class="overlay">
                    <div class="page page_signIn">
                        <h3>Chào mừng trở lại!</h3>
                        <p>Để theo dõi Thanh Xuân CAKE vui lòng đăng nhập bằng tài khoản của bạn!</p>
                        <button class="btn btnSign-in">Đăng ký <i class="bi bi-arrow-right"></i></button>
                    </div>
                    <div class="page page_signUp">
                        <h3>Chào bạn!</h3>
                        <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi!</p>
                        <button class="btn btnSign-up">
                            <i class="bi bi-arrow-left"></i>Đăng nhập</button>
                    </div>
                </div>
            </div>

            <script src="/public/assets/client/app.js"></script>
        </body>

        </html>
<?php

    }
}
