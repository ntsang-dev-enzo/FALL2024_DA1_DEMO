<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;

use App\Views\Admin\Pages\Contact\Index;
use App\Models\Contact;

class ContactController
{


    // hiển thị danh sách
    public static function index()
{
    $Contact = new Contact();
    $data = $Contact->getAllContact();
    // var_dump($data);
    // die();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data); // Truyền dữ liệu vào view
    Footer::render();
}

public static function search() {
    // Lấy từ khóa từ $_GET, xử lý dữ liệu nhập
    $keyword = $_GET['keyword'] ?? '';
    $keyword = trim($keyword);

    if (empty($keyword)){
        $_SESSION['keyword'] = null;
        
        $contact = new Contact();
        $data = $contact->getAllContact();
        Header::render();
        Index::render($data);
        Footer::render();
        return ;
}

    // Lưu từ khóa vào session
    $_SESSION['keyword'] = $keyword;

    // Thực hiện tìm kiếm
    $contact = new Contact();
    $data = $contact->search($keyword);

    // Hiển thị giao diện với kết quả
    Header::render();
    Index::render($data);
    Footer::render();
}


}