<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <!-- Left Column: Latest News -->
                <div class="col-md-8">
                    <h2 class="mb-4">Tin tức mới nhất</h2>
                    <?php foreach ($data as $item): ?>
                        <div class="card mb-4 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $item['image_url'] ?>"
                                        class="img-fluid rounded-start"
                                        alt="<?= $item['name'] ?>"
                                        style="object-fit: cover; height: 160px; width: 100%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate"><?= $item['name'] ?></h5>
                                        <p class="card-text text-muted small"><?= $item['publish_date'] ?></p>
                                        <p class="card-text"><?= $item['short_description'] ?></p>
                                        <a href="/blogs/detail/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <!-- Right Column: Promotions -->
                <div class="col-md-4">
                    <h2 class="mb-4">Khuyến mãi</h2>

                    <?php
                    $promotions = [
                        [
                            "title" => "Giảm Giá 30%",
                            "description" => "Áp dụng cho tất cả đơn hàng trên 500.000 VNĐ.",
                            "button" => "Xem chi tiết",
                            "color" => "success"
                        ],
                        [
                            "title" => "Mua 2 Tặng 1",
                            "description" => "Chương trình áp dụng cho sách thiếu nhi.",
                            "button" => "Xem thêm",
                            "color" => "warning"
                        ]
                    ];
                    ?>

                    <?php foreach ($promotions as $promo): ?>
                        <div class="card bg-<?= $promo['color'] ?> text-white mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= $promo['title'] ?></h5>
                                <p class="card-text"><?= $promo['description'] ?></p>
                                <a href="#" class="btn btn-light"><?= $promo['button'] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php
    }
}
