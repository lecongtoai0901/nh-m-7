<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\CartController;
use App\Controller\AuthController;
use App\Controller\CheckoutController;
use App\Controller\AdminController;

$router = new Router();

// Home
$router->add('GET', '/', function () {
    $controller = new HomeController();
    return $controller->index();
});

// Products
$router->add('GET', '/products', function () {
    $controller = new ProductController();
    return $controller->index();
});

$router->add('GET', '/product/:id', function ($params) {
    $controller = new ProductController();
    return $controller->show($params);
});

$router->add('GET', '/category/:category', function ($params) {
    $controller = new ProductController();
    return $controller->byCategory($params);
});

// Cart
$router->add('GET', '/cart', function () {
    $controller = new CartController();
    return $controller->view();
});

$router->add('POST', '/cart/add', function ($params) {
    $controller = new CartController();
    header('Content-Type: application/json');
    return $controller->add($params);
});

$router->add('POST', '/cart/remove', function ($params) {
    $controller = new CartController();
    return $controller->remove($params);
});

$router->add('POST', '/cart/update', function ($params) {
    $controller = new CartController();
    return $controller->update($params);
});

// Auth
$router->add('GET', '/register', function () {
    $controller = new AuthController();
    return $controller->showRegister();
});

$router->add('POST', '/register', function () {
    $controller = new AuthController();
    return $controller->register();
});

$router->add('GET', '/login', function () {
    $controller = new AuthController();
    return $controller->showLogin();
});

$router->add('POST', '/login', function () {
    $controller = new AuthController();
    return $controller->login();
});

$router->add('GET', '/logout', function () {
    $controller = new AuthController();
    return $controller->logout();
});

// Checkout / Orders
$router->add('POST', '/checkout', function () {
    $controller = new CheckoutController();
    return $controller->checkout();
});

$router->add('GET', '/orders', function () {
    $controller = new CheckoutController();
    return $controller->orders();
});

$router->add('GET', '/order/:id', function ($params) {
    $controller = new CheckoutController();
    return $controller->orderDetail($params);
});

// Admin
$router->add('GET', '/admin', function () {
    $controller = new AdminController();
    return $controller->dashboard();
});

$router->add('GET', '/admin/products', function () {
    $controller = new AdminController();
    return $controller->products();
});

$router->add('GET', '/admin/orders', function () {
    $controller = new AdminController();
    return $controller->orders();
});

// Dispatch
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($path, PHP_URL_PATH);

echo $router->dispatch($method, $path);
