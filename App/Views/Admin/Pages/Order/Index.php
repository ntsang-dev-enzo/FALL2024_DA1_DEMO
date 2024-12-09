<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ ĐƠN HÀNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách đơn hàng</h5>
                                <form action="/admin/order/search" class="d-flex" role="search" method="get">
                                    <input class="form-control me-2" name="keyword" type="search" placeholder="Search..." aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                                <?php if (count($data)) : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên khách hàng</th>
                                                    <th>Email</th>
                                                    <th>SĐT</th>
                                                    <th>Địa chỉ giao hàng</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Phương thức thanh toán</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        <td><?= $item['phone'] ?></td>
                                                        <td><?= $item['shipping_address'] ?></td>
                                                        <td><?= $item['order_date'] ?></td>
                                                        <td class="
                                                            <?= $item['status'] == 0 ? 'text-warning' : ($item['status'] == 1 ? 'text-primary' : ($item['status'] == 2 ? 'text-info' : ($item['status'] == 3 ? 'text-success' : 'text-danger'))) ?>">
                                                            <?= htmlspecialchars(
                                                                $item['status'] == 0 ? 'Chờ xác nhận' : ($item['status'] == 1 ? 'Chờ giao hàng' : ($item['status'] == 2 ? 'Đang giao hàng' : ($item['status'] == 3 ? 'Đã giao hàng' : 'Đã hủy')))
                                                            ); ?>
                                                        </td>

                                                        <td><?= number_format($item['total_amount'] + 32000, 0, ',', '.') ?> VNĐ</td>
                                                        <td><?= $item['payment_method'] ?></td>
                                                        <td>
                                                            <a href="/admin/order/detail/<?= $item['id'] ?>" class="btn btn-success text-white">Chi tiết</a>
                                                            <a href="/admin/order/<?= $item['id'] ?>" class="btn btn-primary">Trạng thái</a>
                                                            <form action="/admin/order/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa đơn hàng này không?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else : ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
    }
}
