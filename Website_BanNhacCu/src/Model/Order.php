<?php
namespace App\Model;

use App\Database;

class Order
{
    public $ma_ddh;
    public $ma_nd;
    public $diachi;
    public $ngaydat;
    public $tongtien;
    public $trangthai;
    public $tt_thanhtoan;

    public function __construct($ma_nd, $diachi, $tongtien = 0, $trangthai = 'Chờ xác nhận', $ma_ddh = null)
    {
        $this->ma_ddh = $ma_ddh;
        $this->ma_nd = $ma_nd;
        $this->diachi = $diachi;
        $this->tongtien = $tongtien;
        $this->trangthai = $trangthai;
        $this->tt_thanhtoan = 'Chưa thanh toán';
        $this->ngaydat = date('Y-m-d H:i:s');
    }

    /**
     * Tạo đơn hàng mới
     */
    public static function create($ma_nd, $diachi, $tongtien, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if (!$conn) {
            return ['success' => false, 'error' => 'Không kết nối được CSDL'];
        }

        try {
            $query = "INSERT INTO DonDatHang (ma_nd, diachi, tongtien, trangthai, tt_thanhtoan) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$ma_nd, $diachi, $tongtien, 'Chờ xác nhận', 'Chưa thanh toán']);

            // Get last insert ID
            $ma_ddh = $conn->lastInsertId();
            return ['success' => true, 'ma_ddh' => $ma_ddh];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => 'Lỗi tạo đơn hàng: ' . $e->getMessage()];
        }
    }

    /**
     * Thêm chi tiết đơn hàng
     */
    public static function addDetail($ma_ddh, $ma_sp, $soluong, $gia, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if (!$conn) {
            return false;
        }

        try {
            $thanhtien = $soluong * $gia;
            $query = "INSERT INTO ChiTietDonDatHang (ma_ddh, ma_sp, soluong, gia, thanhtien) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$ma_ddh, $ma_sp, $soluong, $gia, $thanhtien]);
            return true;
        } catch (\Exception $e) {
            error_log("Error adding order detail: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Lấy đơn hàng theo ID
     */
    public static function getById($ma_ddh, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if (!$conn) {
            return null;
        }

        try {
            $query = "SELECT * FROM DonDatHang WHERE ma_ddh = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$ma_ddh]);
            $row = $stmt->fetch();

            if ($row) {
                $order = new self(
                    $row['ma_nd'],
                    $row['diachi'],
                    $row['tongtien'],
                    $row['trangthai'],
                    $row['ma_ddh']
                );
                $order->tt_thanhtoan = $row['tt_thanhtoan'];
                $order->ngaydat = $row['ngaydat'];
                return $order;
            }
        } catch (\Exception $e) {
            error_log("Error fetching order: " . $e->getMessage());
        }
        return null;
    }

    /**
     * Lấy các đơn hàng của user
     */
    public static function getByUserId($ma_nd, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();
        $orders = [];

        if (!$conn) {
            return $orders;
        }

        try {
            $query = "SELECT * FROM DonDatHang WHERE ma_nd = ? ORDER BY ngaydat DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute([$ma_nd]);

            while ($row = $stmt->fetch()) {
                $order = new self(
                    $row['ma_nd'],
                    $row['diachi'],
                    $row['tongtien'],
                    $row['trangthai'],
                    $row['ma_ddh']
                );
                $order->tt_thanhtoan = $row['tt_thanhtoan'];
                $order->ngaydat = $row['ngaydat'];
                $orders[] = $order;
            }
        } catch (\Exception $e) {
            error_log("Error fetching user orders: " . $e->getMessage());
        }

        return $orders;
    }
}
