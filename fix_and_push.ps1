# Script sửa lỗi remote và push lại các branches

Write-Host "=== SỬA LỖI REMOTE VÀ PUSH BRANCHES ===" -ForegroundColor Green
Write-Host ""

# 1. Sửa remote URL
Write-Host "Đang sửa remote URL..." -ForegroundColor Yellow
git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git

# Kiểm tra lại
$remote = git remote get-url origin
Write-Host "✓ Remote URL hiện tại: $remote" -ForegroundColor Green

# 2. Kiểm tra các branches local
Write-Host "`nĐang kiểm tra các branches local..." -ForegroundColor Yellow
$branches = git branch --format='%(refname:short)'

Write-Host "Các branches đã có:" -ForegroundColor Cyan
$branches | ForEach-Object { Write-Host "  - $_" -ForegroundColor White }

# 3. Danh sách các branches cần push
$featureBranches = @(
    "main",
    "feature/authentication",
    "feature/apartment-crud",
    "feature/apartment-search",
    "feature/database-setup",
    "feature/router-system",
    "feature/product-management",
    "feature/cart-order",
    "feature/user-management"
)

Write-Host "`n=== PUSH CÁC BRANCHES LÊN GITHUB ===" -ForegroundColor Cyan

foreach ($branch in $featureBranches) {
    Write-Host "`nĐang xử lý branch: $branch" -ForegroundColor Yellow
    
    # Checkout branch
    git checkout $branch 2>&1 | Out-Null
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "  ✓ Đã checkout: $branch" -ForegroundColor Green
        
        # Push với force nếu cần (vì có thể đã có trên remote)
        Write-Host "  Đang push lên GitHub..." -ForegroundColor Yellow
        git push -u origin $branch --force 2>&1 | Out-String | ForEach-Object {
            if ($_ -match "error|denied|fatal") {
                Write-Host "  ⚠ Cảnh báo: $_" -ForegroundColor Yellow
            } elseif ($_ -match "Everything up-to-date|Pushed") {
                Write-Host "  ✓ $_" -ForegroundColor Green
            } else {
                Write-Host "  $_" -ForegroundColor White
            }
        }
    } else {
        Write-Host "  ✗ Không tìm thấy branch: $branch" -ForegroundColor Red
    }
}

# Quay lại main
git checkout main

Write-Host "`n=== HOÀN THÀNH! ===" -ForegroundColor Green
Write-Host "`nKiểm tra trên GitHub: https://github.com/lecongtoai0901/nh-m-7" -ForegroundColor Cyan
Write-Host "Bạn sẽ thấy tất cả các branches ở đó." -ForegroundColor White

Write-Host "`nNếu vẫn gặp lỗi permission, hãy:" -ForegroundColor Yellow
Write-Host "1. Kiểm tra xác thực GitHub:" -ForegroundColor White
Write-Host "   git config --global user.name 'Your Name'" -ForegroundColor Gray
Write-Host "   git config --global user.email 'your.email@example.com'" -ForegroundColor Gray
Write-Host "2. Hoặc sử dụng Personal Access Token" -ForegroundColor White

