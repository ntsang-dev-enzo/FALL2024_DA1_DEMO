<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {


?>
<div class="container">
<div class="row mt-4">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Featured Article -->
                <div class="card mb-4">
                    <img width="250px" height="300px" src="https://cdn0.fahasa.com/media/wysiwyg/Thang-09-2024/cate_homepage_kinhte.png" class="card-img-top" alt="Featured Article">
                    <div class="card-body">
                        <h5 class="card-title">Tuần lễ thương hiệu Acer, mua ngay laptop giá chỉ từ 8.99 triệu</h5>
                        <p class="card-text">Săn mã online giảm thêm đến 1 triệu...</p>
                        <a href="#" class="btn btn-primary">Đọc thêm</a>
                    </div>
                </div>

                <!-- Articles List -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8935246937143.jpg" class="card-img-top" alt="Article 1">
                            <div class="card-body">
                                <h5 class="card-title">OPPO K13 Pro: Chip Snapdragon 8 Gen 3</h5>
                                <p class="card-text">Dung lượng pin khủng...</p>
                                <a href="#" class="btn btn-primary btn-sm">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8935246937143.jpg" class="card-img-top" alt="Article 2">
                            <div class="card-body">
                                <h5 class="card-title">Hiệu suất Samsung Galaxy Tab S10 Ultra</h5>
                                <p class="card-text">Mỏng nhẹ, đa nhiệm...</p>
                                <a href="#" class="btn btn-primary btn-sm">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Hot Topics -->
                <div class="mb-4">
                    <h5 class="fw-bold">Chủ đề Hot</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Sách văn học</li>
                        <li class="list-group-item">Sách kinh tế - kinh doanh</li>
                        <li class="list-group-item">Sách lịch sử và văn hóa</li>
                        <li class="list-group-item">Sách phát triển bản thân</li>
                        <li class="list-group-item">Sách kỹ năng sống</li>
                        <li class="list-group-item">Sách khoa học</li>
                        <li class="list-group-item">Sách khoa học</li>
                    </ul>
                </div>
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
        <div class="row mt-4">
            <div class="col-md-8">
                <h2 class="mb-4">Tin Tức Mới Nhất</h2>
                <?php
                foreach($data as $item):
                ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= APP_URL ?>/public/assets/client/images/<?= $item['image_url'] ?>" class="img-fluid rounded-start" alt="News Image 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                <p class="card-text"><?= $item['image_url'] ?></p>
                                <p class="card-text"><?= $item['short_description'] ?></p>
                                <p class="card-text"><?= $item['publish_date'] ?></p>
                                <p class="card-text"><?= $item['status'] ?></p>
                                <p class="card-text"><?= $item['content'] ?></p>

                                <a href="#" class="btn btn-primary btn-sm">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        
        </div>
        </div>
        </div>
        <?php


}
}