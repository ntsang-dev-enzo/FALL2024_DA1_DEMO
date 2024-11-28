<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {


        $product = new Product();
        $data = $product->getAllProductJoinCategory();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        // var_dump($_SESSION);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        Footer::render();
    }


    // // xử lý chức năng thêm
    public static function store()
    {
        //validation các trường dữ liệu
        $is_valid = ProductValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại!');
            header('location: /admin/products/create');
            exit;
        }
        // echo 'ucii';
        $name = $_POST['name'];
        //kiểm tra tên sp tồn tại chưa, không được trùng
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại!');
            header('location: /admin/products/create');
            exit;
        }

        //thêm
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'description' => $_POST['description'],
            'is_featured' => $_POST['is_featured'],
            'category_id' => $_POST['category_id'],
            'author' => $_POST['author'],
            'publisher' => $_POST['publisher'],
            'cover' => $_POST['cover'],
            'supplier' => $_POST['supplier'],
            'status' => $_POST['status'],
        ];
        $is_upload=ProductValidation::uploadImage();
        if($is_upload){
            $data['image'] = $is_upload;
        }
        $result = $product->createProduct($data);
        if ($result) {
            NotificationHelper::success('store', 'Thêm sản phẩm thành công!');
            header('location: /admin/products');
            exit;
        } else {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại!');
            var_dump($data);
            header('location: /admin/products/create');
            exit;
        }
    }


    // hiển thị chi tiết
    // public static function detail($id)
    // {
    //     $product_detail = [

    //     ];
    // }


    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $product=new Product();
        $data_product = $product->getOneProduct($id);

        $category= new Category();
        $data_category = $category->getAllCategory();
        if (!$data_product) {
            NotificationHelper::error('edit','Không thể xem sản phẩm này!');
            header('location: /admin/products');
            exit;
        } 
        $data=[
            'product' => $data_product,
            'category' => $data_category,
        ];
        // echo '<pre>';
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }



   // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //validation các trường dữ liệu
        $is_valid=ProductValidation::edit();
        if(!$is_valid){
            NotificationHelper::error('update','Cập nhật sản phẩm thất bại!');
            header("location: /admin/products/$id");
            exit;
        }
        // echo 'ucii';
        $name = $_POST['name'];
        //kiểm tra tên loại tồn tại chưa, không được trùng
        $product=new Product();
        $is_exist=$product->getOneProductByName($name);
        if ($is_exist) {
            if ($is_exist['id']!=$id) {
                NotificationHelper::error('update','Tên sản phẩm đã tồn tại!');
            header("location: /admin/products/$id");
            exit;
            }

        }

        // cập nhật
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'description' => $_POST['description'],
            'is_featured' => $_POST['is_featured'],
            'category_id' => $_POST['category_id'],
            'author' => $_POST['author'],
            'publisher' => $_POST['publisher'],
            'cover' => $_POST['cover'],
            'supplier' => $_POST['supplier'],
            'status' => $_POST['status'],
        ];
        $is_upload=ProductValidation::uploadImage();
        if($is_upload){
            $data['image'] = $is_upload;
        }
        $result=$product->updateProduct($id, $data);
        if ($result) {
            NotificationHelper::success('update','Cập nhật sản phẩm thành công!');
            header('location: /admin/products');
            exit;
        }
        else{
            NotificationHelper::error('update','Cập nhật sản phẩm thất bại!');
            header("location: /admin/products/$id");
            exit;
        }

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $product= new Product();
        $result=$product->deleteProduct($id);
        if ($result) {
            NotificationHelper::success('delete','Xóa sản phẩm thành công!');
            header('location: /admin/products');
            exit;
        }else{
            NotificationHelper::error('delete','Xóa sản phẩm thất bại!');
            header('location: /admin/products');
            exit;
        }

    }
}
