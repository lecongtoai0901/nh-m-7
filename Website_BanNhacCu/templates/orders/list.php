<section class="orders">
    <h2>Đơn hàng của tôi</h2>
    
    <?php if (empty($orders)): ?>
        <p>Bạn chưa có đơn hàng nào.</p>
        <a href="/products" class="btn btn-primary">Mua sắm ngay</a>
    <?php else: ?>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Ngày đặt</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order->ma_ddh) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($order->ngaydat)) ?></td>
                        <td><?= htmlspecialchars(substr($order->diachi, 0, 30)) ?>...</td>
                        <td><?= number_format($order->tongtien, 0, ',', '.') ?> VND</td>
                        <td>
                            <span class="status status-<?= strtolower(str_replace(' ', '-', $order->trangthai)) ?>">
                                <?= htmlspecialchars($order->trangthai) ?>
                            </span>
                        </td>
                        <td>
                            <a href="/order/<?= htmlspecialchars($order->ma_ddh) ?>" class="btn-small">Chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>
