# 🚀 Bước tiếp theo: Thêm code vào từng branch

## ✅ Tình trạng hiện tại

Bạn đã:
- ✅ Tạo được nhiều branches
- ✅ Push một số branches lên GitHub
- ✅ Hiểu cách commit với issue reference

**Vấn đề**: Các branches đã tạo nhưng **chưa có code thay đổi** trên từng branch!

---

## 📋 Kế hoạch làm việc

### **Bước 1: Kiểm tra branch hiện tại**

```powershell
git branch
# Xem dấu * ở branch nào = bạn đang ở branch đó
```

---

### **Bước 2: Làm code trên từng branch**

Với mỗi branch, bạn cần:

1. **Checkout sang branch**
2. **Sửa code** (thêm tính năng)
3. **Add và commit**
4. **Push lên GitHub**

---

## 🎯 Danh sách branches cần làm code

### **1. Branch: `feature/apartment-pagination` (Issue #6)**

```powershell
# 1. Chuyển sang branch
git checkout feature/apartment-pagination

# 2. Sửa file: src/Controller/ApartmentController.php
#    Thêm logic pagination vào method index()

# 3. Sửa file: src/View/Apartment/index.php
#    Thêm UI pagination (Previous/Next buttons, page numbers)

# 4. Commit và push
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#6] Add pagination for apartment list"
git push origin feature/apartment-pagination
```

**Code cần thêm vào `ApartmentController.php` (method `index()`):**

```php
// Pagination logic
$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 10;
$total = count($apartments);
$totalPages = ceil($total / $perPage);
$offset = ($page - 1) * $perPage;
$pagedApartments = array_slice($apartments, $offset, $perPage);
```

**Truyền vào view:**
```php
$content = $this->view('index.php', [
    'apartments' => $pagedApartments,  // Thay vì $apartments
    'stats' => $stats,
    'search' => $search,
    'status' => $status,
    'page' => $page,
    'totalPages' => $totalPages,
]);
```

---

### **2. Branch: `feature/apartment-price-filter` (Issue #7)**

```powershell
git checkout feature/apartment-price-filter
# Sửa code...
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#7] Add price range filter for apartments"
git push origin feature/apartment-price-filter
```

**Code cần thêm:**

Trong `ApartmentController.php` (method `index()`), sau phần search:
```php
// Price filter
$minPrice = isset($_GET['min_price']) ? (float)$_GET['min_price'] : null;
$maxPrice = isset($_GET['max_price']) ? (float)$_GET['max_price'] : null;

if ($minPrice !== null && $minPrice > 0) {
    $apartments = array_values(array_filter($apartments, fn($a) => $a->price >= $minPrice));
}
if ($maxPrice !== null && $maxPrice > 0) {
    $apartments = array_values(array_filter($apartments, fn($a) => $a->price <= $maxPrice));
}
```

Trong `src/View/Apartment/index.php`, thêm vào form:
```php
<div class="col-md-3">
    <input type="number" class="form-control" name="min_price" placeholder="Giá tối thiểu" value="<?php echo htmlspecialchars($_GET['min_price'] ?? ''); ?>">
</div>
<div class="col-md-3">
    <input type="number" class="form-control" name="max_price" placeholder="Giá tối đa" value="<?php echo htmlspecialchars($_GET['max_price'] ?? ''); ?>">
</div>
```

---

### **3. Branch: `feature/apartment-area-filter` (Issue #8)**

```powershell
git checkout feature/apartment-area-filter
# Sửa code...
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#8] Add area range filter for apartments"
git push origin feature/apartment-area-filter
```

**Code tương tự price filter, nhưng filter theo `area`:**

```php
// Area filter
$minArea = isset($_GET['min_area']) ? (int)$_GET['min_area'] : null;
$maxArea = isset($_GET['max_area']) ? (int)$_GET['max_area'] : null;

if ($minArea !== null && $minArea > 0) {
    $apartments = array_values(array_filter($apartments, fn($a) => $a->area >= $minArea));
}
if ($maxArea !== null && $maxArea > 0) {
    $apartments = array_values(array_filter($apartments, fn($a) => $a->area <= $maxArea));
}
```

---

### **4. Branch: `feature/apartment-sort` (Issue #9)**

```powershell
git checkout feature/apartment-sort
# Sửa code...
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#9] Add sorting functionality for apartments"
git push origin feature/apartment-sort
```

**Code cần thêm:**

```php
// Sorting
$sort = $_GET['sort'] ?? '';
if ($sort === 'price_asc') {
    usort($apartments, fn($a, $b) => $a->price <=> $b->price);
} elseif ($sort === 'price_desc') {
    usort($apartments, fn($a, $b) => $b->price <=> $a->price);
} elseif ($sort === 'area_asc') {
    usort($apartments, fn($a, $b) => $a->area <=> $b->area);
} elseif ($sort === 'area_desc') {
    usort($apartments, fn($a, $b) => $b->area <=> $a->area);
}
```

