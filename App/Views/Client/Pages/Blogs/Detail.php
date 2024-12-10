<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Detail extends BaseView
{
    public static function render($data = null)
    {


?>
        <div class="container my-5">
    <div class="row">
        <!-- Nội dung bài viết -->
        <div class="col-lg-8 mb-4">
            <?php foreach ($data as $item): ?>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="row g-0">
                        <div class="col-md-10 mx-auto"> <!-- Giới hạn và căn giữa nội dung -->
                            <div class="card-body text-center"> <!-- Căn giữa nội dung -->
                                <h1 class="card-title fw-bold"><?= $item['name'] ?></h1>
                                <div class="col-md-6 mx-auto my-3"> <!-- Căn giữa và giới hạn ảnh -->
                                    <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $item['image_url'] ?>" class="img-fluid rounded-start" alt="<?= $item['name'] ?>">
                                </div>
                                <p class="card-text text-muted small">Ngày xuất bản: <?= date('d/m/Y', strtotime($item['publish_date'])) ?></p>
                                <p class="card-text"><?= $item['short_description'] ?></p>
                                <p class="card-text"><?= nl2br($item['content']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

      
        <div class="col-lg-4">
            <h4 class="text-primary mb-3">Tin tức liên quan</h4>
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
                                
                                <a href="/Detail/<?= $item['id'] ?>" class="btn btn-cart btn-danger w-100">Xem thêm</a>                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
                
        </div>
    </div>
</div>





<?php


    }
}
