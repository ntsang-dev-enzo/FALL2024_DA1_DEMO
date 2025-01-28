<?php

namespace App\Views\Client;

use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;



class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Carousel Start -->

        <div class="container-fluid banner-home p-0 wow fadeIn" data-wow-delay="0.1s">

            <div class="owl-carousel  header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img style="object-fit:cover; max-height: 700px" class="img-fluid " src="/public/assets/client/img/banner.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p class="text-primary text-uppercase fw-bold mb-2">// Thanh Xuân CAKE</p>
                                    <h1 class="display-1 text-light mb-4 animated slideInDown">Bánh kem vị dâu tây</h1>
                                    <p class="text-light fs-5 mb-4 pb-3">Ngọt ngào hương vị, trọn vẹn yêu thương...</p>
                                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img style="object-fit:cover; max-height: 700px" class="img-fluid " src="/public/assets/client/img/banner.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p class="text-primary text-uppercase fw-bold mb-2">// Thanh Xuân CAKE</p>
                                    <h1 class="display-1 text-light mb-4 animated slideInDown">Bánh kem vị dâu tây</h1>
                                    <p class="text-light fs-5 mb-4 pb-3">Ngọt ngào hương vị, trọn vẹn yêu thương...</p>
                                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Facts Start -->


        <div class="container py-5">
            <div class="home_banner-creative-banner">
                <!-- Large Banner -->
                <div class="home_banner-item home_banner-large">
                    <img src="https://scontent.fvca1-3.fna.fbcdn.net/v/t39.30808-6/474572090_592568480226303_1459600964274001330_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=111&ccb=1-7&_nc_sid=f727a1&_nc_ohc=I02lmLVBjS4Q7kNvgE9s3kp&_nc_oc=AdhIJx9R65PqFa5r6znEAYJq9QaLYwiK8MjxyLUwpBHVWbmKzg8NHuZ75z7uulWg5FVxmyARMLQyFO9BqCKu-hED&_nc_zt=23&_nc_ht=scontent.fvca1-3.fna&_nc_gid=AeOFhw9NYoaCLkqH-wQ7QcW&oh=00_AYBinn8lDIAq06xzbaDyNcmhLyVWRVgWEJXr5aMlALceKw&oe=67982344" alt="Bánh kem 1">
                    <div class="home_banner-text">Bánh Kem Socola Đậm Vị</div>
                </div>

                <!-- Small Banner 1 -->
                <div class="home_banner-item home_banner-small">
                    <img src="https://scontent.fvca1-1.fna.fbcdn.net/v/t39.30808-6/474726758_594561106693707_4103127272585303320_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=104&ccb=1-7&_nc_sid=f727a1&_nc_ohc=iJBnGKuhIioQ7kNvgH0ExRU&_nc_oc=AdhgRPwWPIxR_mCttgPTA8S46cMEgJXoKO_oFBtr26jE8mOFOLp5J6J_7VFUQgLMIN9dV_wnkvhAZO0c2hS7cte7&_nc_zt=23&_nc_ht=scontent.fvca1-1.fna&_nc_gid=ACtQh95qVtv4Yeuxv7Ok8Zp&oh=00_AYBxsOub6WF3kDT1jEUk03cx1GqYjyLSrihYGFhRbKq_ig&oe=67980B15" alt="Bánh kem 2">
                    <div class="home_banner-text">Đa dạng mẫu mã</div>
                </div>

                <!-- Small Banner 2 -->
                <div class="home_banner-item home_banner-small">
                    <img src="https://scontent.fvca1-1.fna.fbcdn.net/v/t39.30808-6/474639320_594561080027043_8241756399679587856_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=105&ccb=1-7&_nc_sid=f727a1&_nc_ohc=1m5XY4JdShUQ7kNvgFc77Pt&_nc_oc=AdgYBsFgXN2mYT7dy9eUb3bqsptb7pyKATnjB4iRM-nv0teZ8VIB1sfI6HPGTzFaryLboFsWMZc50mkKp9g2zZVR&_nc_zt=23&_nc_ht=scontent.fvca1-1.fna&_nc_gid=ACtQh95qVtv4Yeuxv7Ok8Zp&oh=00_AYDynOBNyU_7VSxYNd6DkNaMhw7_1M5Aeeayu45G2GoiCw&oe=67982F58" alt="Bánh kem 3">
                    <div class="home_banner-text">Dâu Tây Ngọt Ngào</div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh kem hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 1">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Tiên Cá</h5>
                        <p class="card-text text-muted">Hương vị đậm đà.</p>
                        <p class="fw-bold text-danger">320.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh kem hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 1">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Tiên Cá</h5>
                        <p class="card-text text-muted">Hương vị đậm đà.</p>
                        <p class="fw-bold text-danger">320.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh kem hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 1">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Tiên Cá</h5>
                        <p class="card-text text-muted">Hương vị đậm đà.</p>
                        <p class="fw-bold text-danger">320.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh kem hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 1">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Tiên Cá</h5>
                        <p class="card-text text-muted">Hương vị đậm đà.</p>
                        <p class="fw-bold text-danger">320.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <img style="height: 300px;" src="https://via.placeholder.com/300" class="card-img-top" alt="Bánh kem 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Bánh Kem Spiderman</h5>
                        <p class="card-text text-muted">Vị trà xanh thơm mát.</p>
                        <p class="fw-bold text-danger">240.000đ</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Start -->
        <div class="container-xxl bg-light my-6 pt-0">
            <div class="container">
                <div class="text-center mx-auto pt-2 mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="text-primary text-uppercase mb-2">// THANH XUÂN CAKE</p>
                    <h1 class="display-6 mb-4">Các loại bánh có tại <br> Thanh Xuân CAKE</h1>
                </div>
                <div class="d-flex">
                    <div class="col-lg-4 p-2 category_product col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                            <div class="text-center p-4">
                                <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                    // THANH XUÂN CAKE
                                </div><a href="/products/categories/1">
                                    <h3 class="mb-3">Bánh kem</h3>
                                </a>
                                <span></span>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="category_product_img" src="https://scontent.fvca1-4.fna.fbcdn.net/v/t39.30808-6/472361361_579635671519584_1661264150138148614_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=f727a1&_nc_ohc=7T5aKRoFgKEQ7kNvgEZn4Df&_nc_oc=AdiDHb-WdiLd9IX6-8IN4QB-ypeSvvgcczwbD2YAjgD6ZI9FoiFEkNycJf5cV5YW3fA&_nc_zt=23&_nc_ht=scontent.fvca1-4.fna&_nc_gid=AxTyjLQENfghL-4Wx-O4-MG&oh=00_AYC1ak3fSAoChVW6gh0kIBwNqcH3ve9K4-BE8wpMYKYizQ&oe=678A8802" alt="">
                                <div class="product-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href="/products/categories/1"><i class="fa fa-eye text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-2 category_product col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                            <div class="text-center p-4">
                                <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                    // THANH XUÂN CAKE
                                </div><a href="/products/categories/3">
                                    <h3 class="mb-3">Bánh bông lan</h3>
                                </a>
                                <span></span>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="category_product_img" src="https://scontent.fvca1-4.fna.fbcdn.net/v/t39.30808-6/471328869_579635728186245_4492530848632245412_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=f727a1&_nc_ohc=FZy25NOLJlsQ7kNvgFmkydP&_nc_oc=Adi1isvlDIeKH6EgmQZMKbxuphL8xN52iJhplrbQA2xdHKdQHie7wzdCUHto6Z36UdI&_nc_zt=23&_nc_ht=scontent.fvca1-4.fna&_nc_gid=AaNGHhwv-Pj_aRimqC-EItb&oh=00_AYDZV0Ilp19P-n0aoBK3m_EySDdB48jItEEULd1k3RbCEQ&oe=678A6691" alt="">
                                <div class="product-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href="/products/categories/3"><i class="fa fa-eye text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-2 category_product col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                            <div class="text-center p-4">
                                <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                    // THANH XUÂN CAKE
                                </div><a href="/products/categories/4">
                                    <h3 class="mb-3">Các loại khác</h3>
                                </a>
                                <span></span>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="category_product_img" src="https://scontent.fvca1-2.fna.fbcdn.net/v/t39.30808-6/472054684_3967048130280466_511408988741176069_n.jpg?stp=dst-jpg_p526x296_tt6&_nc_cat=107&ccb=1-7&_nc_sid=f727a1&_nc_ohc=vA76eVv0w1oQ7kNvgEc4row&_nc_oc=AdgB55jzU3-yYSvYX8S2bK76nCneOAIgJrYwQuibN-wTOd4GQUKc5n7gipdsZvsevqE&_nc_zt=23&_nc_ht=scontent.fvca1-2.fna&_nc_gid=AOd2xqxAkQyb9OUUq7HDiyy&oh=00_AYCyq9w19rqsTx7zHxQZ7eRJkle3UIZuFzIfSPR3oQQs5w&oe=678A93AA" alt="">
                                <div class="product-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href="/products/categories/4"><i class="fa fa-eye text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Product End -->

        <div class="container-xxl">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row img-twice position-relative h-100">
                            <div class="col-6">
                                <img class="img-fluid rounded" src="https://scontent.fvca1-3.fna.fbcdn.net/v/t39.30808-6/471244565_570927329066256_3659720442242993367_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeHKLm2QGU2XPejyMVUQDio-Eh1Wb_WEIWwSHVZv9YQhbHh9iigoWDm50Ly2YjddWGUUfYl05aiuqBZnsgxhajzN&_nc_ohc=6e_eDzdNYtIQ7kNvgG5T42S&_nc_oc=AdgmXOr45Lsx81KQtGvn2ADgAQYGz1v1PLaGmgBYjDdkpDJYIEf-AYE-dko0K83qr2cnrsnTyzrqiuE0yVzaJkB0&_nc_zt=23&_nc_ht=scontent.fvca1-3.fna&_nc_gid=AlwKtHbcnkEBSE0yN0Rh1VI&oh=00_AYDy3xtLTumqL3ZE4LOSY4IsFAqOfBniPcJe85zet4Ca6Q&oe=679ADF19" alt="">
                            </div>
                            <div class="col-6 align-self-end">
                                <img class="img-fluid rounded" src="https://scontent.fvca1-1.fna.fbcdn.net/v/t39.30808-6/474726758_594561106693707_4103127272585303320_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=104&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeEs069jNSPpN86B1kqkRJR-upz42sMjkI26nPjawyOQjeg9jhQR1OrQFMXtTMn5g0VlKt3k2U3XDgpCr-9UlHp1&_nc_ohc=vdrGyqHt62IQ7kNvgE87UIR&_nc_oc=AdhuwAv5j4sn_RKj0h8VgVHoQIcjDyA2rWJfr6KlAbKyPzgJ0TuXsvT7jVrp5EuBDGUqLh21XLufqY1W6SR1YiPa&_nc_zt=23&_nc_ht=scontent.fvca1-1.fna&_nc_gid=A8HoovwwsN8hKVj03WjEC-G&oh=00_AYC9D0QnxZL25DjDsC5jjaaq7s4xF9eLfbCCKGvlWtEcCA&oe=679AE655" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <p class="text-primary text-uppercase mb-2">// Về Thanh Xuân CAKE</p>
                            <h1 class="display-6 mb-4">Sản phẩm chất lượng cao, <br> an toàn sức khỏe.</h1>
                            <p>Chào mừng bạn đến với thế giới bánh kem Thanh Xuân CAKE, nơi mỗi chiếc bánh là một tác phẩm nghệ thuật. Được làm từ những nguyên liệu tươi ngon, bánh kem của chúng tôi không chỉ đẹp mắt mà còn mang đến hương vị tuyệt vời. Dù là sinh nhật, lễ kỷ niệm hay chỉ là một bữa tiệc nhỏ, Thanh Xuân CAKE sẽ là sự lựa chọn hoàn hảo để làm bừng sáng mọi khoảnh khắc. Hãy đến và thưởng thức ngay hôm nay!</p>
                            <div class="row g-2 mb-4">
                                <div class="col-sm-6">
                                    <i class="fa fa-check text-primary me-2"></i>Các loại bánh thơm ngon
                                </div>
                                <div class="col-sm-6">
                                    <i class="fa fa-check text-primary me-2"></i>Đa dạng các loại bánh
                                </div>
                                <div class="col-sm-6">
                                    <i class="fa fa-check text-primary me-2"></i>Hỗ trợ đặt hàng online
                                </div>
                                <div class="col-sm-6">
                                    <i class="fa fa-check text-primary me-2"></i>Giao tận nhà
                                </div>
                            </div>
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="text-primary text-uppercase mb-2">// Đội ngũ Thanh Xuân CAKE</p>
                    <h1 class="display-6 mb-4">Chuyên nghiệp</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <img class="img-fluid" src="/public/assets/client/img/sang.jpg" alt="">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Nguyễn Trung Sang</h5>
                                    <span>Shipper</span>
                                </div>
                                <div class="team-social">
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <img class="img-fluid" src="/public/assets/client/img/sang.jpg" alt="">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Nguyễn Trung Sang</h5>
                                    <span>Shipper</span>
                                </div>
                                <div class="team-social">
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <img class="img-fluid" src="/public/assets/client/img/sang.jpg" alt="">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Nguyễn Trung Sang</h5>
                                    <span>Shipper</span>
                                </div>
                                <div class="team-social">
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <img class="img-fluid" src="/public/assets/client/img/sang.jpg" alt="">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Nguyễn Trung Sang</h5>
                                    <span>Shipper</span>
                                </div>
                                <div class="team-social">
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl bg-light my-6  pb-0">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="text-primary text-uppercase mb-2">// Feedback từ khách hàng</p>
                    <h1 class="display-6 mb-4">Hơn 20 khash hàng đã gửi phản hồi về cho chúng tôi</h1>
                </div>
                <div class="owl-carousel mb-4 testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                            <div class="ms-4">
                                <h5 class="mb-1">Trung Sang</h5>
                                <span>Khách hàng</span>
                            </div>
                        </div>
                        <p class="mb-0">Ngon ơi là ngonnnn!</p>
                    </div>
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                            <div class="ms-4">
                                <h5 class="mb-1">Trung Sang</h5>
                                <span>Khách hàng</span>
                            </div>
                        </div>
                        <p class="mb-0">Ngon ơi là ngonnnn!</p>
                    </div>
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                            <div class="ms-4">
                                <h5 class="mb-1">Trung Sang</h5>
                                <span>Khách hàng</span>
                            </div>
                        </div>
                        <p class="mb-0">Ngon ơi là ngonnnn!</p>
                    </div>
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                            <div class="ms-4">
                                <h5 class="mb-1">Trung Sang</h5>
                                <span>Khách hàng</span>
                            </div>
                        </div>
                        <p class="mb-0">Ngon ơi là ngonnnn!</p>
                    </div>
                </div>
                <div class="bg-primary text-light rounded-top p-5 my-6 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="display-4 text-light mb-0">Đăng ký nhận tin</h1>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="position-relative">
                                <input class="form-control bg-transparent border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                                <button type="button" class="btn btn-dark py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <!-- Testimonial End -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31439.504557007855!2d105.5455048025071!3d9.939111053034772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a093a3a0696c15%3A0x3bdf157ded943373!2zVGnhu4dtIGLDoW5oIFRIQU5IIFhVw4JO!5e0!3m2!1svi!2s!4v1736589288313!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<?php
    }
}
