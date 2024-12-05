<?php

namespace App\Views\Admin\Pages\Blogs;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- Page wrapper -->
        <div class="page-wrapper">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-name">QUẢN tin tức</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
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
                        <div class="card">
                            <form action="/admin/news" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="method" value="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tiêu đề tin tức">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Tải lên ảnh</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Mô tả ngắn</label>
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3" placeholder="Nhập mô tả ngắn" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="publish_date" class="form-label">Ngày xuất bản</label>
                                    <input type="datetime-local" class="form-control" id="publish_date" name="publish_date">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Tình trạng</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="0">Bản nháp</option>
                                        <option value="1">Đã xuất bản</option>
                                        <option value="2">Đã lưu trữ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Nhập nội dung đầy đủ"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="reset" class="btn btn-secondary">Đặt lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
