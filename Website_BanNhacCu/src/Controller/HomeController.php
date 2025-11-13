<?php
namespace App\Controller;

use App\Model\Product;

class HomeController
{
    public function index()
    {
        // Lấy config
        $config = require __DIR__ . '/../../config/config.php';
        
        // Lấy dữ liệu sản phẩm từ DB (hoặc sample nếu DB chưa kết nối)
        $products = Product::getAll($config);

        // Render home template
        $content = $this->render('home.php', ['products' => $products]);

        // Include layout
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
