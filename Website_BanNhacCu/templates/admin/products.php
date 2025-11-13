<section class="admin-products">
    <h2>📦 Quản lý sản phẩm</h2>
    
    <a href="/admin" class="btn btn-small">&laquo; Quay lại</a>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr><td colspan="5">Chưa có sản phẩm nào</td></tr>
            <?php else: ?>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p->ma_sp) ?></td>
                        <td><?= htmlspecialchars($p->tensp) ?></td>
                        <td><?= number_format($p->giasp, 0, ',', '.') ?> VND</td>
                        <td><?= htmlspecialchars(substr($p->mota ?? '', 0, 50)) ?></td>
                        <td>
                            <a href="/product/<?= htmlspecialchars($p->ma_sp) ?>" class="btn-small">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</section>
