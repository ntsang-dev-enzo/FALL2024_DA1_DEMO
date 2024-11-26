<?php

use App\Helpers\AuthHelper;
use App\Models\Database;
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

require_once 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Route;

// Tạo đối tượng Dotenv và chỉ định thư mục chứa tệp .env
$dotenv =  Dotenv::createImmutable(paths: __DIR__);/* Dotenv::createImmutable(__DIR__); */
$echo=$dotenv->load();
// if ($echo){
//     echo "<p> ok</p>";
// }
// $db = new Database();
// $conn = $db->MySQLi();
// if ($conn) {
//     $echo= "Kết nối MySQLi thành công!";
// }


// In ra đối tượng Dotenv để kiểm tra
// var_dump($echo);
require_once 'config.php';
AuthHelper::middleware();

// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/cart', 'App\Controllers\Client\ProductController@cart');
Route::get('/products/categories/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');
Route::get('/checkout', 'App\Controllers\Client\ProductController@checkout');


// blog
Route::get('/blogs', 'App\Controllers\Client\BlogsController@index');

// contact
Route::get('/contact', 'App\Controllers\Client\ContactController@index');


Route::post('/comments', 'App\Controllers\Client\CommentController@store');
Route::put('/comments/{id}', 'App\Controllers\Client\CommentController@update');
Route::delete('/comments/{id}', 'App\Controllers\Client\CommentController@delete');


Route::get('/login', 'App\Controllers\Client\AuthController@login');
Route::post('/loginform', 'App\Controllers\Client\AuthController@loginAction');
Route::get('/register', 'App\Controllers\Client\AuthController@register');
Route::post('/registerform', 'App\Controllers\Client\AuthController@registerAction');
Route::get('/logout', 'App\Controllers\Client\AuthController@logout');
Route::get('/users/{id}', 'App\Controllers\Client\AuthController@edit');
Route::put('/users/{id}', 'App\Controllers\Client\AuthController@update');
Route::get('/change-password', 'App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password', 'App\Controllers\Client\AuthController@changePasswordAction');
Route::get('/forgot-password', 'App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password', 'App\Controllers\Client\AuthController@forgotPasswordAction');
Route::get('/reset-password', 'App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password', 'App\Controllers\Client\AuthController@resetPasswordAction');




// *** Admin
Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');
//  *** Product
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');
// user
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');
// comment
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');
Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');

Route::dispatch($_SERVER['REQUEST_URI']);
