<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

$config = require __DIR__ . '/../config/config.php';
$db = $config['mysql'];

$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset={$db['charset']}";

global $isConnected;
$isConnected = false;
try {
    global $pdo;
    $pdo = new PDO($dsn, $db['user'], $db['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $isConnected = true;
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage() . "\n";
}

?>