<?php
$baseUrl = $GLOBALS['baseUrl'] ?? '';
$isEdit = ($action ?? '') === 'update';
?>

<div class="card card-shadow border-0">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><?php echo $isEdit ? 'Sửa căn hộ' : 'Thêm căn hộ'; ?></h5>
            <a class="btn btn-outline-secondary" href="<?php echo $baseUrl; ?>/Apartments">← Quay lại</a>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $err): ?>
                        <li><?php echo htmlspecialchars($err); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo $isEdit ? $baseUrl . '/Apartments/Update' : $baseUrl . '/Apartments/Store'; ?>">
            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?php echo (int)$apartment->id; ?>">
            <?php endif; ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên căn hộ</label>
                    <input type="text" class="form-control" name="name" required value="<?php echo htmlspecialchars($apartment->name ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tòa</label>
                    <input type="text" class="form-control" name="building" required value="<?php echo htmlspecialchars($apartment->building ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tầng</label>
                    <input type="number" class="form-control" name="floor" min="1" required value="<?php echo htmlspecialchars($apartment->floor ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Phòng ngủ</label>
                    <input type="number" class="form-control" name="bedrooms" min="0" required value="<?php echo htmlspecialchars($apartment->bedrooms ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Phòng tắm</label>
                    <input type="number" class="form-control" name="bathrooms" min="0" required value="<?php echo htmlspecialchars($apartment->bathrooms ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Diện tích (m²)</label>
                    <input type="number" class="form-control" name="area" min="1" required value="<?php echo htmlspecialchars($apartment->area ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Giá (VNĐ)</label>
                    <input type="number" class="form-control" name="price" min="1" required value="<?php echo htmlspecialchars($apartment->price ?? ''); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Trạng thái</label>
                    <select class="form-select" name="status">
                        <?php
                            $status = $apartment->status ?? 'available';
                        ?>
                        <option value="available" <?php echo $status === 'available' ? 'selected' : ''; ?>>Còn trống</option>
                        <option value="rented" <?php echo $status === 'rented' ? 'selected' : ''; ?>>Đã thuê</option>
                        <option value="maintenance" <?php echo $status === 'maintenance' ? 'selected' : ''; ?>>Bảo trì</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Chủ sở hữu</label>
                    <input type="text" class="form-control" name="owner_name" value="<?php echo htmlspecialchars($apartment->owner_name ?? ''); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">SĐT chủ sở hữu</label>
                    <input type="text" class="form-control" name="owner_phone" value="<?php echo htmlspecialchars($apartment->owner_phone ?? ''); ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Ghi chú</label>
                    <textarea class="form-control" name="note" rows="3"><?php echo htmlspecialchars($apartment->note ?? ''); ?></textarea>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-gradient px-4" type="submit"><?php echo $isEdit ? 'Cập nhật' : 'Lưu'; ?></button>
                <a class="btn btn-outline-secondary ms-2" href="<?php echo $baseUrl; ?>/Apartments">Hủy</a>
            </div>
        </form>
    </div>
</div>

