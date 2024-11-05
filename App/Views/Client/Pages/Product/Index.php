<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>


        
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <p></p>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?url=home">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Điện Thoại</li>
        </ol>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://www.phuongtung.vn/storage/banner-collection/05-2024/banner-danh-muc/iphone.png" class="d-block w-100" alt="...">
    
        </div>
        <div class="carousel-item">
            <img src="https://www.phuongtung.vn/storage/banner-collection/05-2024/banner-danh-muc/samsung.png" class="d-block w-100" alt="...">
          
        </div>
        <div class="carousel-item">
            <img src="https://www.phuongtung.vn/storage/banner-collection/05-2024/banner-danh-muc/oppo.png" class="d-block w-100" alt="...">
            
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    <div class="my-10" id="dienthoai-content">
        <div class="text-center mb-4">
            <img src="/public/assets/images/title-1apple.png" alt="">
        </div>
        <div class="container">
            <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    Category::render($data['categories']);
                    ?>
                </div>
                <div class="col-md-9">
                    <?php
                    if (count($data) && count($data['products'])) :
                        // if(isset($data) && isset($data['products']) && $data && $data['products']):
                    ?>
                        <h1 class="text-center mb-3">Sản phẩm</h1>
                        <div class="row">
                            <?php
                            foreach ($data['products'] as $item) :
                            ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="" style="width: 100%; display: block;" data-holder-rendered="true">
                                        <div class="card-body">
                                            <p class="card-text"><?= $item['productname'] ?></p>
                                            <?php
                                            if ($item['discount_price'] > 0) :
                                            ?>
                                                <p>Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                                <p>Giá giảm: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>

                                            <?php
                                            else :
                                            ?>
                                                <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>

                                            <?php
                                            endif;
                                            ?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="/products/<?= $item['id'] ?>" type="button" class="btn btn-sm btn-outline-info">Chi tiết</a>
                                                    <form action="/cart/add" method="post">
                                                        <input type="hidden" name="method" id="" value="POST">
                                                        <input type="hidden" name="id" id="" value="<?= $item['id'] ?>" required>
                                                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            endforeach;

                            ?>
                            <div class="container mt-4">
        </div>
    </div>
</div>
                        </div>
                    <?php
                    else :
                    ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>

                    <?php
                    endif;
                    ?>
                </div>
            </div>



        </div>



<?php

    }
}
