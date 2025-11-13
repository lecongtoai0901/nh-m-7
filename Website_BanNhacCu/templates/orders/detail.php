<section class="order-detail">
    <a href="/orders">&laquo; Quay lại danh sách đơn hàng</a>
    
    <div class="order-info">
        <h2>Thông tin đơn hàng #<?= htmlspecialchars($order->ma_ddh) ?></h2>
        
        <div class="info-group">
            <p><strong>Ngày đặt:</strong> <?= date('d/m/Y H:i', strtotime($order->ngaydat)) ?></p>
            <p><strong>Địa chỉ giao:</strong> <?= htmlspecialchars($order->diachi) ?></p>
            <p><strong>Tổng tiền:</strong> <?= number_format($order->tongtien, 0, ',', '.') ?> VND</p>
            <p><strong>Trạng thái:</strong> <span class="status"><?= htmlspecialchars($order->trangthai) ?></span></p>
            <p><strong>Thanh toán:</strong> <span class="status"><?= htmlspecialchars($order->tt_thanhtoan) ?></span></p>
        </div>
    </div>
</section>
