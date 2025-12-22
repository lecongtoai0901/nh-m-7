# 🎯 BƯỚC TIẾP THEO - Sau khi đã có Trackers

Bạn đã có Trackers trên Redmine! Bây giờ làm theo các bước sau:

---

## ✅ Bước 1: Kiểm tra Trackers (Đã có)

Bạn đã có:
- ✅ **Bug** - Cho các lỗi
- ✅ **Feature** - Cho các tính năng mới
- ✅ **Support** - Cho hỗ trợ

### 💡 Khuyến nghị: Thêm Tracker "Task"

Nếu chưa có, nên thêm tracker **Task** cho các công việc setup:

1. Click nút **"New tracker"** (màu xanh, có dấu +)
2. Điền thông tin:
   - **Name**: `Task`
   - **Default status**: `New`
3. Click **Create**

**Lý do**: Một số features như "Database Setup" và "Router System" nên dùng tracker "Task" thay vì "Feature".

---

## 🔧 Bước 2: Cấu hình Repository (Nếu chưa làm)

Để Redmine tự động link commits với issues:

1. Vào project của bạn
2. Click **Settings** (hoặc **Cấu hình**)
3. Chọn tab **Repository** (hoặc **Kho lưu trữ**)
4. Click **New repository** (hoặc **Thêm kho lưu trữ mới**)
5. Chọn **Git** làm SCM
6. Điền thông tin:
   - **Identifier**: `github` (hoặc tên bất kỳ)
   - **URL**: `https://github.com/lecongtoai0901/nh-m-7.git`
7. Click **Create** (hoặc **Tạo**)

> 💡 Nếu Redmine yêu cầu username/password, có thể bỏ trống hoặc dùng Personal Access Token

---

## 📝 Bước 3: Tạo 8 Issues cho 8 Feature Branches

Tạo issue trên Redmine cho mỗi feature branch. Mỗi issue sẽ tương ứng với một branch.

### Issue #1: Authentication System

1. Click **Issues** → **New issue** (hoặc **Vấn đề mới**)
2. Điền thông tin:
   - **Tracker**: `Feature`
   - **Subject**: `Implement Authentication System`
   - **Description**:
     ```
     Chức năng đăng nhập và đăng xuất:
     - Form đăng nhập
     - Xác thực người dùng
     - Quản lý session
     - Bảo vệ routes yêu cầu đăng nhập
     
     Branch: feature/authentication
     ```
   - **Priority**: `High` (hoặc `Cao`)
   - **Status**: `New` (hoặc `Mới`)
3. Click **Create** (hoặc **Tạo**)

**Ghi lại số issue**: Ví dụ: #1, #2, #3... (sẽ dùng khi commit)

---

### Issue #2: Apartment CRUD

- **Tracker**: `Feature`
- **Subject**: `Implement Apartment CRUD Operations`
- **Description**:
  ```
  Các thao tác CRUD cho căn hộ:
  - Create: Thêm căn hộ mới
  - Read: Xem danh sách và chi tiết
  - Update: Sửa thông tin căn hộ
  - Delete: Xóa căn hộ
  
  Branch: feature/apartment-crud
  ```
- **Priority**: `High`

---

### Issue #3: Apartment Search & Filter

- **Tracker**: `Feature`
- **Subject**: `Implement Search and Filter for Apartments`
- **Description**:
  ```
  Tìm kiếm và lọc căn hộ:
  - Tìm kiếm theo tên, tòa nhà, chủ sở hữu
  - Lọc theo trạng thái (available, rented, maintenance)
  - Hiển thị thống kê
  
  Branch: feature/apartment-search
  ```
- **Priority**: `Medium`

---

### Issue #4: Database Setup

- **Tracker**: `Task` (hoặc `Feature` nếu chưa có Task)
- **Subject**: `Setup Database Schema and Seed Data`
- **Description**:
  ```
  Cấu hình database:
  - Tạo schema database
  - Insert dữ liệu mẫu
  - File cấu hình kết nối
  
  Branch: feature/database-setup
  ```
- **Priority**: `High`

---

### Issue #5: Router System

- **Tracker**: `Task` (hoặc `Feature`)
- **Subject**: `Implement Custom Router System`
- **Description**:
  ```
  Hệ thống routing:
  - URL routing
  - Xử lý HTTP methods
  - Dynamic parameters
  - 404 handling
  
  Branch: feature/router-system
  ```
- **Priority**: `High`

---

### Issue #6: Product Management

- **Tracker**: `Feature`
- **Subject**: `Implement Product Management`
- **Description**:
  ```
  Quản lý sản phẩm nhạc cụ:
  - Danh sách sản phẩm
  - Chi tiết sản phẩm
  - Lọc theo loại và nhà sản xuất
  
  Branch: feature/product-management
  ```
- **Priority**: `Medium`

---

### Issue #7: Cart & Order System

- **Tracker**: `Feature`
- **Subject**: `Implement Shopping Cart and Order System`
- **Description**:
  ```
  Giỏ hàng và đơn hàng:
  - Thêm sản phẩm vào giỏ
  - Xem giỏ hàng
  - Thanh toán
  - Lịch sử đơn hàng
  
  Branch: feature/cart-order
  ```
- **Priority**: `Medium`

---

### Issue #8: User Management

- **Tracker**: `Feature`
- **Subject**: `Implement User Management`
- **Description**:
  ```
  Quản lý người dùng:
  - Đăng ký tài khoản
  - Xem thông tin cá nhân
  - Sửa thông tin
  - Đổi mật khẩu
  
  Branch: feature/user-management
  ```
- **Priority**: `Medium`

---

## 📊 Checklist sau khi tạo Issues

- [ ] Đã có đủ 4 trackers: Bug, Feature, Task, Support
- [ ] Đã cấu hình Repository trên Redmine
- [ ] Đã tạo 8 issues tương ứng với 8 branches
- [ ] Đã ghi lại số issue cho mỗi feature (sẽ dùng khi commit)

---

## 💻 Bước 4: Bắt đầu làm việc

Sau khi đã tạo đủ issues, bạn có thể bắt đầu làm việc trên từng branch:

### Workflow cho mỗi feature:

1. **Chọn branch để làm việc**
```powershell
git checkout feature/authentication
```

2. **Làm thay đổi code** (nếu cần)

3. **Commit với reference issue**
```powershell
git add .
git commit -m "[#1] Implement authentication system"
# [#1] là số issue trên Redmine
```

4. **Push lên GitHub**
```powershell
git push origin feature/authentication
```

5. **Cập nhật issue trên Redmine**
   - Vào issue #1 trên Redmine
   - Thêm comment về tiến độ
   - Đặt status: "In Progress" → "Resolved" khi hoàn thành

---

## 🎯 Tóm tắt các bước

1. ✅ **Đã có Trackers** (Bug, Feature, Support)
2. ⏭️ **Thêm Tracker "Task"** (khuyến nghị)
3. ⏭️ **Cấu hình Repository** trên Redmine
4. ⏭️ **Tạo 8 Issues** cho 8 feature branches
5. ⏭️ **Bắt đầu làm việc** trên từng branch

---

**Bạn đang ở bước 2-3. Tiếp tục tạo Issues nhé!** 🚀

