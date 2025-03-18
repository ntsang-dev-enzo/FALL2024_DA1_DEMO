<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Đổi mật khẩu</title>
            
            <!-- Link CSS -->
            <link rel="stylesheet" href="/public/assets/client/css/myaccount.css">
            
            <!-- Link Icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>
            <form action="/change-password" method="POST" enctype="multipart/form-data" id="form_input">
                <div class="container">
                    <div class="box">
                        <div class="form sign_in">
                            <h3>Đổi mật khẩu</h3>
                            <span>Thanh Xuân CAKE</span>
                            
                            <div class="type">
                                <input type="hidden" name="method" value="PUT">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
                                <input type="text" placeholder="Email" disabled value="<?= htmlspecialchars($data['email']) ?>" name="email">
                            </div>
                            <div class="type">
                                <input type="password" placeholder="Mật khẩu cũ" name="old_password" required>
                            </div>
                            <div class="type">
                                <input type="password" placeholder="Mật khẩu mới" name="new_password" required>
                            </div>
                            <div class="type">
                                <input type="password" placeholder="Xác nhận mật khẩu mới" name="re_password" required>
                            </div>
                            
                            <input class="btn bkg" type="submit" value="Xác nhận đổi mật khẩu">
                            <br>
                            <a href="/users/<?= $data['id'] ?>" class="btn bkg close" style="background-color:lightgray">Quay lại</a>
                        </div>
                    </div>
                    <div class="overlay">
                    <div class="page page_signIn">
                        <h3>Đổi mật khẩu!</h3>
                        <p>Để tăng cường sự bảo mật cho tài khoản của bạn!</p>
                    </div>
                </div>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
            <script src="/public/assets/client/app.js"></script>
        </body>

        </html>
<?php
    }
}
