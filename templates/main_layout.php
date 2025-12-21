<?php
if (!defined('APP_RUNNING')) {
    header('Location: /');
    exit;
}
$baseUrl = $GLOBALS['baseUrl'] ?? '';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MQHouse - Quản lý căn hộ</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <?php $cssPath = __DIR__ . '/../assets/css/style.css';
        $cssVersion = file_exists($cssPath) ? filemtime($cssPath) : time(); ?>
    <?php if (file_exists($cssPath)): ?>
        <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css?v=<?= $cssVersion ?>">
    <?php endif; ?>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f5f6fa; }
        .navbar { background: #1f2937; }
        .navbar-brand, .nav-link { color: #fff !important; }
        .nav-link.active { font-weight: 700; }
        .btn-gradient { background: linear-gradient(135deg, #6366f1, #8b5cf6); color: #fff; border: none; }
        .btn-gradient:hover { opacity: .92; color: #fff; }
        footer { background: #0f172a; color: #e5e7eb; }
    </style>
</head>

<body class="d-flex flex-column" style="min-height: 100vh;">

<header>
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand me-3 fw-bold" href="<?=$baseUrl?>/">MQHouse</a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a href="<?=$baseUrl?>/" class="nav-link">Danh sách căn hộ</a></li>
                    <li class="nav-item mx-2"><a href="<?=$baseUrl?>/Apartments/Create" class="nav-link">Thêm căn hộ</a></li>
                </ul>

                <div class="d-flex align-items-center gap-3 flex-column flex-lg-row">
                    <div class="d-none d-xl-block text-end lh-1 text-white-50">
                        <small style="font-size: 0.75rem;">Hotline hỗ trợ</small><br>
                        <span class="fw-bold text-white">0869 347 040</span>
                    </div>
                    <a class="btn btn-gradient rounded-pill px-4" href="<?=$baseUrl?>/Apartments/Create">
                        + Thêm căn hộ
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="flex-grow-1">
    <main role="main" class="container py-4">
        <?php if (isset($content)) echo $content; ?>
        <?php if (!isset($content)): ?>
            <div class="alert alert-info text-center">
                <h3>KHÔNG TÌM THẤY NỘI DUNG PHÙ HỢP!</h3>
            </div>
        <?php endif; ?>
    </main>
</div>

<footer class="pt-4 pb-3 mt-4">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <div class="fw-bold">MQHouse</div>
            <div class="small text-white-50">Quản lý căn hộ đơn giản và trực quan.</div>
        </div>
        <div class="text-white-50 small">Hotline: 0869 347 040</div>
    </div>
</footer>

<?php $jsPath = __DIR__ . '/../assets/js/script.js';
    $jsVersion = file_exists($jsPath) ? filemtime($jsPath) : time(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php if (file_exists($jsPath)): ?>
<script src="<?= $baseUrl ?>/assets/js/script.js?v=<?= $jsVersion ?>"></script>
<?php endif; ?>
</body>
</html>

