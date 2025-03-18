<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $sortOption = $data['sortOption'] ?? 'default';
?>
        <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">QUẢN LÝ SẢN PHẨM</h6>
                            <form action="/admin/products/search" class="d-flex" role="search" method="get">
                                    <input class="form-control me-2" name="keyword" type="search" placeholder="Search..." aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Tên danh mục</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stt=1;

                                            foreach($data['products'] as $item): 
                                            ?>
                                        <tr>
                                            
                                            <th scope="row"><?=$stt++;?></th>
                                            <td><img style="height: 100px; width:100px" src="/public/uploads/products/<?=$item['image']?>" alt=""></td>
                                            <td><?=$item['name']?></td>
                                            <td><?=$item['category_name']?></td>
                                            <td><a class="btn btn-outline-warning" href="/admin/products/<?=$item['id']?>">Sửa</a></td>
                                            <td><form action="/admin/products/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa sản phẩm <?= $item['name'] ?> không?')">
                                                <input type="hidden" name="method" value="DELETE" id="">
                                            <button type="submit" class="btn btn-outline-danger">Xóa</button>
                                            </form></td>
                                        </tr>
                                        <?php
                                            endforeach;
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    <?php
    }
}
