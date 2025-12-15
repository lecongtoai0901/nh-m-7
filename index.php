<?php
require __DIR__ . '/config.php';

// Ensure the table exists; keeps first run simple for students
$pdo->exec(
    "CREATE TABLE IF NOT EXISTS apartments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        address VARCHAR(255) NOT NULL,
        area INT NOT NULL,
        price DECIMAL(12,2) NOT NULL,
        available TINYINT(1) NOT NULL DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
);

$errors   = [];
$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'add';

    if ($action === 'add') {
        $name      = trim((string)($_POST['name'] ?? ''));
        $address   = trim((string)($_POST['address'] ?? ''));
        $area      = filter_var($_POST['area'] ?? null, FILTER_VALIDATE_INT);
        $price     = filter_var($_POST['price'] ?? null, FILTER_VALIDATE_FLOAT);
        $available = isset($_POST['available']) ? 1 : 0;

        if ($name === '' || $address === '' || $area === false || $price === false) {
            $errors[] = 'Vui lòng nhập đầy đủ và hợp lệ.';
        } else {
            $stmt = $pdo->prepare(
                'INSERT INTO apartments (name, address, area, price, available) VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->execute([$name, $address, $area, $price, $available]);
            $messages[] = 'Thêm căn hộ thành công.';
        }
    }

    if ($action === 'delete') {
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        if ($id === false) {
            $errors[] = 'Mã căn hộ không hợp lệ.';
        } else {
            $stmt = $pdo->prepare('DELETE FROM apartments WHERE id = ?');
            $stmt->execute([$id]);
            $messages[] = 'Đã xóa căn hộ.';
        }
    }
}

$apartments = $pdo
    ->query('SELECT id, name, address, area, price, available, created_at FROM apartments ORDER BY created_at DESC')
    ->fetchAll();
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQHouse - Quản lý căn hộ</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 24px; background: #f7f7f7; }
        h1 { margin-bottom: 12px; }
        .container { max-width: 960px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); }
        form { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; margin-bottom: 16px; }
        label { display: flex; flex-direction: column; font-size: 14px; color: #333; }
        input[type="text"], input[type="number"] { padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .actions { display: flex; align-items: center; gap: 12px; }
        button { padding: 10px 14px; border: none; border-radius: 4px; background: #0d6efd; color: #fff; cursor: pointer; }
        button.delete { background: #dc3545; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th, td { padding: 10px; border-bottom: 1px solid #eee; text-align: left; }
        .pill { display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 12px; color: #fff; }
        .pill.on { background: #28a745; }
        .pill.off { background: #6c757d; }
        .messages { margin-bottom: 12px; color: #155724; }
        .errors { margin-bottom: 12px; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h1> Quản lý căn hộ</h1>

        <?php if ($messages): ?>
            <div class="messages">
                <?php foreach ($messages as $msg): ?>
                    <div><?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="errors">
                <?php foreach ($errors as $err): ?>
                    <div><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h3>Thêm căn hộ</h3>
        <form method="post" action="">
            <input type="hidden" name="action" value="add">
            <label>
                Tên căn hộ
                <input type="text" name="name" required>
            </label>
            <label>
                Địa chỉ
                <input type="text" name="address" required>
            </label>
            <label>
                Diện tích (m²)
                <input type="number" name="area" min="10" step="1" required>
            </label>
            <label>
                Giá (VNĐ)
                <input type="number" name="price" min="0" step="0.01" required>
            </label>
            <label style="flex-direction:row;align-items:center;gap:6px;">
                <input type="checkbox" name="available" checked> Còn trống
            </label>
            <div class="actions">
                <button type="submit">Lưu</button>
            </div>
        </form>

        <h3>Danh sách căn hộ</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Diện tích (m²)</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!$apartments): ?>
                <tr><td colspan="7">Chưa có căn hộ.</td></tr>
            <?php else: ?>
                <?php foreach ($apartments as $apt): ?>
                    <tr>
                        <td><?php echo (int)$apt['id']; ?></td>
                        <td><?php echo htmlspecialchars($apt['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($apt['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo (int)$apt['area']; ?></td>
                        <td><?php echo number_format((float)$apt['price'], 0, ',', '.'); ?></td>
                        <td>
                            <span class="pill <?php echo $apt['available'] ? 'on' : 'off'; ?>">
                                <?php echo $apt['available'] ? 'Còn trống' : 'Hết chỗ'; ?>
                            </span>
                        </td>
                        <td>
                            <form method="post" action="" onsubmit="return confirm('Xóa căn hộ này?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo (int)$apt['id']; ?>">
                                <button type="submit" class="delete">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

