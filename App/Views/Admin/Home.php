<?php

namespace App\Views\Admin;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-users fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Users</p>
                            <h6 class="mb-0"><?php echo $data['total_user'] ?? 0; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-list fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Categories</p>
                            <h6 class="mb-0"><?php echo $data['total_category'] ?? 0; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-box fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Products</p>
                            <h6 class="mb-0"><?php echo $data['total_product'] ?? 0; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-comments fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Comments</p>
                            <h6 class="mb-0"><?php echo $data['total_comment'] ?? 0; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded p-4">
                <h6 class="mb-4">Comments by Product</h6>
                <ul>
                    <?php

                    
                    foreach ($data['comment_by_product'] as $product_id => $count) : ?>
                        <li>Product <?php echo $product_id; ?>: <strong><?php echo $count; ?></strong> comments</li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

<?php
    }
}
?>
