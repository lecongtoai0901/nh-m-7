<?php
    $config = require __DIR__ . '/scripts/connection.php';

    if(isset($isConnected) && $isConnected) {
        require __DIR__ . '/templates/home.php';
        $sql = 'SELECT * FROM `nguoidung`';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    } else {
        echo "<br/>Kết nối MySQL thất bại từ index.php\n";
    }
?>
