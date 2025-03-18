<?php

namespace App\Models;
use Exception;
class Comment extends BaseModel
{
    protected $table = 'comments';
    protected $id = 'id';

    public function getOneComment($id)
    {
        return $this->getOne($id);
    }

    public function createComment($data)
    {
        return $this->create($data);
    }
    public function updateComment($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteComment($id)
    {
        return $this->delete($id);
    }
    public function getAllCommentByStatus()
    {
        return $this->getAllByStatus();
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
    public function countCommentByProduct()
{
    try {
        $query = "
            SELECT p.name AS product_name, COUNT(c.id) AS total_comments 
            FROM comments c
            JOIN products p ON c.product_id = p.id
            GROUP BY c.product_id, p.name
        ";
        $result = $this->_conn->MySQLi()->query($query);

        if (!$result) {
            throw new Exception("Lỗi truy vấn: " . $this->_conn->MySQLi()->error);
        }

        $comments = [];
        while ($row = $result->fetch_assoc()) {
            $comments[$row['product_name']] = $row['total_comments'];
        }

        return $comments; 
    } catch (Exception $e) {
        throw new Exception("Lỗi khi đếm comment theo sản phẩm: " . $e->getMessage());
    }
}


    public function getCommentsByProductId($productId)
    {
        try {
            $stmt = $this->_conn->MySQLi()->prepare("
                SELECT c.*, u.name, u.username 
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

    public function getAllCommentJoinProductAndUser()
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, products.name AS product_name, customers.username 
            FROM comments 
            INNER JOIN products ON comments.product_id=products.id 
            INNER JOIN customers ON comments.user_id=customers.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneCommentJoinProductAndUser(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, products.name AS product_name, customers.username 
            FROM comments 
            INNER JOIN products ON comments.product_id=products.id 
            INNER JOIN customers ON comments.user_id=customers.id
            WHERE comments.id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function get5CommentNewestByProductAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, customers.name, customers.image 
            FROM comments INNER JOIN 
            customers ON comments.user_id=customers.id 
            WHERE comments.product_id=? 
            AND comments.status=".self::STATUS_ENABLE." 
            ORDER BY date DESC LIMIT 5;";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalComment(){
        return $this->countTotal();
    }



}

