# 📝 Hướng dẫn Commit Code với Issue Reference

## 🎯 Mục đích

Khi commit code với format `[#số-issue]`, Redmine sẽ **tự động link commit với issue** tương ứng.

---

## ✅ Format chuẩn

```bash
git commit -m "[#số-issue] Mô tả thay đổi"
```

**Ví dụ:**
```bash
git commit -m "[#6] Add pagination for apartment list"
git commit -m "[#7] Implement price range filter"
git commit -m "[#13] Add change password feature for admin"
```

---

## 📋 Các bước thực hiện

### Bước 0: Mở Terminal/PowerShell trong thư mục dự án

**Cách nhanh nhất:**
1. Mở **File Explorer** (Windows + E)
2. Đi đến: `C:\wamp64\www\Mã nguồn mở\PHP-Projects`
3. Click vào **thanh địa chỉ** (address bar) ở trên cùng
4. Gõ: `powershell` và nhấn **Enter**

**Hoặc:**
- Click chuột phải vào thư mục → **Open PowerShell window here**

Bạn sẽ thấy cửa sổ PowerShell với dòng lệnh:
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects>
```

**Đây là nơi bạn sẽ gõ các lệnh git!**

---

### Bước 1: Kiểm tra bạn đang ở branch nào

Trong PowerShell, gõ:

```bash
git branch
```

Phải thấy branch bạn đang làm việc (ví dụ: `* feature/apartment-pagination`)

### Bước 2: Xem số issue tương ứng với branch

Xem file `DANH_SACH_ISSUES_REDMINE.md` để biết số issue:

| Branch | Issue # |
|--------|---------|
| feature/apartment-pagination | #6 |
| feature/apartment-price-filter | #7 |
| feature/apartment-area-filter | #8 |
| ... | ... |

### Bước 3: Thêm files vào staging

Trong PowerShell, gõ:

```bash
# Thêm tất cả files đã thay đổi
git add .

