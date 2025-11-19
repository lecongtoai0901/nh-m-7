<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$isLocal = getenv('APP_ENV') === 'local';

return [
    'mysql' => [
        'host' => $isLocal ? getenv('MYSQL_HOST') : getenv('MYSQL_HOST_PROD'),
        'database' => $isLocal ? getenv('MYSQL_DB') : getenv('MYSQL_DB_PROD'),
        'user' => $isLocal ? getenv('MYSQL_USER') : getenv('MYSQL_USER_PROD'),
        'pass' => $isLocal ? getenv('MYSQL_PASS') : getenv('MYSQL_PASS_PROD'),
        'charset' => 'utf8mb4',
    ],
    'app' => [
        'base_url' => $isLocal ? getenv('BASE_URL_LOCAL') : getenv('BASE_URL_PROD'),
    ],
];
