<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Helpers\ViewProductHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Checkout;
use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\ThankYou;

class ProductController
{
    public static function index()
    {
        try {
            $category = new Category();
            $categories = $category->getAllCategoryByStatus();

            $sortOption = $_GET['sort'] ?? 'default';

            $product = new Product();
            $products = $product->sortProducts($sortOption);
            $totalProducts = $product->countTotalProduct();

            $data = [
                'products' => $products,
                'categories' => $categories,
                'totalProducts' => $totalProducts,
            ];

            Header::render();
            Notification::render();
            NotificationHelper::unset();
            Index::render($data);
            Footer::render();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị sản phẩm: ' . $th->getMessage());
            header('Location: /');
            exit;
        }
    }
    public static function checkout()
{


    // Kiểm tra xem có sản phẩm nào được chọn hay không

    if (empty($_POST['selected_products']) || !is_array($_POST['selected_products'])) {
        NotificationHelper::error('fail', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
        header('Location: /cart');
        exit;
    }
    $_SESSION['selected_products'] = $_POST['selected_products'];
    // Lấy danh sách ID sản phẩm đã chọn từ form
    $selectedProductIds = array_map('intval', $_POST['selected_products']);
    
    // Lấy thông tin sản phẩm từ database
    $product = new Product();
    $selectedProducts = $product->getProductsByIds($selectedProductIds);
    // echo '<pre>';
    // var_dump($selectedProducts);
    // echo '</pre>';
    // die;
    // Nếu không có sản phẩm nào hợp lệ, quay về giỏ hàng
    if (empty($selectedProducts)) {
        NotificationHelper::error('kocosanphamhople' , 'Không tìm thấy sản phẩm hợp lệ để thanh toán.');
        header('Location: /cart');
        exit;
    }
    $user = $_SESSION['user'];
// ['products' => $selectedProducts]
    // Hiển thị giao diện thanh toán
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Checkout::render($user);
    Footer::render();
}

    public static function getProductByCategory($id)
    {
        try {
            $category = new Category();
            $categories = $category->getAllCategoryByStatus();
            if (!$categories) {
                NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này!');
                header('location: /products');
                exit;
            }
            $product = new Product();
            $products = $product->getAllProductByCategoryAndStatus($id);
            if (!$products) {
                NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này!');
                header('location: /products');
                exit;
            }
            $data = [
                'products' => $products,
                'categories' => $categories,
            ];

            Header::render();
            Notification::render();
            NotificationHelper::unset();
            Index::render($data);
            Footer::render();
        } catch (\Exception $e) {
            die("Lỗi lấy sản phẩm theo danh mục: " . $e->getMessage());
        }
    }
    public static function thankyou()
{
   
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    ThankYou::render();
    Footer::render();
}
    public static function detail($id)
    {
        try {
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
                'comments' => $comments,
            ];

            ViewProductHelper::cookieView($id, $product_detail['view']);

            Header::render();
            Notification::render();
            NotificationHelper::unset();
            Detail::render($data);
            Footer::render();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết sản phẩm: ' . $th->getMessage());
            header('Location: /products');
            exit;
        }
    }

    public static function search()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        // Kiểm tra xem từ khóa có được gửi từ giọng nói không (từ AJAX hoặc HTTP request)
        $keyword = $_GET['keyword'] ?? $_POST['keyword'] ?? ''; // Có thể là từ khóa từ GET hoặc POST
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