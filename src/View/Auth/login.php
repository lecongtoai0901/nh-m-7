<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-3 text-center">Đăng nhập</h4>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <form method="post" action="<?php echo $baseUrl; ?>/Login">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="admin@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" required placeholder="123456">
                    </div>
                    <button class="btn btn-gradient w-100" type="submit">Đăng nhập</button>
                </form>
                <p class="mt-3 text-muted small mb-0">
                    Tài khoản mẫu: admin@example.com / 123456
                </p>
            </div>
        </div>
    </div>
</div>

