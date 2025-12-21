# 🖥️ HƯỚNG DẪN MỞ CMD/POWERSHELL

## Cách 1: Mở PowerShell trong thư mục dự án (Dễ nhất)

### Bước 1: Mở File Explorer
- Nhấn `Windows + E` hoặc click vào **File Explorer**

### Bước 2: Điều hướng đến thư mục dự án
```
C:\wamp64\www\Mã nguồn mở\PHP-Projects
```

### Bước 3: Mở PowerShell tại đây
- Click vào thanh địa chỉ (address bar) ở trên cùng
- Gõ: `powershell` và nhấn Enter
- Hoặc: Click chuột phải vào khoảng trống trong thư mục → **Open in Terminal** (Windows 11)
- Hoặc: Giữ `Shift` + Click chuột phải → **Open PowerShell window here** (Windows 10)

---

## Cách 2: Mở PowerShell từ Start Menu

1. Nhấn `Windows` hoặc click nút **Start**
2. Gõ: `PowerShell` hoặc `cmd`
3. Click vào **Windows PowerShell** hoặc **Command Prompt**
4. Chuyển đến thư mục dự án:
```powershell
cd "C:\wamp64\www\Mã nguồn mở\PHP-Projects"
```

---

## Cách 3: Mở từ Visual Studio Code / Cursor

Nếu bạn đang dùng VS Code hoặc Cursor:

1. Mở thư mục dự án trong editor
2. Nhấn `` Ctrl + ` `` (dấu backtick) để mở Terminal
3. Hoặc: Menu **Terminal** → **New Terminal**

---

## Cách 4: Mở Command Prompt (CMD) truyền thống

1. Nhấn `Windows + R`
2. Gõ: `cmd` và nhấn Enter
3. Chuyển đến thư mục:
```cmd
cd "C:\wamp64\www\Mã nguồn mở\PHP-Projects"
```

---

## ✅ Kiểm tra đã vào đúng thư mục chưa

Sau khi mở terminal, chạy lệnh:

```powershell
pwd
```

Hoặc:

```cmd
cd
```

Phải hiển thị:
```
C:\wamp64\www\Mã nguồn mở\PHP-Projects
```

---

## 🎯 Sau khi mở được terminal

Bạn có thể chạy các lệnh Git:

```powershell
# Kiểm tra Git
git --version

# Kiểm tra remote
git remote -v

# Sửa remote URL
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git

# Push branches
git push -u origin main
```

---

## 📸 Hình ảnh minh họa

### Windows 10:
1. File Explorer → Đi đến thư mục
2. Click chuột phải → **Open PowerShell window here**

### Windows 11:
1. File Explorer → Đi đến thư mục
2. Click chuột phải → **Open in Terminal**

---

## 💡 Mẹo nhanh

**Cách nhanh nhất:**
1. Mở File Explorer
2. Đi đến: `C:\wamp64\www\Mã nguồn mở\PHP-Projects`
3. Click vào thanh địa chỉ (address bar)
4. Gõ: `powershell` → Enter

**Hoặc:**
1. Nhấn `Windows + R`
2. Gõ: `powershell`
3. Enter
4. Chạy: `cd "C:\wamp64\www\Mã nguồn mở\PHP-Projects"`

---

**Sau khi mở được terminal, bạn có thể chạy tất cả các lệnh Git!** ✅

