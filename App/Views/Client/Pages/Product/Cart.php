<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Cart extends BaseView
{
    public static function render($data = null)
    {
        $cart_data = $data['cart_data'] ?? [];
?>
        <div style="height: 110px;" class="bg-dark"></div>
        <div class="container py-5 my-5">
            <form action="/checkout" method="post">
                <h2 class="mb-4 text-center">Giỏ Hàng</h2>
                <div class="row">
                    <!-- Danh sách sản phẩm -->
                    <div class="col-lg-8">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title">Danh sách sản phẩm</h4>

                                </div>

                                <?php foreach ($cart_data as $cart): ?>
                                    <?php if ($cart): 
                                        $unit_price = $cart['quantity'] * $cart['price'];
                                    ?>
                                        <div class="row align-items-center border-bottom py-3">
                                            <div class="col-md-1 text-center">
                                                <input type="checkbox" name="selected_products[]" 
                                                       value="<?= $cart['product_id'] ?>" 
                                                       data-price="<?= $unit_price ?>" 
                                                       onchange="updateTotal()">
                                            </div>
                                            <div class="col-md-2">
                                                <img src="/public/uploads/products/<?= $cart['image'] ?>" class="img-fluid rounded" alt="<?= $cart['name'] ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="mb-1"><?= $cart['name'] ?></h6>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="/update-cart-item" method="post" class="d-flex">
                                                    <input type="number" name="quantity" class="form-control text-center" value="<?= $cart['quantity'] ?>" min="1" onchange="this.form.submit()">
                                                    <input type="hidden" name="id" value="<?= $cart['product_id'] ?>">
                                                    <input type="hidden" name="method" value="POST">
                                                </form>
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <p class="fw-bold text-primary mb-0"><?= number_format($unit_price) ?> đ</p>
                                            </div>
                                            <div class="col-md-1 text-center">
                                                <form action="/remove-cart-item" method="post">
                                                    <input type="hidden" name="id" value="<?= $cart['product_id'] ?>">
                                                    <input type="hidden" name="method" value="POST">
                                                    <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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
                                    <p class="mb-1" id="subtotal">0 đ</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-1">Khuyến mãi: </p>
                                    <p class="mb-1">0 đ</p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between my-2">
                                    <h5 class="fw-bold">Tổng cộng:</h5>
                                    <h5 class="fw-bold text-danger" id="total">0 đ</h5>
                                </div>
                                
                                <input type="submit" class="btn btn-success w-100 mt-3" value="Tiến hành thanh toán">
                                <p class="text-muted text-center mt-2">Giảm giá trên web chỉ áp dụng cho bán lẻ.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function updateTotal() {
                let checkboxes = document.querySelectorAll('input[name="selected_products[]"]:checked');
                let total = 0;

                checkboxes.forEach(checkbox => {
                    total += parseFloat(checkbox.getAttribute('data-price'));
                });

                document.getElementById('subtotal').innerText = total.toLocaleString() + ' đ';
                document.getElementById('total').innerText = total.toLocaleString() + ' đ';
            }
        </script>

<?php
    }
}
?>
