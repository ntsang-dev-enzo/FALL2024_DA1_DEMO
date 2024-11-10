<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class User extends BaseModel
{
    protected $table = 'customers';
    protected $id = 'id';

    public function getAllUser()
    {
        return $this->getAll();
    }
    public function getOneUser($id)
    {
        return $this->getOne($id);
    }

    public function createUser($data)
    {
        return $this->create($data);
    }
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
    public function getAllUserByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getOneUserByUsername( string $username)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM customers WHERE username=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function updateUserByUsernameAndEmail( array $data)
    {
        try {
            $username=$data['username'];
            $email=$data['email'];
            $password=$data['password'];
            $sql = "UPDATE $this->table SET password='$password' WHERE username ='$username' AND email='$email' ";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
             $stmt->execute();
            // trả về số hàng dữ liệu bị ảnh hươnghr
            return $stmt->affected_rows;
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            NotificationHelper::error('updateUserByUsernameAndEmail','Lỗi khi thực hiện nhập dữ liệu!');
            return false;
        }
    }
    public function countTotalUser(){
        return $this->countTotal();
    }
}
