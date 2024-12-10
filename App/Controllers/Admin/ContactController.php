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

}