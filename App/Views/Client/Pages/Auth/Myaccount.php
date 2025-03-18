<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Myaccount extends BaseView
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
            <link rel="stylesheet" href="/public/assets/client/css/myaccount.css">

            <!-- link icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thông tin cá nhân</title>
        </head>

        <body>

        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data" id="form_input">
            <div class="container">
                
                    <div class="box">
                        <div class="form sign_in">
                            <h3>Thông tin cá nhân</h3>
                            <span>Thanh Xuân CAKE</span>
                            <?php
                            // echo '<pre>';
                            // var_dump($data);
                            // echo '</pre>';
                            // die;
                            ?>
                            <div class="type">
                                <input type="text" placeholder="Họ và tên" value="<?= htmlspecialchars($data['name']) ?>" name="name" id="name">
                            </div>
                            <div class="type">
                                <input type="hidden" name="method" value="PUT" id="">
                                <input type="email" placeholder="Email" disabled  value="<?= htmlspecialchars($data['email']) ?>" name="email" id="email">
                            </div>
                            <div class="type">
                                <input type="tel" placeholder="Số điện thoại"  value="<?= htmlspecialchars($data['phone']) ?>" name="phone" id="phone">
                            </div>
                            <input class="btn bkg" type="submit" value="Cập nhật thông tin">
                            <br>
                            <a href="/change-password" class="btn bkg close" style="background-color:lightgray">Đổi mật khẩu</a>
                            <a href="/" class="btn bkg close" style="background-color:lightgray">Đóng</a>

                        </div>

                    </div>
                    <div class="overlay">
                        <div class="page">
                            <h3>Ảnh đại diện</h3>
                            <p>
                                <img src="/public/uploads/users/<?= htmlspecialchars($data['image']) ?>" alt="" class="rounded-circle" style="width: 150px; height: 150px;">
                            </p>
                            <div class="file-input-container">
                                <input type="file" name="image" id="image" class="file-input" />
                                <label for="image" class="file-input-label">
                                    Chọn tệp
                                </label>
                            </div>
                        </div>
                    </div>
                
            </div>
        </form>

        <script src="/public/assets/client/app.js"></script>
        </body>

        </html>
<?php
    }
}
?>
