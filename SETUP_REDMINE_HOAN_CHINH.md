# 🔧 SETUP REDMINE HOÀN CHỈNH - Từng bước chi tiết

## 📋 Checklist tổng thể

- [ ] Tạo Project trên Redmine
- [ ] Cấu hình Repository
- [ ] Tạo Trackers
- [ ] Tạo Issues cho tất cả branches (~20 issues)
- [ ] Cấu hình webhook (nếu cần)
- [ ] Test commit với issue reference

---

## 🚀 BƯỚC 1: Tạo Project trên Redmine

### 1.1. Đăng nhập Redmine

1. Truy cập URL Redmine của bạn (ví dụ: `http://your-redmine-url.com`)
2. Đăng nhập với tài khoản admin

### 1.2. Tạo Project mới

1. Click **Projects** ở menu trên cùng
2. Click **New project** (hoặc **Tạo dự án mới**)
3. Điền thông tin:
   - **Name**: `Hệ thống Quản lý Căn hộ - MQHouse`
   - **Identifier**: `nh-m-7` (quan trọng! Dùng để link với GitHub)
   - **Description**: `Dự án báo cáo môn Mã nguồn mở - Hệ thống quản lý căn hộ`
   - **Homepage**: `https://github.com/lecongtoai0901/nh-m-7`
4. Bật các modules:
   - ✅ **Issues** (Bắt buộc)
   - ✅ **Repository** (Để link với GitHub)
   - ✅ **Wiki** (Tùy chọn)
   - ✅ **Documents** (Tùy chọn)
   - ✅ **News** (Tùy chọn)
5. Click **Create** (hoặc **Tạo**)

---

## 🔧 BƯỚC 2: Cấu hình Repository

### 2.1. Vào Settings của Project

1. Vào project vừa tạo
2. Click **Settings** (hoặc **Cấu hình**) ở sidebar bên trái
3. Click tab **Repository** (hoặc **Kho lưu trữ**)

### 2.2. Thêm Repository

1. Click **New repository** (hoặc **Thêm kho lưu trữ mới**)
2. Chọn **Git** làm SCM
3. Điền thông tin:
   - **Identifier**: `github` (hoặc tên bất kỳ)
   - **URL**: `https://github.com/lecongtoai0901/nh-m-7.git`
   - **Path encoding**: `UTF-8`
   - **Report last commit**: ✅ Bật
   - **Fetch commits**: ✅ Bật
4. Click **Create** (hoặc **Tạo**)

> 💡 **Lưu ý**: Nếu Redmine yêu cầu username/password:
> - Có thể để trống nếu repository là Public
> - Hoặc dùng Personal Access Token của GitHub

### 2.3. Kiểm tra Repository

1. Vào tab **Repository** của project
2. Bạn sẽ thấy danh sách các branches
3. Click vào từng branch để xem code

---

## 📝 BƯỚC 3: Tạo Trackers

### 3.1. Vào Administration

1. Click **Administration** (hoặc **Quản trị**) ở menu trên cùng
2. Click **Trackers** (hoặc **Trình theo dõi**)

### 3.2. Tạo các Trackers

Tạo các trackers sau (nếu chưa có):

#### Tracker 1: Feature
- **Name**: `Feature`
- **Default status**: `New`
- **Description**: `Các tính năng mới`

#### Tracker 2: Bug
- **Name**: `Bug`
- **Default status**: `New`
- **Description**: `Các lỗi cần sửa`

#### Tracker 3: Task
- **Name**: `Task`
- **Default status**: `New`
- **Description**: `Các công việc setup và cấu hình`

#### Tracker 4: Enhancement
- **Name**: `Enhancement`
- **Default status**: `New`
- **Description**: `Cải tiến tính năng`

---

## 📋 BƯỚC 4: Tạo Issues cho tất cả Branches

Tạo **1 issue = 1 branch**. Tổng cộng khoảng **20 issues**.

### Template tạo Issue:

