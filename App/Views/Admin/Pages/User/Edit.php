<?php

namespace App\Views\Admin\Pages\User;

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
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa người dùng</li>
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
                            <form class="form-horizontal" action="/admin/users/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data" >
                                <div class="card-body">
                                    <h4 class="card-title">Sửa người dùng</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="form-group">
                                    <div align="center"><img src="<?= APP_URL?>/public/uploads/users/<?=$data['image'] ?>" alt="" width="300px" ></div>
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id"  name="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                        <label for="username">Tên đăng nhập*</label>
                                        <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập..." disabled name="username" value="<?= $data['username']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="email" class="form-control" id="email" placeholder="Nhập email..." name="email" value="<?= $data['email']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên*</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập họ tên..." name="name" value="<?= $data['name']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu*</label>
                                        <input type="text" class="form-control" id="password" placeholder="Nhập mật khẩu..." name="password" >
                                    </div>
                                    <div class="form-group">
                                        <label for="re_password">Xác nhận mật khẩu*</label>
                                        <input type="text" class="form-control" id="re_password" placeholder="Xác nhận mật khẩu..." name="re_password" >
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Ảnh đại diện*</label>
                                        <input type="file" class="form-control" id="avatar" placeholder="Chọn ảnh đại diện" name="avatar" >
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Quyền*</label>
                                        <input type="text" class="form-control" name="role" id="role" disabled value="<?= ($data['role']==1)?'Quản trị viên':'Khách hàng'?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" >
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hoạt động</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Khóa</option>

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
