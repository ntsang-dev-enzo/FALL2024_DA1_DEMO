<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();

        // var_dump($is_login);
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>TSBooks</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">

            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        </head>

        <body>
            <!-- Topbar Start -->
            <div class="bg-dark ">
                <div class="container">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="row">
                            <div class="d-inline-flex align-items-center" style="height: 45px;">
                                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>An Bình, Ninh Kiều, Cần Thơ</small>
                                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>sang@example.com</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-inline-flex align-items-center" style="height: 45px;">
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->


            <!-- Navbar & Carousel Start -->
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a href="/" class="navbar-brand p-0">
                        <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>TSBooks</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0 me-3">
                            <a href="/" class="nav-item nav-link  <?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">Trang chủ</a>
                            <a href="/products" class="nav-item nav-link  <?= $_SERVER['REQUEST_URI'] == '/products' ? 'active' : '' ?>">Sản phẩm</a>
                            <a href="/contact" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/contact' ? 'active' : '' ?>">Liên hệ</a>
                            <a href="/blogs" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/blogs' ? 'active' : '' ?>">Tin tức</a>
                            <a href="" class="nav-item nav-link">Giới thiệu</a>

                        </div>

                        <a type="button" class="btn btn-outline-danger rounded-circle ms-1"><i class="fa fa-search"></i></a>
                        <a type="button" class="btn btn-outline-danger rounded-circle ms-1"><svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                            </svg></a>
                        <a href="/cart" class="btn btn-outline-danger rounded-circle ms-1"><svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg></a>
                        <?php
                        if ($is_login) :
                        ?>

                            <div class="dropdown text-danger ms-3">
                                <button type="button" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown">
                                    <img style="width:30px; height:30px; border-radius:50%" src="<?=APP_URL?>/public/uploads/users/<?= $_SESSION['user']['image'] ?>" alt=""> <?= $_SESSION['user']['name'] ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-danger" href="/users/<?= $_SESSION['user']['id'] ?>" <?= $_SESSION['user']['id'] ?>><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                            </svg>Thông tin</a></li>
                                    <li>
                                        <hr class=" dropdown-divider"><a class="dropdown-item text-danger" href="/logout"><svg class="me-2 text-danger" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                            </svg>Đăng xuất</a></hr>
                                    </li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <a href="/login" class="btn btn-outline-danger py-2 px-4 ms-3"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>Đăng nhập</a>
                        <?php endif; ?>
                    </div>
                </nav>


            </div>
            <!-- Navbar & Carousel End -->


            <!-- Full Screen Search Start -->

    <?php
    }
}
    ?>