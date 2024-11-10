<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>

        <main role="main" class="container col-md-12">
            <aside class="container col-md-12">
                <!-- Navbar -->
                
                <div id="header-carousel" class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="/public/assets/client/images/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                                <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                                <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="/public/assets/client/images/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                                <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                                <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="/public/assets/client/images/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                                <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                                <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="/public/assets/client/images/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                                <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                                <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            </div>
                        </div>
                    </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button></div>
                <!-- Promo and Carousel -->
                <div class="container-banner-nav">
                    <marquee behavior="" direction="">Khuyến mãi đến 50% trong ngày 23-04-2024 khi mua tại TS Store</marquee>
                    <img src="/public/assets/images/banner-trang-chu-1.jpg" class="w-100" style="height: 400px;" alt="Banner 1">
                    <ul class="option-promo">
                        <li>
                            <a href="">
                                <img width="50" height="50" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/Group-427320176--1--240x240.png" class=" lazyloaded" alt="Smartphone Đặc Quyền" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/Group-427320176--1--240x240.png">
                                <span>Smartphone Đặc Quyền</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img width="50" height="50" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/Camera-120-x-120-120x120.png" class=" lazyloaded" alt="Camera giám sát giá chỉ từ 430k" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/Camera-120-x-120-120x120.png">
                                <span>Camera giám sát giá chỉ từ 430k</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img width="50" height="50" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-rtx-120x120.png" class=" lazyloaded" alt="Laptop cao cấp Giảm đến 15Triệu" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-rtx-120x120.png">
                                <span>Laptop cao cấp Giảm đến 15Triệu</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img width="50" height="50" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-100x100-33.png" class=" lazyloaded" alt="Giảm đến 50%++" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-100x100-33.png">
                                <span>Giảm đến 50%++</span>
                            </a>
                        </li>
                    </ul>
                    <div class="main-menu">
                        <nav>
                            <ul class="menu-list">
                                <li class="menu-hot">
                                    <a class="active">
                                        <img src="https://www.phuongtung.vn/storage/general/fire.png" alt="icon image" width="15" height="10" class="page_speed_1622730292"> Khuyến mãi
                                    </a>
                                </li>
                                <li><a>iPhone</a></li>
                                <li><a>Samsung</a></li>
                                <li><a>Macbook - iMac</a></li>
                                <li><a>Dell</a></li>
                                <li><a>Asus</a></li>
                                <li><a>Tivi</a></li>
                                <li><a>Màn hình</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>

            <!-- <div class="slider-container col-md-12">
            <div class="slider">
                <img src="/public/assets/images/banner-oppo-a18.png" alt="Image 1">
                <img src="/public/assets/images/banner-galaxy-a35.png" alt="Image 2">
                <img src="/public/assets/images/banner-oppo-a18.png" alt="Image 3">
                <img src="/public/assets/images/bannerngang-15promax.png" alt="Image 4">
                <img src="/public/assets/images/banner-cu-sac-anker.png" alt="Image 5">
                <img src="/public/assets/images/bannercon-tcdm-s24.png" alt="Image 6">
            </div>
            <button id="prev" class="control-btn">❮</button>
        <button id="next" class="control-btn">❯</button>
        </div> -->

                


        </main>
<?php
    }
}
