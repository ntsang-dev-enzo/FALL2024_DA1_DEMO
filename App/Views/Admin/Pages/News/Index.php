<?php

namespace App\Views\Admin\Pages\News;

use App\Views\BaseView;

class index extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách tin tức</h5>
                                <?php if (count($data)) : ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Ảnh</th>
                                                    <th>Mô tả ngắn</th>
                                                    <th>Ngày xuất bản</th>
                                                    <th>Trạng thái</th>
                                                    <th>Nội dung</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><img src="<?= $item['image_url'] ?>" alt="Image" style="width: 100px; height: auto;"></td>
                                                        <td><?= $item['short_description'] ?></td>
                                                        <td><?= $item['publish_date'] ?></td>
                                                        <td><?= $item['status'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td><?= $item['content'] ?></td>
                                                        <td>
                                                            <a href="/admin/news/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/news/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa <?= $item['name'] ?> không?')">
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

                <!-- Form thêm mới -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thêm mới tin tức</h5>
                                <form action="/admin/news" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề tin tức" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Tải lên ảnh</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="short_description" class="form-label">Mô tả ngắn</label>
                                        <textarea class="form-control" id="short_description" name="short_description" rows="3" placeholder="Nhập mô tả ngắn" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="publish_date" class="form-label">Ngày xuất bản</label>
                                        <input type="datetime-local" class="form-control" id="publish_date" name="publish_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Tình trạng</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="draft">Bản nháp</option>
                                            <option value="published">Đã xuất bản</option>
                                            <option value="archived">Đã lưu trữ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Nhập nội dung đầy đủ" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <button type="reset" class="btn btn-secondary">Đặt lại</button>
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
?>
