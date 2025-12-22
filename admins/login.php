<?php
namespace Admin;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Nếu đã đăng nhập → chuyển về trang chính
if (!empty($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
    } else {
        try {
            $pdo = require __DIR__ . '/../config/config.php';

            $sql = "SELECT ma_nv, tennv, matkhau, email, ma_vt 
                    FROM nhan_vien 
                    WHERE tennv = :u OR email = :u 
                    LIMIT 1";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([':u' => $username]);

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user) {
                $hashed = $user['matkhau'];

                $isCorrect = false;

                // Kiểm tra dạng password_hash
                if (password_verify($password, $hashed)) {
                    $isCorrect = true;
                }
                // Kiểm tra mật khẩu thường (dành cho DB cũ chưa mã hóa)
                elseif ($password === $hashed) {
                    $isCorrect = true;
                }

                if ($isCorrect) {
                    $_SESSION['admin'] = [
                        'ma_nv'  => $user['ma_nv'],
                        'tennv'  => $user['tennv'],
                        'email'  => $user['email'] ?? '',
                        'ma_vt'  => $user['ma_vt'] ?? ''
                    ];

                    header('Location: index.php');
                    exit;
                }
            }

            $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
        } catch (\Throwable $e) {
            $error = 'Lỗi hệ thống. Vui lòng thử lại.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f7f7;
            padding: 40px;
        }
        .login {
            max-width: 360px;
            margin: 0 auto;
            padding: 28px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .error {
            color: #b00;
            margin-bottom: 12px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="login shadow p-4 rounded-4">
        <div class="text-center mb-4">
            <img src="./resources/images/logo.png" alt="Logo" style="max-width:150px;">
        </div>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <label for="username">Tên đăng nhập hoặc Email</label>
            <input type="text" id="username" name="username"
                   class="form-control mb-3"
                   value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                   required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control mb-1" required>

            <div class="form-check mb-3">
                <input type="checkbox" id="show_password" class="form-check-input"
                       onclick="document.getElementById('password').type = this.checked ? 'text' : 'password';">
                <label for="show_password" class="form-check-label">Hiển thị mật khẩu</label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>
</html>