1. Vào project → Click **Issues** → **New issue**
2. Điền thông tin:
   - **Tracker**: Chọn phù hợp (Feature/Task)
   - **Subject**: Tên chức năng
   - **Description**: Mô tả chi tiết
   - **Priority**: High/Medium/Low
   - **Status**: New
3. Click **Create**

---

### Danh sách 20+ Issues cần tạo:

#### Issue #1: Authentication System
- **Tracker**: Feature
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
- **Priority**: High

---

#### Issue #2: Apartment CRUD
- **Tracker**: Feature
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
- **Priority**: High

---

#### Issue #3: Apartment Search & Filter
- **Tracker**: Feature
- **Subject**: `Implement Search and Filter for Apartments`
- **Description**:
```
Tìm kiếm và lọc căn hộ:
- Tìm kiếm theo tên, tòa nhà, chủ sở hữu
- Lọc theo trạng thái (available, rented, maintenance)
- Hiển thị thống kê

Branch: feature/apartment-search
```
- **Priority**: Medium

---

#### Issue #4: Database Setup
- **Tracker**: Task
- **Subject**: `Setup Database Schema and Seed Data`
- **Description**:
```
Cấu hình database:
- Tạo schema database
- Insert dữ liệu mẫu
- File cấu hình kết nối

Branch: feature/database-setup
```
- **Priority**: High

---

#### Issue #5: Router System
- **Tracker**: Task
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
- **Priority**: High

---

#### Issue #6: Apartment Pagination
- **Tracker**: Feature
- **Subject**: `Add Pagination for Apartment List`
- **Description**:
```
Thêm phân trang cho danh sách căn hộ:
- Hiển thị 5 căn hộ mỗi trang
- Nút Previous/Next
- Số trang

Branch: feature/apartment-pagination
```
- **Priority**: Medium

---

#### Issue #7: Apartment Price Filter
- **Tracker**: Feature
- **Subject**: `Add Price Range Filter for Apartments`
- **Description**:
```
Lọc căn hộ theo khoảng giá:
- Input giá từ
- Input giá đến
- Filter kết quả theo giá

Branch: feature/apartment-price-filter
```
- **Priority**: Medium

---

#### Issue #8: Apartment Area Filter
- **Tracker**: Feature
- **Subject**: `Add Area Range Filter for Apartments`
- **Description**:
```
Lọc căn hộ theo diện tích:
- Input diện tích từ
- Input diện tích đến
- Filter kết quả theo diện tích

Branch: feature/apartment-area-filter
```
- **Priority**: Medium

---

#### Issue #9: Apartment Sort
- **Tracker**: Feature
- **Subject**: `Add Sorting Functionality for Apartments`
- **Description**:
```
Sắp xếp căn hộ:
- Sắp xếp theo giá (tăng/giảm)
- Sắp xếp theo diện tích (tăng/giảm)
- Dropdown chọn kiểu sắp xếp

Branch: feature/apartment-sort
```
- **Priority**: Medium

---

#### Issue #10: Apartment Detail Page
- **Tracker**: Feature
- **Subject**: `Create Apartment Detail Page`
- **Description**:
```
Trang chi tiết căn hộ:
- Route /Apartments/Show?id=...
- Hiển thị đầy đủ thông tin căn hộ
- Nút quay lại danh sách

Branch: feature/apartment-detail-page
```
- **Priority**: Medium

---

#### Issue #11: Apartment Export CSV
- **Tracker**: Feature
- **Subject**: `Add CSV Export Functionality`
- **Description**:
```
Xuất danh sách căn hộ ra file CSV:
- Route /Apartments/ExportCsv
- Download file CSV
- Bao gồm tất cả thông tin căn hộ

Branch: feature/apartment-export-csv
```
- **Priority**: Low

---

