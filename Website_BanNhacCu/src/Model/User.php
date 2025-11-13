<?php
namespace App\Model;

use App\Database;

class User
{
    public $ma_nd;
    public $tennd;
    public $email;
    public $sdt;
    public $diachi;
    public $ma_vt;

    public function __construct($tennd, $email, $sdt = '', $diachi = '', $ma_vt = 'USR', $ma_nd = null)
    {
        $this->ma_nd = $ma_nd;
        $this->tennd = $tennd;
        $this->email = $email;
        $this->sdt = $sdt;
        $this->diachi = $diachi;
        $this->ma_vt = $ma_vt;
    }

    /**
     * Đăng ký user mới
     */
    public static function register($tennd, $email, $matkhau, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if (!$conn) {
            return ['success' => false, 'error' => 'Không kết nối được CSDL'];
        }

        try {
            $hashed = password_hash($matkhau, PASSWORD_BCRYPT);
            $query = "INSERT INTO NguoiDung (tennd, email, matkhau, ma_vt) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$tennd, $email, $hashed, 'USR']);
            return ['success' => true, 'message' => 'Đăng ký thành công'];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => 'Email đã tồn tại hoặc lỗi DB'];
        }
    }

    /**
     * Đăng nhập
     */
    public static function login($email, $matkhau, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if (!$conn) {
            return ['success' => false, 'error' => 'Không kết nối được CSDL'];
        }

        try {
            $query = "SELECT ma_nd, tennd, email, matkhau, ma_vt FROM NguoiDung WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$email]);
            $row = $stmt->fetch();

            if ($row && password_verify($matkhau, $row['matkhau'])) {
                return [
                    'success' => true,
                    'user' => new self(
                        $row['tennd'],
                        $row['email'],
                        '',
                        '',
                        $row['ma_vt'],
                        $row['ma_nd']
                    )
                ];
            }
            return ['success' => false, 'error' => 'Email hoặc mật khẩu sai'];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => 'Lỗi đăng nhập: ' . $e->getMessage()];
        }
    }

    public static function getById($ma_nd, $config)
    {
        $db = Database::getInstance($config);
        $conn = $db->getConnection();

        if (!$conn) {
            return null;
        }

        try {
            $query = "SELECT ma_nd, tennd, email, sdt, diachi, ma_vt FROM NguoiDung WHERE ma_nd = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$ma_nd]);
            $row = $stmt->fetch();

            if ($row) {
                return new self(
                    $row['tennd'],
                    $row['email'],
                    $row['sdt'] ?? '',
                    $row['diachi'] ?? '',
                    $row['ma_vt'],
                    $row['ma_nd']
                );
            }
        } catch (\Exception $e) {
            error_log("Error fetching user: " . $e->getMessage());
        }
        return null;
    }
}
