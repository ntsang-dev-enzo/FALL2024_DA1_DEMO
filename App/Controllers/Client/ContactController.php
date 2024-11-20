<?php
namespace App\Controllers\Client;
use App\Helpers\AuthHelper;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Views\Client\Pages\Contact\Index;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
class ContactController{
    public static function index()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render();
        Footer::render();
    }
}