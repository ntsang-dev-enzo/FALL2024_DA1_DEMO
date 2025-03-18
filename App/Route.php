<?php

namespace App;

class Route
{

    private static $routes = [];
    public static function get($url, $controllerMethod)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            self::$routes[$url] = $controllerMethod;
    }
    public static function post($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'POST')
                self::$routes[$url] = $controllerMethod;
    }
    public static function put($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'PUT')
                self::$routes[$url] = $controllerMethod;
    }
    public static function delete($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'DELETE')
                self::$routes[$url] = $controllerMethod;
    }

    public static function dispatch($uri)
{
    if ($uri !== '/') {
        $uri = explode('?', $uri)[0]; // Loại bỏ query string
        $uri = rtrim($uri, '/'); // Xóa dấu `/` cuối cùng nếu có
    }

    // Kiểm tra route cố định trước
    if (array_key_exists($uri, self::$routes)) {
        list($controller, $method) = explode("@", self::$routes[$uri]);
        $controllerInstance = new $controller();
        return $controllerInstance->$method();
    }

    // Xử lý route có một hoặc hai tham số động
    $uriParts = explode('/', trim($uri, '/'));
    $countParts = count($uriParts);

    foreach (self::$routes as $route => $controllerMethod) {
        $routeParts = explode('/', trim($route, '/'));
        
        if (count($routeParts) === $countParts) {
            $params = [];
            $match = true;

            foreach ($routeParts as $index => $part) {
                if (strpos($part, '{') === 0 && strpos($part, '}') === strlen($part) - 1) {
                    $params[] = $uriParts[$index]; // Lưu tham số động
                } elseif ($part !== $uriParts[$index]) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                list($controller, $method) = explode("@", $controllerMethod);
                $controllerInstance = new $controller();
                return call_user_func_array([$controllerInstance, $method], $params);
            }
        }
    }

    // Route không hợp lệ
    header('Location:/page404');
}

}
