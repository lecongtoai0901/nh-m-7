# 🔧 SỬA LỖI REMOTE VÀ PUSH BRANCHES

## ⚠️ Vấn đề

Bạn gặp lỗi:
```
remote: Permission to Zyuuki-i/PHP-Projects.git denied to lecongtoai0901.
fatal: unable to access 'https://github.com/Zyuuki-i/PHP-Projects.git/': The requested URL returned error: 403
```

**Nguyên nhân**: Remote URL đang trỏ sai repository!

---

## ✅ Giải pháp - Làm theo từng bước

### Bước 1: Kiểm tra remote URL hiện tại

```powershell
git remote -v
```

Bạn sẽ thấy:
```
origin  https://github.com/Zyuuki-i/PHP-Projects.git (fetch)
origin  https://github.com/Zyuuki-i/PHP-Projects.git (push)
```

**Đây là URL SAI!** Cần sửa thành: `https://github.com/lecongtoai0901/nh-m-7.git`

---

### Bước 2: Sửa remote URL

```powershell
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git
```

---

### Bước 3: Kiểm tra lại

```powershell
git remote -v
```

Bây giờ phải hiển thị:
```
origin  https://github.com/lecongtoai0901/nh-m-7.git (fetch)
origin  https://github.com/lecongtoai0901/nh-m-7.git (push)
```

✅ **Đúng rồi!**

---

### Bước 4: Push nhánh main

```powershell
git checkout main
git push -u origin main
```

Nếu thành công, bạn sẽ thấy:
```
Enumerating objects: ...
Writing objects: ...
To https://github.com/lecongtoai0901/nh-m-7.git
 * [new branch]      main -> main
```

---

### Bước 5: Push các feature branches

Các branches đã tồn tại local, chỉ cần push lên:

```powershell
# Branch 1: Authentication
git checkout feature/authentication
git push -u origin feature/authentication

# Branch 2: Apartment CRUD
git checkout feature/apartment-crud
git push -u origin feature/apartment-crud

# Branch 3: Apartment Search
git checkout feature/apartment-search
git push -u origin feature/apartment-search

# Branch 4: Database Setup
git checkout feature/database-setup
git push -u origin feature/database-setup

# Branch 5: Router System
git checkout feature/router-system
git push -u origin feature/router-system

# Branch 6: Product Management
git checkout feature/product-management
git push -u origin feature/product-management

# Branch 7: Cart Order
git checkout feature/cart-order
git push -u origin feature/cart-order

# Branch 8: User Management
git checkout feature/user-management
git push -u origin feature/user-management
```

---

### Bước 6: Quay lại main

```powershell
git checkout main
```

---

## 🚀 Hoặc chạy script tự động

Tôi đã tạo script `fix_and_push.ps1` để làm tự động:

```powershell
.\fix_and_push.ps1
```

Script sẽ:
1. ✅ Sửa remote URL
2. ✅ Push tất cả branches lên GitHub

---

## ✅ Kiểm tra kết quả

1. Truy cập: **https://github.com/lecongtoai0901/nh-m-7**

2. Click vào dropdown **"main"** ở góc trên bên trái

3. Bạn sẽ thấy tất cả các branches:
   - main
   - feature/authentication
   - feature/apartment-crud
   - feature/apartment-search
   - feature/database-setup
   - feature/router-system
   - feature/product-management
   - feature/cart-order
   - feature/user-management

---

## 🆘 Nếu vẫn gặp lỗi

### Lỗi: "Permission denied" sau khi đã sửa remote

Có thể cần xác thực GitHub:

```powershell
# 1. Cấu hình Git
git config --global user.name "lecongtoai0901"
git config --global user.email "your-email@example.com"

# 2. Nếu vẫn lỗi, tạo Personal Access Token
# - Vào: https://github.com/settings/tokens
# - Tạo token mới với quyền "repo"
# - Sử dụng token khi push:
git push https://[YOUR_TOKEN]@github.com/lecongtoai0901/nh-m-7.git main
```

---

## 📝 Tóm tắt các lệnh cần chạy

```powershell
# 1. Sửa remote
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git

# 2. Kiểm tra
git remote -v

# 3. Push main
git checkout main
git push -u origin main

# 4. Push các feature branches (lặp lại cho mỗi branch)
git checkout feature/tên-branch
git push -u origin feature/tên-branch
```

---

**Sau khi hoàn thành, tất cả branches sẽ có trên GitHub!** ✅

