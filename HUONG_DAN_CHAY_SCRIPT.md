# 🚀 Hướng dẫn chạy script PowerShell

## ✅ Code đã được thêm vào các branches!

Tôi đã tự động thêm code vào các branches sau:
- ✅ `feature/apartment-pagination` (Issue #6)
- ✅ `feature/apartment-price-filter` (Issue #7)  
- ✅ `feature/apartment-area-filter` (Issue #8)
- ✅ `feature/apartment-sort` (Issue #9)

---

## 📋 Bước tiếp theo: Commit và Push

### Cách 1: Chạy script tự động (Khuyến nghị)

```powershell
# Chạy script để commit và push tất cả branches
.\COMMIT_PUSH_ALL_BRANCHES.ps1
```

Script này sẽ:
1. Tự động checkout từng branch
2. Kiểm tra có thay đổi không
3. Commit với message có issue number
4. Push lên GitHub

---

### Cách 2: Làm thủ công từng branch

#### Branch 1: Pagination
```powershell
git checkout feature/apartment-pagination
git add .
git commit -m "[#6] Add pagination for apartment list"
git push origin feature/apartment-pagination
```

#### Branch 2: Price Filter
```powershell
git checkout feature/apartment-price-filter
git add .
git commit -m "[#7] Add price range filter for apartments"
git push origin feature/apartment-price-filter
```

#### Branch 3: Area Filter
```powershell
git checkout feature/apartment-area-filter
git add .
git commit -m "[#8] Add area range filter for apartments"
git push origin feature/apartment-area-filter
```

#### Branch 4: Sort
```powershell
git checkout feature/apartment-sort
git add .
git commit -m "[#9] Add sorting functionality for apartments"
git push origin feature/apartment-sort
```

---

## ✅ Kiểm tra kết quả

Sau khi push, kiểm tra trên GitHub:
1. Vào: https://github.com/lecongtoai0901/nh-m-7
2. Click vào "branches"
3. Xem các branches đã được push

---

## 💡 Lưu ý

- Script sẽ tự động bỏ qua các branches chưa tồn tại
- Nếu branch đã có commit trên remote, script sẽ báo warning
- Mỗi branch chỉ commit code của tính năng đó

---

**Chạy script ngay bây giờ!** 🚀