#### Issue #12: Apartment Print View
- **Tracker**: Feature
- **Subject**: `Add Print View for Apartment List`
- **Description**:
```
Trang in danh sách căn hộ:
- Layout tối ưu cho in ấn
- Nút Print
- Ẩn các phần không cần thiết khi in

Branch: feature/apartment-print-view
```
- **Priority**: Low

---

#### Issue #13: Auth Change Password Admin
- **Tracker**: Feature
- **Subject**: `Add Change Password Feature for Admin`
- **Description**:
```
Chức năng đổi mật khẩu cho admin:
- Form đổi mật khẩu
- Validate mật khẩu cũ
- Validate mật khẩu mới

Branch: feature/auth-change-password-admin
```
- **Priority**: Medium

---

#### Issue #14: User Validate Phone
- **Tracker**: Enhancement
- **Subject**: `Add Phone Number Validation`
- **Description**:
```
Validate số điện thoại:
- Format số điện thoại Việt Nam
- Hiển thị lỗi khi không hợp lệ

Branch: feature/user-validate-phone
```
- **Priority**: Low

---

#### Issue #15: UI Dark Mode
- **Tracker**: Enhancement
- **Subject**: `Add Dark Mode Toggle`
- **Description**:
```
Dark mode cho giao diện:
- Nút toggle dark/light mode
- Lưu preference vào localStorage
- CSS cho dark mode

Branch: feature/ui-dark-mode
```
- **Priority**: Low

---

#### Issue #16: Log Apartment Actions
- **Tracker**: Task
- **Subject**: `Implement Logging for Apartment Actions`
- **Description**:
```
Ghi log các thao tác căn hộ:
- Log khi thêm/sửa/xóa căn hộ
- Lưu vào file log
- Ghi lại user và timestamp

Branch: feature/log-apartment-actions
```
- **Priority**: Medium

---

#### Issue #17: Custom Error Pages
- **Tracker**: Task
- **Subject**: `Create Custom 404 Error Page`
- **Description**:
```
Trang lỗi tùy chỉnh:
- Trang 404 đẹp hơn
- Thay thế message mặc định
- Link về trang chủ

Branch: feature/custom-error-pages
```
- **Priority**: Low

---

#### Issue #18: Apartment Bulk Delete
- **Tracker**: Feature
- **Subject**: `Add Bulk Delete Functionality`
- **Description**:
```
Xóa nhiều căn hộ cùng lúc:
- Checkbox chọn nhiều căn hộ
- Nút xóa đã chọn
- Confirm trước khi xóa

Branch: feature/apartment-bulk-delete
```
- **Priority**: Medium

---

#### Issue #19: Apartment Statistics Chart
- **Tracker**: Feature
- **Subject**: `Create Statistics Page for Apartments`
- **Description**:
```
Trang thống kê căn hộ:
- Thống kê theo trạng thái
- Thống kê theo tòa nhà
- Giá trung bình

Branch: feature/apartment-statistics-chart
```
- **Priority**: Medium

---

#### Issue #20: Apartment Duplicate
- **Tracker**: Feature
- **Subject**: `Add Duplicate Apartment Feature`
- **Description**:
```
Nhân đôi căn hộ:
- Nút duplicate
- Tạo căn hộ mới với thông tin tương tự
- Tự động thêm "(Copy)" vào tên

Branch: feature/apartment-duplicate
```
- **Priority**: Low

---

#### Issue #21: Apartment Import CSV
- **Tracker**: Feature
- **Subject**: `Add CSV Import Functionality`
- **Description**:
```
Import căn hộ từ file CSV:
- Upload file CSV
- Parse và import dữ liệu
- Hiển thị số lượng đã import

Branch: feature/apartment-import-csv
```
- **Priority**: Medium

---

#### Issue #22: Apartment Advanced Search
- **Tracker**: Feature
- **Subject**: `Implement Advanced Search Feature`
- **Description**:
```
Tìm kiếm nâng cao:
- Lọc theo số phòng ngủ
- Lọc theo số phòng tắm
- Lọc theo tầng

Branch: feature/apartment-advanced-search
```
- **Priority**: Medium

