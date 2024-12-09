<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">SỬA ĐƠN HÀNG</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/admin/orders/<?= $data['id'] ?>" method="post">
                                    <input type="hidden" name="method" value="PUT">
                                    
                                    <div class="form-group">
                                        <label for="status">Trạng thái đơn hàng</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Chờ xác nhận</option>
                                            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Chờ giao hàng</option>
                                            <option value="2" <?= $data['status'] == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                                            <option value="3" <?= $data['status'] == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                                            <option value="4" <?= $data['status'] == 4 ? 'selected' : '' ?>>Đã hủy</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_amount">Tổng tiền</label>
                                        <input type="number" class="form-control" id="total_amount" disabled name="" value="<?= $data['total_amount'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="shipping_address">Địa chỉ giao hàng</label>
                                        <input type="text" class="form-control" id="shipping_address" disabled name="" value="<?= $data['shipping_address'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="order_date">Ngày đặt</label>
                                        <input type="date" class="form-control" id="order_date" disabled name="" value="<?= $data['order_date'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="payment_method">Phương thức thanh toán</label>
                                        <input type="text" class="form-control" id="payment_method" disabled name="" value="<?= $data['payment_method'] ?>" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="/admin/orders" class="btn btn-secondary">Hủy</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
