<section class="product-detail">
    <a href="/products">&laquo; Quay lại danh sách</a>
    
    <div class="product-info">
        <h2><?= htmlspecialchars($product->tensp) ?></h2>
        <p class="product-id">Mã: <?= htmlspecialchars($product->ma_sp) ?></p>
        
        <p class="price">Giá: <strong><?= number_format($product->giasp, 0, ',', '.') ?> VND</strong></p>
        
        <?php if (!empty($product->mota)): ?>
            <p class="description"><?= htmlspecialchars($product->mota) ?></p>
        <?php endif; ?>
        
        <form method="POST" action="/cart/add" class="add-to-cart-form">
            <input type="hidden" name="ma_sp" value="<?= htmlspecialchars($product->ma_sp) ?>">
            <label for="soluong">Số lượng:</label>
            <input type="number" id="soluong" name="soluong" min="1" value="1" required>
            <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
        </form>
    </div>
</section>
