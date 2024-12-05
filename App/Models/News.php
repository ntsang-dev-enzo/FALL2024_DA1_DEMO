<?php

namespace App\Models;

class news extends BaseModel
{
    protected $table = 'news';
    protected $id = 'id';

    public function getAllNew()
    {
        return $this->getAll();
    }
    public function getOneNew($id)
    {
        return $this->getOne($id);
    }

    public function createNew($data)
    {
        return $this->create($data);
    }
    public function updateNew($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteNew($id)
    {
        return $this->delete($id);
    }

    public function getOneNewsByName($name)
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
            error_log('Lỗi khi lấy loại sản phẩm bằng tên: ' . $th->getMessage());
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
    }

