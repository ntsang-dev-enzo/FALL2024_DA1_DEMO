<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {


?>
<div class="container d-flex mt-5">
            <!-- Left Column -->
            <div class="col-md-8 me-3">
                <h2 class="mb-4">Tin tức mới nhất</h2>
                <?php
                foreach($data as $item):
                ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $item['image_url'] ?>" class="img-fluid rounded-start" alt="News Image 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                <div class="card-text"><?= $item['short_description'] ?></div>
                                <div class="card-text"><?= $item['publish_date'] ?></div>
                                <div class="card-text"><?= $item['content'] ?></div>
                                <a href="#" class="btn btn-primary btn-sm">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>

            <div class="col-4">

                <h2 class="mb-4">Khuyến Mãi</h2>
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Giảm Giá 30%</h5>
                        <p class="card-text">Áp dụng cho tất cả đơn hàng trên 500.000 VNĐ.</p>
                        <a href="#" class="btn btn-light">Xem chi tiết</a>
                    </div>
                </div>
                <div class="card bg-warning text-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Mua 2 Tặng 1</h5>
                        <p class="card-text">Chương trình áp dụng cho sách thiếu nhi.</p>
                        <a href="#" class="btn btn-dark">Xem thêm</a>
                    </div>
                    
                <!-- Promotion -->
                
            </div>
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Giảm Giá 30%</h5>
                    <p class="card-text">Áp dụng cho tất cả đơn hàng trên 500.000 VNĐ.</p>
                    <a href="#" class="btn btn-light">Xem chi tiết</a>
                </div>
            </div>
            <div class="card bg-warning text-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title">Mua 2 Tặng 1</h5>
                    <p class="card-text">Chương trình áp dụng cho sách thiếu nhi.</p>
                    <a href="#" class="btn btn-dark">Xem thêm</a>
                </div>
            </div>
           
        </div>

        <!-- Latest News Section -->
            
        </div>
        <?php


}
}