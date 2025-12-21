# Hướng dẫn sử dụng Redmine với dự án

## 🔗 Tích hợp Redmine

Redmine là công cụ quản lý dự án mã nguồn mở, giúp theo dõi issues, bugs, và features.

## 📋 Các bước thiết lập

### 1. Tạo Project trên Redmine

1. Đăng nhập vào Redmine
2. Tạo project mới với tên: **"Hệ thống Quản lý Căn hộ"**
3. Project identifier: `nh-m-7`
4. Bật các modules:
   - Issues
   - Repository
   - Wiki
   - Documents

### 2. Cấu hình Repository

1. Vào **Settings > Repository**
2. Chọn **Git** làm SCM
3. Nhập URL repository: `https://github.com/lecongtoai0901/nh-m-7.git`
4. Lưu cấu hình

### 3. Tạo Trackers

Tạo các trackers sau:
- **Feature** - Cho các tính năng mới
- **Bug** - Cho các lỗi
- **Task** - Cho các công việc
- **Enhancement** - Cho cải tiến

### 4. Tạo Issues cho mỗi Feature Branch

Tạo issue trên Redmine cho mỗi branch:

#### Issue #1: Authentication System
- **Tracker**: Feature
- **Subject**: Implement Authentication System
- **Description**: 
  - Đăng nhập/đăng xuất
  - Session management
  - Route protection
- **Branch**: `feature/authentication`

#### Issue #2: Apartment CRUD
- **Tracker**: Feature
- **Subject**: Implement Apartment CRUD Operations
- **Description**:
  - Create apartment
  - Read/List apartments
  - Update apartment
  - Delete apartment
- **Branch**: `feature/apartment-crud`

#### Issue #3: Apartment Search & Filter
- **Tracker**: Feature
- **Subject**: Implement Search and Filter for Apartments
- **Description**:
  - Search by name, building, owner
  - Filter by status
  - Statistics display
- **Branch**: `feature/apartment-search`

#### Issue #4: Database Setup
- **Tracker**: Task
- **Subject**: Setup Database Schema and Seed Data
- **Description**:
  - Create database schema
  - Insert sample data
  - Configuration files
- **Branch**: `feature/database-setup`

#### Issue #5: Router System
- **Tracker**: Task
- **Subject**: Implement Custom Router System
- **Description**:
  - URL routing
  - HTTP method handling
  - Dynamic parameters
  - 404 handling
- **Branch**: `feature/router-system`

#### Issue #6: Product Management
- **Tracker**: Feature
- **Subject**: Implement Product Management
- **Description**:
  - Product listing
  - Product details
  - Filter by category and manufacturer
- **Branch**: `feature/product-management`

#### Issue #7: Cart & Order System
- **Tracker**: Feature
- **Subject**: Implement Shopping Cart and Order System
- **Description**:
  - Add to cart
  - View cart
  - Checkout
  - Order history
- **Branch**: `feature/cart-order`

#### Issue #8: User Management
- **Tracker**: Feature
- **Subject**: Implement User Management
- **Description**:
  - User registration
  - User profile
  - Edit profile
  - Change password
- **Branch**: `feature/user-management`

## 🔄 Workflow với Redmine

### Khi bắt đầu làm việc trên một feature:

1. **Tạo hoặc chọn issue trên Redmine**
   - Gán cho chính mình
   - Đặt status: "In Progress"

2. **Tạo branch từ issue**
   ```bash
   git checkout -b feature/tên-feature
   ```

3. **Làm việc và commit**
   ```bash
   git add .
   git commit -m "[#123] Implement authentication system"
   ```
   - `#123` là số issue trên Redmine
   - Redmine sẽ tự động link commit với issue

4. **Push lên GitHub**
   ```bash
   git push origin feature/tên-feature
   ```

5. **Cập nhật issue trên Redmine**
   - Thêm note về tiến độ
   - Upload screenshots nếu có
   - Đặt status: "Resolved" khi hoàn thành

### Khi phát hiện bug:

1. **Tạo issue mới trên Redmine**
   - Tracker: Bug
   - Mô tả chi tiết bug
   - Steps to reproduce
   - Expected vs Actual behavior

2. **Tạo branch fix**
   ```bash
   git checkout -b bugfix/issue-456-fix-login-error
   ```

3. **Commit và push**
   ```bash
   git commit -m "[#456] Fix login error when email contains special characters"
   git push origin bugfix/issue-456-fix-login-error
   ```

4. **Cập nhật issue**
   - Status: Resolved
   - Thêm comment về cách fix

## 📊 Báo cáo tiến độ

### Tạo báo cáo trên Redmine:

1. Vào **Issues > Reports**
2. Chọn filters:
   - Project: nh-m-7
   - Tracker: Feature
   - Status: All
3. Xem thống kê:
   - Số issues đã hoàn thành
   - Số issues đang làm
   - Số issues chưa bắt đầu

### Tạo Gantt Chart:

1. Vào **Gantt** trong project
2. Xem timeline của các features
3. Track dependencies giữa các features

## 🎯 Best Practices

### Commit Messages

Luôn tham chiếu issue trong commit message:
- ✅ Good: `[#123] Implement user authentication`
- ✅ Good: `[#123] Fix: Session timeout issue`
- ❌ Bad: `Update code`
- ❌ Bad: `Fix bug`

### Branch Naming

- Feature: `feature/authentication`
- Bug fix: `bugfix/login-error`
- Hotfix: `hotfix/security-patch`

### Issue Description

Luôn bao gồm:
- Mô tả chi tiết
- Steps to reproduce (cho bugs)
- Expected behavior
- Screenshots (nếu có)
- Related files/modules

## 🔍 Kiểm tra lỗi với Redmine

### 1. Tạo Test Cases

Tạo issue cho mỗi test case:
- Test đăng nhập thành công
- Test đăng nhập sai mật khẩu
- Test CRUD căn hộ
- Test tìm kiếm

### 2. Tạo Bug Reports

Khi phát hiện lỗi:
1. Tạo issue mới
2. Gán label: "bug"
3. Mô tả chi tiết
4. Gán priority (Low/Medium/High/Critical)

### 3. Track Resolution

- Khi fix xong, đặt status: "Resolved"
- Tester verify và đặt: "Closed"
- Nếu còn lỗi, đặt lại: "In Progress"

## 📈 Metrics và Reports

### Xem thống kê trên Redmine:

1. **Issues by Status**: Xem số issues ở mỗi trạng thái
2. **Issues by Tracker**: Xem số Features vs Bugs
3. **Issues by Priority**: Xem phân bố priority
4. **Activity**: Xem hoạt động gần đây

### Export Reports:

1. Vào **Issues**
2. Apply filters
3. Click **Export** > CSV hoặc PDF

## 🔗 Liên kết hữu ích

- Redmine Documentation: https://www.redmine.org/guide
- Git Integration: https://www.redmine.org/projects/redmine/wiki/RedmineGit
- Issue Tracking Guide: https://www.redmine.org/projects/redmine/wiki/GuideIssues

---

**Lưu ý**: Đảm bảo Redmine đã được cấu hình để nhận webhooks từ GitHub để tự động cập nhật issues khi có commit mới.

