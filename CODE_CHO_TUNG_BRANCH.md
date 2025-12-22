# 💻 Code cụ thể cho từng branch

## ⚠️ QUAN TRỌNG: Đọc kỹ trước khi làm!

1. **Mỗi branch chỉ làm 1 tính năng**
2. **Luôn checkout về main trước khi làm branch mới**
3. **Copy code đúng vào đúng chỗ**

---

## 📋 Branch 1: `feature/apartment-pagination` (Issue #6)

### Bước 1: Checkout branch
```powershell
git checkout main
git checkout feature/apartment-pagination
```

### Bước 2: Sửa `src/Controller/ApartmentController.php`

**Tìm method `index()` (dòng 37-72), thay thế TOÀN BỘ method này:**

```php
public function index()
{
    $this->requireAuth();
    $pdo = $this->pdo();
    $apartments = Apartment::all($pdo);

    // filter
    $status = $_GET['status'] ?? '';
    if ($status) {
        $apartments = array_values(array_filter($apartments, fn($a) => $a->status === $status));
    }

    $search = trim($_GET['q'] ?? '');
    if ($search !== '') {
        $apartments = array_values(array_filter($apartments, function ($a) use ($search) {
            return str_contains(mb_strtolower($a->name), mb_strtolower($search))
                || str_contains(mb_strtolower($a->building), mb_strtolower($search))
                || str_contains(mb_strtolower($a->owner_name ?? ''), mb_strtolower($search));
        }));
    }

    // Pagination logic
    $page = max(1, (int)($_GET['page'] ?? 1));
    $perPage = 10;
    $total = count($apartments);
    $totalPages = ceil($total / $perPage);
    $offset = ($page - 1) * $perPage;
    $pagedApartments = array_slice($apartments, $offset, $perPage);

    $stats = [
        'total' => count($apartments),
        'available' => count(array_filter($apartments, fn($a) => $a->status === 'available')),
        'rented' => count(array_filter($apartments, fn($a) => $a->status === 'rented')),
        'maintenance' => count(array_filter($apartments, fn($a) => $a->status === 'maintenance')),
    ];

    $content = $this->view('index.php', [
        'apartments' => $pagedApartments,
        'stats' => $stats,
        'search' => $search,
        'status' => $status,
        'page' => $page,
        'totalPages' => $totalPages,
    ]);
    return $this->render('apartment_layout.php', ['content' => $content, 'title' => 'Quản lý căn hộ']);
}
```

### Bước 3: Sửa `src/View/Apartment/index.php`

**Thêm vào CUỐI file (sau dòng 123, trước thẻ đóng `</div>`):**

```php
            <!-- Pagination -->
            <?php if (isset($totalPages) && $totalPages > 1): ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $baseUrl; ?>/Apartments?page=<?php echo $page - 1; ?>&q=<?php echo urlencode($search ?? ''); ?>&status=<?php echo urlencode($status ?? ''); ?>">Trước</a>
                            </li>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                                <a class="page-link" href="<?php echo $baseUrl; ?>/Apartments?page=<?php echo $i; ?>&q=<?php echo urlencode($search ?? ''); ?>&status=<?php echo urlencode($status ?? ''); ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        
                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $baseUrl; ?>/Apartments?page=<?php echo $page + 1; ?>&q=<?php echo urlencode($search ?? ''); ?>&status=<?php echo urlencode($status ?? ''); ?>">Sau</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
```

### Bước 4: Commit và push
```powershell
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#6] Add pagination for apartment list"
git push origin feature/apartment-pagination
```

---

## 📋 Branch 2: `feature/apartment-price-filter` (Issue #7)

### Bước 1: Checkout branch
```powershell
git checkout main
git checkout feature/apartment-price-filter
```

### Bước 2: Sửa `src/Controller/ApartmentController.php`

**Trong method `index()`, thêm SAU phần search (sau dòng 56, trước phần stats):**

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

### Bước 3: Sửa `src/View/Apartment/index.php`

**Trong form (dòng 47), thêm SAU dòng 50 (sau input search):**

```php
                <div class="col-md-3">
                    <input type="number" class="form-control" name="min_price" placeholder="Giá tối thiểu" value="<?php echo htmlspecialchars($_GET['min_price'] ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="max_price" placeholder="Giá tối đa" value="<?php echo htmlspecialchars($_GET['max_price'] ?? ''); ?>">
                </div>
```

**Và sửa lại class của các col để phù hợp:**
- `col-md-6` → `col-md-4` (cho input search)
- `col-md-3` → `col-md-2` (cho select status)
- `col-md-3` → `col-md-2` (cho button)

### Bước 4: Commit và push
```powershell
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#7] Add price range filter for apartments"
git push origin feature/apartment-price-filter
```

---

## 📋 Branch 3: `feature/apartment-area-filter` (Issue #8)

### Bước 1: Checkout branch
```powershell
git checkout main
git checkout feature/apartment-area-filter
```

### Bước 2: Sửa `src/Controller/ApartmentController.php`

**Trong method `index()`, thêm SAU phần price filter (hoặc sau search nếu chưa có price filter):**

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

### Bước 3: Sửa `src/View/Apartment/index.php`

**Trong form, thêm SAU input price (hoặc sau input search nếu chưa có price filter):**

```php
                <div class="col-md-3">
                    <input type="number" class="form-control" name="min_area" placeholder="Diện tích tối thiểu (m²)" value="<?php echo htmlspecialchars($_GET['min_area'] ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="max_area" placeholder="Diện tích tối đa (m²)" value="<?php echo htmlspecialchars($_GET['max_area'] ?? ''); ?>">
                </div>
```

### Bước 4: Commit và push
```powershell
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#8] Add area range filter for apartments"
git push origin feature/apartment-area-filter
```

---

## 📋 Branch 4: `feature/apartment-sort` (Issue #9)

### Bước 1: Checkout branch
```powershell
git checkout main
git checkout feature/apartment-sort
```

### Bước 2: Sửa `src/Controller/ApartmentController.php`

**Trong method `index()`, thêm SAU phần filter (trước phần stats):**

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

### Bước 3: Sửa `src/View/Apartment/index.php`

**Trong form, thêm SAU select status (sau dòng 58):**

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

### Bước 4: Commit và push
```powershell
git add src/Controller/ApartmentController.php src/View/Apartment/index.php
git commit -m "[#9] Add sorting functionality for apartments"
git push origin feature/apartment-sort
```

---

## ✅ Checklist

Sau khi làm xong mỗi branch, kiểm tra:

- [ ] Code đã được thêm đúng chỗ
- [ ] Commit message có issue number: `[#SỐ]`
- [ ] Push thành công lên GitHub
- [ ] Test trên trình duyệt xem tính năng có hoạt động không

---

## 🚀 Bắt đầu làm ngay!

**Làm từng branch một, đừng vội!**

1. Bắt đầu với branch `feature/apartment-pagination`
2. Làm xong → commit → push
3. Chuyển sang branch tiếp theo
4. Lặp lại cho đến hết

---

**Chúc bạn thành công!** 🎉

