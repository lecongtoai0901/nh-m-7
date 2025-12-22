# 📋 Danh sách Issues cần tạo trên Redmine

Sau khi tạo xong, **ghi lại số issue** vào bảng này để dùng khi commit.

---

## 📝 Template tạo Issue

1. Vào project → **Issues** → **New issue**
2. Copy-paste thông tin từ bảng dưới
3. Click **Create**
4. Ghi lại số issue vào cột "Issue #"

---

## 📊 Bảng Issues

| # | Branch | Tracker | Subject | Priority | Issue # |
|---|--------|---------|---------|----------|---------|
| 1 | feature/authentication | Feature | Implement Authentication System | High | #___ |
| 2 | feature/apartment-crud | Feature | Implement Apartment CRUD Operations | High | #___ |
| 3 | feature/apartment-search | Feature | Implement Search and Filter for Apartments | Medium | #___ |
| 4 | feature/database-setup | Task | Setup Database Schema and Seed Data | High | #___ |
| 5 | feature/router-system | Task | Implement Custom Router System | High | #___ |
| 6 | feature/apartment-pagination | Feature | Add Pagination for Apartment List | Medium | #___ |
| 7 | feature/apartment-price-filter | Feature | Add Price Range Filter for Apartments | Medium | #___ |
| 8 | feature/apartment-area-filter | Feature | Add Area Range Filter for Apartments | Medium | #___ |
| 9 | feature/apartment-sort | Feature | Add Sorting Functionality for Apartments | Medium | #___ |
| 10 | feature/apartment-detail-page | Feature | Create Apartment Detail Page | Medium | #___ |
| 11 | feature/apartment-export-csv | Feature | Add CSV Export Functionality | Low | #___ |
| 12 | feature/apartment-print-view | Feature | Add Print View for Apartment List | Low | #___ |
| 13 | feature/auth-change-password-admin | Feature | Add Change Password Feature for Admin | Medium | #___ |
| 14 | feature/user-validate-phone | Enhancement | Add Phone Number Validation | Low | #___ |
| 15 | feature/ui-dark-mode | Enhancement | Add Dark Mode Toggle | Low | #___ |
| 16 | feature/log-apartment-actions | Task | Implement Logging for Apartment Actions | Medium | #___ |
| 17 | feature/custom-error-pages | Task | Create Custom 404 Error Page | Low | #___ |
| 18 | feature/apartment-bulk-delete | Feature | Add Bulk Delete Functionality | Medium | #___ |
| 19 | feature/apartment-statistics-chart | Feature | Create Statistics Page for Apartments | Medium | #___ |
| 20 | feature/apartment-duplicate | Feature | Add Duplicate Apartment Feature | Low | #___ |
| 21 | feature/apartment-import-csv | Feature | Add CSV Import Functionality | Medium | #___ |
| 22 | feature/apartment-advanced-search | Feature | Implement Advanced Search Feature | Medium | #___ |

---

## 📝 Description mẫu cho mỗi Issue

Copy-paste description này vào mỗi issue (thay đổi branch name cho phù hợp):

```
Chức năng: [Tên chức năng]

Mô tả:
- [Mô tả chi tiết chức năng]
- [Các tính năng con]
- [Yêu cầu kỹ thuật]

Branch: feature/[tên-branch]

Files liên quan:
- src/Controller/[Controller].php
- src/View/[View].php
- index.php (routes)

Acceptance Criteria:
- [ ] Chức năng hoạt động đúng
- [ ] UI/UX hợp lý
- [ ] Code clean và có comment
```

---

## 💡 Lưu ý khi commit

Sau khi có số issue, commit với format:

```bash
git commit -m "[#số-issue] Mô tả thay đổi"
```

Ví dụ:
```bash
git commit -m "[#6] Add pagination for apartment list"
git commit -m "[#7] Implement price range filter"
```

Redmine sẽ tự động link commit với issue!

---

**Ghi lại số issue vào bảng trên sau khi tạo xong!** ✅

