<section class="auth-form">
    <h2>Đăng ký</h2>
    
    <form method="POST" action="/register">
        <div class="form-group">
            <label for="tennd">Tên đầy đủ:</label>
            <input type="text" id="tennd" name="tennd" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="matkhau">Mật khẩu:</label>
            <input type="password" id="matkhau" name="matkhau" required>
        </div>
        
        <div class="form-group">
            <label for="matkhau2">Nhập lại mật khẩu:</label>
            <input type="password" id="matkhau2" name="matkhau2" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
    
    <p>Đã có tài khoản? <a href="/login">Đăng nhập</a></p>
</section>
