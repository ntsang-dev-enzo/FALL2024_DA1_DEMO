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
        ON products.idcategory=categories.id 
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
            $sql = "SELECT * FROM $this->table WHERE productname=?";
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
            $sql = "SELECT products.*,categories.name AS category_name FROM products INNER JOIN categories ON products.idcategory=categories.id;";
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
            INNER JOIN categories ON products.idcategory = categories.id 
            WHERE products.status = " . self::STATUS_ENABLE . " 
            AND categories.status = " . self::STATUS_ENABLE . " AND products.idcategory=?";
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
            INNER JOIN categories ON products.idcategory = categories.id 
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
    public function countTotalProduct(){
        return $this->countTotal();
    }
    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories.name 
            FROM products INNER JOIN categories 
            ON products.idcategory=categories.id 
            GROUP BY products.idcategory;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
