# Website_BanNhacCu

Đồ án: Website bán nhạc cụ (PHP MVC)

## Tính năng

✅ Hiển thị danh sách sản phẩm và chi tiết  
✅ Quản lý danh mục sản phẩm  
✅ Giỏ hàng (session-based)  
✅ Đăng ký / Đăng nhập user  
✅ Đặt hàng  
✅ Quản trị (Admin) - xem sản phẩm, đơn hàng  
✅ Kết nối MSSQL (Somee)  

## Cách chạy

### 1. Chuẩn bị
- PHP 7.4+ với driver MSSQL (`pdo_sqlsrv`)
- SQL Server (ví dụ: Somee.com)
- Composer (tuỳ chọn)

### 2. Chạy server

```powershell
# Mở terminal ở thư mục project
cd g:\Deadline\Đồ Án TH_LTWEB\Website_BanNhacCu

# Chạy server
php -S localhost:8000 -t public
```

### 3. Truy cập
Mở trình duyệt: **http://localhost:8000**

## Cấu hình MSSQL

### Chuẩn bị
1. **Cài driver PHP cho SQL Server:**
   - Tải từ: [Microsoft Drivers for PHP for SQL Server](https://github.com/microsoft/msphpsql)
   - Chọn version phù hợp với PHP (x64/x86, thread-safe)
   - Giải nén vào thư mục extension của PHP

2. **Bật extension trong `php.ini`:**
   ```ini
   extension=php_pdo_sqlsrv.dll
   ; hoặc
   extension=php_sqlsrv.dll
   ```

3. **Kiểm tra driver đã bật:**
   ```powershell
   php -m | findstr sqlsrv
   ```

### Thiết lập biến môi trường (Windows PowerShell)

```powershell
$env:MSSQL_HOST = 'ZyuukiMusicStore.mssql.somee.com'
$env:MSSQL_PORT = '1433'
$env:MSSQL_DB   = 'ZyuukiMusicStore'
$env:MSSQL_USER = 'Zyuuki_SQLLogin_1'
$env:MSSQL_PASS = '!Zyuuki213'
```

### Test kết nối

```powershell
php .\scripts\test_mssql.php
```

### Cấu hình mặc định

File `config/config.php` chứa thông tin kết nối. Nếu không thiết lập biến môi trường, sẽ dùng:
- Host: `ZyuukiMusicStore.mssql.somee.com`
- Port: `1433`
- Database: `ZyuukiMusicStore`
- Username: `Zyuuki_SQLLogin_1`
- Password: `!Zyuuki213`

## Cấu trúc thư mục

```
Website_BanNhacCu/
├── public/
│   ├── index.php (Front controller)
│   └── ...
├── src/
│   ├── Router.php (Định tuyến)
│   ├── Database.php (Kết nối CSDL)
│   ├── Controller/ (ProductController, CartController, AuthController, etc.)
│   └── Model/ (Product, Category, User, Cart, Order)
├── templates/
│   ├── layout.php (Master layout)
│   ├── home.php
│   ├── products/ (index, show, category)
│   ├── cart/ (view)
│   ├── auth/ (login, register)
│   ├── orders/ (list, detail)
│   └── admin/ (dashboard, products, orders)
├── assets/
│   ├── css/style.css
│   ├── js/
│   └── images/
├── config/config.php (Cấu hình)
├── database/ (migrations, seeds)
├── scripts/ (test_mssql.php)
├── storage/ (logs, uploads)
├── composer.json
└── README.md
```

## Các tuyến đường (Route)

| Route | Mô tả |
|-------|-------|
| `/` | Trang chủ |
| `/products` | Danh sách sản phẩm |
| `/product/:id` | Chi tiết sản phẩm |
| `/category/:category` | Sản phẩm theo loại |
| `/cart` | Giỏ hàng |
| `/cart/add` | Thêm vào giỏ (POST) |
| `/cart/remove` | Xóa khỏi giỏ (POST) |
| `/cart/update` | Cập nhật số lượng (POST) |
| `/register` | Đăng ký |
| `/login` | Đăng nhập |
| `/logout` | Đăng xuất |
| `/checkout` | Thanh toán (POST) |
| `/orders` | Danh sách đơn hàng |
| `/order/:id` | Chi tiết đơn hàng |
| `/admin` | Trang quản trị |
| `/admin/products` | Quản lý sản phẩm |
| `/admin/orders` | Quản lý đơn hàng |

## Tài khoản test

Chưa có account sẵn - bạn cần đăng ký:
- Email: `test@example.com`
- Mật khẩu: `123456`

## Dữ liệu mẫu

Nếu cơ sở dữ liệu trống, ứng dụng sẽ hiển thị dữ liệu mẫu. Để thêm dữ liệu thực, hãy chạy SQL migration từ `database/migrations/`.

## Ghi chú bảo mật

⚠️ **Không commit mật khẩu vào Git!** Hãy sử dụng:
- Biến môi trường (.env hoặc system env)
- Hoặc thêm `config/config.php` vào `.gitignore`

## Mở rộng tính năng

- Thêm upload hình ảnh sản phẩm
- Thanh toán (PayPal, Stripe)
- Email notification
- API REST
- Dashboard quản trị đầy đủ

## Trợ giúp

Nếu gặp lỗi:
1. Kiểm tra `config/config.php` có đúng thông tin DB không
2. Chạy `scripts/test_mssql.php` để test kết nối
3. Xem file log trong `storage/logs/`
