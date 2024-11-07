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
                <nav class="navbar category-list col-2 navbar-expand-lg navbar-light">
                    <div class="menu col-md-12">
                        <h6 style="padding: 10px;background-color: orange;color: black;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg></i>DANH MỤC</h6>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button" hr>
                                    <a class="dropdown-toggle" href="index.php?url=dienthoai#dienthoai-content" id="navbarDropdown1" role="button" aria-expanded="false">
                                        Điện thoại <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                    <li><a class="dropdown-item" href="#">iPhone</a></li>
                                    <li><a class="dropdown-item" href="#">Samsung</a></li>
                                    <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                                    <li><a class="dropdown-item" href="#">Huawei</a></li>
                                    <li><a class="dropdown-item" href="#">Oppo</a></li>
                                    <li><a class="dropdown-item" href="#">Vivo</a></li>
                                    <li><a class="dropdown-item" href="#">LG</a></li>
                                    <li><a class="dropdown-item" href="#">Hornor</a></li>
                                    <li><a class="dropdown-item" href="#">Realme</a></li>
                                    <li><a class="dropdown-item" href="#">Oneplus</a></li>
                                    <li><a class="dropdown-item" href="#">Techno</a></li>
                                    <li><a class="dropdown-item" href="#">Nokia</a></li>
                                    <li><a class="dropdown-item" href="#">Google Pixel</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Laptop <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                                    <li><a class="dropdown-item" href="#">Macbook</a></li>
                                    <li><a class="dropdown-item" href="#">Asus</a></li>
                                    <li><a class="dropdown-item" href="#">Acer</a></li>
                                    <li><a class="dropdown-item" href="#">Dell</a></li>
                                    <li><a class="dropdown-item" href="#">Lenovo</a></li>
                                    <li><a class="dropdown-item" href="#">HP</a></li>
                                    <li><a class="dropdown-item" href="#">MSI</a></li>
                                    <li><a class="dropdown-item" href="#">Gygabyte</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Máy tính bảng <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown3">
                                    <li><a class="dropdown-item" href="#">iPad</a></li>
                                    <li><a class="dropdown-item" href="#">Samsung Tab</a></li>
                                    <li><a class="dropdown-item" href="#">Redmi Pad</a></li>
                                    <li><a class="dropdown-item" href="#">Lenovo</a></li>
                                    <li><a class="dropdown-item" href="#">Huawei</a></li>
                                    <li><a class="dropdown-item" href="#">Xiaoxin</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Đồng hồ thông minh <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown4">
                                    <li><a class="dropdown-item" href="#">Apple Watch</a></li>
                                    <li><a class="dropdown-item" href="#">Samsung Watch</a></li>
                                    <li><a class="dropdown-item" href="#">Huawei Watch</a></li>
                                    <li><a class="dropdown-item" href="#">Realme Watch</a></li>
                                    <li><a class="dropdown-item" href="#">Redmi Band</a></li>
                                    <li><a class="dropdown-item" href="#">Dây đồng hồ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Điện máy <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown5">
                                    <li><a class="dropdown-item" href="#">Tivi</a></li>
                                    <li><a class="dropdown-item" href="#">Tủ lạnh</a></li>
                                    <li><a class="dropdown-item" href="#">Máy lạnh</a></li>
                                    <li><a class="dropdown-item" href="#">Máy giặt</a></li>
                                    <li><a class="dropdown-item" href="#">Máy rửa chén</a></li>
                                    <li><a class="dropdown-item" href="#">Máy quạt</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown6" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gia dụng <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown6">
                                    <li><a class="dropdown-item" href="#">Ấm đun siêu tốc</a></li>
                                    <li><a class="dropdown-item" href="#">Lò nướng</a></li>
                                    <li><a class="dropdown-item" href="#">Máy sấy tóc</a></li>
                                    <li><a class="dropdown-item" href="#">Máy lọc nươc</a></li>
                                    <li><a class="dropdown-item" href="#">Cân điện tử</a></li>
                                    <li><a class="dropdown-item" href="#">Nồi cơm điện</a></li>
                                    <li><a class="dropdown-item" href="#">Nồi chiên không dầu</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown7" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Phụ kiện <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown7">
                                    <li><a class="dropdown-item" href="#">Tai nghe</a></li>
                                    <li><a class="dropdown-item" href="#">Loa</a></li>
                                    <li><a class="dropdown-item" href="#">USB - Thẻ nhớ</a></li>
                                    <li><a class="dropdown-item" href="#">Chuột</a></li>
                                    <li><a class="dropdown-item" href="#">Bàn phím</a></li>
                                    <li><a class="dropdown-item" href="#">Ổ cứng</a></li>
                                    <li><a class="dropdown-item" href="#">Micro</a></li>
                                    <li><a class="dropdown-item" href="#">Giá chụp</a></li>
                                    <li><a class="dropdown-item" href="#">Cáp sạc - Củ sạc - Sạc dự phòng</a></li>
                                    <li><a class="dropdown-item" href="#">Balo - Túi chống sốc</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown8" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        PC - Màn hình - Máy in <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown8">
                                    <li><a class="dropdown-item" href="#">PC văn phòng</a></li>
                                    <li><a class="dropdown-item" href="#">PC gaming</a></li>
                                    <li><a class="dropdown-item" href="#">iMac</a></li>
                                    <li><a class="dropdown-item" href="#">Màn hình</a></li>
                                    <li><a class="dropdown-item" href="#">Máy in</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown9" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Camera <i class="fas fa-chevron-right">&nbsp;</i>
                                    </a>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown9">
                                    <li><a class="dropdown-item" href="#">Máy ảnh</a></li>
                                    <li><a class="dropdown-item" href="#">Máy quay</a></li>
                                    <li><a class="dropdown-item" href="#">Lens</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown10" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Máy cũ giá rẻ
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Thu cũ đổi mới
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropend">
                            <div class="dropdown-button">
                                <button class="dropdown-item-button">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Hàng trưng bày
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>

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


        </main>
<?php
    }
}
