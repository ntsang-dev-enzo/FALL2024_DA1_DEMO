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
use App\Views\Client\Pages\Product\Cart;

class CartController
{
    // Hiển thị giỏ hàng
    public static function index()
{
    $cart_data = [];
    $is_login = AuthHelper::checkLogin();
    if (!$is_login){
        NotificationHelper::error('no-login', 'Vui lòng đăng nhập!');
        header('Location: /login');
        exit;
    }

    // Kiểm tra xem cookie 'cart' có tồn tại hay không
    if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
        $cookie_data = json_decode($_COOKIE['cart'], true);

        // Xử lý lỗi JSON nếu xảy ra
        if (json_last_error() === JSON_ERROR_NONE) {
            $productModel = new Product();

            foreach ($cookie_data as $key => $value) {
                $product_id = $value['product_id'];
                $result = $productModel->getOneProduct($product_id);
                if ($result) {
                    $cookie_data[$key]['data'] = $result;
                }
            }
            $cart_data = $cookie_data;
        }
    } else {
        // Thêm thông báo nếu giỏ hàng trống
        NotificationHelper::error('cart_empty', 'Giỏ hàng của bạn đang trống.');
    }

    // Chuẩn bị dữ liệu cho view
    $data = [
        'cart_data' => $cart_data
    ];

    // Hiển thị các thành phần giao diện
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Cart::render($data);
    Footer::render();
}


    // Thêm sản phẩm vào giỏ hàng
    public static function addToCart()
{
    $is_login = AuthHelper::checkLogin();
    if (!$is_login){
        NotificationHelper::error('no-login', 'Vui lòng đăng nhập!');
        header('Location: /login');
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-to-cart'], $_POST['id'])) {
        $product_id = intval($_POST['id']); // Chuyển đổi ID sản phẩm thành số nguyên để đảm bảo an toàn
        $productModel = new Product();

        // Kiểm tra sản phẩm tồn tại
        $product_detail = $productModel->getOneProductByStatus($product_id);
        if (!$product_detail) {
            NotificationHelper::error('product_not_found', 'Sản phẩm không tồn tại hoặc đã bị xóa!');
            header('Location: /products');
            exit;
        }

        // Lấy dữ liệu từ cookie giỏ hàng
        $cart_data = [];
        if (isset($_COOKIE['cart'])) {
            $cookie_data = json_decode($_COOKIE['cart'], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $cart_data = $cookie_data;
            }
        }

        // Tìm sản phẩm trong giỏ
        $product_found = false;
        foreach ($cart_data as &$item) {
            if ($item['product_id'] === $product_id) {
                $item['quantity'] += 1; // Tăng số lượng sản phẩm
                $product_found = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có trong giỏ, thêm mới
        if (!$product_found) {
            $cart_data[] = [
                'product_id' => $product_id,
                'quantity' => 1,
                'name' => $product_detail['name'],
                'price' => $product_detail['price'],
                'image' => $product_detail['image']
            ];
        }


        // Lưu lại cookie giỏ hàng
        $cart_json = json_encode($cart_data);
        setcookie('cart', $cart_json, time() + 3600 * 24 * 30, '/'); // Lưu trong 30 ngày

        // Phản hồi thành công
        NotificationHelper::success('cart_update', 'Sản phẩm đã được thêm vào giỏ hàng!');
    } else {
        // Phản hồi lỗi nếu yêu cầu không hợp lệ
        NotificationHelper::error('invalid_request', 'Yêu cầu không hợp lệ!');
    }

    // Chuyển hướng về trang hiện tại (hoặc trang giỏ hàng)

    header('Location: /cart');
    exit;
}

    // Cập nhật số lượng sản phẩm trong gi�� hàng
    public static function updateCartItem()
{
    // Kiểm tra yêu cầu POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['quantity'])) {
        $product_id = intval($_POST['id']);
        $quantity = intval($_POST['quantity']);

        // Kiểm tra số lượng hợp lệ
        if ($quantity < 1) {
            NotificationHelper::error('invalid_quantity', 'Số lượng phải lớn hơn 0!');
            header('Location: /cart');
            exit;
        }

        // Lấy dữ liệu từ cookie giỏ hàng
        $cart_data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Tìm và cập nhật sản phẩm trong giỏ hàng
        foreach ($cart_data as &$item) {
            if ($item['product_id'] === $product_id) {
                $item['quantity'] = $quantity; // Cập nhật số lượng
                break;
            }
        }

        // Lưu lại cookie giỏ hàng
        $cart_json = json_encode($cart_data);
        setcookie('cart', $cart_json, time() + 3600 * 24 * 30, '/'); // Lưu trong 30 ngày

        // Thông báo thành công
        NotificationHelper::success('cart_update', 'Cập nhật giỏ hàng thành công!');
    } else {
        // Yêu cầu không hợp lệ
        NotificationHelper::error('invalid_request', 'Yêu cầu không hợp lệ!');
    }

    // Chuyển hướng trở lại trang giỏ hàng
    header('Location: /cart');
    exit;
}
// Xóa một sản phẩm khỏi giỏ hàng
public static function removeCartItem()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $product_id = intval($_POST['id']); // Lấy ID sản phẩm

        // Lấy dữ liệu từ cookie giỏ hàng
        $cart_data = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Tìm và xóa sản phẩm khỏi giỏ hàng
        foreach ($cart_data as $key => $item) {
            if ($item['product_id'] === $product_id) {
                unset($cart_data[$key]); // Xóa sản phẩm
                break;
            }
        }

        // Lưu lại cookie giỏ hàng sau khi xóa
        $cart_json = json_encode(array_values($cart_data)); // Sắp xếp lại chỉ số
        setcookie('cart', $cart_json, time() + 3600 * 24 * 30, '/'); // Lưu trong 30 ngày

        // Thông báo thành công
        NotificationHelper::success('cart_update', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    } else {
        // Yêu cầu không hợp lệ
        NotificationHelper::error('invalid_request', 'Yêu cầu không hợp lệ!');
    }

    // Chuyển hướng trở lại trang giỏ hàng
    header('Location: /cart');
    exit;
}
// Xóa tất cả sản phẩm khỏi giỏ hàng
public static function clearCart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xóa cookie giỏ hàng
        setcookie('cart', '', time() - 3600, '/'); // Hết hạn cookie

        // Thông báo thành công
        NotificationHelper::success('cart_update', 'Tất cả sản phẩm đã được xóa khỏi giỏ hàng!');
    } else {
        // Yêu cầu không hợp lệ
        NotificationHelper::error('invalid_request', 'Yêu cầu không hợp lệ!');
    }

    // Chuyển hướng trở lại trang giỏ hàng
    header('Location: /cart');
    exit;
}



}
