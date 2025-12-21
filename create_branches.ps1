# Script tạo các branches và push lên GitHub
# Chạy script này để tạo tất cả các feature branches

Write-Host "=== Tạo các Feature Branches ===" -ForegroundColor Green

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

# Đảm bảo đang ở nhánh main
Write-Host "`nĐang chuyển sang nhánh main..." -ForegroundColor Yellow
git checkout -b main 2>$null
git checkout main

# Commit tất cả thay đổi hiện tại vào main trước
Write-Host "`nĐang commit code hiện tại vào main..." -ForegroundColor Yellow
git add .
$commitMessage = "Initial commit: Setup project structure and all features"
git commit -m $commitMessage

# Push main lên GitHub
Write-Host "`nĐang push main lên GitHub..." -ForegroundColor Yellow
git push -u origin main

# Tạo từng branch
foreach ($branch in $branches) {
    Write-Host "`n=== Tạo branch: $branch ===" -ForegroundColor Cyan
    
    # Tạo và checkout branch mới từ main
    git checkout -b $branch
    
    # Push branch lên GitHub
    git push -u origin $branch
    
    Write-Host "✓ Đã tạo và push branch: $branch" -ForegroundColor Green
}

# Quay lại main
git checkout main

Write-Host "`n=== Hoàn thành! ===" -ForegroundColor Green
Write-Host "Đã tạo các branches:" -ForegroundColor Yellow
foreach ($branch in $branches) {
    Write-Host "  - $branch" -ForegroundColor White
}

Write-Host "`nĐể làm việc trên một branch:" -ForegroundColor Yellow
Write-Host "  git checkout feature/tên-branch" -ForegroundColor White
Write-Host "`nĐể push thay đổi:" -ForegroundColor Yellow
Write-Host "  git add ." -ForegroundColor White
Write-Host "  git commit -m '[#issue] Mô tả'" -ForegroundColor White
Write-Host "  git push origin feature/tên-branch" -ForegroundColor White

