<section class="auth-form">
    <h2>Đăng nhập</h2>
    
    <form method="POST" action="/login">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="matkhau">Mật khẩu:</label>
            <input type="password" id="matkhau" name="matkhau" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
    
    <p>Chưa có tài khoản? <a href="/register">Đăng ký ngay</a></p>
</section>
