<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\MiniCategory;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Cart;
use App\Views\Client\Pages\Product\Checkout;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // hiển thị danh sách
    public static function index()
{
    $category = new Category();
    $categories = $category->getAllCategoryByStatus();

    // Lấy giá trị từ form sắp xếp, mặc định là 'default'
    $sortOption = $_GET['sort'] ?? 'default'; 

    // Lấy danh sách sản phẩm theo sắp xếp
    $product = new Product();
    $products = $product->sortProducts($sortOption);
    $totalProductData = $product->countTotal();

    // Lấy tổng số sản phẩm từ mảng
    $totalProducts = isset($totalProductData['total']) ? $totalProductData['total'] : 0;

    $data = [
        'products' => $products,
        'categories' => $categories,
        'totalProducts' => $totalProducts,  // Truyền giá trị tổng số sản phẩm
    ];

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
}

    public static function detail($id)
    {
        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);
        if (!$product_detail) {
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này!');
            header('location: /products');
            exit;
        }
        $comment = new Comment();
        $comments = $comment->get5CommentNewestByProductAndStatus($id);
        $data = [
            'product' => $product_detail,
            'comments' => $comments
        ];

        $view_result=ViewProductHelper::cookieView($id, $product_detail['view']);


        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Detail::render();
        Detail::render($data);
        Footer::render();
    }

    public static function checkout(/* $id */)
    {
        // $product=new Product();
        // $product_detail=$product->getOneProductByStatus($id);
        // if (!$product_detail) {
        //     NotificationHelper::error('product_detail','Không thể xem sản phẩm này!');
        //     header('location: /products');
        //     exit;
        // }
        // $comment= new Comment();
        // $comments=$comment->get5CommentNewestByProductAndStatus($id);
        // $data = [
        //     'product' => $product_detail,
        //     'comments' => $comments
        // ];

        // $view_result=ViewProductHelper::cookieView($id, $product_detail['view']);


        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Checkout::render();
        // Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $product = new Product();
        $products = $product->getAllProductByCategoryAndStatus($id);
        

        $data = [
            'products' => $products,
            'categories' => $categories,
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function search() {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
    
        $keyword = $_GET['keyword'] ?? '';
        $keyword = trim($keyword); // Loại bỏ khoảng trắng đầu/cuối
    
        // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
        if (empty($keyword)) {
            $_SESSION['keyword'] = null;
            $product = new Product();
            $products = $product->getAllProductByStatus(); // Lấy tất cả sản phẩm
            $totalProductData = $product->countTotal();

            // Lấy tổng số sản phẩm từ mảng
            $totalProducts = isset($totalProductData['total']) ? $totalProductData['total'] : 0;
        
            $data = [
                'products' => $products,
                'categories' => $categories,
                'totalProducts' => $totalProducts,  // Truyền giá trị tổng số sản phẩm
            ];
            Header::render();
            Index::render($data);
            Footer::render();
            return;
        }
    
        // Lưu từ khóa tìm kiếm vào session
        $_SESSION['keyword'] = $keyword;
    
        // Tìm kiếm sản phẩm theo từ khóa
        $product = new Product();
        $products = $product->search($keyword); // Gọi phương thức search()
        $totalProductData = $product->countTotal();

        // Lấy tổng số sản phẩm từ mảng
        $totalProducts = isset($totalProductData['total']) ? $totalProductData['total'] : 0;
    
        $data = [
            'products' => $products,
            'categories' => $categories,
            'totalProducts' => $totalProducts,  // Truyền giá trị tổng số sản phẩm
        ];
        Header::render();
        Index::render($data);
        Footer::render();
    }
    
    
    
}
