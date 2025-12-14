<?php
    if (!defined('APP_RUNNING')) {
    header('Location: /home');
    exit;
    }
    use \App\Model\LoaiSanPham;
    use \App\Model\NhaSanXuat;
    $pdo = require __DIR__ . '/../config/config.php';
    $DsLoai = LoaiSanPham::getAll($pdo);
    $DsNSX = NhaSanXuat::getAll($pdo);
    $baseUrl = $GLOBALS['baseUrl'] ?? '';
?>
<div class="container-fluid mt-3 mb-5">
    <div class="row gx-4">
        <aside class="col-12 col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Danh mục sản phẩm</h5>
                    <hr />
                    <h6 class="text-muted">Loại sản phẩm</h6>
                    <?php if (isset($DsLoai) && $DsLoai != null): ?>
                        <div class="list-group mb-3">
                            <?php foreach ($DsLoai as $loai): ?>
                                <a class="list-group-item list-group-item-action" href="<?=$baseUrl?>/SanPham/LocLoai?maloai=<?= htmlspecialchars($loai->ma_loai) ?>"><?= htmlspecialchars($loai->tenloai) ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <h6 class="text-muted">Nhà sản xuất</h6>
                    <?php if (isset($DsNSX) && $DsNSX != null): ?>
                        <div class="list-group">
                            <?php foreach ($DsNSX as $nsx): ?>
                                <a class="list-group-item list-group-item-action" href="<?=$baseUrl?>/SanPham/LocNSX?mansx=<?= htmlspecialchars($nsx->ma_nsx) ?>"><?= htmlspecialchars($nsx->tennsx) ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </aside>

        <section class="col-12 col-md-9">
            <main role="main">
                <?php if (isset($content)) echo $content; ?>
            </main>
        </section>
    </div>
</div>