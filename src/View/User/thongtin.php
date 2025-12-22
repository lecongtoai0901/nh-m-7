<?php
    $baseUrl = $GLOBALS['baseUrl'] ?? '';
    if (empty($_SESSION['user'])) {
        header('Location: ' . $baseUrl . '/');
        exit;
    }
?>

<div class="row">
    <div class="col-12">
        <h3 class="mb-4 text-uppercase"><i class="bi bi-info-circle"></i> Thông tin tài khoản</h3>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="card user-card shadow-sm">
            <div class="card-body text-center">
                <?php $avatar = $nguoidung->hinh ? ($baseUrl . '/assets/images/anhnd/' . $nguoidung->hinh) : ($baseUrl . '/assets/images/anhnd/default.png'); ?>
                <img src="<?= htmlspecialchars($avatar) ?>" alt="Avatar" class="rounded-circle mb-3" style="width:120px;height:120px;object-fit:cover;">
                <h5 class="card-title mb-1"><?= htmlspecialchars($nguoidung->tennd) ?></h5>
                <p class="text-muted small mb-0"><?= htmlspecialchars($nguoidung->email) ?></p>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="<?= $baseUrl ?>/User/Edit?id=<?= $nguoidung->ma_nd ?>" class="btn btn-outline-primary btn-sm me-2">Chỉnh sửa</a>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-sm-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3 mt-1">Hồ sơ khách hàng</h5>
                <div class="row">
                    <div class="col-sm-6 mb-2"><strong>Họ & tên:</strong><br><?= htmlspecialchars($nguoidung->tennd) ?></div>
                    <div class="col-sm-6 mb-2"><strong>Số điện thoại:</strong><br><?= htmlspecialchars($nguoidung->sdt ?: '-'); ?></div>
                    <div class="col-sm-6 mb-2"><strong>Email:</strong><br><?= htmlspecialchars($nguoidung->email) ?></div>
                    <div class="col-sm-6 mb-2"><strong>Địa chỉ:</strong><br><?= htmlspecialchars($nguoidung->diachi ?: '-'); ?></div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Tài khoản #: <?= htmlspecialchars($nguoidung->ma_nd) ?></small>
                </div>
            </div>
        </div>
    </div>
</div>