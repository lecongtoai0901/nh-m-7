<section class="cart">
    <h2>Giỏ hàng</h2>

    <?php if (empty($cart)): ?>
        <p>Giỏ hàng trống.</p>
        <a href="/products" class="btn btn-primary">Tiếp tục mua sắm</a>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td>
                            <a href="/product/<?= htmlspecialchars($item['ma_sp']) ?>">
                                <?= htmlspecialchars($item['tensp']) ?>
                            </a>
                        </td>
                        <td><?= number_format($item['gia'], 0, ',', '.') ?> VND</td>
                        <td>
                            <form method="POST" action="/cart/update" class="inline-form">
                                <input type="hidden" name="ma_sp" value="<?= htmlspecialchars($item['ma_sp']) ?>">
                                <input type="number" name="soluong" min="1" value="<?= $item['soluong'] ?>" class="qty-input">
                                <button type="submit" class="btn-small">Cập nhật</button>
                            </form>
                        </td>
                        <td><?= number_format($item['gia'] * $item['soluong'], 0, ',', '.') ?> VND</td>
                        <td>
                            <form method="POST" action="/cart/remove" class="inline-form">
                                <input type="hidden" name="ma_sp" value="<?= htmlspecialchars($item['ma_sp']) ?>">
                                <button type="submit" class="btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <h3>Tổng cộng: <?= number_format($total, 0, ',', '.') ?> VND</h3>
            
            <?php if (isset($_SESSION['user'])): ?>
                <form method="POST" action="/checkout" class="checkout-form">
                    <label for="diachi">Địa chỉ giao hàng:</label>
                    <input type="text" id="diachi" name="diachi" required placeholder="Nhập địa chỉ giao hàng">
                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                </form>
            <?php else: ?>
                <p><a href="/login" class="btn btn-primary">Đăng nhập để thanh toán</a></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
