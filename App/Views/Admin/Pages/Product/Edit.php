<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ LOẠI SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa loại sản phẩm</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/products/<?= $data['product']['id'] ?>" method="POST" enctype="multipart/form-data" >
                                <div class="card-body">
                                    <h4 class="card-title">Sửa loại sản phẩm</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div align="center"><img src="<?= APP_URL?>/public/uploads/products/<?=$data['product']['image'] ?>" alt="" width="300px" ></div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['product']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sản phẩm..." name="name" value="<?= $data['product']['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" placeholder="Chọn hình ảnh" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá tiền</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá tiền" value="<?= $data['product']['price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_price">Giá giảm</label>
                                        <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="Nhập giá giảm" value="<?= $data['product']['discount_price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả</label>
                                        <textarea class="form-control" cols="50" rows="6" name="description" id="description"><?= $data['product']['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher">Nhà xuất bản</label>
                                        <input type="text" class="form-control" id="publisher" placeholder="Nhập tên nhà xuất bản" name="publisher" value="<?= $data['product']['publisher'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Tác giả</label>
                                        <input type="text" class="form-control" id="author" placeholder="Nhập tên nhà xuất bản" name="author" value="<?= $data['product']['author'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="supplier">Nhà cung cấp</label>
                                        <input type="text" class="form-control" id="supplier" placeholder="Nhập tên nhà xuất bản" name="supplier" value="<?= $data['product']['supplier'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cover">Hình thức bìa</label>
                                        <input type="text" class="form-control" id="cover" placeholder="Nhập tên nhà xuất bản" name="cover" value="<?= $data['product']['cover'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Loại sản phẩm</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php foreach ($data['category'] as $item): ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['product']['category_id']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_featured">Nổi bật</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_featured" name="is_featured">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['product']['is_featured'] == 1 ? 'selected' : '') ?>>Nổi bật</option>
                                            <option value="0" <?= ($data['product']['is_featured'] == 0 ? 'selected' : '') ?>>Bình thường</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['product']['status'] ?>">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['product']['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['product']['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
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
