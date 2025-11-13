<?php
namespace App\Controller;

use App\Model\Cart;
use App\Model\Product;

class CartController
{
    public function view()
    {
        $cart = Cart::getCart();
        $total = Cart::getTotal();

        $content = $this->render('cart/view.php', [
            'cart' => $cart,
            'total' => $total
        ]);

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function add($params)
    {
        $ma_sp = $_POST['ma_sp'] ?? null;
        $soluong = (int)($_POST['soluong'] ?? 1);

        if (!$ma_sp) {
            return json_encode(['success' => false, 'error' => 'Không tìm thấy sản phẩm']);
        }

        $config = require __DIR__ . '/../../config/config.php';
        $product = Product::getById($ma_sp, $config);

        if (!$product) {
            return json_encode(['success' => false, 'error' => 'Sản phẩm không tồn tại']);
        }

        Cart::addItem($ma_sp, $product->tensp, $product->giasp, $soluong);
        return json_encode(['success' => true, 'message' => 'Đã thêm vào giỏ hàng']);
    }

    public function remove($params)
    {
        $ma_sp = $_POST['ma_sp'] ?? null;
        if ($ma_sp) {
            Cart::removeItem($ma_sp);
        }
        header('Location: /cart');
        exit;
    }

    public function update($params)
    {
        $ma_sp = $_POST['ma_sp'] ?? null;
        $soluong = (int)($_POST['soluong'] ?? 1);

        if ($ma_sp) {
            Cart::updateQuantity($ma_sp, $soluong);
        }

        header('Location: /cart');
        exit;
    }

    private function render($template, $data = [])
    {
        extract($data);
        ob_start();
        include __DIR__ . '/../../templates/' . $template;
        return ob_get_clean();
    }
}
