# Script tự động commit và push tất cả branches
# Chạy script này sau khi code đã được thêm vào các branches

Write-Host "🚀 Tự động commit và push tất cả branches..." -ForegroundColor Green

# Tìm branch main/master
$mainBranch = if (git branch --list main) { "main" } else { "master" }
Write-Host "✅ Branch chính: $mainBranch" -ForegroundColor Cyan

# Danh sách branches và commit messages
$branches = @(
    @{name="feature/apartment-pagination"; issue="#6"; msg="Add pagination for apartment list"},
    @{name="feature/apartment-price-filter"; issue="#7"; msg="Add price range filter for apartments"},
    @{name="feature/apartment-area-filter"; issue="#8"; msg="Add area range filter for apartments"},
    @{name="feature/apartment-sort"; issue="#9"; msg="Add sorting functionality for apartments"},
    @{name="feature/apartment-detail-page"; issue="#10"; msg="Create apartment detail page"},
    @{name="feature/apartment-export-csv"; issue="#11"; msg="Add CSV export functionality"},
    @{name="feature/apartment-print-view"; issue="#12"; msg="Add print-friendly view"},
    @{name="feature/apartment-bulk-delete"; issue="#13"; msg="Add bulk delete functionality"},
    @{name="feature/apartment-statistics-chart"; issue="#14"; msg="Add statistics chart"},
    @{name="feature/apartment-duplicate"; issue="#15"; msg="Add duplicate apartment feature"},
    @{name="feature/apartment-import-csv"; issue="#16"; msg="Add CSV import functionality"},
    @{name="feature/apartment-advanced-search"; issue="#17"; msg="Add advanced search"},
    @{name="feature/auth-change-password-admin"; issue="#18"; msg="Add admin password change"},
    @{name="feature/user-validate-phone"; issue="#19"; msg="Add phone number validation"},
    @{name="feature/ui-dark-mode"; issue="#20"; msg="Add dark mode toggle"},
    @{name="feature/log-apartment-actions"; issue="#21"; msg="Add apartment action logging"},
    @{name="feature/custom-error-pages"; issue="#22"; msg="Add custom 404 error page"}
)

foreach ($branch in $branches) {
    Write-Host "`n📦 Xử lý: $($branch.name)" -ForegroundColor Yellow
    
    # Checkout về main trước
    git checkout $mainBranch 2>&1 | Out-Null
    
    # Checkout branch
    $exists = git branch --list $branch.name
    if ($exists) {
        git checkout $branch.name 2>&1 | Out-Null
    } else {
        Write-Host "   ⚠️  Branch chưa tồn tại, bỏ qua..." -ForegroundColor Yellow
        continue
    }
    
    # Kiểm tra có thay đổi không
    $status = git status --porcelain
    if ($status) {
        Write-Host "   ✅ Có thay đổi, đang commit..." -ForegroundColor Green
        git add .
        git commit -m "[$($branch.issue)] $($branch.msg)" 2>&1 | Out-Null
        
        # Push
        git push -u origin $branch.name 2>&1 | Out-Null
        if ($LASTEXITCODE -eq 0) {
            Write-Host "   ✅ Đã push lên GitHub!" -ForegroundColor Green
        } else {
            Write-Host "   ⚠️  Push thất bại hoặc đã có trên remote" -ForegroundColor Yellow
        }
    } else {
        Write-Host "   ⚠️  Không có thay đổi để commit" -ForegroundColor Yellow
    }
}

Write-Host "`n✅ Hoàn thành!" -ForegroundColor Green
Write-Host "💡 Kiểm tra: git branch -a" -ForegroundColor Cyan

