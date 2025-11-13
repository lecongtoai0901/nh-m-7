<section class="products-page">
    <div class="products-header">
        <h2>Tất cả sản phẩm</h2>
        <?php if (!empty($categories)): ?>
            <div class="categories">
                <a href="/products" class="cat-link">Tất cả</a>
                <?php foreach ($categories as $cat): ?>
                    <a href="/category/<?= htmlspecialchars($cat->ma_loai) ?>" class="cat-link">
                        <?= htmlspecialchars($cat->tenloai) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="products">
        <?php if (empty($products)): ?>
            <p>Chưa có sản phẩm nào.</p>
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
