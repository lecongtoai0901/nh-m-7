<section class="category-products">
    <a href="/products">&laquo; Quay lại tất cả sản phẩm</a>
    
    <?php if ($currentCategory): ?>
        <h2><?= htmlspecialchars($currentCategory->tenloai) ?></h2>
        <?php if (!empty($currentCategory->mota)): ?>
            <p><?= htmlspecialchars($currentCategory->mota) ?></p>
        <?php endif; ?>
    <?php endif; ?>
    
    <div class="products">
        <?php if (empty($products)): ?>
            <p>Chưa có sản phẩm nào trong danh mục này.</p>
        <?php else: ?>
            <?php foreach ($products as $p): ?>
                <article class="product">
                    <div class="product-id">Mã: <?= htmlspecialchars($p->ma_sp) ?></div>
                    <h3><?= htmlspecialchars($p->tensp) ?></h3>
                    <?php if (!empty($p->mota)): ?>
                        <p class="product-desc"><?= htmlspecialchars(substr($p->mota, 0, 100)) ?></p>
                    <?php endif; ?>
                    <p class="product-price">💰 <?= number_format($p->giasp, 0, ',', '.') ?> VND</p>
                    <a href="/product/<?= htmlspecialchars($p->ma_sp) ?>" class="btn btn-small">Chi tiết</a>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
