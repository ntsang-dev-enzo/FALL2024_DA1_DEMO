<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Cart extends BaseView
{
    public static function render($data = null)
    {
        $cart_data = $data['cart_data'] ?? [];
        $total_price = 0;
?>
        <div class="container my-5">
            <h2 class="mb-4 text-center">Giỏ Hàng</h2>
            <div class="row">
                <!-- Danh sách sản phẩm -->
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">Danh sách sản phẩm</h4>
                                <form action="/clear-cart" method="post" class="text-end mt-3">
                                <input type="hidden" name="method" id="" value="POST">
                                    <button type="submit" class="btn btn-outline-danger">Xóa tất cả sản phẩm</button>
                                </form>

                            </div>
                            <?php foreach ($cart_data as $cart):
                                if ($cart['data']):
                                    $unit_price = $cart['quantity'] * $cart['data']['price'];
                                    $total_price += $unit_price;
                            ?>
                                    <div class="row align-items-center border-bottom py-3">
                                        <div class="col-md-1 text-center">
                                        <input type="checkbox" class="form-check-input" name="selected_items[]" value="<?= $cart['data']['id'] ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <img src="/public/uploads/products/<?= $cart['data']['image'] ?>" class="img-fluid rounded" alt="<?= $cart['data']['name'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mb-1"><?= $cart['data']['name'] ?></h6>
                                            <p class="text-muted mb-0">
                                                <span class="text-danger"><?= number_format($cart['data']['price']) ?> đ</span>
                                                <?php if (!empty($cart['data']['discount_price'])): ?>
                                                    <small class="text-decoration-line-through ms-2"><?= number_format($cart['data']['discount_price']) ?> đ</small>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <form action="/update-cart-item" method="post" class="d-flex">
                                                <input type="number" name="quantity" class="form-control text-center" value="<?= $cart['quantity'] ?>" min="1" onchange="this.form.submit()">
                                                <input type="hidden" name="id" value="<?= $cart['data']['id'] ?>">
                                                <input type="hidden" name="update-cart-item">
                                                <input type="hidden" name="method" id="" value="POST">
                                            </form>
                                        </div>
                                        <div class="col-md-2 text-end">
                                            <p class="fw-bold text-primary mb-0"><?= number_format($unit_price) ?> đ</p>
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <form action="/remove-cart-item" method="post">
                                            <input type="hidden" name="method" id="" value="POST">
                                                <input type="hidden" name="id" value="<?= $cart['data']['id'] ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                            </form>
                                        </div>
                                    </div>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Thanh toán -->
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Tóm tắt đơn hàng</h4>
                            <div class="d-flex justify-content-between">
                                <p class="mb-1">Tạm tính:</p>
                                <p class="mb-1"><?= number_format($total_price) ?> đ</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-1">Khuyến mãi: </p>
                                <p class="mb-1">0 đ</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5 class="fw-bold">Tổng cộng:</h5>
                                <h5 class="fw-bold text-danger"><?= number_format($total_price) ?> đ</h5>
                            </div>
                            <a href="/checkout" class="btn btn-success w-100 mt-3">Tiến hành thanh toán</a>
                            <p class="text-muted text-center mt-2">Giảm giá trên web chỉ áp dụng cho bán lẻ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>