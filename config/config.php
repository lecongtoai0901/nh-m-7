<?php
$appEnv = $_ENV['APP_ENV'] ?? $_SERVER['APP_ENV'] ?? getenv('APP_ENV');
$isLocal = $appEnv === 'local';
$hostLocal = $_ENV['MYSQL_HOST'] ?? $_SERVER['MYSQL_HOST'] ?? getenv('MYSQL_HOST');
$hostProd = $_ENV['MYSQL_HOST_PROD'] ?? $_SERVER['MYSQL_HOST_PROD'] ?? getenv('MYSQL_HOST_PROD');
return [
    'mysql' => [
        'host' => $isLocal ? $hostLocal : $hostProd,
        'dbname' => $isLocal 
            ? ($_ENV['MYSQL_DB'] ?? '') 
            : ($_ENV['MYSQL_DB_PROD'] ?? ''),
        'user' => $isLocal 
            ? ($_ENV['MYSQL_USER'] ?? '')
            : ($_ENV['MYSQL_USER_PROD'] ?? ''), 
        'pass' => $isLocal 
            ? ($_ENV['MYSQL_PASS'] ?? '') 
            : ($_ENV['MYSQL_PASS_PROD'] ?? ''),
        'charset' => $isLocal
            ? ($_ENV['MYSQL_CHARSET_LOCAL'] ?? 'utf8mb4')
            : ($_ENV['MYSQL_CHARSET_PROD'] ?? 'utf8'),
        ],
    'app' => [
        'base_url' => $isLocal ? ($_ENV['BASE_URL_LOCAL'] ?? '') : ($_ENV['BASE_URL_PROD'] ?? ''),
    ],
];
