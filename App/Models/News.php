<?php

namespace App\Models;

class News extends BaseModel
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




    public function search($keyword){

        $sql = "SELECT products.* , categories.name AS category_name
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
        WHERE products.name REGEXP '$keyword' ";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    }

