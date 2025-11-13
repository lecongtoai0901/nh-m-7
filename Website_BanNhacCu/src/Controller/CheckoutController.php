<?php
namespace App\Controller;

use App\Model\Order;
use App\Model\Cart;
use App\Model\Product;

class CheckoutController
{
    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            exit;
        }

        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = 'Vui lòng đăng nhập trước';
            header('Location: /login');
            exit;
        }

        $cart = Cart::getCart();
        if (empty($cart)) {
            $_SESSION['error'] = 'Giỏ hàng trống';
            header('Location: /cart');
            exit;
        }

        $diachi = trim($_POST['diachi'] ?? '');
        if (!$diachi) {
            $_SESSION['error'] = 'Vui lòng nhập địa chỉ giao hàng';
            header('Location: /cart');
            exit;
        }

        $tongtien = Cart::getTotal();
        $config = require __DIR__ . '/../../config/config.php';

        // Tạo đơn hàng
        $orderResult = Order::create($_SESSION['user']->ma_nd, $diachi, $tongtien, $config);

        if (!$orderResult['success']) {
            $_SESSION['error'] = $orderResult['error'] ?? 'Lỗi tạo đơn hàng';
            header('Location: /cart');
            exit;
        }

        $ma_ddh = $orderResult['ma_ddh'];

        // Thêm chi tiết đơn hàng
        foreach ($cart as $item) {
            Order::addDetail($ma_ddh, $item['ma_sp'], $item['soluong'], $item['gia'], $config);
        }

        // Xóa giỏ hàng
        Cart::clear();

        $_SESSION['success'] = 'Đặt hàng thành công, mã đơn: ' . $ma_ddh;
        header('Location: /orders');
        exit;
    }

    public function orders()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $config = require __DIR__ . '/../../config/config.php';
        $orders = Order::getByUserId($_SESSION['user']->ma_nd, $config);

        $content = $this->render('orders/list.php', ['orders' => $orders]);

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function orderDetail($params)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $ma_ddh = $params['id'] ?? null;
        if (!$ma_ddh) {
            http_response_code(404);
            return '<h1>Đơn hàng không tồn tại</h1>';
        }

        $config = require __DIR__ . '/../../config/config.php';
        $order = Order::getById($ma_ddh, $config);

        if (!$order || $order->ma_nd != $_SESSION['user']->ma_nd) {
            http_response_code(403);
            return '<h1>Không có quyền xem đơn hàng này</h1>';
        }

        $content = $this->render('orders/detail.php', ['order' => $order]);

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    private function render($template, $data = [])
    {
        extract($data);
        ob_start();
        include __DIR__ . '/../../templates/' . $template;
        return ob_get_clean();
    }
}
