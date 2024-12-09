<?php

namespace App\Views\Admin\Pages\Blogs;

use App\Views\BaseView;

class Index extends BaseView
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
                                                        <td><img src="/public/uploads/blogs/<?= $item['image_url'] ?>" alt="Image" style="width: 100px; height: auto;"></td>
                                                        <td><?= $item['short_description'] ?></td>
                                                        <td><?= $item['publish_date'] ?></td>
                                                        <td><?= $item['status'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td><?= $item['content'] ?></td>
                                                        <td>
                                                            <a href="/admin/news/edit/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
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
            </div>
        </div>
        <?php
    }
}
?>
