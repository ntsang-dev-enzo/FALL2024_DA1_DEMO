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
    <meta charset="utf-8">
    <title>Tiệm bánh Thanh Xuân</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/public/assets/client/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
     <link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">
<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <!-- Template Stylesheet -->
    <link href="/public/assets/client/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid top-bar bg-dark text-light nav_top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-light " href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="small text-light" href="#">Career</a></li>
                    <li class="breadcrumb-item"><a class="small text-light" href="#">Terms</a></li>
                    <li class="breadcrumb-item"><a class="small text-light" href="#">Privacy</a></li>
                </ol>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Theo dõi Thanh Xuân tại:</small>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-lg-square text-primary border-end rounded-0" target="_blank" href="https://www.facebook.com/phanvoquockhanh"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-lg-square text-primary border-end rounded-0" target="_blank" href="https://zalo.me/0704975960"><img style="width:20px; height:20px;" src="/public/assets/client/img/icons8-zalo-50.png" alt=""></a>
                    <a class="btn-lg-square text-primary pe-0" target="_blank" href="https://www.instagram.com/thanh_xuan0404?igsh=bnRyNHhqdGZ4MGQx"><i class="fab fa-instagram"></i></a>
                </div>
                <?php if ($is_login): ?>
                    <button type="button" style="z-index: 1000;" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown">
                    <img style="width:30px; height:30px; border-radius:50%" src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['image'] ?>" alt="User Image">
                                        <?= $_SESSION['user']['name'] ?>
                    <?php if ($_SESSION['user']): ?></button>
                        
                        <ul class="dropdown-menu">
                                        <li>
                                            <!-- <a class="dropdown-item text-danger" href="/users/<?php /* ltrim($_SESSION['user']['id'], '/') */ ?>"> -->
                                                <a class="dropdown-item text-danger" href="/myaccount"> 
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                </svg>Thông tin
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-danger" href="/logout">
                                                <svg class="me-2 text-danger" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                                </svg>Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                        <?php else: ?>
                                            
                                            <?php endif; ?>
                                            <?php else: ?>
                                                <a href="/login" style="font-size: 12px;" class="btn btn-outline-warning" ><img style="width: 18px" class="me-1" src="/public/assets/client/img/icons8-login-50.png" alt="">Đăng nhập</a>
                            <?php endif; ?>
                            <a class="ms-3" target="_blank" href="/cart"><img style="width:30px; height:30px" src="/public/assets/client/img/icons8-cart-64.png" alt=""></a>
            </div>
                
        </div>
    </div>
    <!-- Topbar End -->

  
    <!-- Navbar Start -->
    <nav style="z-index: 999;" class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow header_logo fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
        <img style="height: 100px; " class="text-primary logo m-0" src="/public/assets/client/img/Borcelle_Cookies__2_-removebg-preview.png" alt="">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">Trang chủ</a>
                <a href="/products" class="nav-item <?= $_SERVER['REQUEST_URI'] == '/products' ? 'active' : '' ?> nav-link">Sản phẩm</a>
                <a href="about.html" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/abouts' ? 'active' : '' ?>">Giới thiệu</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="login" style="font-size: 12px;" class="login_mobile d-none  btn btn-outline-warning nav-item nav-link" ><img style="width: 18px" class="me-1" src="/public/assets/client/img/icons8-login-50.png" alt="">Đăng nhập</a>
            </div>
            <div class=" d-none d-lg-flex">
                <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle">
                    <i class="fa fa-phone text-primary"></i>
                </div>
                <div class="ps-3">
                    <small class="text-primary mb-0">Liên hệ đặt bánh</small>
                    <p class="text-light fs-5 mb-0">0704-975-960</p>
                </div>
            </div>
        </div>
    </nav>

    <?php
    }
}
    ?>