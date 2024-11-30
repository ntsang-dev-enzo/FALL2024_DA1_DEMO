<?php

namespace App\Views\Client\Pages\Auth;

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
                content="width=device-width, initial-scale=1, shrink-to-fit=no" />

            <!-- Bootstrap CSS v5.2.1 -->
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                crossorigin="anonymous" />
            <style>
                .profile-container {
                    max-width: 800px;
                    margin: 30px auto;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
                                if (!empty($_SESSION['access_token'])): ?>
                                    <img src="data:image/jpeg;base64,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" alt="Default Image">
                                <?php else: ?><img id="profilePic" src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['image'] ?>" alt="Ảnh Đại Diện" class="profile-pic">

                                <?php endif; ?>


                            </div>
                            <div class="col-md-8">
                                <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="method" value="PUT" id="">
                                        <label for="username">Tên Đăng Nhập:</label>
                                        <?php
                                        if (!empty($_SESSION['access_token'])): ?>
                                            <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" class="form-control" readonly id="fullName" placeholder="Nhập họ tên">
                                        <?php else: ?>
                                            <input type="text" name="username" value="<?= $_SESSION['user']['username'] ?>" class="form-control" id="username" disabled placeholder="Nhập tên đăng nhập">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullName">Họ Tên:</label>
                                        <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" class="form-control" id="fullName" placeholder="Nhập họ tên">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" id="email" placeholder="Nhập email">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Ảnh đại diện:</label>
                                        <input name="image" type="file" class="form-control-file mt-2" id="image">
                                    </div>
                                    <p></p>
                                    <button type="submit" class="btn btn-primary w-100">Lưu Thay Đổi</button>
                                </form>
                                <div class="mt-3"><a class="btn btn-danger me-2" href="/change-password">Đổi mật khẩu</a>
                                    <a href="/" class="btn btn-secondary">Quay lại</a>

                                </div>
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
                crossorigin="anonymous"></script>

            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
        </body>

        </html>
<?php

    }
}
