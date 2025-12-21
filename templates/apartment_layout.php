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
    <title><?php echo isset($title) ? htmlspecialchars($title) : 'MQHouse'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f3f4f6; }
        .navbar { background: #1f2937; }
        .navbar-brand, .nav-link, .navbar-brand:hover, .nav-link:hover { color: #fff !important; }
        .nav-link.active { font-weight: 700; }
        .btn-gradient { background: linear-gradient(135deg, #6366f1, #8b5cf6); color: #fff; border: none; }
        .btn-gradient:hover { opacity: 0.92; color: #fff; }
        .card-shadow { box-shadow: 0 10px 40px rgba(0,0,0,0.08); }
        .status-pill { display:inline-block; padding:6px 12px; border-radius:999px; font-size:12px; font-weight:600; }
        .status-available { background:#dcfce7; color:#166534; }
        .status-rented { background:#fee2e2; color:#991b1b; }
        .status-maintenance { background:#fef3c7; color:#92400e; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?php echo $baseUrl; ?>/Apartments">MQHouse</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] ?? '') === "$baseUrl/Apartments" ? 'active' : ''; ?>" href="<?php echo $baseUrl; ?>/Apartments">Danh sách</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $baseUrl; ?>/Apartments/Create">Thêm căn hộ</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mb-5">
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success shadow-sm"><?php echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger shadow-sm"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php echo $content ?? ''; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

