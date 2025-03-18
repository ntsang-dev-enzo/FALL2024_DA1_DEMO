<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Product\Cart as CartView;

class CartController
{
    // Hiển thị giỏ hàng
    public static function index()
    {
        $is_login = AuthHelper::checkLogin();
        if (!$is_login) {
            NotificationHelper::error('no-login', 'Vui lòng đăng nhập!');
            header('Location: /login');
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $cartModel = new Cart();
        $cart_data = $cartModel->getCartItems($user_id);

        $data = [
            'cart_data' => $cart_data
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        CartView::render($data);
        Footer::render();
    }

    // Thêm sản phẩm vào giỏ hàng
    public static function addToCart()
    {
        $is_login = AuthHelper::checkLogin();
        if (!$is_login) {
            NotificationHelper::error('no-login', 'Vui lòng đăng nhập!');
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-to-cart'], $_POST['id'])) {
            $product_id = intval($_POST['id']);
            $user_id = $_SESSION['user']['id'];
            $productModel = new Product();
            $cartModel = new Cart();

            $product_detail = $productModel->getOneProductByStatus($product_id);
            if (!$product_detail) {
                NotificationHelper::error('product_not_found', 'Sản phẩm không tồn tại!');
                header('Location: /products');
                exit;
            }

            $cartModel->addToCart($user_id, $product_id, 1, $product_detail['price']);
            NotificationHelper::success('cart_update', 'Sản phẩm đã được thêm vào giỏ hàng!');
        }

        header('Location: /cart');
        exit;
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public static function updateCartItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['quantity'])) {
            $product_id = intval($_POST['id']);
            $quantity = intval($_POST['quantity']);
            $user_id = $_SESSION['user']['id'];
            $cartModel = new Cart();

            if ($quantity < 1) {
                NotificationHelper::error('invalid_quantity', 'Số lượng phải lớn hơn 0!');
                header('Location: /cart');
                exit;
            }

            $cartModel->updateCartItem($user_id, $product_id, $quantity);
            NotificationHelper::success('cart_update', 'Cập nhật giỏ hàng thành công!');
        }

        header('Location: /cart');
        exit;
    }

    // Xóa một sản phẩm khỏi giỏ hàng
    public static function removeCartItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $product_id = intval($_POST['id']);
            $user_id = $_SESSION['user']['id'];
            $cartModel = new Cart();

            $cartModel->removeFromCart($user_id, $product_id);
            NotificationHelper::success('cart_update', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
        }

        header('Location: /cart');
        exit;
    }

    // Xóa toàn bộ giỏ hàng
    public static function clearCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user']['id'];
            $cartModel = new Cart();

            $cartModel->clearCart($user_id);
            NotificationHelper::success('cart_update', 'Tất cả sản phẩm đã được xóa khỏi giỏ hàng!');
        }

        header('Location: /cart');
        exit;
    }
}
?>
