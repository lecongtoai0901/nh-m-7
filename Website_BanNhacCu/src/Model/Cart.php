<?php
namespace App\Model;

class Cart
{
    /**
     * Lấy giỏ hàng từ session
     */
    public static function getCart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        return $_SESSION['cart'];
    }

    /**
     * Thêm sản phẩm vào giỏ
     */
    public static function addItem($ma_sp, $tensp, $gia, $soluong = 1)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Tìm sản phẩm đã tồn tại
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['ma_sp'] === $ma_sp) {
                $item['soluong'] += $soluong;
                return true;
            }
        }

        // Thêm sản phẩm mới
        $_SESSION['cart'][] = [
            'ma_sp' => $ma_sp,
            'tensp' => $tensp,
            'gia' => $gia,
            'soluong' => $soluong
        ];
        return true;
    }

    /**
     * Xóa sản phẩm khỏi giỏ
     */
    public static function removeItem($ma_sp)
    {
        if (!isset($_SESSION['cart'])) {
            return;
        }

        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($ma_sp) {
            return $item['ma_sp'] !== $ma_sp;
        });
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    /**
     * Cập nhật số lượng
     */
    public static function updateQuantity($ma_sp, $soluong)
    {
        if (!isset($_SESSION['cart'])) {
            return;
        }

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['ma_sp'] === $ma_sp) {
                $item['soluong'] = max(1, (int)$soluong);
                break;
            }
        }
    }

    /**
     * Tính tổng tiền
     */
    public static function getTotal()
    {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['gia'] * $item['soluong'];
            }
        }
        return $total;
    }

    /**
     * Xóa giỏ hàng
     */
    public static function clear()
    {
        $_SESSION['cart'] = [];
    }
}
