<?php

namespace App\Models;

use Exception;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    public function getAllProduct()
    {
        try {
            return $this->getAll();
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy tất cả sản phẩm: " . $e->getMessage());
        }
    }
    public function getOneProductAdmin($id)
    {
        try {
            return $this->getOne($id);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy tất cả sản phẩm: " . $e->getMessage());
        }
    }
    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.name AS category_name FROM products INNER JOIN categories ON products.category_id=categories.id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductIsFeatured()
    {
        $result = [];
        try {
            $sql = "SELECT p.*, c.name AS category_name 
        FROM products p
        JOIN categories c ON p.category_id = c.id
        WHERE p.category_id = 1 AND p.is_featured = 1;";

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductIsFeaturedV2()
    {
        $result = [];
        try {
            $sql = "SELECT p.*, c.name AS category_name 
        FROM products p
        JOIN categories c ON p.category_id = c.id
        WHERE p.category_id = 3 AND p.is_featured = 1;";

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductIsFeaturedV3()
    {
        $result = [];
        try {
            $sql = "SELECT p.*, c.name AS category_name 
        FROM products p
        JOIN categories c ON p.category_id = c.id
        WHERE p.category_id = 4 AND p.is_featured = 1;";

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneProduct($id)
    {
        try {
            $this->getOneProductByStatus($id);

            // if ($product) {
            //     $product['variants'] = $this->getVariantsByProductId($id);
            //     $product['sizes'] = $this->getVariantOptions($id, 'Size');
            //     $product['flavors'] = $this->getVariantOptions($id, 'Flavor');
            // }

        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy sản phẩm: " . $e->getMessage());
        }
    }

    public function getVariantsByProductId($productId)
    {
        try {
            $stmt = $this->_conn->MySQLi()->prepare("SELECT * FROM products_variant WHERE product_id = ?");
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy biến thể sản phẩm: " . $e->getMessage());
        }
    }


    public function getAllProductByCategoryAndStatus($id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name FROM products 
            INNER JOIN categories ON products.category_id = categories.id 
            WHERE products.status = " . self::STATUS_ENABLE . " 
            AND categories.status = " . self::STATUS_ENABLE . " AND products.category_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy dữ liệu theo category và status: ' . $th->getMessage());
            return $result;
        }
    }


    public function getVariantOptions($productId, $variantType)
    {
        try {
            $stmt = $this->_conn->MySQLi()->prepare("
                SELECT pvo.name 
                FROM products_variant_opt pvo
                JOIN products_variant pv ON pvo.product_variant_id = pv.id
                WHERE pv.product_id = ? AND pv.name = ?
            ");
            $stmt->bind_param("is", $productId, $variantType);
            $stmt->execute();
            return array_column($stmt->get_result()->fetch_all(MYSQLI_ASSOC), 'name');
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy options sản phẩm: " . $e->getMessage());
        }
    }

    public function addComment($userId, $productId, $content)
    {
        try {
            $stmt = $this->_conn->MySQLi()->prepare("INSERT INTO comments (user_id, product_id, content) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $userId, $productId, $content);
            return $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Lỗi khi thêm bình luận: " . $e->getMessage());
        }
    }

    public function getOneProductByStatus($id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name FROM products 
            INNER JOIN categories ON products.category_id = categories.id 
            WHERE products.status = " . self::STATUS_ENABLE . " 
            AND categories.status = " . self::STATUS_ENABLE . " AND products.id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy dữ liệu theo category và status: ' . $th->getMessage());
            return $result;
        }
    }

    // Lấy tất cả comment theo product_id có status = 1
    public function getCommentsByProductAndStatus($product_id)
    {
        try {
            $sql = "SELECT * FROM comments WHERE product_id = ? AND status = 1 ORDER BY created_at DESC";
            $stmt = $this->_conn->MySQLi()->prepare($sql);
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            die("Lỗi truy vấn bình luận: " . $e->getMessage());
        }
    }
    public function getCommentsByProductId($productId)
    {
        try {
            $stmt = $this->_conn->MySQLi()->prepare("
                SELECT c.*, u.name
                FROM comments c
                JOIN users u ON c.user_id = u.id
                WHERE c.product_id = ?
                ORDER BY c.created_at DESC
            ");
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy bình luận: " . $e->getMessage());
        }
    }

    public function createProduct($data)
    {
        try {
            return $this->create($data);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi tạo sản phẩm: " . $e->getMessage());
        }
    }

    public function updateProduct($id, $data)
    {
        try {
            return $this->update($id, $data);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi cập nhật sản phẩm: " . $e->getMessage());
        }
    }

    public function deleteProduct($id)
    {
        try {
            return $this->delete($id);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi xóa sản phẩm: " . $e->getMessage());
        }
    }

    public function getAllProductByStatus()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE status=" . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy sản phẩm theo trạng thái: " . $e->getMessage());
        }
    }

    public function getOneProductByName($name)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $name);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
            return $result;
        }
    }

    public function countTotalProduct()
    {
        try {
            $result = $this->_conn->MySQLi()->query("SELECT COUNT(*) AS total FROM products");
            
            if (!$result) {
                throw new Exception("Lỗi truy vấn: " . $this->_conn->MySQLi()->error);
            }
    
            $row = $result->fetch_assoc();
            
            return is_array($row) ? $row : ['total' => 0]; // Tránh lỗi khi fetch_assoc() trả về null
        } catch (Exception $e) {
            throw new Exception("Lỗi khi đếm tổng sản phẩm: " . $e->getMessage());
        }
    }
    

    public function search($keyword){

        $sql = "SELECT products.*,categories.name AS category_name FROM products INNER JOIN categories ON products.category_id=categories.id
        WHERE products.name REGEXP '$keyword' ";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByIds(array $productIds)
    {
        if (empty($productIds)) {
            return [];
        }
    
        $placeholders = implode(',', array_fill(0, count($productIds), '?'));
        $sql = "SELECT * FROM products WHERE id IN ($placeholders)";
    
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
    
        // Tạo chuỗi kiểu dữ liệu ('i' cho integer)
        $types = str_repeat('i', count($productIds));
    
        // Ràng buộc các tham số động
        $stmt->bind_param($types, ...$productIds);
        $stmt->execute();
        
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    public function sortProducts($option)
    {
        try {
            $orderBy = "price ASC";
            if ($option == 'highToLow') {
                $orderBy = "price DESC";
            } elseif ($option == 'default') {
                $orderBy = "created_at DESC";
            }

            $sql = "SELECT p.*, c.name AS category_name 
                    FROM products p
                    INNER JOIN categories c ON p.category_id = c.id 
                    WHERE p.status = " . self::STATUS_ENABLE . "
                    ORDER BY $orderBy";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi sắp xếp sản phẩm: " . $e->getMessage());
        }
    }
    public function sortProductsAdmin($option)
    {
        try {
            $orderBy = "price ASC";
            if ($option == 'highToLow') {
                $orderBy = "price DESC";
            } elseif ($option == 'default') {
                $orderBy = "created_at DESC";
            }

            $sql = "SELECT p.*, c.name AS category_name 
                    FROM products p
                    INNER JOIN categories c ON p.category_id = c.id 
                    ORDER BY $orderBy";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi sắp xếp sản phẩm: " . $e->getMessage());
        }
    }
}
