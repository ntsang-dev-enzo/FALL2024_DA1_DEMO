<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class OrderHistory extends BaseView
{
    public static function render($orders = [])
    {
?>
        <div class="container">
            <h4 class="mb-4">Lịch sử mua hàng</h4>

            <?php if (empty($orders)) : ?>
                <div class="alert alert-warning">
                    Bạn chưa có đơn hàng nào.
                </div>
            <?php else : ?>
                <div class="list-group">
                    <?php $stt = 1;
                    foreach ($orders as $order) :  /* echo'<pre>'; var_dump($orders) */ ?>
                        <div class="list-group-item shadow-sm mb-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0">Đơn hàng #<?= $stt++ ?></h5>
                                <span class="badge 
    <?= $order['status'] == 0 ? 'bg-warning text-dark' : ($order['status'] == 1 ? 'bg-primary' : ($order['status'] == 2 ? 'bg-info text-dark' : ($order['status'] == 3 ? 'bg-success' : 'bg-danger'))) ?>">
                                    <?= htmlspecialchars(
                                        $order['status'] == 0 ? 'Chờ xác nhận' : ($order['status'] == 1 ? 'Chờ giao hàng' : ($order['status'] == 2 ? 'Đang giao hàng' : ($order['status'] == 3 ? 'Đã giao hàng' : 'Đã hủy')))
                                    ); ?>
                                </span>

                            </div>
                            <p><strong>Ngày đặt hàng:</strong> <?= htmlspecialchars($order['order_date']); ?></p>
                            <p><strong>Người nhận:</strong> <?= htmlspecialchars($order['name']); ?></p>
                            <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['phone']); ?></p>
                            <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($order['shipping_address']); ?></p>
                            <p><strong>Tổng tiền:</strong> <?= number_format($order['total_amount'] + 32000); ?> đ</p>
                            <a href="/order/detail/<?= htmlspecialchars($order['order_id']); ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
<?php
    }
}
?>