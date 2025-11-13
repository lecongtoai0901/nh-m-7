<?php
namespace App\Model;

use App\Database;

class Product
{
    public $ma_sp;
    public $tensp;
    public $ma_nsx;
    public $ma_loai;
    public $giasp;
    public $mota;

    public function __construct($ma_sp, $tensp, $giasp, $mota = '', $ma_nsx = '', $ma_loai = '')
    {
        $this->ma_sp = $ma_sp;
        $this->tensp = $tensp;
        $this->giasp = $giasp;
        $this->mota = $mota;
        $this->ma_nsx = $ma_nsx;
        $this->ma_loai = $ma_loai;
    }

    /**
     * Lấy tất cả sản phẩm từ MSSQL
     * @param $config config array (from config/config.php)
     * @return array của Product objects
     */
    public static function getAll($config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();
        $products = [];

        if ($conn) {
            try {
                $query = "SELECT ma_sp, tensp, ma_nsx, ma_loai, giasp, mota FROM SanPham";
                $stmt = $conn->query($query);
                while ($row = $stmt->fetch()) {
                    $products[] = new self(
                        $row['ma_sp'],
                        $row['tensp'],
                        $row['giasp'],
                        $row['mota'] ?? '',
                        $row['ma_nsx'] ?? '',
                        $row['ma_loai'] ?? ''
                    );
                }
            } catch (\Exception $e) {
                error_log("Error fetching products: " . $e->getMessage());
                // fallback to sample data
                return self::sampleList();
            }
        } else {
            // Database not connected, use sample data
            return self::sampleList();
        }

        // If no products in DB, return sample
        return count($products) > 0 ? $products : self::sampleList();
    }

    /**
     * Dữ liệu mẫu (fallback)
     */
    public static function sampleList()
    {
        return [
            new self('SP001', 'Guitar Acoustic', 2500000, 'Guitar nhạc cụ chuyên nghiệp', 'NSX001', 'LOA001'),
            new self('SP002', 'Đàn Piano Mini', 5000000, 'Piano mini cho học sinh', 'NSX002', 'LOA002'),
            new self('SP003', 'Sáo Trúc', 150000, 'Sáo trúc truyền thống', 'NSX003', 'LOA003'),
            new self('SP004', 'Trống Nhạc', 800000, 'Trống nhạc gỗ', 'NSX001', 'LOA004'),
            new self('SP005', 'Ukulele Gỗ', 600000, 'Ukulele soprano', 'NSX002', 'LOA001'),
        ];
    }

    /**
     * Lấy sản phẩm theo ID
     */
    public static function getById($ma_sp, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if ($conn) {
            try {
                $query = "SELECT ma_sp, tensp, ma_nsx, ma_loai, giasp, mota FROM SanPham WHERE ma_sp = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$ma_sp]);
                $row = $stmt->fetch();

                if ($row) {
                    return new self(
                        $row['ma_sp'],
                        $row['tensp'],
                        $row['giasp'],
                        $row['mota'] ?? '',
                        $row['ma_nsx'] ?? '',
                        $row['ma_loai'] ?? ''
                    );
                }
            } catch (\Exception $e) {
                error_log("Error fetching product: " . $e->getMessage());
            }
        }
        return null;
    }

    /**
     * Lấy sản phẩm theo loại
     */
    public static function getByCategory($ma_loai, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();
        $products = [];

        if ($conn) {
            try {
                $query = "SELECT ma_sp, tensp, ma_nsx, ma_loai, giasp, mota FROM SanPham WHERE ma_loai = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$ma_loai]);

                while ($row = $stmt->fetch()) {
                    $products[] = new self(
                        $row['ma_sp'],
                        $row['tensp'],
                        $row['giasp'],
                        $row['mota'] ?? '',
                        $row['ma_nsx'] ?? '',
                        $row['ma_loai'] ?? ''
                    );
                }
            } catch (\Exception $e) {
                error_log("Error fetching products by category: " . $e->getMessage());
                return self::sampleList();
            }
        } else {
            return self::sampleList();
        }

        return count($products) > 0 ? $products : self::sampleList();
    }
}
