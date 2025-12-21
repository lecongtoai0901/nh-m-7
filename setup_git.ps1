# PowerShell script để setup Git và tạo các nhánh

Write-Host "=== Khởi tạo Git Repository ===" -ForegroundColor Green
if (Test-Path .git) {
    Write-Host "Git repository đã tồn tại" -ForegroundColor Yellow
} else {
    git init
}

Write-Host "`n=== Thêm remote ===" -ForegroundColor Green
$remoteExists = git remote | Select-String -Pattern "origin"
if ($remoteExists) {
    git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git
    Write-Host "Đã cập nhật remote origin" -ForegroundColor Yellow
} else {
    git remote add origin https://github.com/lecongtoai0901/nh-m-7.git
    Write-Host "Đã thêm remote origin" -ForegroundColor Yellow
}

Write-Host "`n=== Tạo commit đầu tiên trên main ===" -ForegroundColor Green
git add .
git commit -m "Initial commit: Project structure" 2>&1 | Out-Null
if ($LASTEXITCODE -eq 0) {
    Write-Host "✓ Đã tạo commit đầu tiên" -ForegroundColor Green
} else {
    Write-Host "⚠ Có thể đã có commit, tiếp tục..." -ForegroundColor Yellow
}

Write-Host "`n=== Tạo các nhánh feature ===" -ForegroundColor Green

# Database setup
Write-Host "`n1. Tạo nhánh feature/database-setup" -ForegroundColor Cyan
git checkout -b feature/database-setup 2>&1 | Out-Null
git add database/
git commit -m "feat: Database setup với apartment_manager schema" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh database-setup" -ForegroundColor Green

# Routing system
Write-Host "`n2. Tạo nhánh feature/routing-system" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/routing-system 2>&1 | Out-Null
git add src/Router.php index.php .htaccess
git commit -m "feat: Routing system với URL rewriting" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh routing-system" -ForegroundColor Green

# Authentication
Write-Host "`n3. Tạo nhánh feature/authentication" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/authentication 2>&1 | Out-Null
git add src/Controller/AuthController.php src/View/Auth/
git commit -m "feat: Authentication system (Login/Logout)" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh authentication" -ForegroundColor Green

# Apartment Management
Write-Host "`n4. Tạo nhánh feature/apartment-management" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/apartment-management 2>&1 | Out-Null
git add src/Controller/ApartmentController.php src/Model/Apartment.php src/View/Apartment/ templates/apartment_layout.php
git commit -m "feat: Apartment Management CRUD operations" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh apartment-management" -ForegroundColor Green

# Product Management
Write-Host "`n5. Tạo nhánh feature/product-management" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/product-management 2>&1 | Out-Null
git add src/Controller/SanPhamController.php src/Model/Product.php src/Model/LoaiSanPham.php src/Model/NhaSanXuat.php src/View/SanPham/
git commit -m "feat: Product Management (SanPham) với filter và search" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh product-management" -ForegroundColor Green

# User Management
Write-Host "`n6. Tạo nhánh feature/user-management" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/user-management 2>&1 | Out-Null
git add src/Controller/UserController.php src/Model/NguoiDung.php src/View/User/
git commit -m "feat: User Management (Đăng ký, đăng nhập, thông tin cá nhân)" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh user-management" -ForegroundColor Green

# Order & Cart Management
Write-Host "`n7. Tạo nhánh feature/order-cart-management" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/order-cart-management 2>&1 | Out-Null
git add src/Controller/DonDatHangController.php src/Model/DonDatHang.php src/Model/ChiTietDonDatHang.php src/View/DonDatHang/
git commit -m "feat: Order và Cart Management" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh order-cart-management" -ForegroundColor Green

# UI Layout
Write-Host "`n8. Tạo nhánh feature/ui-layout" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/ui-layout 2>&1 | Out-Null
git add templates/ assets/ composer.json
git commit -m "feat: UI Layout và templates với Bootstrap 5" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh ui-layout" -ForegroundColor Green

# Configuration
Write-Host "`n9. Tạo nhánh feature/configuration" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/configuration 2>&1 | Out-Null
git add config/ .gitignore
if (Test-Path .env.example) {
    git add .env.example
}
git commit -m "feat: Configuration system với Dotenv" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh configuration" -ForegroundColor Green

# Home Controller
Write-Host "`n10. Tạo nhánh feature/home-controller" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/home-controller 2>&1 | Out-Null
git add src/Controller/HomeController.php src/View/Home/
git commit -m "feat: Home Controller với trang chủ, giới thiệu, đánh giá" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh home-controller" -ForegroundColor Green

# Models
Write-Host "`n11. Tạo nhánh feature/models" -ForegroundColor Cyan
git checkout main 2>&1 | Out-Null
git checkout -b feature/models 2>&1 | Out-Null
git add src/Model/
git commit -m "feat: All Models (Apartment, Product, User, Order, etc.)" 2>&1 | Out-Null
Write-Host "   ✓ Đã tạo nhánh models" -ForegroundColor Green

Write-Host "`n=== Hoàn thành! ===" -ForegroundColor Green
Write-Host "`nCác nhánh đã được tạo. Để push lên GitHub, chạy:" -ForegroundColor Yellow
Write-Host "git push -u origin main" -ForegroundColor Cyan
Write-Host "git push -u origin feature/database-setup" -ForegroundColor Cyan
Write-Host "git push -u origin feature/routing-system" -ForegroundColor Cyan
Write-Host "... (và các nhánh khác)" -ForegroundColor Cyan
Write-Host "`nHoặc chạy script push_all_branches.ps1 để push tất cả" -ForegroundColor Yellow

