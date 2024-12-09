<?php

namespace App\Views\Admin\Pages\Blogs;

use App\Views\BaseView;

class Edit extends BaseView
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
                        <h4 class="page-name">Sửa bài viết</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
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
                            <form action="/admin/news/update/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="method" value="PUT">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo htmlspecialchars($data['name']); ?>"
                                        placeholder="Nhập tiêu đề tin tức">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Tải lên ảnh (không bắt buộc)</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <?php if (!empty($data['image_url'])): ?>
                                        <img src="<?php echo htmlspecialchars($data['image_url']); ?>"
                                            alt="Ảnh hiện tại" style="width: 150px; height: auto; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Mô tả ngắn</label>
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3"
                                        placeholder="Nhập mô tả ngắn"><?php echo htmlspecialchars($data['short_description']); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="publish_date" class="form-label">Ngày xuất bản</label>
                                    <input type="datetime-local" class="form-control" id="publish_date" name="publish_date"
                                        value="<?php echo date('Y-m-d\TH:i', strtotime($data['publish_date'])); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Tình trạng</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="0" <?php echo $data['status'] == 0 ? 'selected' : ''; ?>>Bản nháp</option>
                                        <option value="1" <?php echo $data['status'] == 1 ? 'selected' : ''; ?>>Đã xuất bản</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="content" name="content" rows="5"
                                        placeholder="Nhập nội dung đầy đủ"><?php echo htmlspecialchars($data['content']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="/admin/news" class="btn btn-secondary">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
