<?php

namespace App\Views\Admin\Pages\User;

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
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách người dùng</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Ảnh đại diện</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Họ và tên</th>
                                                    <th>Email</th>
                                                    <th>Quyền</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><img src="<?=APP_URL?>/public/uploads/users/<?=$item['avatar'] ?>" alt="" width="100px"></td>
                                                        <td><?= $item['username'] ?></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        <td><?= ($item['role'] == 1) ? 'Quản trị viên' : 'Khách hàng' ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hoạt đông' : 'Khóa' ?></td>
                                                        <td>
                                                            <a href="/admin/users/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <?php if ($_SESSION['user']['id']!=$item['id']) :
                                                             ?>
                                                            <form action="/admin/users/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa <?= $item['name'] ?> không?')">
                                                                <input type="hidden" name="method" value="DELETE" id="">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                            <?php endif
                                                             ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;


                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                else :

                                ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php
                                endif;

                                ?>
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