Trong view, thêm select:
```php
<div class="col-md-3">
    <select class="form-select" name="sort">
        <option value="">Sắp xếp</option>
        <option value="price_asc" <?php echo ($_GET['sort'] ?? '') === 'price_asc' ? 'selected' : ''; ?>>Giá tăng dần</option>
        <option value="price_desc" <?php echo ($_GET['sort'] ?? '') === 'price_desc' ? 'selected' : ''; ?>>Giá giảm dần</option>
        <option value="area_asc" <?php echo ($_GET['sort'] ?? '') === 'area_asc' ? 'selected' : ''; ?>>Diện tích tăng dần</option>
        <option value="area_desc" <?php echo ($_GET['sort'] ?? '') === 'area_desc' ? 'selected' : ''; ?>>Diện tích giảm dần</option>
    </select>
</div>
```

---

### **5. Branch: `feature/apartment-detail-page` (Issue #10)**

```powershell
git checkout feature/apartment-detail-page
# Sửa code...
git add index.php src/Controller/ApartmentController.php src/View/Apartment/show.php
git commit -m "[#10] Create apartment detail page"
git push origin feature/apartment-detail-page
```

**Cần tạo:**
- Method `show()` trong `ApartmentController.php`
- View `src/View/Apartment/show.php`
- Route trong `index.php`

---

## 🔄 Quy trình làm việc chuẩn

### **Mẫu cho mỗi branch:**

```powershell
# 1. Chuyển về main và pull code mới nhất
git checkout main
git pull origin main

# 2. Tạo branch mới (hoặc checkout branch đã có)
git checkout -b feature/tên-tính-năng
# HOẶC
git checkout feature/tên-tính-năng

# 3. Sửa code (mở file trong editor và chỉnh sửa)

# 4. Kiểm tra thay đổi
git status

# 5. Add và commit
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#SỐ_ISSUE] Mô tả tính năng"

# 6. Push lên GitHub
git push -u origin feature/tên-tính-năng
```

---

## ⚠️ Lưu ý quan trọng

1. **Mỗi branch chỉ làm 1 tính năng**
   - Branch `feature/apartment-pagination` → Chỉ thêm pagination
   - Branch `feature/apartment-price-filter` → Chỉ thêm price filter
   - **KHÔNG** mix nhiều tính năng vào 1 branch

2. **Luôn checkout về main trước khi tạo branch mới**
   ```powershell
   git checkout main
   git pull origin main  # Lấy code mới nhất
   git checkout -b feature/tên-mới
   ```

3. **Kiểm tra branch hiện tại trước khi commit**
   ```powershell
   git branch  # Xem dấu * ở đâu
   ```

4. **Commit message phải có issue number**
   ```
   [#6] Add pagination for apartment list
   [#7] Add price range filter for apartments
   ```

---

## 📊 Checklist branches cần làm

- [ ] `feature/apartment-pagination` (Issue #6)
- [ ] `feature/apartment-price-filter` (Issue #7)
- [ ] `feature/apartment-area-filter` (Issue #8)
- [ ] `feature/apartment-sort` (Issue #9)
- [ ] `feature/apartment-detail-page` (Issue #10)
- [ ] `feature/apartment-export-csv` (Issue #11)
- [ ] `feature/apartment-print-view` (Issue #12)
- [ ] `feature/apartment-bulk-delete` (Issue #13)
- [ ] `feature/apartment-statistics-chart` (Issue #14)
- [ ] `feature/apartment-duplicate` (Issue #15)
- [ ] `feature/apartment-import-csv` (Issue #16)
- [ ] `feature/apartment-advanced-search` (Issue #17)
- [ ] `feature/auth-change-password-admin` (Issue #18)
- [ ] `feature/user-validate-phone` (Issue #19)
- [ ] `feature/ui-dark-mode` (Issue #20)
- [ ] `feature/log-apartment-actions` (Issue #21)
- [ ] `feature/custom-error-pages` (Issue #22)

---

## 🎯 Bắt đầu từ đâu?

**Bắt đầu với branch đầu tiên:**

```powershell
# 1. Về main
git checkout main

# 2. Checkout branch pagination
git checkout feature/apartment-pagination

# 3. Mở file và sửa code
# - src/Controller/ApartmentController.php
# - src/View/Apartment/index.php

# 4. Commit và push
git add .
git commit -m "[#6] Add pagination for apartment list"
git push origin feature/apartment-pagination
```

---

**Làm từng branch một, đừng vội!** ✅

