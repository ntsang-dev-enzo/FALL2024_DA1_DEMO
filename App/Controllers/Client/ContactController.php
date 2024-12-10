<?php
namespace App\Controllers\Client;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Views\Client\Pages\Contact\Index;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Validations\ContactValidation;
use App\Models\Contact;

class ContactController{
    public static function index()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render();
        Footer::render();

    }
    public static function addcontact ()
    {
       
            //validation các trường dữ liệu
            $is_valid = ContactValidation::create();
            if (!$is_valid) {
                NotificationHelper::error('store', 'Thêm sản phẩm thất bại!');
                header('location: /admin/products/create');
                exit;
            }
            // echo 'ucii';
            //kiểm tra tên sp tồn tại chưa, không được trùng
            $customer_id = $_SESSION["user"];
            $data = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'title' => $_POST['title'],
                'message' => $_POST['message'],
                'customer_id' => $customer_id['id'],


                // 'discount_price' => $_POST['discount_price'],
                // 'description' => $_POST['description'],
                // 'is_featured' => $_POST['is_featured'],
                // 'category_id' => $_POST['category_id'],
                // 'author' => $_POST['author'],
                // 'publisher' => $_POST['publisher'],
                // 'cover' => $_POST['cover'],
                // 'supplier' => $_POST['supplier'],
                // 'status' => $_POST['status'],
            ];
            
            $contact = new Contact();
            $is_exist = $contact->createContact($data);
            if (!$is_exist) {
                NotificationHelper::error('store', 'Gửi form liên hệ thất bại');
                header('location: /contact');
                exit;
            }
            else{
                NotificationHelper::success('store', 'Gửi liên hệ thành công');
                header('location: /contact');
            }
            
    
    }
}