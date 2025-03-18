<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Cart;
use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = [])
    {
        if (!AuthHelper::checkLogin()) {
            header('Location: /login');
            exit;
        }

        $cartModel = new Cart();
        $cartItems = $cartModel->getCartItems($_SESSION['user']['id']);
        $totalAmount = 0;

?>
        <div style="height: 110px;" class="bg-dark"></div>
        <?php         
        // echo '<pre>';
        // print_r(uniqid('ORDER_'));
        // echo '</pre>';
        // die;
        ?>
        <div class="container">
            <form id="checkoutForm" method="post" action="/order/session">
                <input type="hidden" name="order_id" value="<?= uniqid('ORDER_') ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                <input type="hidden" name="method" value="POST">
                <input type="hidden" id="cityName" name="cityName">
                <input type="hidden" id="districtName" name="districtName">
                <input type="hidden" id="wardName" name="wardName">

                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h4>Thông tin đơn hàng</h4>
                    </legend>
                    <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Họ và tên</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="<?= $data['name'] ?? '' ?>" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="<?= $data['email'] ?? '' ?>" class="form-control" id="email" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" value="<?= $data['phone'] ?? '' ?>" class="form-control" id="phone" required>
                                </div>
                            </div>

                            <div>
                                <select class="form-select form-select-sm mb-3" id="city" name="cityCode" required>
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                                <select class="form-select form-select-sm mb-3" id="district" name="districtCode" required>
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                                <select class="form-select form-select-sm" id="ward" name="wardCode" required>
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div><br>

                            <div class="row mb-3">
                                <label for="street" class="col-sm-3 col-form-label">Địa chỉ nhận hàng</label>
                                <div class="col-sm-9">
                                    <input type="text" name="street" class="form-control" id="street" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h5>Thông tin sản phẩm</h5>
                            <ul class="list-group mb-3">
                                <?php foreach ($cartItems as $item) : ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="/public/uploads/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <strong><?= $item['name'] ?></strong>
                                                <p class="mb-0">Số lượng: <?= $item['quantity'] ?></p>
                                            </div>
                                        </div>
                                        <span><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ</span>
                                    </li>
                                    <?php $totalAmount += $item['price'] * $item['quantity']; ?>
                                <?php endforeach; ?>
                            </ul>
                            <p><strong>Phí vận chuyển:</strong> 0đ</p>
                            <p><strong>Tổng thanh toán:</strong> <?= number_format($totalAmount + 0, 0, ',', '.') ?>đ</p>
                        </div>

                    </div>
                </fieldset>

                <div class="row mb-3">
                    <label for="payment_method" class="col-sm-3 col-form-label">Phương thức thanh toán</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="payment_method" id="payment_method" required>
                            <option value="cod">Thanh toán khi nhận hàng</option>
                            <option value="vnpay">VNPay</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="total_amount" value="<?= $totalAmount + 0 ?>">
                <input type="hidden" name="product_details" value="<?= htmlspecialchars(json_encode($cartItems)) ?>">

                <div class="mt-3 mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger px-4 py-2">Xác nhận thanh toán</button>
                </div>
            </form>
        </div>

        <script>
            // document.getElementById("checkoutForm").addEventListener("submit", function(event) {
            //     let paymentMethod = document.getElementById("payment_method").value;

            //     if (paymentMethod === "vnpay") {
            //         event.preventDefault();
                    
            //         let orderId = document.querySelector("input[name='order_id']").value;
            //         let amount = document.querySelector("input[name='total_amount']").value;

            //         if (!orderId || !amount) {
            //             alert("Thiếu thông tin đơn hàng!");
            //             return;
            //         }
            //         window.location.href = `/payment/vnpay/${orderId}/${amount}`;
            //     }
            // });
        </script>

<?php
    }
}
?>
