<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $sortOption = $data['sortOption'] ?? 'default';
?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->

            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách sản phẩm</h5>
                                <div class="d-flex">
                                    <form action="/admin/products/search" class="d-flex" role="search" method="get">
                                        <input type="hidden" method="GET">
                                        <input class="form-control me-2" name="keyword" type="search" placeholder="Search..." aria-label="Search">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </form>
                                    <form class="d-flex ms-2" action="/admin/products" method="GET">
                                        <select name="sort" id="sort" class="form-select me-3">
                                            <option value="default" <?php echo $sortOption == 'default' ? 'selected' : ''; ?>>Mặc định</option>
                                            <option value="lowToHigh" <?php echo $sortOption == 'lowToHigh' ? 'selected' : ''; ?>>Giá: Thấp đến Cao</option>
                                            <option value="highToLow" <?php echo $sortOption == 'highToLow' ? 'selected' : ''; ?>>Giá: Cao đến Thấp</option>
                                        </select>
                                        <button type="submit" class="btn btn-success">Chọn</button>
                                    </form>
                                </div>

                                <?php if (count($data['products'])) : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên</th>
                                                    <th>Giá</th>
                                                    <th>Giá giảm</th>
                                                    <th>Loại</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data['products'] as $item) : ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="" width="100px"></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= number_format($item['price']) ?></td>
                                                        <td><?= number_format($item['discount_price']) ?></td>
                                                        <td><?= $item['category_name'] ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td>
                                                            <a href="/admin/products/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/products/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa sản phẩm <?= $item['name'] ?> không?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


    <?php
    }
}
