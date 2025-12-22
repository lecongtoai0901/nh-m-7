# 🔄 Hướng dẫn Pull Code từ GitHub về Local

## 🔍 Vấn đề: Không thấy code của người làm chung

Có thể do:
1. ✅ Họ push lên **branch khác** (không phải branch bạn đang xem)
2. ✅ Bạn chưa **pull code về local**
3. ✅ Họ chưa **merge vào main**
4. ✅ Bạn đang xem **branch cũ**

---

## ✅ Cách kiểm tra và Pull Code

### Bước 1: Kiểm tra trên GitHub

1. Truy cập: **https://github.com/lecongtoai0901/nh-m-7**

2. **Kiểm tra các branches**:
   - Click vào dropdown **"main"** (góc trên bên trái)
   - Xem tất cả các branches
   - Click vào branch mà người làm chung đã push

3. **Kiểm tra commits gần đây**:
   - Ở trang chủ repository, scroll xuống phần **"Recent commits"**
   - Xem có commits mới từ người làm chung không

4. **Kiểm tra Pull Requests**:
   - Click tab **"Pull requests"**
   - Xem có PR nào đang chờ merge không

---

### Bước 2: Pull code về local

#### Cách 1: Pull từ branch main

```powershell
# 1. Đảm bảo đang ở branch main
git checkout main

# 2. Pull code mới nhất từ GitHub
git pull origin main

# 3. Kiểm tra xem có thay đổi không
git log --oneline -10
```

#### Cách 2: Pull từ branch cụ thể

Nếu người làm chung push lên branch khác (ví dụ: `feature/authentication`):

```powershell
# 1. Chuyển sang branch đó
git checkout feature/authentication

# 2. Pull code mới nhất
git pull origin feature/authentication

# 3. Xem thay đổi
git log --oneline -10
```

#### Cách 3: Fetch tất cả branches

```powershell
# 1. Fetch tất cả thay đổi từ GitHub
git fetch origin

# 2. Xem tất cả branches (cả local và remote)
git branch -a

# 3. Xem commits trên remote branch
git log origin/main --oneline -10

# 4. Pull về local
git pull origin main
```

---

### Bước 3: Kiểm tra thay đổi

Sau khi pull, kiểm tra:

```powershell
# Xem các file đã thay đổi
git status

# Xem chi tiết thay đổi
git diff

# Xem lịch sử commits
git log --oneline --graph --all -20
```

---

## 🔄 Workflow đúng khi làm việc nhóm

### Khi bắt đầu làm việc mỗi ngày:

```powershell
# 1. Pull code mới nhất từ GitHub
git checkout main
git pull origin main

# 2. Chuyển sang branch làm việc
git checkout feature/tên-branch

# 3. Merge code mới từ main vào branch của bạn (nếu cần)
git merge main
```

### Khi người khác đã push code:

```powershell
# 1. Kiểm tra branch họ đã push
# (Xem trên GitHub hoặc hỏi họ)

# 2. Pull code từ branch đó
git checkout feature/tên-branch-của-họ
git pull origin feature/tên-branch-của-họ

# 3. Hoặc merge vào branch của bạn
git checkout feature/branch-của-bạn
git merge feature/tên-branch-của-họ
```

---

## 📋 Checklist kiểm tra

### Trên GitHub:
- [ ] Đã vào đúng repository: `lecongtoai0901/nh-m-7`
- [ ] Đã kiểm tra tất cả branches (click dropdown "main")
- [ ] Đã xem "Recent commits" để thấy commits mới
- [ ] Đã kiểm tra tab "Pull requests"

### Trên Local:
- [ ] Đã chạy `git fetch origin` để cập nhật thông tin
- [ ] Đã chạy `git pull origin main` (hoặc branch tương ứng)
- [ ] Đã kiểm tra `git log` để thấy commits mới
- [ ] Đã kiểm tra `git status` để thấy file thay đổi

---

## 🆘 Troubleshooting

### Không thấy code sau khi pull

**Kiểm tra branch**:
```powershell
# Xem branch hiện tại
git branch

# Xem tất cả branches (cả remote)
git branch -a

# Xem commits trên remote
git log origin/main --oneline
```

**Nếu vẫn không thấy**:
1. Hỏi người làm chung họ push lên branch nào
2. Kiểm tra trên GitHub xem có commits mới không
3. Đảm bảo đang xem đúng branch

### Lỗi: "Your branch is behind"

```powershell
# Pull code mới nhất
git pull origin main

# Hoặc nếu có conflict, merge thủ công
git fetch origin
git merge origin/main
```

### Lỗi: "Updates were rejected"

```powershell
# Nếu có thay đổi local chưa commit
git stash  # Lưu tạm thay đổi
git pull origin main
git stash pop  # Khôi phục thay đổi
```

---

## 💡 Best Practices

1. **Luôn pull trước khi làm việc**:
   ```powershell
   git checkout main
   git pull origin main
   ```

2. **Kiểm tra GitHub thường xuyên**:
   - Xem commits mới
   - Xem Pull Requests
   - Xem các branches mới

3. **Giao tiếp với team**:
   - Thông báo khi push code
   - Nói rõ push lên branch nào
   - Thông báo khi merge vào main

4. **Sử dụng Pull Requests**:
   - Tạo PR để review code
   - Merge vào main sau khi approve
   - Không push trực tiếp lên main

---

## 🎯 Tóm tắt các lệnh quan trọng

```powershell
# 1. Cập nhật thông tin từ GitHub
git fetch origin

# 2. Xem tất cả branches
git branch -a

# 3. Pull code từ main
git checkout main
git pull origin main

# 4. Pull code từ branch khác
git checkout feature/tên-branch
git pull origin feature/tên-branch

# 5. Xem commits mới
git log --oneline -10

# 6. Xem thay đổi
git status
git diff
```

---

**Sau khi pull, bạn sẽ thấy tất cả code mới từ người làm chung!** ✅