---

## ✅ BƯỚC 5: Ghi lại số Issue

Sau khi tạo xong tất cả issues, **ghi lại số issue** cho mỗi branch:

| Branch | Issue # | Tracker |
|--------|---------|---------|
| feature/authentication | #1 | Feature |
| feature/apartment-crud | #2 | Feature |
| feature/apartment-search | #3 | Feature |
| feature/database-setup | #4 | Task |
| feature/router-system | #5 | Task |
| feature/apartment-pagination | #6 | Feature |
| feature/apartment-price-filter | #7 | Feature |
| feature/apartment-area-filter | #8 | Feature |
| feature/apartment-sort | #9 | Feature |
| feature/apartment-detail-page | #10 | Feature |
| feature/apartment-export-csv | #11 | Feature |
| feature/apartment-print-view | #12 | Feature |
| feature/auth-change-password-admin | #13 | Feature |
| feature/user-validate-phone | #14 | Enhancement |
| feature/ui-dark-mode | #15 | Enhancement |
| feature/log-apartment-actions | #16 | Task |
| feature/custom-error-pages | #17 | Task |
| feature/apartment-bulk-delete | #18 | Feature |
| feature/apartment-statistics-chart | #19 | Feature |
| feature/apartment-duplicate | #20 | Feature |
| feature/apartment-import-csv | #21 | Feature |
| feature/apartment-advanced-search | #22 | Feature |

---

## 💻 BƯỚC 6: Commit với Issue Reference

Khi commit code, luôn tham chiếu issue:

```bash
git commit -m "[#1] Implement authentication system"
git commit -m "[#6] Add pagination for apartment list"
git commit -m "[#7] Add price range filter"
```

**Format**: `[#số-issue] Mô tả thay đổi`

Redmine sẽ tự động link commit với issue!

---

## 🔗 BƯỚC 7: Cấu hình Webhook (Tùy chọn)

Để Redmine tự động cập nhật khi có commit mới:

1. Vào **Settings** → **Repository**
2. Click vào repository đã tạo
3. Tìm phần **Webhooks** hoặc **Notifications**
4. Cấu hình để nhận thông báo khi có commit

---

## 📊 BƯỚC 8: Kiểm tra và Test

### 8.1. Kiểm tra Issues

1. Vào **Issues** → Xem tất cả issues đã tạo
2. Kiểm tra mỗi issue có đầy đủ thông tin
3. Đảm bảo branch name đã ghi trong description

### 8.2. Test Commit với Issue Reference

```bash
# Chọn một branch
git checkout feature/apartment-pagination

# Commit với reference issue
git commit -m "[#6] Add pagination for apartment list"

# Push lên GitHub
git push origin feature/apartment-pagination
```

### 8.3. Kiểm tra trên Redmine

1. Vào issue #6 trên Redmine
2. Xem phần **"Related revisions"** hoặc **"Changesets"**
3. Bạn sẽ thấy commit vừa push được link với issue

---

## ✅ Checklist hoàn thành

- [ ] Đã tạo Project trên Redmine
- [ ] Đã cấu hình Repository (GitHub)
- [ ] Đã tạo đủ 4 Trackers
- [ ] Đã tạo ~22 Issues cho tất cả branches
- [ ] Đã ghi lại số issue cho mỗi branch
- [ ] Đã test commit với issue reference
- [ ] Đã kiểm tra Redmine link với GitHub

---

## 🎯 Kết quả mong đợi

Sau khi hoàn thành:
- ✅ Redmine có đầy đủ issues cho mỗi feature
- ✅ Mỗi commit trên GitHub tự động link với issue trên Redmine
- ✅ Có thể track tiến độ từng feature qua Redmine
- ✅ Có thể tạo báo cáo từ Redmine

---

**Hoàn thành setup Redmine! Bây giờ bạn có thể làm việc và track issues một cách chuyên nghiệp!** 🎉

