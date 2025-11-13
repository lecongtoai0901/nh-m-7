<?php
namespace App\Controller;

use App\Model\Product;
use App\Model\Order;

class AdminController
{
    public function dashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->ma_vt !== 'ADM') {
            http_response_code(403);
            return '<h1>Không có quyền truy cập</h1>';
        }

        $config = require __DIR__ . '/../../config/config.php';

        $content = $this->render('admin/dashboard.php');

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function products()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->ma_vt !== 'ADM') {
            http_response_code(403);
            return '<h1>Không có quyền truy cập</h1>';
        }

        $config = require __DIR__ . '/../../config/config.php';
        $products = Product::getAll($config);

        $content = $this->render('admin/products.php', ['products' => $products]);

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function orders()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->ma_vt !== 'ADM') {
            http_response_code(403);
            return '<h1>Không có quyền truy cập</h1>';
        }

        $content = $this->render('admin/orders.php');

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
