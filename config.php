<?php
// Basic PDO connection settings for the apartment manager app
$DB_HOST = 'localhost';
$DB_NAME = 'apartment_manager';
$DB_USER = 'root';
$DB_PASS = '';

$dsnBase = "mysql:host=$DB_HOST;charset=utf8mb4";
$dsnDb   = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    // First connect without selecting DB to ensure it exists
    $pdo = new PDO($dsnBase, $DB_USER, $DB_PASS, $options);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$DB_NAME` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    // Reconnect using the target DB
    $pdo = new PDO($dsnDb, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    exit('Database connection failed: ' . $e->getMessage());
}

