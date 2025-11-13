<?php
namespace App\Model;

use App\Database;

class Category
{
    public $ma_loai;
    public $tenloai;
    public $mota;

    public function __construct($ma_loai, $tenloai, $mota = '')
    {
        $this->ma_loai = $ma_loai;
        $this->tenloai = $tenloai;
        $this->mota = $mota;
    }

    public static function getAll($config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();
        $categories = [];

        if ($conn) {
            try {
                $query = "SELECT ma_loai, tenloai, mota FROM LoaiSanPham";
                $stmt = $conn->query($query);
                while ($row = $stmt->fetch()) {
                    $categories[] = new self(
                        $row['ma_loai'],
                        $row['tenloai'],
                        $row['mota'] ?? ''
                    );
                }
            } catch (\Exception $e) {
                error_log("Error fetching categories: " . $e->getMessage());
                return self::sampleList();
            }
        } else {
            return self::sampleList();
        }

        return count($categories) > 0 ? $categories : self::sampleList();
    }

    public static function getById($ma_loai, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if ($conn) {
            try {
                $query = "SELECT ma_loai, tenloai, mota FROM LoaiSanPham WHERE ma_loai = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$ma_loai]);
                $row = $stmt->fetch();
                if ($row) {
                    return new self($row['ma_loai'], $row['tenloai'], $row['mota'] ?? '');
                }
            } catch (\Exception $e) {
                error_log("Error fetching category: " . $e->getMessage());
            }
        }
        return null;
    }

    public static function sampleList()
    {
        return [
            new self('LOA001', 'Guitar & Ghi-ta', 'Các loại guitar acoustic, điện'),
            new self('LOA002', 'Piano & Organ', 'Đàn piano, organ điện tử'),
            new self('LOA003', 'Sáo & Kèn', 'Sáo trúc, kèn gỗ'),
            new self('LOA004', 'Trống & Gõ', 'Trống, gõ, percussion'),
            new self('LOA005', 'Dây & Phụ kiện', 'Dây đàn, tuner, phụ kiện'),
        ];
    }
}
