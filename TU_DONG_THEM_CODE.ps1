# Script tự động thêm code vào các branches
# Chạy: .\TU_DONG_THEM_CODE.ps1

Write-Host "🚀 Tự động thêm code vào các branches..." -ForegroundColor Green

# Tìm branch main/master
$mainBranch = if (git branch --list main) { "main" } else { "master" }
git checkout $mainBranch | Out-Null
Write-Host "✅ Đang ở branch: $mainBranch" -ForegroundColor Cyan

# Branch 1: Pagination
Write-Host "`n📦 Branch: feature/apartment-pagination" -ForegroundColor Yellow
git checkout feature/apartment-pagination 2>&1 | Out-Null
if ($LASTEXITCODE -ne 0) {
    git checkout -b feature/apartment-pagination | Out-Null
}
# Code đã được thêm ở trên
git add .
git commit -m "[#6] Add pagination for apartment list" 2>&1 | Out-Null
git push -u origin feature/apartment-pagination 2>&1 | Out-Null
Write-Host "   ✅ Done!" -ForegroundColor Green

# Branch 2: Price Filter  
Write-Host "`n📦 Branch: feature/apartment-price-filter" -ForegroundColor Yellow
git checkout $mainBranch | Out-Null
git checkout feature/apartment-price-filter 2>&1 | Out-Null
if ($LASTEXITCODE -ne 0) {
    git checkout -b feature/apartment-price-filter | Out-Null
}
# Code đã được thêm ở trên
git add .
git commit -m "[#7] Add price range filter for apartments" 2>&1 | Out-Null
git push -u origin feature/apartment-price-filter 2>&1 | Out-Null
Write-Host "   ✅ Done!" -ForegroundColor Green

# Branch 3: Area Filter
Write-Host "`n📦 Branch: feature/apartment-area-filter" -ForegroundColor Yellow
git checkout $mainBranch | Out-Null
git checkout feature/apartment-area-filter 2>&1 | Out-Null
if ($LASTEXITCODE -ne 0) {
    git checkout -b feature/apartment-area-filter | Out-Null
}
# Sẽ thêm code area filter
Write-Host "   ⚠️  Cần thêm code area filter" -ForegroundColor Yellow

# Branch 4: Sort
Write-Host "`n📦 Branch: feature/apartment-sort" -ForegroundColor Yellow
git checkout $mainBranch | Out-Null
git checkout feature/apartment-sort 2>&1 | Out-Null
if ($LASTEXITCODE -ne 0) {
    git checkout -b feature/apartment-sort | Out-Null
}
# Sẽ thêm code sort
Write-Host "   ⚠️  Cần thêm code sort" -ForegroundColor Yellow

Write-Host "`n✅ Hoàn thành!" -ForegroundColor Green

