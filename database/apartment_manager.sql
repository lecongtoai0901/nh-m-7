CREATE DATABASE IF NOT EXISTS apartment_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE apartment_manager;

DROP TABLE IF EXISTS apartments;
CREATE TABLE apartments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    building VARCHAR(50) NOT NULL,
    floor INT NOT NULL,
    bedrooms INT NOT NULL,
    bathrooms INT NOT NULL,
    area INT NOT NULL,
    price DECIMAL(14,2) NOT NULL,
    status ENUM('available','rented','maintenance') NOT NULL DEFAULT 'available',
    owner_name VARCHAR(120),
    owner_phone VARCHAR(30),
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO apartments (name, building, floor, bedrooms, bathrooms, area, price, status, owner_name, owner_phone, note) VALUES
('Căn hộ A101', 'A', 1, 2, 1, 65, 850000000, 'available', 'Nguyễn Văn A', '0901234567', 'View nội khu'),
('Căn hộ A202', 'A', 2, 3, 2, 90, 1250000000, 'rented', 'Trần Thị B', '0902234567', 'Full nội thất'),
('Căn hộ A305', 'A', 3, 2, 2, 78, 980000000, 'available', 'Lê Văn C', '0903234567', 'Ban công rộng'),
('Căn hộ B110', 'B', 11, 3, 2, 102, 1650000000, 'maintenance', 'Phạm Thị D', '0904234567', 'Đang sửa bếp'),
('Căn hộ B501', 'B', 5, 1, 1, 50, 650000000, 'available', 'Võ Văn E', '0905234567', 'Phù hợp thuê'),
('Căn hộ B1203', 'B', 12, 4, 3, 130, 2250000000, 'rented', 'Đỗ Thị F', '0906234567', 'Hướng Đông Nam'),
('Căn hộ C708', 'C', 7, 2, 1, 70, 890000000, 'available', 'Huỳnh Văn G', '0907234567', 'Gần thang máy'),
('Căn hộ C909', 'C', 9, 3, 2, 95, 1390000000, 'available', 'Bùi Thị H', '0908234567', 'View sông'),
('Căn hộ C1502', 'C', 15, 2, 2, 88, 1180000000, 'rented', 'Ngô Văn I', '0909234567', 'Tầng cao, thoáng'),
('Căn hộ D301', 'D', 3, 1, 1, 45, 540000000, 'available', 'Phan Thị J', '0910234567', 'Giá tốt'),
('Căn hộ D602', 'D', 6, 2, 2, 76, 990000000, 'available', 'Trịnh Văn K', '0911234567', 'Nội thất mới'),
('Căn hộ D903', 'D', 9, 3, 2, 105, 1680000000, 'rented', 'Mai Thị L', '0912234567', 'Căn góc'),
('Căn hộ E204', 'E', 2, 2, 1, 68, 870000000, 'available', 'Tạ Văn M', '0913234567', 'Ban công rộng'),
('Căn hộ E1205', 'E', 12, 4, 3, 135, 2380000000, 'maintenance', 'Trương Thị N', '0914234567', 'Đang bảo trì điều hòa'),
('Căn hộ F1508', 'F', 15, 3, 2, 110, 1980000000, 'available', 'Đặng Văn P', '0915234567', 'View hồ bơi');

