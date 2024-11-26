<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="col-8 mx-auto">
            <main role="main" class="  py-4 bg-light">
                <div class="col-md-12 d-flex flex-column">
                    <div class="container">

                        <!-- Navbar -->
                        <div id="header-carousel" class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100 slide_baner h-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/Diamond_1124_AlphaBooks_Resize_Slide_840x320.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 900px; height:400px;">
                                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sáng tạo & Tri thức</h5>
                                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Nhà sách <br> TSBooks</h1>
                                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Chi tiết</a>
                                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Liên hệ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 slide_baner  h-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/butmau_SlideBanner_840x320.png" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 900px; height:400px;">
                                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sáng tạo & Tri thức</h5>
                                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Nhà sách <br> TSBooks</h1>
                                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Chi tiết</a>
                                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Liên hệ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 slide_baner  h-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/TrangCTT11_1124_Mainbanner_11.11_840x320_fix.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 900px; height:400px;">
                                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sáng tạo & Tri thức</h5>
                                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Nhà sách <br> TSBooks</h1>
                                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Chi tiết</a>
                                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Liên hệ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 slide_baner  h-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/Diamond_1124_AlphaBooks_Resize_Slide_840x320.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 900px; height:400px;">
                                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Sáng tạo & Tri thức</h5>
                                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Nhà sách <br> TSBooks</h1>
                                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Chi tiết</a>
                                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Liên hệ</a>
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
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="categories col-12">
                        <div class="category">
                            <img src="/public/assets/client/images/SmallBanner_T11_310X210.png" alt="Law Books">


                        </div>
                        <div class="category">
                            <img src="/public/assets/client/images/SmallBanner_T11_maytinh_smallbanner_310x210.png" alt="Calculators">


                        </div>
                        <div class="category">
                            <img src="/public/assets/client/images/TrangCTT11_1124_Tusachphapluat_Resize_310x210.webp" alt="Games">


                        </div>
                        <div class="category">
                            <img src="/public/assets/client/images/TrangDenBan_310x210.webp" alt="LED Lights">


                        </div>
                    </div>


                    <div class="icons-section col-12">
                        <div class="icon-box">
                            <img src="/public/assets/client/images/Icon_FlashSale_Thuong_120x120.webp" alt="Tủ Sách Pháp Luật">
                            <p>Tủ Sách Pháp Luật</p>
                        </div>
                        <div class="icon-box">
                            <img src="/public/assets/client/images/Icon_MaGiamGia_8px_1.webp" alt="MCBooks">
                            <p>MCBooks</p>
                        </div>
                        <div class="icon-box">
                            <img src="/public/assets/client/images/Icon_MaGiamGia_8px_1.webp" alt="Kinh Tế">
                            <p>Mã giảm giá</p>
                        </div>
                        <div class="icon-box">
                            <img src="/public/assets/client/images/icon_ManngaT06.webp" alt="Manga">
                            <p>Manga</p>
                        </div>

                        <div class="icon-box">
                            <img src="/public/assets/client/images/Icon_FlashSale_Thuong_120x120.webp" alt="Flasa sale">
                            <p>Flasa sale</p>
                        </div>
                        <div class="icon-box">
                            <img src="/public/assets/client/images/ChoDoCu.webp" alt="Phiên chợ cũ">
                            <p>Phiên chợ cũ</p>
                        </div>
                        <div class="icon-box">
                            <img src="/public/assets/client/images/Icon_SanPhamMoi_8px_1.webp" alt="Sản phẩm mới">
                            <p>Sản phẩm mới</p>
                        </div>
                        <div class="icon-box">
                            <img src="/public/assets/client/images/Icon_VanHoc_1.webp" alt="Manga">
                            <p>Manga</p>
                        </div>
                    </div>




                    <!-- Promo and Carousel -->
                    <div class="container-banner-nav col-12">
                        <marquee behavior="" direction="">Khuyến mãi đến 50% trong ngày 23-04-2024 khi mua tại TS Store</marquee>
                        <!-- <img src="/public/assets/images/banner-trang-chu-1.jpg" class="w-100" style="height: 400px;" alt="Banner 1"> -->
                        <ul class="option-promo">
                            <li>
                                <a href="">
                                    <img width="50" height="50" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/Group-427320176--1--240x240.png" class=" lazyloaded" alt="Smartphone Đặc Quyền" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/Group-427320176--1--240x240.png">
                                    <span>Sách Đặc Quyền</span>
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
                    </div>
                </div>
                <div id="featured-books" class="col-12 d-flex justify-content-center">
                    <div class="container col-12">

                        <div class="row col-12">
                            <div class="col-md-12">

                                <div class="section-header align-center">

                                    <h2 class="section-title">Sách Nổi Bật</h2>
                                </div>

                                <div class="product-list" data-aos="fade-up">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="/public/assets/client/images/product-item1.jpg" alt="Books" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Thêm vào giỏ hàng</button>
                                                </figure>
                                                <figcaption>
                                                    <h3>Simple way of piece life</h3>
                                                    <span>Armor Ramsey</span>
                                                    <div class="item-price">45.000 đ</div>
                                                </figcaption>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="/public/assets/client/images/product-item2.jpg" alt="Books" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Thêm vào giỏ hàng</button>
                                                </figure>
                                                <figcaption>
                                                    <h3>Great travel at desert</h3>
                                                    <span>Sanchit Howdy</span>
                                                    <div class="item-price">40.000 đ</div>
                                                </figcaption>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="/public/assets/client/images/product-item3.jpg" alt="Books" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Thêm vào giỏ hàng</button>
                                                </figure>
                                                <figcaption>
                                                    <h3>The lady beauty Scarlett</h3>
                                                    <span>Arthur Doyle</span>
                                                    <div class="item-price">45.000 đ</div>
                                                </figcaption>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="/public/assets/client/images/product-item4.jpg" alt="Books" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Thêm vào giỏ hàng</button>
                                                </figure>
                                                <figcaption>
                                                    <h3>Once upon a time</h3>
                                                    <span>Klien Marry</span>
                                                    <div class="item-price">35.000 đ</div>
                                                </figcaption>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrap align-right">
                                <a href="#" class="btn-accent-arrow">Xem tất cả sản phẩm <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="section-sale flash-sale">
                    <div class="container">

                        <div class="section-header">
                            <h2>FLASH SALE</h2>
                            <div class="timer">Ends in <span>00:07:33</span></div>
                        </div>
                        <div class="section-sale">
                            <div class="products-sale">

                                <div class="product-sale">
                                    <img src="/public/assets/client/images/1.jpg" alt="Product 1">
                                    <p class="title-sale">Tăng Cường Tin Học Quốc Tế - IC3-GS6 Level 2</p>
                                    <p class="price-sale">41.000 đ -50% </p>
                                    <p class="giamgia">82.000 đ</p> <br>
                                    <div class="discount-bar">
                                        <span>Đã bán 19</span>
                                    </div>
                                </div>

                                <div class="product-sale">
                                    <img src="/public/assets/client/images/2.jpg" alt="Product 1">
                                    <p class="title-sale">Tăng Cường Tin Học Quốc Tế - IC3-GS6 Level 2</p>
                                    <p class="price-sale">41.000 đ -50% </p>
                                    <p class="giamgia">82.000 đ</p> <br>
                                    <div class="discount-bar">
                                        <span>Đã bán 19</span>
                                    </div>
                                </div>

                                <div class="product-sale">
                                    <img src="/public/assets/client/images/3.jpg" alt="Product 1">
                                    <p class="title-sale">Tăng Cường Tin Học Quốc Tế - IC3-GS6 Level 2</p>
                                    <p class="price-sale">41.000 đ -50% </p>
                                    <p class="giamgia">82.000 đ</p> <br>
                                    <div class="discount-bar">
                                        <span>Đã bán 19</span>
                                    </div>
                                </div>

                                <div class="product-sale">
                                    <img src="/public/assets/client/images/4.jpg" alt="Product 1">
                                    <p class="title-sale">Tăng Cường Tin Học Quốc Tế - IC3-GS6 Level 2</p>
                                    <p class="price-sale">41.000 đ -50% </p>
                                    <p class="giamgia">82.000 đ</p> <br>
                                    <div class="discount-bar">
                                        <span>Đã bán 19</span>
                                    </div>
                                </div>

                                <div class="product-sale">
                                    <img src="/public/assets/client/images/5.jpg" alt="Product 1">
                                    <p class="title-sale">Tăng Cường Tin Học Quốc Tế - IC3-GS6 Level 2</p>
                                    <p class="price-sale">41.000 đ -50% </p>
                                    <p class="giamgia">82.000 đ</p> <br>
                                    <div class="discount-bar">
                                        <span>Đã bán 19</span>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="container">
                    <div class="section-sale christmas">
                        <h4>Giáng Sinh An Lành</h4> <br>
                        <hr>
                        <div class="products-sale">

                            <div class="product-sale">
                                <img src="/public/assets/client/images/caythong1.jpg" alt="Christmas Tree">
                                <p class="title-sale">Cây Thông Mini Gắn Trái Đỏ 45cm </p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/caythong2.jpg" alt="Christmas Tree">
                                <p class="title-sale"> Cây Thông Mini Màu Trắng Trang Trí Noel 61 cm</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/caythong3.jpg" alt="Christmas Tree">
                                <p class="title-sale">Cây Thông Mini Phủ Tuyết Gắn Trái Đỏ 60cm</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/caythong4.jpg" alt="Christmas Tree">
                                <p class="title-sale">Cây Thông Mini Trang Trí Noel 38 cm</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/caythong5.jpg" alt="Christmas Tree">
                                <p class="title-sale">Cây Thông Mini Trang Trí Noel 38 cm</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                            </div>


                        </div>
                        <button class="see-more">Xem Thêm</button>
                    </div>


                    <div class="section-sale trending">
                        <div class="xhms">
                            <div class="xhms-icon">📈</div>
                            <div class="xhms-text">Xu Hướng Mua Sắm</div>
                        </div>

                        <div class="nav">
                            <a class="nav-item active">Xu Hướng Theo Ngày</a>
                            <a class="nav-item">Sách HOT - Giảm Sốc</a>
                            <a class="nav-item">Bestseller Ngoại Văn</a>
                        </div>
                        <div class="products-sale">
                            <!-- Trending Product Item -->
                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach1.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach2.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach3.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach4.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach5.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <!-- Repeat for other products-sale -->
                        </div>

                        <div class="products-sale">
                            <!-- Trending Product Item -->
                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach6.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach7.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach8.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach9.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <div class="product-sale">
                                <img src="/public/assets/client/images/sach10.jpg" alt="Book 1">
                                <p class="title-sale">Hoa Học Trò - Số 1444</p>
                                <p class="price-sale">41.000 đ -50% </p>
                                <p class="giamgia">82.000 đ</p> <br>
                                <div class="discount-bar">
                                    <span>Đã bán 19</span>
                                </div>
                            </div>

                            <!-- Repeat for other products-sale -->
                        </div>
                        <button class="see-more">Xem Thêm</button>
                    </div>
                </div>
            </main>
        </div>
<?php
    }
}
