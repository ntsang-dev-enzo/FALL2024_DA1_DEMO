<?php namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Myaccount extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
        .profile-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-info {
            display: flex;
            align-items: center;
        }
        .profile-info .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <main>
    <div class="container">
        <div class="profile-container">
            <h2 class="text-center">Thông Tin Cá Nhân</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                <?php
if (isset($data) && isset($data['avatar']) && $data['avatar']):
?>
    <img id="profilePic" src="<?=APP_URL?>/public/uploads/users/<?=$data['avatar']?>" alt="Ảnh Đại Diện" class="profile-pic">
<?php else: ?>
    <img id="profilePic" src="https://via.placeholder.com/150" alt="Ảnh Đại Diện" class="profile-pic">
<?php endif; ?>


                </div>
                <div class="col-md-8">
                    <form action="/users/<?=$data['id']?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <input type="hidden" name="method" value="PUT" id="">
                            <label for="username">Tên Đăng Nhập:</label>
                            <input type="text" name="username" value="<?=$data['username']?>" class="form-control" id="username" disabled placeholder="Nhập tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="fullName">Họ Tên:</label>
                            <input type="text" name="name" value="<?=$data['name']?>" class="form-control" id="fullName" placeholder="Nhập họ tên">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?=$data['email']?>" class="form-control" id="email" placeholder="Nhập email">
                        </div>
                        
                        <div class="form-group">
                            <label for="avatar">Ảnh đại diện:</label>
                            <input name="avatar" type="file" class="form-control-file mt-2" id="avatar">
                        </div>
                        <p></p>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </form>
                    <p></p>
                    <p><a  style="color: red; text-align: left;" href="/change-password">Đổi mật khẩu</a></p>
                </div>
            </div>
        </div>
    </div>
        </main>
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