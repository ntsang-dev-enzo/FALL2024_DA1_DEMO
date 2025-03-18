<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Product;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
        <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center pt-5 pb-3">
                <h1 class="display-4 text-white slideInDown mb-3"><?= $data['product']['name'] ?></h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container product-container">
            <div class="row">
                <div class="col-md-6">
                    <img style="max-height:500px" src="/public/uploads/products/<?= $data['product']['image'] ?>" alt="<?= $data['product']['name'] ?>" class="product-image">

                    <?php if (!empty($data['product']['variants'])): ?>
                        <div class="variant-images d-flex mt-3">
                            <?php foreach ($data['product']['variants'] as $variant): ?>
                                <img src="<?= $variant['image'] ?>" alt="Variant" onclick="changeImage('<?= $variant['image'] ?>')">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <h2  style="font-size:60px; font-family:Arial, Helvetica, sans-serif;"><?= $data['product']['name'] ?></h2>

                    <p class="text-muted">

                        <span style="font-size: 36px !important;" class="text-secondary text-decoration-line-through"> Giá: <?= number_format($data['product']['to_price'], 0, ',', '.') ?> VND</span><br>
                        <span style="font-size: 36px !important;" class="text-danger fw-bold "><?= number_format($data['product']['price'], 0, ',', '.') ?> VND</span>
                        <?php if (!empty($data['product']['to_price']) && $data['product']['to_price'] > $data['product']['price']): ?>
                            <span class="text-secondary text-decoration-line-through"><?= number_format($data['product']['to_price'], 0, ',', '.') ?> VND</span>
                        <?php endif; ?>
                    </p>

                    <p><strong>Lượt xem:</strong> <?= $data['product']['views'] ?? 0 ?> lượt</p>

                    <label for="taste">Hương vị:</label>
                    <select class="form-select mb-3" id="taste" name="taste" required>
                        <option value="Dâu">Dâu</option>
                        <option value="Socola">Socola</option>
                        <option value="Vani">Vani</option>
                        <option value="Chanh">Chanh</option>
                        <option value="Việt Quất">Việt Quất</option>
                    </select>

                    <form method="post" action="/add-to-cart">
                        <input type="hidden" name="method" id="" value="POST">
                        <input type="hidden" name="id" value="<?= $data['product']['id'] ?>" id="">
                        <button type="submit" name="add-to-cart" class="btn btn-primary w-100 mb-2">Thêm vào giỏ hàng</button>
                    </form>
                    <button class="btn btn-success w-100">Mua ngay</button>
                </div>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="product-description mt-4">
                <h4>Mô tả sản phẩm</h4>
                <?php
                $fullDescription = nl2br(htmlspecialchars($data['product']['description'] ?? "Chưa có mô tả."));
                $shortDescription = substr($fullDescription, 0, 100) . (strlen($fullDescription) > 100 ? "..." : "");
                ?>
                <p id="shortDesc"><?= $shortDescription ?></p>
                <p id="fullDesc" style="display: none;"><?= $fullDescription ?></p>
                <?php if (strlen($fullDescription) > 100): ?>
                    <button class="btn btn-link p-0" id="toggleDesc" onclick="toggleDescription()">Xem thêm</button>
                <?php endif; ?>
            </div>

            <!-- Bình luận -->
            <div class="comment-section mt-4">
                <h4>Bình luận</h4>
                <div class="comment-text w-100">
                    <?php
                    if (isset($data) && isset($data['comments']) && $data && $data['comments']):
                        foreach ($data['comments'] as $item):
                    ?>
                            <h6 class="font-medium"><?= $item['name'] ?></h6>
                            <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                            <div class="comment-footer">
                                <span class="text-muted float-right"><?= $item['date'] ?></span>
                            </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>


                <div class="comment-text w-100">
                    <?php if (!empty($_SESSION['user'])): ?>
                        <h6 class="font-medium"><?= $_SESSION['user']['name'] ?></h6>
                    <?php else: ?>
                        <h6 class="font-medium">Khách vãng lai</h6>
                    <?php endif; ?>

                    <form action="/comments" method="post">
                        <input type="hidden" name="method" value="POST">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?? 0 ?>">
                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">

                        <div class="form-group">
                            <label for="">Bình luận</label>
                            <textarea class="form-control rounded-0" name="content" rows="3" placeholder="Nhập bình luận..."></textarea>
                        </div>
                        <div class="comment-footer mt-2">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function changeImage(imageUrl) {
                document.querySelector('.product-image').src = imageUrl;
            }

            function toggleDescription() {
                let shortDesc = document.getElementById('shortDesc');
                let fullDesc = document.getElementById('fullDesc');
                let toggleButton = document.getElementById('toggleDesc');

                if (shortDesc.style.display === 'none') {
                    shortDesc.style.display = 'block';
                    fullDesc.style.display = 'none';
                    toggleButton.innerText = 'Xem thêm';
                } else {
                    shortDesc.style.display = 'none';
                    fullDesc.style.display = 'block';
                    toggleButton.innerText = 'Thu gọn';
                }
            }
        </script>

<?php
    }
}