# Hoặc thêm từng file cụ thể
git add src/Controller/ApartmentController.php
git add src/View/Apartment/index.php
```

### Bước 4: Commit với issue reference

Trong PowerShell, gõ:

```bash
git commit -m "[#6] Add pagination for apartment list"
```

**Lưu ý:**
- Gõ trực tiếp vào PowerShell (không copy dấu backtick `)
- `[#6]` - Số issue trên Redmine (không có khoảng trắng giữa # và số)
- Sau `]` có **1 khoảng trắng**
- Mô tả ngắn gọn, rõ ràng
- Nhấn **Enter** sau khi gõ xong

**Ví dụ trên màn hình PowerShell:**
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects> git commit -m "[#6] Add pagination for apartment list"
[feature/apartment-pagination abc1234] Add pagination for apartment list
 2 files changed, 45 insertions(+), 12 deletions(-)
```

### Bước 5: Push lên GitHub

Trong PowerShell, gõ:

```bash
git push origin feature/apartment-pagination
```

Hoặc nếu đã set upstream:
```bash
git push
```

**Ví dụ trên màn hình:**
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects> git push origin feature/apartment-pagination
Enumerating objects: 5, done.
Writing objects: 100% (3/3), 1.2 KiB | 1.2 MiB/s, done.
To https://github.com/lecongtoai0901/nh-m-7.git
 * [new branch]      feature/apartment-pagination -> feature/apartment-pagination
```

---

## 📝 Các format commit message khác

### Format 1: Chỉ có issue reference (Khuyến nghị)
```bash
git commit -m "[#6] Add pagination for apartment list"
```

### Format 2: Có thêm loại thay đổi
```bash
git commit -m "[#6] feat: Add pagination for apartment list"
git commit -m "[#7] fix: Fix price filter validation"
git commit -m "[#13] refactor: Improve code structure"
```

### Format 3: Commit message nhiều dòng
```bash
git commit -m "[#6] Add pagination for apartment list

- Implement pagination logic in controller
- Add pagination UI in view
- Update URL parameters handling"
```

---

## 🎯 Ví dụ thực tế cho từng branch

### Branch: feature/apartment-pagination (Issue #6)

```bash
git checkout feature/apartment-pagination
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#6] Add pagination for apartment list"
git push origin feature/apartment-pagination
```

### Branch: feature/apartment-price-filter (Issue #7)

```bash
git checkout feature/apartment-price-filter
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#7] Add price range filter for apartments"
git push origin feature/apartment-price-filter
```

### Branch: feature/apartment-area-filter (Issue #8)

```bash
git checkout feature/apartment-area-filter
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#8] Add area range filter for apartments"
git push origin feature/apartment-area-filter
```

### Branch: feature/apartment-sort (Issue #9)

```bash
git checkout feature/apartment-sort
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#9] Add sorting functionality for apartments"
git push origin feature/apartment-sort
```

### Branch: feature/apartment-detail-page (Issue #10)

```bash
git checkout feature/apartment-detail-page
git add index.php src/Controller/ApartmentController.php src/View/Apartment/show.php src/View/Apartment/index.php
git commit -m "[#10] Create apartment detail page"
git push origin feature/apartment-detail-page
```

---

## 🔍 Kiểm tra commit đã link với issue chưa

### Trên GitHub:

1. Vào repository: https://github.com/lecongtoai0901/nh-m-7
2. Click vào branch
3. Xem commit history
4. Commit message sẽ hiển thị: `[#6] Add pagination...`

### Trên Redmine:

1. Vào issue #6 trên Redmine
2. Scroll xuống phần **"Related revisions"** hoặc **"Changesets"**
3. Bạn sẽ thấy commit vừa push được link với issue

---

## ⚠️ Lưu ý quan trọng

### ✅ ĐÚNG:
```bash
git commit -m "[#6] Add pagination"
git commit -m "[#13] Implement change password"
git commit -m "[#22] Add advanced search"
```

### ❌ SAI:
```bash
git commit -m "#6 Add pagination"           # Thiếu []
git commit -m "[ #6 ] Add pagination"      # Có khoảng trắng trong []
git commit -m "[#6]Add pagination"         # Thiếu khoảng trắng sau ]
git commit -m "Add pagination [#6]"         # Issue ở cuối (vẫn được nhưng không chuẩn)
```

---

## 📊 Bảng mapping Branch → Issue #

Copy bảng này để tra cứu nhanh:

| Branch | Issue # | Commit Message Mẫu |
|--------|---------|-------------------|
| feature/authentication | #1 | `[#1] Implement authentication system` |
| feature/apartment-crud | #2 | `[#2] Implement apartment CRUD operations` |
| feature/apartment-search | #3 | `[#3] Add search and filter for apartments` |
| feature/database-setup | #4 | `[#4] Setup database schema and seed data` |
| feature/router-system | #5 | `[#5] Implement custom router system` |
| feature/apartment-pagination | #6 | `[#6] Add pagination for apartment list` |
| feature/apartment-price-filter | #7 | `[#7] Add price range filter` |
| feature/apartment-area-filter | #8 | `[#8] Add area range filter` |
| feature/apartment-sort | #9 | `[#9] Add sorting functionality` |
| feature/apartment-detail-page | #10 | `[#10] Create apartment detail page` |
| feature/apartment-export-csv | #11 | `[#11] Add CSV export functionality` |
| feature/apartment-print-view | #12 | `[#12] Add print view for apartment list` |
| feature/auth-change-password-admin | #13 | `[#13] Add change password feature` |
| feature/user-validate-phone | #14 | `[#14] Add phone number validation` |
| feature/ui-dark-mode | #15 | `[#15] Add dark mode toggle` |
| feature/log-apartment-actions | #16 | `[#16] Implement logging for apartment actions` |
| feature/custom-error-pages | #17 | `[#17] Create custom 404 error page` |
| feature/apartment-bulk-delete | #18 | `[#18] Add bulk delete functionality` |
| feature/apartment-statistics-chart | #19 | `[#19] Create statistics page` |
| feature/apartment-duplicate | #20 | `[#20] Add duplicate apartment feature` |
| feature/apartment-import-csv | #21 | `[#21] Add CSV import functionality` |
| feature/apartment-advanced-search | #22 | `[#22] Implement advanced search feature` |

---

## 🚀 Workflow hoàn chỉnh

### Khi bắt đầu làm việc trên một feature:

```bash
# 1. Pull code mới nhất
git checkout main
git pull origin main

# 2. Chuyển sang branch feature
git checkout feature/apartment-pagination

# 3. Làm thay đổi code...

# 4. Add và commit với issue reference
git add .
git commit -m "[#6] Add pagination for apartment list"

# 5. Push lên GitHub
git push origin feature/apartment-pagination
```

### Khi có nhiều commits trên cùng một branch:

```bash
# Commit 1
git add file1.php
git commit -m "[#6] Add pagination logic"

# Commit 2
git add file2.php
git commit -m "[#6] Add pagination UI"

# Commit 3
git add file3.php
git commit -m "[#6] Fix pagination bug"

# Push tất cả
git push origin feature/apartment-pagination
```

**Tất cả commits sẽ được link với issue #6!**

---

## 💡 Tips

1. **Luôn dùng format `[#số]`** ở đầu commit message
2. **Mô tả ngắn gọn** nhưng rõ ràng
3. **Một commit = một thay đổi nhỏ** (dễ review)
4. **Kiểm tra trên Redmine** sau khi push để đảm bảo link thành công

---

## ✅ Checklist

- [ ] Đã biết số issue của branch đang làm
- [ ] Đã dùng format `[#số]` trong commit message
- [ ] Đã push lên GitHub
- [ ] Đã kiểm tra trên Redmine xem commit đã link chưa

---

**Sau khi commit với issue reference, Redmine sẽ tự động cập nhật issue với thông tin commit!** 🎉

