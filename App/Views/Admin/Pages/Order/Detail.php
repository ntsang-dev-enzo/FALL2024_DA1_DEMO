<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-name">Chi tiết đơn hàng</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container fluid -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Card to display customer info -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin khách hàng</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tên khách hàng</th>
                                        <td><?= htmlspecialchars($data[1]['name'] ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?= htmlspecialchars($data[1]['email'] ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại</th>
                                        <td><?= htmlspecialchars($data[1]['phone'] ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <td><?= htmlspecialchars($data[1]['address'] ?? 'N/A'); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Card to display order products -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin sản phẩm trong đơn hàng</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ảnh</th>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $half = ceil(count($data) / 2);
                                        $halfData = array_slice($data, 0, $half);  
                                        foreach ($halfData as $index => $item): ?> 
                                            <tr>
                                                <td><?= htmlspecialchars($index + 1); ?></td>
                                                <td><img style="max-height:80px" src="/public/uploads/products/<?= htmlspecialchars($item['image'] ?? 'N/A'); ?>" alt=""></td>
                                                <td><?= htmlspecialchars($item['product_name'] ?? 'N/A'); ?></td>
                                                <td><?= htmlspecialchars($item['quantity'] ?? 0); ?></td>
                                                <td><?= number_format($item['product_price'] ?? 0, 0, ',', '.'); ?> VND</td>
                                                <td><?= number_format(($item['quantity'] ?? 0) * ($item['product_price'] ?? 0) , 0, ',', '.'); ?> VND</td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>