# Script để push tất cả các nhánh lên GitHub

Write-Host "=== Push tất cả các nhánh lên GitHub ===" -ForegroundColor Green

$branches = @(
    "main",
    "feature/database-setup",
    "feature/routing-system",
    "feature/authentication",
    "feature/apartment-management",
    "feature/product-management",
    "feature/user-management",
    "feature/order-cart-management",
    "feature/ui-layout",
    "feature/configuration",
    "feature/home-controller",
    "feature/models"
)

foreach ($branch in $branches) {
    Write-Host "`nĐang push nhánh: $branch" -ForegroundColor Cyan
    git checkout $branch 2>&1 | Out-Null
    if ($LASTEXITCODE -eq 0) {
        git push -u origin $branch 2>&1 | Out-Null
        if ($LASTEXITCODE -eq 0) {
            Write-Host "  ✓ Đã push $branch" -ForegroundColor Green
        } else {
            Write-Host "  ✗ Lỗi khi push $branch" -ForegroundColor Red
        }
    } else {
        Write-Host "  ✗ Không tìm thấy nhánh $branch" -ForegroundColor Red
    }
}

Write-Host "`n=== Hoàn thành! ===" -ForegroundColor Green
Write-Host "Tất cả các nhánh đã được push lên GitHub" -ForegroundColor Yellow

