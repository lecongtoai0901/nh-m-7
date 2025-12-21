# Script setup dự án - Bước đầu tiên
# Script này sẽ:
# 1. Khởi tạo Git (nếu chưa có)
# 2. Commit tất cả code hiện tại
# 3. Tạo các feature branches
# 4. Push lên GitHub

Write-Host "=== SETUP DỰ ÁN - BƯỚC ĐẦU TIÊN ===" -ForegroundColor Green
Write-Host ""

# Kiểm tra xem đã có .git chưa
if (-not (Test-Path ".git")) {
    Write-Host "Đang khởi tạo Git repository..." -ForegroundColor Yellow
    git init
} else {
    Write-Host "✓ Git repository đã tồn tại" -ForegroundColor Green
}

# Kiểm tra remote
Write-Host "`nĐang kiểm tra remote GitHub..." -ForegroundColor Yellow
$remote = git remote get-url origin 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "Đang thêm remote GitHub..." -ForegroundColor Yellow
    git remote add origin https://github.com/lecongtoai0901/nh-m-7.git
} else {
    Write-Host "✓ Remote đã được cấu hình: $remote" -ForegroundColor Green
}

# Tạo hoặc chuyển sang nhánh main
Write-Host "`nĐang setup nhánh main..." -ForegroundColor Yellow
git checkout -b main 2>$null
git checkout main

# Add tất cả files (trừ những file trong .gitignore)
Write-Host "`nĐang thêm files vào Git..." -ForegroundColor Yellow
git add .

# Commit đầu tiên
Write-Host "Đang tạo commit đầu tiên..." -ForegroundColor Yellow
$commitMessage = "Initial commit: Setup project structure with all features

- MVC architecture
- Router system
- Authentication
- Apartment CRUD
- Search and filter
- Product management
- Cart and order
- User management
- Database setup
- Documentation"

git commit -m $commitMessage

if ($LASTEXITCODE -eq 0) {
    Write-Host "✓ Đã commit code vào main" -ForegroundColor Green
} else {
    Write-Host "⚠ Không có thay đổi để commit hoặc đã commit rồi" -ForegroundColor Yellow
}

# Push main lên GitHub
Write-Host "`nĐang push nhánh main lên GitHub..." -ForegroundColor Yellow
git push -u origin main

if ($LASTEXITCODE -eq 0) {
    Write-Host "✓ Đã push main lên GitHub" -ForegroundColor Green
} else {
    Write-Host "⚠ Có thể cần xác thực GitHub hoặc nhánh đã tồn tại" -ForegroundColor Yellow
}

# Danh sách các branches cần tạo
$branches = @(
    "feature/authentication",
    "feature/apartment-crud",
    "feature/apartment-search",
    "feature/database-setup",
    "feature/router-system",
    "feature/product-management",
    "feature/cart-order",
    "feature/user-management"
)

Write-Host "`n=== TẠO CÁC FEATURE BRANCHES ===" -ForegroundColor Cyan

foreach ($branch in $branches) {
    Write-Host "`nĐang tạo branch: $branch" -ForegroundColor Yellow
    
    # Tạo branch từ main
    git checkout -b $branch
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "  ✓ Đã tạo branch: $branch" -ForegroundColor Green
        
        # Push branch lên GitHub
        Write-Host "  Đang push lên GitHub..." -ForegroundColor Yellow
        git push -u origin $branch
        
        if ($LASTEXITCODE -eq 0) {
            Write-Host "  ✓ Đã push $branch lên GitHub" -ForegroundColor Green
        } else {
            Write-Host "  ⚠ Có thể branch đã tồn tại trên GitHub" -ForegroundColor Yellow
        }
    } else {
        Write-Host "  ✗ Lỗi khi tạo branch: $branch" -ForegroundColor Red
    }
    
    # Quay lại main để tạo branch tiếp theo
    git checkout main
}

# Quay lại main
git checkout main

Write-Host "`n=== HOÀN THÀNH! ===" -ForegroundColor Green
Write-Host "`nCác branches đã được tạo:" -ForegroundColor Yellow
foreach ($branch in $branches) {
    Write-Host "  - $branch" -ForegroundColor White
}

Write-Host "`nBước tiếp theo:" -ForegroundColor Cyan
Write-Host "1. Kiểm tra trên GitHub: https://github.com/lecongtoai0901/nh-m-7" -ForegroundColor White
Write-Host "2. Setup Redmine (xem REDMINE_GUIDE.md)" -ForegroundColor White
Write-Host "3. Tạo issues trên Redmine cho mỗi feature" -ForegroundColor White
Write-Host "4. Bắt đầu làm việc trên từng branch" -ForegroundColor White

