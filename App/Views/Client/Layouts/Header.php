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
            <div class="container-fluid bg-dark px-5 py-0 d-none d-lg-block col-12">
                <div class="row gx-0">
                    <div class="col-lg-8 text-center text-lg-start">
                        <div class="d-inline-flex align-items-center" style="height: 45px;">
                            <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>An Bình, Ninh Kiều, Cần Thơ</small>
                            <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                            <small class="text-light"><i class="fa fa-envelope-open me-2"></i>sang@example.com</small>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
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
            <!-- Topbar End -->


            <!-- Navbar & Carousel Start -->
            <div class="container-fluid position-relative p-0">
                <nav class="navbar navbar-expand-lg navbar-dark px-5">
                    <a href="/" class="navbar-brand p-0">
                        <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>TSBooks</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="/" class="nav-item nav-link active">Trang chủ</a>
                            <a href="/products" class="nav-item nav-link">Sản phẩm</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Liên hệ</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                    <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                </div>
                            </div>
                            <a href="about.html" class="nav-item nav-link">Giới thiệu</a>
                            
                            <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Góp ý</a>
    <div class="dropdown-menu m-0">
        <div class="dropdown-submenu">
            <a href="price.html" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Pricing Plan</a>
            <div class="dropdown-menu">
                <a href="basic.html" class="dropdown-item">Basic Plan</a>
                <a href="premium.html" class="dropdown-item">Premium Plan</a>
                <a href="enterprise.html" class="dropdown-item">Enterprise Plan</a>
            </div>
        </div>
        <a href="feature.html" class="dropdown-item">Our Features</a>
        <a href="team.html" class="dropdown-item">Team Members</a>
        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
        <a href="quote.html" class="dropdown-item">Free Quote</a>
    </div>
</div>


                            <a href="/cart" class="nav-item nav-link">Giỏ hàng</a>
                        </div>

                <?php  
                if ($is_login) :
                ?>      
                <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                <a href="/logout" class="btn btn-primary py-2 px-4 ms-3">Đăng Xuất</a> 
                <a href="/users/<?=$_SESSION['user']['id']?>"<?=$_SESSION['user']['id']?> class="btn btn-primary py-2 px-4 ms-3">Tài Khoản</a> 
                <?php else :?>

<button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
<a href="/login" class="btn btn-primary py-2 px-4 ms-3">Đăng nhập</a>   
                <?php endif;?>  
                    </div>
                </nav>

                
            </div>
            <!-- Navbar & Carousel End -->


            <!-- Full Screen Search Start -->
            
    <?php
    }
}
    ?>