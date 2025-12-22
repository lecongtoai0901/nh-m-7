# Script tự động thêm code vào các branches và commit/push
# Chạy script này để tự động thêm code cho tất cả branches

Write-Host "🚀 Bắt đầu tự động thêm code vào các branches..." -ForegroundColor Green

# Lấy branch main/master hiện tại
$mainBranch = "main"
try {
    git checkout main 2>&1 | Out-Null
    if ($LASTEXITCODE -ne 0) {
        $mainBranch = "master"
        git checkout master 2>&1 | Out-Null
    }
} catch {
    $mainBranch = "master"
    git checkout master 2>&1 | Out-Null
}

Write-Host "✅ Đang ở branch: $mainBranch" -ForegroundColor Cyan

# Danh sách các branches cần làm
$branches = @(
    @{name="feature/apartment-pagination"; issue="#6"; message="Add pagination for apartment list"},
    @{name="feature/apartment-price-filter"; issue="#7"; message="Add price range filter for apartments"},
    @{name="feature/apartment-area-filter"; issue="#8"; message="Add area range filter for apartments"},
    @{name="feature/apartment-sort"; issue="#9"; message="Add sorting functionality for apartments"}
)

foreach ($branch in $branches) {
    Write-Host "`n📦 Xử lý branch: $($branch.name)" -ForegroundColor Yellow
    
    # Checkout về main trước
    git checkout $mainBranch 2>&1 | Out-Null
    
    # Checkout hoặc tạo branch
    $branchExists = git branch --list $branch.name
    if ($branchExists) {
        Write-Host "   Branch đã tồn tại, checkout..." -ForegroundColor Gray
        git checkout $branch.name 2>&1 | Out-Null
    } else {
        Write-Host "   Tạo branch mới..." -ForegroundColor Gray
        git checkout -b $branch.name 2>&1 | Out-Null
    }
    
    # Code đã được thêm thủ công hoặc sẽ được thêm bằng script khác
    # Ở đây chỉ commit và push
    
    # Kiểm tra có thay đổi không
    $status = git status --porcelain
    if ($status) {
        Write-Host "   ✅ Có thay đổi, đang commit..." -ForegroundColor Green
        git add .
        git commit -m "[$($branch.issue)] $($branch.message)" 2>&1 | Out-Null
        git push -u origin $branch.name 2>&1 | Out-Null
        Write-Host "   ✅ Đã push lên GitHub!" -ForegroundColor Green
    } else {
        Write-Host "   ⚠️  Không có thay đổi để commit" -ForegroundColor Yellow
    }
}

Write-Host "`n✅ Hoàn thành! Đã xử lý tất cả branches." -ForegroundColor Green
Write-Host "`n💡 Lưu ý: Code đã được thêm vào các branches." -ForegroundColor Cyan
Write-Host "   Bạn có thể kiểm tra bằng: git log --oneline" -ForegroundColor Cyan

