# 🎯 BẮT ĐẦU TỪ ĐÂY - Hướng dẫn từng bước

## 📋 Tổng quan các bước

1. ✅ **Setup Git và tạo branches** (Bạn đang ở đây)
2. ⏭️ **Kiểm tra trên GitHub**
3. ⏭️ **Setup Redmine**
4. ⏭️ **Tạo Issues trên Redmine**
5. ⏭️ **Bắt đầu làm việc trên từng branch**

---

## 🚀 BƯỚC 1: Setup Git và tạo branches

### 📍 Cách mở PowerShell/CMD

**Cách nhanh nhất:**
1. Mở **File Explorer** (Windows + E)
2. Đi đến: `C:\wamp64\www\Mã nguồn mở\PHP-Projects`
3. Click vào **thanh địa chỉ** (address bar) ở trên cùng
4. Gõ: `powershell` và nhấn **Enter**

**Hoặc:**
- Click chuột phải vào thư mục → **Open PowerShell window here** (Windows 10)
- Click chuột phải → **Open in Terminal** (Windows 11)

> 💡 Xem chi tiết trong file `HUONG_DAN_MO_CMD.md`

---

### Cách 1: Chạy script tự động (Khuyến nghị)

Mở **PowerShell** trong thư mục dự án và chạy:

```powershell
.\setup_project.ps1
```

Script sẽ tự động:
- ✅ Khởi tạo Git (nếu chưa có)
- ✅ Thêm remote GitHub
- ✅ Commit tất cả code vào nhánh `main`
- ✅ Tạo 8 feature branches
- ✅ Push tất cả lên GitHub

### Cách 2: Làm thủ công

Nếu script không chạy được, làm theo các bước sau:

```powershell
# 1. Khởi tạo Git
git init

# 2. SỬA REMOTE URL (QUAN TRỌNG!)
# Nếu remote đã tồn tại nhưng sai URL, sửa lại:
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git

# Hoặc nếu chưa có remote:
# git remote add origin https://github.com/lecongtoai0901/nh-m-7.git

# Kiểm tra remote URL đã đúng chưa:
git remote -v
# Phải hiển thị: origin  https://github.com/lecongtoai0901/nh-m-7.git

# 3. Tạo nhánh main và commit (nếu chưa có)
git checkout -b main
git add .
git commit -m "Initial commit: Setup project structure"
git push -u origin main

# 4. Tạo các feature branches
git checkout -b feature/authentication
git push -u origin feature/authentication

git checkout -b feature/apartment-crud
git push -u origin feature/apartment-crud

git checkout -b feature/apartment-search
git push -u origin feature/apartment-search

git checkout -b feature/database-setup
git push -u origin feature/database-setup

git checkout -b feature/router-system
git push -u origin feature/router-system

git checkout -b feature/product-management
git push -u origin feature/product-management

git checkout -b feature/cart-order
git push -u origin feature/cart-order

git checkout -b feature/user-management
git push -u origin feature/user-management

# 5. Quay lại main
git checkout main
```

---

## ✅ BƯỚC 2: Kiểm tra trên GitHub

1. Truy cập: **https://github.com/lecongtoai0901/nh-m-7**

2. Kiểm tra:
   - ✅ Có nhánh `main` với code đầy đủ
   - ✅ Có 8 feature branches
   - ✅ Tất cả files đã được push lên

3. Click vào từng branch để xem code

---

## 🔧 BƯỚC 3: Setup Redmine

### 3.1. Tạo Project trên Redmine

1. Đăng nhập vào Redmine
2. Click **Projects** > **New project**
3. Điền thông tin:
   - **Name**: `Hệ thống Quản lý Căn hộ`
   - **Identifier**: `nh-m-7`
   - **Description**: `Dự án báo cáo môn Mã nguồn mở`
4. Bật các modules:
   - ✅ Issues
   - ✅ Repository
   - ✅ Wiki
   - ✅ Documents
5. Click **Create**

### 3.2. Cấu hình Repository

1. Vào project vừa tạo
2. Click **Settings** > **Repository**
3. Chọn **Git** làm SCM
4. Nhập:
   - **Identifier**: `github`
   - **URL**: `https://github.com/lecongtoai0901/nh-m-7.git`
5. Click **Create**

### 3.3. Tạo Trackers

1. Vào **Administration** > **Trackers**
2. Tạo các trackers:
   - **Feature** (màu xanh)
   - **Bug** (màu đỏ)
   - **Task** (màu vàng)
   - **Enhancement** (màu xanh lá)

---

## 📝 BƯỚC 4: Tạo Issues trên Redmine

Tạo 8 issues tương ứng với 8 branches:

### Issue #1: Authentication System
- **Tracker**: Feature
- **Subject**: `Implement Authentication System`
- **Description**:
```
Chức năng đăng nhập và đăng xuất:
- Form đăng nhập
- Xác thực người dùng
- Quản lý session
- Bảo vệ routes yêu cầu đăng nhập
```
- **Branch**: `feature/authentication`
- **Priority**: High

### Issue #2: Apartment CRUD
- **Tracker**: Feature
- **Subject**: `Implement Apartment CRUD Operations`
- **Description**:
```
Các thao tác CRUD cho căn hộ:
- Create: Thêm căn hộ mới
- Read: Xem danh sách và chi tiết
- Update: Sửa thông tin căn hộ
- Delete: Xóa căn hộ
```
- **Branch**: `feature/apartment-crud`
- **Priority**: High

