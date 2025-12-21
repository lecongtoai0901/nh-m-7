# Hệ thống Quản lý Căn hộ - MQHouse

Dự án báo cáo môn **Mã nguồn mở** - Hệ thống quản lý căn hộ và bán nhạc cụ

## 📋 Mô tả dự án

Hệ thống web quản lý căn hộ với các chức năng:
- Quản lý căn hộ (CRUD)
- Tìm kiếm và lọc căn hộ
- Hệ thống đăng nhập/đăng xuất
- Quản lý sản phẩm nhạc cụ
- Giỏ hàng và đơn hàng

## 🛠️ Công nghệ sử dụng

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Architecture**: MVC Pattern
- **Dependencies**: Composer, PHP Dotenv

## 📁 Cấu trúc dự án

```
PHP-Projects/
├── config/          # Cấu hình database và môi trường
├── database/        # File SQL và migration
├── src/
│   ├── Controller/  # Các controller xử lý logic
│   ├── Model/      # Các model tương tác database
│   ├── View/       # Các view template
│   └── Router.php  # Hệ thống routing
├── templates/       # Layout templates
├── assets/         # CSS, JS, images
└── index.php       # Entry point
```

## 🌿 Các nhánh (Branches)

Dự án được tổ chức theo từng chức năng:

1. **main/master** - Nhánh chính, chứa code hoàn chỉnh
2. **feature/authentication** - Hệ thống đăng nhập/đăng xuất
3. **feature/apartment-crud** - CRUD căn hộ (Create, Read, Update, Delete)
4. **feature/apartment-search** - Tìm kiếm và lọc căn hộ
5. **feature/database-setup** - Cấu hình và migration database
6. **feature/router-system** - Hệ thống routing
7. **feature/product-management** - Quản lý sản phẩm nhạc cụ
8. **feature/cart-order** - Giỏ hàng và đơn hàng
9. **feature/user-management** - Quản lý người dùng

## 🚀 Cài đặt

### Yêu cầu hệ thống

- PHP 7.4 trở lên
- MySQL 5.7 trở lên
- Apache với mod_rewrite
- Composer

### Các bước cài đặt

1. **Clone repository**
```bash
git clone https://github.com/lecongtoai0901/nh-m-7.git
cd nh-m-7
```

2. **Cài đặt dependencies**
```bash
composer install
```

3. **Cấu hình database**
- Tạo file `.env` từ `.env.example` (nếu có)
- Hoặc chỉnh sửa `config/config.php` với thông tin database của bạn
- Import database từ `database/apartment_manager.sql`

4. **Cấu hình web server**
- Đảm bảo `.htaccess` được bật
- Trỏ DocumentRoot đến thư mục dự án

5. **Truy cập ứng dụng**
```
http://localhost/[đường-dẫn]/PHP-Projects/
```

## 🔐 Thông tin đăng nhập

**Quản trị viên:**
- Email: `admin@example.com`
- Password: `123456`

## 📝 Sử dụng Git và Redmine

### Workflow với Git

1. **Tạo branch mới cho feature**
```bash
git checkout -b feature/tên-chức-năng
```

2. **Commit và push**
```bash
git add .
git commit -m "Mô tả thay đổi"
git push origin feature/tên-chức-năng
```

3. **Merge vào main** (khi hoàn thành)
```bash
git checkout main
git merge feature/tên-chức-năng
git push origin main
```

### Tích hợp Redmine

Dự án sử dụng Redmine để theo dõi issues và bugs:

1. Tạo issue trên Redmine cho mỗi feature/bug
2. Commit message nên tham chiếu issue: `[#123] Mô tả thay đổi`
3. Redmine sẽ tự động cập nhật khi push code

## 🧪 Kiểm tra lỗi

### Sử dụng Redmine

1. Đăng nhập vào Redmine
2. Tạo issue mới cho mỗi bug phát hiện
3. Gán label và priority phù hợp
4. Theo dõi và cập nhật trạng thái

### Debug mode

Thêm `?debug=1` vào URL để xem thông tin debug:
```
http://localhost/.../PHP-Projects/?debug=1
```

## 📊 Các chức năng chính

### 1. Quản lý Căn hộ
- Xem danh sách căn hộ
- Thêm căn hộ mới
- Sửa thông tin căn hộ
- Xóa căn hộ
- Tìm kiếm và lọc theo trạng thái

### 2. Đăng nhập/Đăng xuất
- Đăng nhập với email và password
- Quản lý session
- Bảo vệ routes yêu cầu đăng nhập

### 3. Quản lý Sản phẩm
- Xem danh sách sản phẩm
- Chi tiết sản phẩm
- Lọc theo loại và nhà sản xuất

### 4. Giỏ hàng và Đơn hàng
- Thêm sản phẩm vào giỏ
- Xem giỏ hàng
- Thanh toán đơn hàng
- Lịch sử đơn hàng

## 👥 Tác giả

- **Lê Công Toại** - [lecongtoai0901](https://github.com/lecongtoai0901)

## 📄 License

Dự án này được tạo cho mục đích học tập và báo cáo môn Mã nguồn mở.

## 🔗 Liên kết

- Repository: https://github.com/lecongtoai0901/nh-m-7
- Redmine: [URL Redmine của bạn]

---

**Lưu ý**: Đây là dự án báo cáo môn học, các thông tin đăng nhập và cấu hình chỉ dùng cho môi trường development.
