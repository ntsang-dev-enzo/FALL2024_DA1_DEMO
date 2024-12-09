<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
        // Nếu có thông báo lỗi, hiển thị chúng
        $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : null;

        // Xóa thông báo sau khi đã hiển thị
        unset($_SESSION['error_message'], $_SESSION['success_message']);

?>

        <!-- Page wrapper -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
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
                            <form class="form-horizontal" action="/admin/users" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm người dùng</h4>
                                    
                                    <!-- Hiển thị thông báo lỗi nếu có -->
                                    <?php if ($error_message): ?>
                                        <div class="alert alert-danger"><?= htmlspecialchars($error_message); ?></div>
                                    <?php endif; ?>

                                    <!-- Hiển thị thông báo thành công nếu có -->
                                    <?php if ($success_message): ?>
                                        <div class="alert alert-success"><?= htmlspecialchars($success_message); ?></div>
                                    <?php endif; ?>

                                    <!-- Các trường nhập liệu -->
                                    <div class="form-group">
                                        <input type="hidden" name="method" value="POST" id="">
                                        <label for="username">Tên đăng nhập*</label>
                                        <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập..." name="username" value="<?= htmlspecialchars($data['username'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="email" class="form-control" id="email" placeholder="Nhập email..." name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Tên*</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập họ tên..." name="name" value="<?= htmlspecialchars($data['name'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Mật khẩu*</label>
                                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu..." name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="re_password">Xác nhận mật khẩu*</label>
                                        <input type="password" class="form-control" id="re_password" placeholder="Xác nhận mật khẩu..." name="re_password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Ảnh đại diện*</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                            <option value="" disabled selected>Vui lòng chọn...</option>
                                            <option value="1" <?= isset($data['status']) && $data['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                                            <option value="0" <?= isset($data['status']) && $data['status'] == 0 ? 'selected' : '' ?>>Khóa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
