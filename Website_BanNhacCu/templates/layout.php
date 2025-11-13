<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Shop Nhạc Cụ - Mua Bán Nhạc Cụ Chính Hãng</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header>
    <div class="header-container">
        <div class="logo">
            <h1><a href="/">🎵 Shop Nhạc Cụ</a></h1>
        </div>
        <nav class="main-nav">
            <a href="/products">Sản phẩm</a>
            <a href="/cart">🛒 Giỏ hàng</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="/orders">Đơn hàng</a>
                <?php if ($_SESSION['user']->ma_vt === 'ADM'): ?>
                    <a href="/admin">⚙️ Quản trị</a>
                <?php endif; ?>
                <a href="/logout">Đăng xuất (<?= htmlspecialchars($_SESSION['user']->tennd) ?>)</a>
            <?php else: ?>
                <a href="/login">Đăng nhập</a>
                <a href="/register">Đăng ký</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            ✓ <?= htmlspecialchars($_SESSION['success']) ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-error">
            ✗ <?= htmlspecialchars($_SESSION['error']) ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($content)) echo $content; ?>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> Shop Nhạc Cụ - Mua bán nhạc cụ chính hãng</p>
</footer>
</body>
</html>
