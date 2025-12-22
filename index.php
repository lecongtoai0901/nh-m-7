<?php

define('APP_RUNNING', true);

require_once __DIR__ . '/vendor/autoload.php';
session_start();

use App\Router;
use App\Controller\ApartmentController;
use App\Controller\AuthController;

$router = new Router();

global $baseUrl;
// Tự động detect base URL từ REQUEST_URI
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Tìm phần path chứa 'PHP-Projects'
$pathParts = array_filter(explode('/', trim($requestPath, '/')));
$baseParts = [];
$foundProject = false;

foreach ($pathParts as $part) {
    $decoded = urldecode($part);
    $baseParts[] = $part;
    if (strpos($decoded, 'PHP-Projects') !== false || $part === 'PHP-Projects') {
        $foundProject = true;
        break;
    }
}

if ($foundProject && !empty($baseParts)) {
    $baseUrl = '/' . implode('/', $baseParts);
} else {
    // Fallback: dùng SCRIPT_NAME
    $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php');
    $baseUrl = $scriptDir !== '/' ? rtrim($scriptDir, '/') : '';
}
// HOME -> chuyển sang trang căn hộ
$router->add('GET', "$baseUrl/", function ()  {
    $controller = new ApartmentController();
    return $controller->index();
});

$router->add('GET', "$baseUrl/Login", function () {
    $c = new AuthController();
    return $c->showLogin();
});
$router->add('POST', "$baseUrl/Login", function () {
    $c = new AuthController();
    return $c->login();
});
$router->add('GET', "$baseUrl/Logout", function () {
    $c = new AuthController();
    return $c->logout();
});

// APARTMENT ROUTES
$router->add('GET', "$baseUrl/Apartments", function () {
    $c = new ApartmentController();
    return $c->index();
});
$router->add('GET', "$baseUrl/Apartments/Create", function () {
    $c = new ApartmentController();
    return $c->create();
});
$router->add('POST', "$baseUrl/Apartments/Store", function () {
    $c = new ApartmentController();
    return $c->store();
});
$router->add('GET', "$baseUrl/Apartments/Edit", function () {
    $c = new ApartmentController();
    return $c->edit();
});
$router->add('POST', "$baseUrl/Apartments/Update", function () {
    $c = new ApartmentController();
    return $c->update();
});
$router->add('POST', "$baseUrl/Apartments/Delete", function () {
    $c = new ApartmentController();
    return $c->delete();
});




$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($path, PHP_URL_PATH);

// Debug mode - bỏ comment để xem thông tin debug
$debug = isset($_GET['debug']) && $_GET['debug'] === '1';
if ($debug) {
    echo "<h2>Debug Information</h2>";
    echo "<pre>";
    echo "Base URL: " . $baseUrl . "\n";
    echo "Request Path: " . $path . "\n";
    echo "Script Name: " . ($_SERVER['SCRIPT_NAME'] ?? 'N/A') . "\n";
    echo "Method: " . $method . "\n\n";
    echo "Registered Routes:\n";
    $reflection = new ReflectionClass($router);
    $routesProperty = $reflection->getProperty('routes');
    $routesProperty->setAccessible(true);
    $routes = $routesProperty->getValue($router);
    foreach ($routes as $r) {
        echo "  [" . $r['method'] . "] " . $r['path'] . "\n";
    }
    echo "</pre><hr>";
}

echo $router->dispatch($method, $path);