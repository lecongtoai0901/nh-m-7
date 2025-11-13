
# Website_BanNhacCu

Đồ án: Website bán nhạc cụ (PHP)

Hướng dẫn nhanh để chạy local:

1. Mở terminal ở thư mục project (root).
2. (Tùy chọn) Chạy `composer install` nếu có sử dụng thư viện.
3. Chạy PHP built-in server:

```powershell
php -S localhost:8000 -t public
```

4. Mở trình duyệt: http://localhost:8000

Ghi chú:
- Cấu hình kết nối CSDL chỉnh trong `config/config.php`.
- Sau khi chỉnh `composer.json`, chạy `composer dump-autoload` để autoload hoạt động.
- Tiếp theo có thể thêm migration, seed, hệ thống đăng nhập, giỏ hàng, trang quản trị.

## Kết nối MS SQL (Somee)

Một sốe cung cấp MS SQL Server (ví dụ như trong ảnh). Để kết nối từ PHP bạn cần 2 thứ chính:

1. Driver PHP cho SQL Server (Microsoft Drivers for PHP for SQL Server): `pdo_sqlsrv` hoặc `sqlsrv`.
	- Trên Windows, tải driver phù hợp với phiên bản PHP (x64/x86, thread-safe/non-thread-safe) từ Microsoft.
	- Bật extension trong `php.ini`, ví dụ: `extension=php_pdo_sqlsrv.dll` hoặc `extension=php_sqlsrv.dll`.
	- Khởi động lại web server / PHP.

2. Thông tin kết nối (ví dụ từ trang somee):
	- Server/host: `ZyuukiMusicStore.mssql.somee.com`
	- Database: `ZyuukiMusicStore`
	- Username: `Zyuuki_SQLLogin_1`
	- Password: (mật khẩu bạn đặt; khuyến nghị đặt trong biến môi trường `MSSQL_PASS`)
	- Port: `1433` (mặc định)

Tôi đã thêm cấu hình MSSQL vào `config/config.php` để đọc từ biến môi trường (nếu có) hoặc dùng giá trị mặc định. Trường hợp bạn muốn thử ngay, tạo các biến môi trường trong Windows PowerShell như sau (thay giá trị thật):

```powershell
$env:MSSQL_HOST = 'ZyuukiMusicStore.mssql.somee.com'
$env:MSSQL_PORT = '1433'
$env:MSSQL_DB   = 'ZyuukiMusicStore'
$env:MSSQL_USER = 'Zyuuki_SQLLogin_1'
$env:MSSQL_PASS = '!Zyuuki213'  # keep this secret; don't commit
```

Sau đó chạy script kiểm tra kết nối tạo ở `scripts/test_mssql.php`:

```powershell
php .\scripts\test_mssql.php
```

Nếu bạn gặp lỗi liên quan đến driver, kiểm tra `php -m` có hiển thị `pdo_sqlsrv` hoặc `sqlsrv` không và kiểm tra `php.ini` đã bật extension đúng file chưa.

Nếu muốn, tôi có thể:
- thêm script chạy tự động bằng Composer
- tạo migration/seed cho database
- hoặc giúp bạn thiết lập biến môi trường an toàn

An toàn: bạn vừa gửi mật khẩu trong hội thoại; nếu muốn lưu vào project, hãy dùng file `.env` (không commit) hoặc biến môi trường.
