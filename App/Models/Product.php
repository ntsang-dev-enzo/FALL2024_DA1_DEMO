<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE status=" . self::STATUS_ENABLE;
            $sql = "SELECT products. * 
        FROM products 
        INNER JOIN categories 
        ON products.category_id=categories.id 
        WHERE products.status=" . self::STATUS_ENABLE . " 
        AND categories.status=" . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
            return $result;
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
    public function countTotalProduct()
    {
        return $this->countTotal();
    }
    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories.name 
            FROM products INNER JOIN categories 
            ON products.category_id=categories.id 
            GROUP BY products.category_id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductByCategoryAndMiniCategoryAndStatus($id)
    {
        $result = [];
        try {
            $sql = "SELECT categories.id 
            AS category_id, categories.name AS category_name,
                mini_categories.id AS mini_category_id,
                mini_categories.name AS mini_category_name 
                FROM categories 
                LEFT JOIN mini_categories ON categories.id = mini_categories.id;";
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
    public function sortProducts($option)
{
    $result = [];
    try {
        $orderBy = 'price ASC'; // Mặc định là sắp xếp giá từ thấp đến cao

        if ($option == 'lowToHigh') {
            $orderBy = 'price ASC'; // Giá thấp đến cao
        } elseif ($option == 'highToLow') {
            $orderBy = 'price DESC'; // Giá cao đến thấp
        } elseif ($option == 'default') {
            // Bạn có thể thêm các tiêu chí mặc định khác nếu cần, ví dụ như theo ngày thêm sản phẩm
            $orderBy = 'created_at DESC'; // Sắp xếp theo ngày thêm (từ mới nhất)
        }

        // Truy vấn sản phẩm và sắp xếp theo tiêu chí
        $sql = "SELECT products.*, categories.name AS category_name 
                FROM products 
                INNER JOIN categories ON products.category_id = categories.id 
                WHERE products.status = " . self::STATUS_ENABLE . " 
                ORDER BY $orderBy";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        error_log('Lỗi khi sắp xếp sản phẩm: ' . $th->getMessage());
        return $result;
    }
}
    
    public function search($keyword){

        $sql = "SELECT products.* , categories.name AS category_name
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
        WHERE products.name REGEXP '$keyword' ";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function asc(){

        $sql = "SELECT products.* , categories.name AS category_name
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
         ORDER BY price ASC";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    }

