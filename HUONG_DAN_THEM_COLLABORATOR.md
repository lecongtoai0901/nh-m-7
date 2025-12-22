# 👥 Hướng dẫn thêm Collaborator vào GitHub Repository

## 🔐 Vấn đề

Khi bạn gửi link repository cho người khác, họ không thể push code lên vì **chưa có quyền truy cập**.

**Giải pháp**: Thêm họ vào repository với vai trò **Collaborator**.

---

## ✅ Cách thêm Collaborator (Từng bước)

### Bước 1: Vào Settings của Repository

1. Truy cập: **https://github.com/lecongtoai0901/nh-m-7**
2. Click vào tab **Settings** (ở trên cùng, bên cạnh "Insights")
3. Scroll xuống phần **Access** ở sidebar bên trái
4. Click vào **Collaborators and teams**

### Bước 2: Thêm Collaborator

1. Click nút **"Add people"** hoặc **"Invite a collaborator"**
2. Nhập **username GitHub** hoặc **email** của người bạn muốn thêm
3. Chọn quyền truy cập:
   - **Write** - Cho phép push code (khuyến nghị)
   - **Read** - Chỉ đọc
   - **Admin** - Quyền quản trị
4. Click **"Add [username] to this repository"**

### Bước 3: Người được mời chấp nhận

1. Người được mời sẽ nhận email từ GitHub
2. Họ cần click vào link trong email để chấp nhận lời mời
3. Sau khi chấp nhận, họ có thể push code lên repository

---

## 🔑 Các cách khác để chia sẻ quyền truy cập

### Cách 1: Sử dụng Personal Access Token (PAT)

Nếu không muốn thêm collaborator, người làm chung có thể:

1. **Tạo Personal Access Token**:
   - Vào: https://github.com/settings/tokens
   - Click **"Generate new token"** → **"Generate new token (classic)"**
   - Đặt tên token (ví dụ: "nh-m-7-project")
   - Chọn quyền: ✅ **repo** (Full control of private repositories)
   - Click **"Generate token"**
   - **Copy token ngay** (chỉ hiển thị 1 lần)

2. **Sử dụng token khi push**:
```bash
# Thay [TOKEN] bằng token vừa tạo
git push https://[TOKEN]@github.com/lecongtoai0901/nh-m-7.git main
```

Hoặc cấu hình remote:
```bash
git remote set-url origin https://[TOKEN]@github.com/lecongtoai0901/nh-m-7.git
```

### Cách 2: Sử dụng SSH Key

1. Người làm chung tạo SSH key
2. Thêm SSH key vào GitHub account của họ
3. Clone repository bằng SSH URL:
```bash
git clone git@github.com:lecongtoai0901/nh-m-7.git
```

---

## 📋 Checklist

### Cho bạn (Owner):
- [ ] Đã vào Settings → Collaborators
- [ ] Đã thêm username/email của người làm chung
- [ ] Đã chọn quyền "Write"
- [ ] Đã gửi thông báo cho người làm chung

### Cho người làm chung:
- [ ] Đã nhận email mời từ GitHub
- [ ] Đã click vào link chấp nhận
- [ ] Đã clone repository về máy
- [ ] Đã cấu hình Git (user.name, user.email)
- [ ] Đã test push thành công

---

## 🆘 Troubleshooting

### Lỗi: "Permission denied"
**Nguyên nhân**: Chưa được thêm vào repository hoặc chưa chấp nhận lời mời

**Giải pháp**:
1. Kiểm tra email có lời mời từ GitHub
2. Click vào link chấp nhận
3. Hoặc yêu cầu owner thêm lại

### Lỗi: "remote: Permission to ... denied"
**Nguyên nhân**: Đang dùng credentials sai hoặc chưa có quyền

**Giải pháp**:
1. Kiểm tra đã được thêm vào repository chưa
2. Sử dụng Personal Access Token
3. Hoặc cấu hình SSH key

### Lỗi: "Repository not found"
**Nguyên nhân**: Repository là private và chưa có quyền truy cập

**Giải pháp**: Yêu cầu owner thêm bạn vào Collaborators

---

## 💡 Best Practices

1. **Luôn thêm Collaborators** thay vì chia sẻ password
2. **Sử dụng quyền "Write"** cho người làm chung (không cần Admin)
3. **Kiểm tra email** để chấp nhận lời mời kịp thời
4. **Sử dụng SSH** cho bảo mật tốt hơn HTTPS
5. **Personal Access Token** nếu không muốn thêm collaborator

---

## 📝 Lưu ý

- Repository **Public**: Mọi người có thể xem nhưng không thể push
- Repository **Private**: Cần được thêm vào mới có thể xem/push
- Mỗi collaborator cần **chấp nhận lời mời** qua email
- Có thể xóa collaborator bất cứ lúc nào trong Settings

---

**Sau khi thêm collaborator, người làm chung sẽ có thể push code lên repository!** ✅

