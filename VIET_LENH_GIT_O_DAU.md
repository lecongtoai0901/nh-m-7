# 💻 Viết lệnh Git ở đâu?

## ❓ Câu hỏi

Bạn thấy các lệnh như:
```bash
git commit -m "[#6] Add pagination for apartment list"
```

**Nhưng không biết gõ ở đâu?**

---

## ✅ Trả lời: Gõ trong PowerShell/CMD/Terminal

Các lệnh Git phải được **gõ trong cửa sổ Terminal** (PowerShell trên Windows).

---

## 🚀 Cách mở PowerShell trong thư mục dự án

### Cách 1: Từ File Explorer (Dễ nhất)

1. Mở **File Explorer** (nhấn `Windows + E`)
2. Đi đến thư mục dự án:
   ```
   C:\wamp64\www\Mã nguồn mở\PHP-Projects
   ```
3. Click vào **thanh địa chỉ** (address bar) ở trên cùng
4. Gõ: `powershell` và nhấn **Enter**

Bạn sẽ thấy cửa sổ PowerShell mở ra với dòng lệnh:
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects>
```

**Đây là nơi bạn gõ các lệnh Git!**

---

### Cách 2: Click chuột phải

1. Mở **File Explorer**
2. Đi đến thư mục: `C:\wamp64\www\Mã nguồn mở\PHP-Projects`
3. Click chuột phải vào khoảng trống trong thư mục
4. Chọn:
   - **Open PowerShell window here** (Windows 10)
   - **Open in Terminal** (Windows 11)

---

### Cách 3: Từ Start Menu

1. Nhấn phím `Windows`
2. Gõ: `powershell`
3. Click vào **Windows PowerShell**
4. Gõ lệnh chuyển thư mục:
```powershell
cd "C:\wamp64\www\Mã nguồn mở\PHP-Projects"
```

---

## 📝 Ví dụ thực tế

### Bước 1: Mở PowerShell

Bạn sẽ thấy cửa sổ đen/xanh với dòng lệnh:
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects>
```

### Bước 2: Gõ lệnh Git

**Ví dụ 1: Xem branch hiện tại**
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects> git branch
```

Nhấn **Enter**, bạn sẽ thấy:
```
* feature/apartment-pagination
  main
```

**Ví dụ 2: Commit với issue reference**
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects> git commit -m "[#6] Add pagination for apartment list"
```

Nhấn **Enter**, bạn sẽ thấy:
```
[feature/apartment-pagination abc1234] Add pagination for apartment list
 2 files changed, 45 insertions(+), 12 deletions(-)
```

**Ví dụ 3: Push lên GitHub**
```
PS C:\wamp64\www\Mã nguồn mở\PHP-Projects> git push origin feature/apartment-pagination
```

Nhấn **Enter**, bạn sẽ thấy:
```
Enumerating objects: 5, done.
Writing objects: 100% (3/3), done.
To https://github.com/lecongtoai0901/nh-m-7.git
 * [new branch]      feature/apartment-pagination -> feature/apartment-pagination
```

---

## 🎯 Lưu ý quan trọng

### ✅ ĐÚNG:
- Gõ trực tiếp vào PowerShell
- Copy lệnh từ file `.md` nhưng **bỏ dấu backtick** (`)
- Nhấn **Enter** sau mỗi lệnh

### ❌ SAI:
- Gõ vào Notepad/Word
- Copy cả dấu backtick `git commit...`
- Gõ vào chat/email

---

## 📸 Hình ảnh minh họa

```
┌─────────────────────────────────────────┐
│  Windows PowerShell                     │
├─────────────────────────────────────────┤
│                                         │
│  PS C:\wamp64\www\Mã nguồn mở\         │
│  PHP-Projects> git branch              │
│                                         │
│  * feature/apartment-pagination        │
│    main                                 │
│                                         │
│  PS C:\wamp64\www\Mã nguồn mở\         │
│  PHP-Projects> git commit -m "[#6]... │
│                                         │
│  [feature/apartment-pagination abc123] │
│  2 files changed...                    │
│                                         │
│  PS C:\wamp64\www\Mã nguồn mở\         │
│  PHP-Projects> _                       │
│                                         │
└─────────────────────────────────────────┘
         ↑
    Đây là nơi bạn gõ lệnh!
```

---

## 🔍 Kiểm tra đã vào đúng thư mục chưa

Sau khi mở PowerShell, gõ:

```powershell
pwd
```

Hoặc:

```powershell
cd
```

Phải hiển thị:
```
C:\wamp64\www\Mã nguồn mở\PHP-Projects
```

Nếu không đúng, gõ:

```powershell
cd "C:\wamp64\www\Mã nguồn mở\PHP-Projects"
```

---

## 💡 Tips

1. **Luôn mở PowerShell trong thư mục dự án** trước khi chạy lệnh Git
2. **Copy lệnh từ file `.md`** nhưng chỉ copy phần trong dấu backtick
3. **Nhấn Enter** sau mỗi lệnh để thực thi
4. **Xem kết quả** trên màn hình PowerShell

---

## ✅ Checklist

- [ ] Đã mở PowerShell
- [ ] Đã vào đúng thư mục dự án (`C:\wamp64\www\Mã nguồn mở\PHP-Projects`)
- [ ] Đã hiểu cách gõ lệnh Git vào PowerShell
- [ ] Đã test với lệnh `git branch`

---

**Tóm lại: Gõ các lệnh Git trực tiếp vào cửa sổ PowerShell trong thư mục dự án!** 💻

