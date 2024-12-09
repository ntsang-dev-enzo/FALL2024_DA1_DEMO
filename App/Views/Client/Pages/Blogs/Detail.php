<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Detail extends BaseView
{
    public static function render($data = null)
    {


?>
        <div class="container mt-5">
            <div class="row">
                <!-- News Detail Column -->
                <div class="col-md-8">
                    <!-- News Article Card -->
                    <div class="container mt-5">
                    <?php
// Hiển thị toàn bộ dữ liệu trong $data để kiểm tra cấu trúc


foreach ($data as $item):
    // Kiểm tra nội dung từng $item

    ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= APP_URL ?>/public/assets/client/images/<?= $item['image_url'] ?>" class="img-fluid rounded-start" alt="News Image 1">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $item['name'] ?></h5>
                    <p class="card-text"><?= intval($item['image_url']) ?></p> <!-- Ép sang int -->
                    <p class="card-text"><?= $item['short_description'] ?></p>
                    <p class="card-text"><?= $item['publish_date'] ?></p>
                    
                    <p class="card-text"><?= $item['content'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>

                    </div>

                    <!-- Related Books Section -->
                    
                </div>

                
                    
                </div>
            </div>
        </div>



<?php


    }
}
