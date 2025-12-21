#!/bin/bash
# Script tạo các branches và push lên GitHub (cho Linux/Mac)

echo "=== Tạo các Feature Branches ==="

# Danh sách các branches
branches=(
    "feature/authentication"
    "feature/apartment-crud"
    "feature/apartment-search"
    "feature/database-setup"
    "feature/router-system"
    "feature/product-management"
    "feature/cart-order"
    "feature/user-management"
)

# Đảm bảo đang ở nhánh main
echo ""
echo "Đang chuyển sang nhánh main..."
git checkout -b main 2>/dev/null
git checkout main

# Commit tất cả thay đổi
echo ""
echo "Đang commit code hiện tại vào main..."
git add .
git commit -m "Initial commit: Setup project structure and all features"

# Push main
echo ""
echo "Đang push main lên GitHub..."
git push -u origin main

# Tạo từng branch
for branch in "${branches[@]}"; do
    echo ""
    echo "=== Tạo branch: $branch ==="
    git checkout -b "$branch"
    git push -u origin "$branch"
    echo "✓ Đã tạo và push branch: $branch"
done

# Quay lại main
git checkout main

echo ""
echo "=== Hoàn thành! ==="
echo "Đã tạo các branches:"
for branch in "${branches[@]}"; do
    echo "  - $branch"
done

