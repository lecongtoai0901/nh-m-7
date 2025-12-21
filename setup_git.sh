#!/bin/bash
# Script để setup Git và tạo các nhánh

echo "=== Khởi tạo Git Repository ==="
git init

echo "=== Thêm remote ==="
git remote add origin https://github.com/lecongtoai0901/nh-m-7.git || git remote set-url origin https://github.com/lecongtoai0901/nh-m-7.git

echo "=== Tạo commit đầu tiên trên main ==="
git add .
git commit -m "Initial commit: Project structure"

echo "=== Tạo các nhánh feature ==="

# Database setup
git checkout -b feature/database-setup
git add database/
git commit -m "feat: Database setup với apartment_manager schema"

# Routing system
git checkout main
git checkout -b feature/routing-system
git add src/Router.php index.php .htaccess
git commit -m "feat: Routing system với URL rewriting"

# Authentication
git checkout main
git checkout -b feature/authentication
git add src/Controller/AuthController.php src/View/Auth/
git commit -m "feat: Authentication system (Login/Logout)"

# Apartment Management
git checkout main
git checkout -b feature/apartment-management
git add src/Controller/ApartmentController.php src/Model/Apartment.php src/View/Apartment/ templates/apartment_layout.php
git commit -m "feat: Apartment Management CRUD operations"

# Product Management
git checkout main
git checkout -b feature/product-management
git add src/Controller/SanPhamController.php src/Model/Product.php src/Model/LoaiSanPham.php src/Model/NhaSanXuat.php src/View/SanPham/
git commit -m "feat: Product Management (SanPham) với filter và search"

# User Management
git checkout main
git checkout -b feature/user-management
git add src/Controller/UserController.php src/Model/NguoiDung.php src/View/User/
git commit -m "feat: User Management (Đăng ký, đăng nhập, thông tin cá nhân)"

# Order & Cart Management
git checkout main
git checkout -b feature/order-cart-management
git add src/Controller/DonDatHangController.php src/Model/DonDatHang.php src/Model/ChiTietDonDatHang.php src/View/DonDatHang/
git commit -m "feat: Order và Cart Management"

# UI Layout
git checkout main
git checkout -b feature/ui-layout
git add templates/ assets/ composer.json
git commit -m "feat: UI Layout và templates với Bootstrap 5"

# Configuration
git checkout main
git checkout -b feature/configuration
git add config/ .gitignore .env.example
git commit -m "feat: Configuration system với Dotenv"

echo "=== Hoàn thành! ==="
echo "Các nhánh đã được tạo. Sử dụng 'git push -u origin <branch-name>' để push từng nhánh"

