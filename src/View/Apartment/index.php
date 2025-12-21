<?php
$baseUrl = $GLOBALS['baseUrl'] ?? '';
?>
<div class="d-flex flex-column gap-3">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <div class="text-muted small">Tổng căn hộ</div>
                    <div class="fs-3 fw-bold"><?php echo $stats['total']; ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <div class="text-muted small">Còn trống</div>
                    <div class="fs-3 fw-bold text-success"><?php echo $stats['available']; ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <div class="text-muted small">Đã thuê</div>
                    <div class="fs-3 fw-bold text-danger"><?php echo $stats['rented']; ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <div class="text-muted small">Bảo trì</div>
                    <div class="fs-3 fw-bold text-warning"><?php echo $stats['maintenance']; ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-shadow border-0">
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Danh sách căn hộ</h5>
                <a class="btn btn-gradient" href="<?php echo $baseUrl; ?>/Apartments/Create">+ Thêm căn hộ</a>
            </div>

            <form class="row g-2 mb-3" method="get" action="<?php echo $baseUrl; ?>/Apartments">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="q" placeholder="Tìm theo tên, tòa nhà, chủ sở hữu..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">Tất cả trạng thái</option>
                        <option value="available" <?php echo ($status ?? '') === 'available' ? 'selected' : ''; ?>>Còn trống</option>
                        <option value="rented" <?php echo ($status ?? '') === 'rented' ? 'selected' : ''; ?>>Đã thuê</option>
                        <option value="maintenance" <?php echo ($status ?? '') === 'maintenance' ? 'selected' : ''; ?>>Bảo trì</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-dark flex-grow-1" type="submit">Lọc</button>
                    <a class="btn btn-outline-secondary" href="<?php echo $baseUrl; ?>/Apartments">Reset</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Căn hộ</th>
                            <th>Tòa/Tầng</th>
                            <th>Phòng ngủ</th>
                            <th>Diện tích</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Chủ sở hữu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($apartments)): ?>
                            <tr><td colspan="9" class="text-center text-muted py-4">Chưa có dữ liệu.</td></tr>
                        <?php else: ?>
                            <?php foreach ($apartments as $apt): ?>
                                <tr>
                                    <td class="fw-semibold">#<?php echo $apt->id; ?></td>
                                    <td>
                                        <div class="fw-semibold"><?php echo htmlspecialchars($apt->name ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                        <div class="text-muted small">Ghi chú: <?php echo htmlspecialchars($apt->note ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                    </td>
                                    <td><?php echo htmlspecialchars($apt->building ?? '', ENT_QUOTES, 'UTF-8'); ?> / <?php echo (int)$apt->floor; ?></td>
                                    <td><?php echo (int)$apt->bedrooms; ?> PN / <?php echo (int)$apt->bathrooms; ?> PT</td>
                                    <td><?php echo (int)$apt->area; ?> m²</td>
                                    <td class="fw-bold text-primary"><?php echo number_format((float)$apt->price, 0, ',', '.'); ?> đ</td>
                                    <td>
                                        <?php
                                            $class = $apt->status === 'available' ? 'status-available' : ($apt->status === 'rented' ? 'status-rented' : 'status-maintenance');
                                            $label = $apt->status === 'available' ? 'Còn trống' : ($apt->status === 'rented' ? 'Đã thuê' : 'Bảo trì');
                                        ?>
                                        <span class="status-pill <?php echo $class; ?>"><?php echo $label; ?></span>
                                    </td>
                                    <td>
                                        <div class="fw-semibold"><?php echo htmlspecialchars($apt->owner_name ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                        <div class="text-muted small"><?php echo htmlspecialchars($apt->owner_phone ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-sm btn-outline-primary" href="<?php echo $baseUrl; ?>/Apartments/Edit?id=<?php echo $apt->id; ?>">Sửa</a>
                                            <form method="post" action="<?php echo $baseUrl; ?>/Apartments/Delete" onsubmit="return confirm('Xóa căn hộ này?');">
                                                <input type="hidden" name="id" value="<?php echo $apt->id; ?>">
                                                <button class="btn btn-sm btn-outline-danger" type="submit">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

