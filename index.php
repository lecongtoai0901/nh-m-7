<?php
    $config = require __DIR__ . '/scripts/connection.php';

    if(isset($isConnected) && $isConnected) {
        require __DIR__ . '/templates/home.php';
        $sql = 'SELECT * FROM `nguoi_dung`';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            echo "Mã: " . $row['ma_nd'] . " - Tên: " . $row['tennd'] . " - Email: " . $row['email'] . "<br/>";
        }
    } else {
        echo "<br/>Kết nối cơ sở dữ liệu thất bại!!!\n";
    }
?>
