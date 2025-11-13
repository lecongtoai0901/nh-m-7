<?php
// Simple MS SQL connection test script
// Usage (PowerShell):
// $env:MSSQL_HOST='ZyuukiMusicStore.mssql.somee.com'; $env:MSSQL_USER='Zyuuki_SQLLogin_1'; $env:MSSQL_PASS='!Zyuuki213'; php .\scripts\test_mssql.php

$config = require __DIR__ . '/../config/config.php';
$m = $config['mssql'];

echo "Testing MS SQL connection to {$m['host']}:{$m['port']} (DB={$m['database']})\n";

// Try PDO (pdo_sqlsrv)
$dsn = "sqlsrv:Server={$m['host']},{$m['port']};Database={$m['database']}";
try {
    $pdo = new PDO($dsn, $m['user'], $m['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "PDO (sqlsrv) connection successful.\n";
    // simple query
    $stmt = $pdo->query('SELECT TOP 1 name FROM sys.databases');
    $row = $stmt->fetch(PDO::FETCH_NUM);
    if ($row) echo "Sample query OK (found database name: {$row[0]}).\n";
} catch (PDOException $e) {
    echo "PDO (sqlsrv) connection failed: " . $e->getMessage() . "\n";
}

// Try sqlsrv extension if available
if (function_exists('sqlsrv_connect')) {
    $server = $m['host'] . "," . $m['port'];
    $connInfo = [
        'UID' => $m['user'],
        'PWD' => $m['pass'],
        'Database' => $m['database'],
        'CharacterSet' => 'UTF-8'
    ];
    $conn = @sqlsrv_connect($server, $connInfo);
    if ($conn) {
        echo "sqlsrv extension connection successful.\n";
        sqlsrv_close($conn);
    } else {
        echo "sqlsrv extension connection failed.\n";
        if (function_exists('sqlsrv_errors')) print_r(sqlsrv_errors());
    }
} else {
    echo "sqlsrv extension not installed/enabled in PHP.\n";
}

echo "Done.\n";
