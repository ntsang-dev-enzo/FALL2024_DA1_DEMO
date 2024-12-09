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
    public function createUserAdmin(array $userData)
    {
        try {
            // Câu lệnh SQL để thêm người dùng
            $sql = "INSERT INTO users (username, email, name, password, image, status) 
                    VALUES (?, ?, ?, ?, ?, ?)";

            // Kết nối với MySQLi
            $conn = $this->_conn->MySQLi();
            
            // Chuẩn bị câu lệnh
            $stmt = $conn->prepare($sql);
            
            // Ràng buộc các tham số (chuẩn bị cho câu lệnh SQL)
            $stmt->bind_param(
                'sssssi', 
                $userData['username'], 
                $userData['email'], 
                $userData['name'], 
                $userData['password'], 
                $userData['image'], 
                $userData['status']
            );
            
            // Thực thi câu lệnh
            if ($stmt->execute()) {
                return true; // Trả về true nếu thêm thành công
            } else {
                return false; // Trả về false nếu có lỗi
            }
        } catch (\Throwable $th) {
            // Xử lý lỗi
            error_log('Lỗi khi thêm người dùng: ' . $th->getMessage());
            return false;
        }
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
    public function search($keyword){

        $sql = "SELECT customers.* 
        FROM customers
        WHERE customers.phone REGEXP '$keyword' OR customers.email  REGEXP '$keyword' ";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