### Issue #3: Apartment Search & Filter
- **Tracker**: Feature
- **Subject**: `Implement Search and Filter for Apartments`
- **Description**:
```
Tìm kiếm và lọc căn hộ:
- Tìm kiếm theo tên, tòa nhà, chủ sở hữu
- Lọc theo trạng thái (available, rented, maintenance)
- Hiển thị thống kê
```
- **Branch**: `feature/apartment-search`
- **Priority**: Medium

### Issue #4: Database Setup
- **Tracker**: Task
- **Subject**: `Setup Database Schema and Seed Data`
- **Description**:
```
Cấu hình database:
- Tạo schema database
- Insert dữ liệu mẫu
- File cấu hình kết nối
```
- **Branch**: `feature/database-setup`
- **Priority**: High

### Issue #5: Router System
- **Tracker**: Task
- **Subject**: `Implement Custom Router System`
- **Description**:
```
Hệ thống routing:
- URL routing
- Xử lý HTTP methods
- Dynamic parameters
- 404 handling
```
- **Branch**: `feature/router-system`
- **Priority**: High

### Issue #6: Product Management
- **Tracker**: Feature
- **Subject**: `Implement Product Management`
- **Description**:
```
Quản lý sản phẩm nhạc cụ:
- Danh sách sản phẩm
- Chi tiết sản phẩm
- Lọc theo loại và nhà sản xuất
```
- **Branch**: `feature/product-management`
- **Priority**: Medium

### Issue #7: Cart & Order System
- **Tracker**: Feature
- **Subject**: `Implement Shopping Cart and Order System`
- **Description**:
```
Giỏ hàng và đơn hàng:
- Thêm sản phẩm vào giỏ
- Xem giỏ hàng
- Thanh toán
- Lịch sử đơn hàng
```
- **Branch**: `feature/cart-order`
- **Priority**: Medium

### Issue #8: User Management
- **Tracker**: Feature
- **Subject**: `Implement User Management`
- **Description**:
```
Quản lý người dùng:
- Đăng ký tài khoản
- Xem thông tin cá nhân
- Sửa thông tin
- Đổi mật khẩu
```
- **Branch**: `feature/user-management`
- **Priority**: Medium

---

## 💻 BƯỚC 5: Bắt đầu làm việc

### Workflow cho mỗi feature:

1. **Chọn branch để làm việc**
```bash
git checkout feature/authentication
```

2. **Làm thay đổi code**

3. **Commit với reference issue**
```bash
git add .
git commit -m "[#1] Implement authentication system"
```

4. **Push lên GitHub**
```bash
git push origin feature/authentication
```

5. **Cập nhật issue trên Redmine**
   - Thêm comment về tiến độ
   - Upload screenshots nếu có
   - Đặt status: "In Progress" → "Resolved"

---

## 📊 Checklist tổng thể

### Setup Git
- [ ] Đã chạy script `setup_project.ps1`
- [ ] Đã commit code vào `main`
- [ ] Đã tạo 8 feature branches
- [ ] Đã push tất cả lên GitHub

### Kiểm tra GitHub
- [ ] Đã kiểm tra repository trên GitHub
- [ ] Tất cả branches đã có trên GitHub
- [ ] Code đã được push đầy đủ

### Setup Redmine
- [ ] Đã tạo project trên Redmine
- [ ] Đã cấu hình repository
- [ ] Đã tạo các trackers
- [ ] Đã tạo 8 issues tương ứng với 8 branches

### Bắt đầu làm việc
- [ ] Đã chọn branch đầu tiên để làm việc
- [ ] Đã hiểu workflow commit với issue reference
- [ ] Đã biết cách cập nhật issue trên Redmine

---

## 🆘 Troubleshooting

### ⚠️ LỖI QUAN TRỌNG: "Permission denied" hoặc "403 Forbidden"

**Nguyên nhân**: Remote URL đang trỏ sai repository (ví dụ: `Zyuuki-i/PHP-Projects.git` thay vì `lecongtoai0901/nh-m-7.git`)

**Giải pháp**:
```powershell
# 1. Kiểm tra remote URL hiện tại
git remote -v

# 2. Sửa remote URL về đúng repository
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git

# 3. Kiểm tra lại
git remote -v
# Phải hiển thị: origin  https://github.com/lecongtoai0901/nh-m-7.git

# 4. Push lại các branches
git checkout main
git push -u origin main

# 5. Push các feature branches
git checkout feature/authentication
git push -u origin feature/authentication

# Lặp lại cho các branches khác...
```

### Lỗi: "remote origin already exists"
```powershell
# Sửa URL thay vì thêm mới
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git
```

### Lỗi: "branch already exists"
```powershell
# Các branches đã tồn tại local, chỉ cần push lên
git checkout feature/authentication
git push -u origin feature/authentication
```

### Lỗi: "Permission denied" khi push (sau khi đã sửa remote)
```powershell
# 1. Kiểm tra xác thực GitHub
git config --global user.name "lecongtoai0901"
git config --global user.email "your-email@example.com"

# 2. Nếu vẫn lỗi, có thể cần Personal Access Token
# Tạo token tại: https://github.com/settings/tokens
# Sau đó push với token:
# git push https://[TOKEN]@github.com/lecongtoai0901/nh-m-7.git main
```

---

## 📚 Tài liệu tham khảo

- `README.md` - Tài liệu chính
- `BRANCHES.md` - Chi tiết các branches
- `REDMINE_GUIDE.md` - Hướng dẫn Redmine đầy đủ
- `QUICK_START.md` - Hướng dẫn nhanh

---

**Bắt đầu từ BƯỚC 1 ngay bây giờ!** 🚀

