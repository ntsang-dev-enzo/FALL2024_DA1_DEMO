<?php
namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Product;
use App\Views\BaseView;

class DetailCheckout extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
        <div class="container">
            <h4 class="mb-4">Chi tiết đơn hàng #<?= htmlspecialchars($data['id']); ?></h4>

            <!-- Danh sách sản phẩm -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Sản Phẩm
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($data['items'] as $item) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <img src="<?= isset($item['image']) ? $item['image'] : 'default-image.jpg'; ?>" alt="<?= htmlspecialchars($item['name']); ?>" style="width: 80px; height: auto;" class="me-3 border rounded">
                                <div>
                                    <h6 class="mb-1"><?= htmlspecialchars($item['name']); ?></h6>
                                    <small class="text-muted">Số lượng: <?= $item['quantity']; ?></small>
                                </div>
                            </div>
                            <span class="fw-bold text-danger"><?= number_format($item['price'] * $item['quantity']); ?> đ</span>
                        </li>
                    <?php endforeach; ?>
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
                        <span class="text-danger"><?= number_format($data['totalAmount']); ?> đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Phí vận chuyển</span>
                        <span class=""><?= number_format($data['shippingFee']); ?> đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Tổng cộng</span>
                        <span class="text-danger"><?= number_format($data['totalAmountWithShipping']); ?> đ</span>
                    </li>
                </ul>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Phương Thức Thanh Toán
                </div>
                <div class="card-body">
                    <p><strong><?= ucfirst(htmlspecialchars($data['payment_method'])); ?></strong></p>
                </div>
            </div>

            <!-- Xác nhận đơn hàng -->
            <div class="text-end mt-3 mb-3">
                <a type="button" href="/" class="btn btn-danger">Xác nhận</a>
            </div>
        </div>
<?php
    }
}
