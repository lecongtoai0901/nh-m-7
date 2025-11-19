<?php
    $config = require __DIR__ . '/scripts/connection.php';

    if(isset($isConnected) && $isConnected) {
        require __DIR__ . '/templates/home.php';
    } else {
        echo "<br/>Kết nối MySQL thất bại từ index.php\n";
    }
?>