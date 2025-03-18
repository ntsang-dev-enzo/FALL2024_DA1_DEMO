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
                    <img src="https://scontent.fvca1-4.fna.fbcdn.net/v/t39.30808-6/480957245_615059734643844_8752257887841576100_n.jpg?stp=dst-jpg_p480x480_tt6&_nc_cat=101&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeHQwmjSxNx1O_lxdRZfl6bUMB2IPUiL78IwHYg9SIvvwmcJTSGyIUerEtvJvMM7KAz-vKI-Dy0uDoaCkUcrihm8&_nc_ohc=SHgVMJ0Q8KMQ7kNvgF8L2qg&_nc_oc=Adj4jz2xTzpSs4udQA7veKYvOx1rvd0kS4q6XZaTp1_76BGY10j3Ofes0BWFPA9klgo&_nc_zt=23&_nc_ht=scontent.fvca1-4.fna&_nc_gid=AtmfuB3it32SHRircMbakA8&oh=00_AYDVhagchK5YqB8BuJ_DU99owLJFQxdPu66QXlgFstzzyQ&oe=67C1CAF6" alt="Bánh kem 1">
                    <div class="home_banner-text">Bánh Kem Socola Đậm Vị</div>
                </div>

                <!-- Small Banner 1 -->
                <div class="home_banner-item home_banner-small">
                    <img src="https://scontent.fvca1-4.fna.fbcdn.net/v/t39.30808-6/481053243_615059714643846_5360350595104480824_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=108&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeEH7XV0BDd1doi3oqRhF2UYWNsJzABSeFxY2wnMAFJ4XENeB_DzyVgusZxp5jAi_ACFzyTiQDTYJKXtvGT4ywAb&_nc_ohc=JRCDm4onHKIQ7kNvgEmuIzf&_nc_oc=AdhPdOFGkEwTAyheepysqp54TRA0Qso8pStcwASrVH9lsJk7g6Im3sY7qOYQL2Zyhr8&_nc_zt=23&_nc_ht=scontent.fvca1-4.fna&_nc_gid=AtmfuB3it32SHRircMbakA8&oh=00_AYDfoFxi_B9-lMiXbfZHr32ODDNnt3lOy5m8EdeMQkvsBg&oe=67C1E562" alt="Bánh kem 2">
                    <div class="home_banner-text">Đa dạng mẫu mã</div>
                </div>

                <!-- Small Banner 2 -->
                <div class="home_banner-item home_banner-small">
                    <img src="https://scontent.fvca1-3.fna.fbcdn.net/v/t39.30808-6/480770015_614311964718621_8767263193269310257_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=103&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeFbYtFfCwafc8yqBbsVSr8ZKbM_4O5ok9cpsz_g7miT10H7vErx-Rt3HLiAfNgOV7SIwYwdlwatzAz62OFkuQsd&_nc_ohc=ZLkKLz913WcQ7kNvgGHTD4N&_nc_oc=AdiPhsg-JSOo_s008hgBeGaTMrIQrUP6xZsCf7Y8-iip1fVzGqy9uOu5oCWUWWAvN1Q&_nc_zt=23&_nc_ht=scontent.fvca1-3.fna&_nc_gid=Acawhn4ZErX-eUH3RiuLcOZ&oh=00_AYBerJp4E4HPLc8kXVytaPrpo_AsAHq-iDcJgW274zP_mA&oe=67C1EEAD" alt="Bánh kem 3">
                    <div class="home_banner-text">Dâu Tây Ngọt Ngào</div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Bánh Kem Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh kem hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <?php

                foreach ($data['products'] as $item):

                ?>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <a href="/products/<?=$item['id']?>"><img style="height: 300px;" src="/public/uploads/products/<?=$item['image']?>" class="card-img-top" alt="Bánh kem 1"></a>
                    <div class="card-body text-center">
                        <a href="/products/<?=$item['id']?>"><h5 class="card-title fw-bold"><?=$item['name']?></h5></a>
                        <p class="card-text text-muted"><?=$item['category_name']?></p>
                        <p class="fw-bold text-danger"><?=number_format($item['price'])?>đ</p>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
                
            </div>
        </div>
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Bánh Bông Lan Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh bông lan hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <?php

                foreach ($data['productsV2'] as $item):

                ?>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <a href="/products/<?=$item['id']?>"><img style="height: 300px;" src="/public/uploads/products/<?=$item['image']?>" class="card-img-top" alt="Bánh kem 1"></a>
                    <div class="card-body text-center">
                        <a href="/products/<?=$item['id']?>"><h5 class="card-title fw-bold"><?=$item['name']?></h5></a>
                        <p class="card-text text-muted"><?=$item['category_name']?></p>
                        <p class="fw-bold text-danger"><?=number_format($item['price'])?>đ</p>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
                
            </div>
        </div>
        <div class="container py-5 product_home_otd">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Sản Phẩm Khác Bán Chạy Trong Tuần</h2>
                <p class="text-muted">Cùng xem qua các loại bánh khác hấp dẫn nhất của chúng tôi!</p>
            </div>
            <div class="horizontal-scroll-container" id="scrollContainer">
                <?php

                foreach ($data['productsV3'] as $item):

                ?>
                <div class="card border-0 shadow-sm" style="min-width: 250px;">
                    <a href="/products/<?=$item['id']?>"><img style="height: 300px;" src="/public/uploads/products/<?=$item['image']?>" class="card-img-top" alt="Bánh kem 1"></a>
                    <div class="card-body text-center">
                        <a href="/products/<?=$item['id']?>"><h5 class="card-title fw-bold"><?=$item['name']?></h5></a>
                        <p  class="card-text text-muted"><?=$item['category_name']?></p>
                        <p class="fw-bold text-danger"><?=number_format($item['price'])?>đ</p>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
                
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
                                <img class="img-fluid rounded" src="https://scontent.fvca1-2.fna.fbcdn.net/v/t39.30808-6/438225023_3752193485099266_7681271445865456084_n.jpg?stp=c0.225.1366.1366a_dst-jpg_s206x206_tt6&_nc_cat=104&ccb=1-7&_nc_sid=92e838&_nc_eui2=AeHm-oqz6qZAAHbaEDmL1bKzvW-35woD3ye9b7fnCgPfJyeKRutfV8UjcEUpr7beCBwG7F2ByJoIz9An-YB-uW9u&_nc_ohc=qaMSFr6Q6TEQ7kNvgGdXrwK&_nc_oc=Adh5Jh890DrxT868p_7QuzPI0j2PMJGvKTpoaRlC8jBWVcNM84MuV6ZECQBPusZ28js&_nc_zt=23&_nc_ht=scontent.fvca1-2.fna&_nc_gid=AykFYD6iLZF35gOaW_PRAls&oh=00_AYBPpB43piE_Sk79sypgxn0wIlFqDoCGeYzOcGMNIUN4vQ&oe=67C2002A" alt="">
                            </div>
                            <div class="col-6 align-self-end">
                                <img class="img-fluid rounded" src="https://scontent.fvca1-2.fna.fbcdn.net/v/t39.30808-6/438225023_3752193485099266_7681271445865456084_n.jpg?stp=c0.225.1366.1366a_dst-jpg_s206x206_tt6&_nc_cat=104&ccb=1-7&_nc_sid=92e838&_nc_eui2=AeHm-oqz6qZAAHbaEDmL1bKzvW-35woD3ye9b7fnCgPfJyeKRutfV8UjcEUpr7beCBwG7F2ByJoIz9An-YB-uW9u&_nc_ohc=qaMSFr6Q6TEQ7kNvgGdXrwK&_nc_oc=Adh5Jh890DrxT868p_7QuzPI0j2PMJGvKTpoaRlC8jBWVcNM84MuV6ZECQBPusZ28js&_nc_zt=23&_nc_ht=scontent.fvca1-2.fna&_nc_gid=AykFYD6iLZF35gOaW_PRAls&oh=00_AYBPpB43piE_Sk79sypgxn0wIlFqDoCGeYzOcGMNIUN4vQ&oe=67C2002A" alt="">
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
