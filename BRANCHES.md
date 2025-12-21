# Danh sách các nhánh (Branches) trong dự án

Tài liệu này mô tả các nhánh và chức năng tương ứng.

## 🌳 Cấu trúc nhánh

```
main (master)
├── feature/authentication
├── feature/apartment-crud
├── feature/apartment-search
├── feature/database-setup
├── feature/router-system
├── feature/product-management
├── feature/cart-order
└── feature/user-management
```

## 📋 Chi tiết các nhánh

### 1. main / master
**Mô tả**: Nhánh chính, chứa code hoàn chỉnh và ổn định
**Files chính**: Tất cả files của dự án

### 2. feature/authentication
**Mô tả**: Hệ thống đăng nhập và đăng xuất
**Files liên quan**:
- `src/Controller/AuthController.php`
- `src/View/Auth/login.php`
- Routes liên quan trong `index.php`

**Chức năng**:
- Đăng nhập với email/password
- Quản lý session
- Đăng xuất
- Bảo vệ routes

### 3. feature/apartment-crud
**Mô tả**: CRUD (Create, Read, Update, Delete) cho căn hộ
**Files liên quan**:
- `src/Controller/ApartmentController.php`
- `src/Model/Apartment.php`
- `src/View/Apartment/index.php`
- `src/View/Apartment/form.php`

**Chức năng**:
- Xem danh sách căn hộ
- Thêm căn hộ mới
- Sửa thông tin căn hộ
- Xóa căn hộ

### 4. feature/apartment-search
**Mô tả**: Tìm kiếm và lọc căn hộ
**Files liên quan**:
- `src/Controller/ApartmentController.php` (method index với filter)
- `src/View/Apartment/index.php` (form tìm kiếm)

**Chức năng**:
- Tìm kiếm theo tên, tòa nhà, chủ sở hữu
- Lọc theo trạng thái (available, rented, maintenance)
- Hiển thị thống kê

### 5. feature/database-setup
**Mô tả**: Cấu hình và setup database
**Files liên quan**:
- `database/apartment_manager.sql`
- `config/config.php`
- `.env` (nếu có)

**Chức năng**:
- Schema database
- Seed data mẫu
- Cấu hình kết nối

### 6. feature/router-system
**Mô tả**: Hệ thống routing
**Files liên quan**:
- `src/Router.php`
- `index.php` (route definitions)
- `.htaccess`

**Chức năng**:
- Định tuyến URL
- Xử lý HTTP methods
- Dynamic parameters
- 404 handling

### 7. feature/product-management
**Mô tả**: Quản lý sản phẩm nhạc cụ
**Files liên quan**:
- `src/Controller/SanPhamController.php`
- `src/Model/Product.php`
- `src/View/SanPham/sanpham.php`
- `src/View/SanPham/chitiet.php`

**Chức năng**:
- Xem danh sách sản phẩm
- Chi tiết sản phẩm
- Lọc theo loại và nhà sản xuất

### 8. feature/cart-order
**Mô tả**: Giỏ hàng và đơn hàng
**Files liên quan**:
- `src/Controller/DonDatHangController.php`
- `src/Model/DonDatHang.php`
- `src/Model/ChiTietDonDatHang.php`
- `src/View/DonDatHang/giohang.php`

**Chức năng**:
- Thêm sản phẩm vào giỏ
- Xem giỏ hàng
- Thanh toán
- Lịch sử đơn hàng

### 9. feature/user-management
**Mô tả**: Quản lý người dùng
**Files liên quan**:
- `src/Controller/UserController.php`
- `src/Model/NguoiDung.php`
- `src/View/User/thongtin.php`
- `src/View/User/edit.php`

**Chức năng**:
- Đăng ký tài khoản
- Xem thông tin cá nhân
- Sửa thông tin
- Đổi mật khẩu

## 🔄 Workflow làm việc với branches

### Tạo branch mới
```bash
git checkout -b feature/tên-chức-năng
```

### Làm việc trên branch
```bash
# Thêm files
git add .

# Commit
git commit -m "[#issue-number] Mô tả thay đổi"

# Push lên GitHub
git push origin feature/tên-chức-năng
```

### Merge vào main
```bash
git checkout main
git merge feature/tên-chức-năng
git push origin main
```

## 📊 Thống kê branches

| Branch | Files Changed | Commits | Status |
|--------|--------------|---------|--------|
| feature/authentication | ~5 | - | ✅ Ready |
| feature/apartment-crud | ~8 | - | ✅ Ready |
| feature/apartment-search | ~3 | - | ✅ Ready |
| feature/database-setup | ~2 | - | ✅ Ready |
| feature/router-system | ~3 | - | ✅ Ready |
| feature/product-management | ~6 | - | ✅ Ready |
| feature/cart-order | ~7 | - | ✅ Ready |
| feature/user-management | ~5 | - | ✅ Ready |

## 🎯 Mục tiêu

Mỗi branch đại diện cho một chức năng hoàn chỉnh, có thể:
- Test độc lập
- Review riêng biệt
- Merge vào main khi hoàn thành
- Track issues trên Redmine

