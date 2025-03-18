<?php
namespace App\Models;

class Cart extends BaseModel {
    protected $table = "cart";

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($user_id, $product_id, $quantity, $price) {
        $result = false;
        try {
            $sql = "INSERT INTO $this->table (user_id, product_id, quantity, price) 
                    VALUES (?, ?, ?, ?) 
                    ON DUPLICATE KEY UPDATE quantity = quantity + ?";
    
            $conn = $this->_conn->MySQLi(); 
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiiii", $user_id, $product_id, $quantity, $price, $quantity);
            $result = $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm vào giỏ hàng: ' . $th->getMessage());
        }
        return $result;
    }
    public function getCartByUserId($user_id) {
        $result = [];
        try {
            $sql = "SELECT * FROM cart WHERE user_id = ?";
    
            $conn = $this->_conn->MySQLi(); 
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy giỏ hàng của user: ' . $th->getMessage());
        }
        return $result;
    }
    
    public function clearSelectedCartItems($user_id, $selected_products) {
        try {
            if (empty($selected_products)) {
                return; 
            }

            $placeholders = implode(',', array_fill(0, count($selected_products), '?'));
            $sql = "DELETE FROM cart WHERE user_id = ? AND product_id IN ($placeholders)";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $types = str_repeat('i', count($selected_products) + 1);
            $params = array_merge([$user_id], $selected_products);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi xóa sản phẩm khỏi giỏ hàng: ' . $th->getMessage());
        }
    }
    
    
    public function getCartItems($user_id) {
        $result = [];
        try {
            $sql = "SELECT c.id, c.product_id, p.name, p.image, c.quantity, c.price, (c.quantity * c.price) AS total
                    FROM cart c
                    LEFT JOIN products p ON c.product_id = p.id
                    WHERE c.user_id = ? AND p.id IS NOT NULL"; 
            
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            // var_dump($result);
            // die;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy giỏ hàng: ' . $th->getMessage());
        }
        return $result;
    }
    

    public function updateCartItem($user_id, $product_id, $quantity) {
        $result = false;
        try {
            $sql = "UPDATE $this->table SET quantity = ? WHERE user_id = ? AND product_id = ?";
            
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $quantity, $user_id, $product_id);
            $result = $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật số lượng sản phẩm: ' . $th->getMessage());
        }
        return $result;
    }

    public function removeFromCart($user_id, $product_id) {
        $result = false;
        try {
            $sql = "DELETE FROM $this->table WHERE user_id = ? AND product_id = ?";
            
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $user_id, $product_id);
            $result = $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi xóa sản phẩm khỏi giỏ hàng: ' . $th->getMessage());
        }
        return $result;
    }

    public function clearCart($user_id) {
        $result = false;
        try {
            $sql = "DELETE FROM $this->table WHERE user_id = ?";
            
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $result = $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi xóa toàn bộ giỏ hàng: ' . $th->getMessage());
        }
        return $result;
    }

    public function getCartTotal($user_id) {
        $total = 0;
        try {
            $sql = "SELECT SUM(quantity * price) AS total FROM $this->table WHERE user_id = ?";
            
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            $total = $result['total'] ?? 0;
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy tổng giá trị giỏ hàng: ' . $th->getMessage());
        }
        return $total;
    }
}
?>
