<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Order;
use App\Models\Product;
use App\Views\BaseView;

class DetailCheckout extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div style="height: 110px;" class="bg-dark"></div>
        <div class="container">
            <h4 class="mb-4">Chi tiết đơn hàng</h4>

            <!-- Thông tin người nhận -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Thông Tin Giao Hàng
                </div>

                <div class="card-body">
                    <p><strong>Người nhận:</strong> <?= htmlspecialchars($data['customer_name']) ?></p>
                    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($data['phone']) ?></p>
                    <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($data['shipping_address']) ?></p>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Sản Phẩm
                </div>

                <ul class="list-group list-group-flush">
                    <?php 
                    // Kiểm tra nếu mảng items có tồn tại và không rỗng
                    if (!empty($data['items'])):
                        foreach ($data['items'] as $item) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <img src="/public/uploads/products/<?= isset($item['product_image']) ? htmlspecialchars($item['product_image']) : 'default-image.jpg'; ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" style="width: 80px; height: auto;" class="me-3 border rounded">
                                    <div>
                                        <h6 class="mb-1"><?= htmlspecialchars($item['product_name']) ?></h6>
                                        <small class="text-muted">Số lượng: <?= htmlspecialchars($item['quantity']) ?></small>
                                    </div>
                                </div>
                                <span class="fw-bold col-1 text-end text-danger"><?= number_format($item['price'] * $item['quantity']) ?> đ</span>
                            </li>
                        <?php endforeach;
                    else: ?>
                        <li class="list-group-item">Không có sản phẩm trong đơn hàng.</li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Thông tin tổng tiền -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Thông Tin Đơn Hàng
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Thành tiền</span>
                        <span class="text-danger"><?= number_format($data['totalAmount']) ?> đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Phí vận chuyển</span>
                        <span class=""><?= number_format($data['shippingFee']) ?> đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Tổng cộng</span>
                        <span class="text-danger"><?= number_format($data['totalAmountWithShipping']) ?> đ</span>
                    </li>
                </ul>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Phương Thức Thanh Toán
                </div>
                <div class="card-body">
                    <p><strong><?= ucfirst(htmlspecialchars($data['payment_method'])) ?></strong></p>
                </div>
            </div>

            <!-- Xác nhận đơn hàng -->
            <div class="text-end mt-3 mb-3">
                <a href="/history-orders" class="btn btn-danger">Xác nhận</a>
            </div>
        </div>
        <?php
    }
}
?>
