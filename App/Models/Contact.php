<?php

namespace App\Models;

class Contact extends BaseModel
{
    protected $table = 'contact';
    protected $id = 'id';

    public function getAllContact()
    {
        return $this->getAll();
    }
    // public function getOneContact()
    // {
    //     return $this->getOne();
    // }

    public function createContact($data)
    {
        return $this->create($data);
    }
    // public function createContact($email)
    // {
    //     return $this->create($email);
    // }
    //  public function updateProduct($id, $data)
    //  {
    //      return $this->update($id, $data);
    //  }

    // public function deleteProduct($id)
    // {
    //     return $this->delete($id);

    // }

    public function search($keyword) {
        // Escape keyword to prevent SQL Injection
        $keyword = $this->_conn->MySQLi()->real_escape_string($keyword);
    
        // SQL query để chỉ lấy các cột cần thiết
        $sql = "SELECT * FROM contact
                WHERE contact.phone REGEXP '$keyword' 
                   OR contact.email REGEXP '$keyword'";
    
        // Thực thi query
        $result = $this->_conn->MySQLi()->query($sql);
    
        // Kiểm tra kết quả và trả về
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // Xử lý lỗi (tuỳ chọn)
            return [];
        }
    }
    
}
    ?>