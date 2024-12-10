<?php

namespace App\Views\Admin\Pages\Contact;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Liên hệ</h4>
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
                                </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Họ và tên</th>
                                                    <th>SDT</th>
                                                    
                                                    <th>Email</th>
                                                    <th>Tiêu đề</th>
                                                    
                                                    
                                                    <!-- <th>Giá giảm</th>
                                                    <th>Loại</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['phone'] ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        
                                                        <td><?= $item['tiile'] ?></td>
                                                        
                                                        

                                                        <td>
                                                            <a href="/admin/contact/<?= $item['id'] ?>" class="btn btn-primary">Chi tiết</a>
                                                            <form action="/admin/contact/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa sản phẩm <?= $item['name'] ?> không?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
