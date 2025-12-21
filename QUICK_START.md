# 🚀 Hướng dẫn nhanh - Setup Git Branches

## Bước 1: Chạy script tạo branches

### Trên Windows (PowerShell):
```powershell
.\create_branches.ps1
```

### Trên Linux/Mac:
```bash
chmod +x setup_git_branches.sh
./setup_git_branches.sh
```

## Bước 2: Kiểm tra các branches đã tạo

```bash
git branch -a
```

Bạn sẽ thấy:
- main
- feature/authentication
- feature/apartment-crud
- feature/apartment-search
- feature/database-setup
- feature/router-system
- feature/product-management
- feature/cart-order
- feature/user-management

## Bước 3: Làm việc trên một branch

```bash
# Chuyển sang branch
git checkout feature/authentication

# Làm thay đổi, sau đó commit
git add .
git commit -m "[#1] Implement authentication"

# Push lên GitHub
git push origin feature/authentication
```

## Bước 4: Tạo Issues trên Redmine

1. Đăng nhập Redmine
2. Tạo project: "Hệ thống Quản lý Căn hộ"
3. Tạo 8 issues tương ứng với 8 branches
4. Mỗi commit nên tham chiếu issue: `[#issue-number] Mô tả`

## 📝 Checklist

- [ ] Đã chạy script tạo branches
- [ ] Đã push tất cả branches lên GitHub
- [ ] Đã tạo project trên Redmine
- [ ] Đã tạo issues cho mỗi feature
- [ ] Đã cấu hình repository trên Redmine
- [ ] Đã test commit với issue reference

## 🔗 Liên kết

- GitHub: https://github.com/lecongtoai0901/nh-m-7
- Redmine: [URL Redmine của bạn]

## ❓ Troubleshooting

### Lỗi: "remote origin already exists"
```bash
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git
```

### Lỗi: "branch already exists"
```bash
# Xóa branch local
git branch -D feature/tên-branch

# Chạy lại script
```

### Lỗi: "Permission denied"
```bash
# Kiểm tra quyền truy cập GitHub
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

