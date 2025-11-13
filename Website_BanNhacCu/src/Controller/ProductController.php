<?php
namespace App\Controller;

use App\Model\Product;
use App\Model\Category;

class ProductController
{
    public function index()
    {
        $config = require __DIR__ . '/../../config/config.php';
        
        $products = Product::getAll($config);
        $categories = Category::getAll($config);

        $content = $this->render('products/index.php', [
            'products' => $products,
            'categories' => $categories
        ]);

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function show($params)
    {
        $ma_sp = $params['id'] ?? null;
        if (!$ma_sp) {
            http_response_code(404);
            return '<h1>Sản phẩm không tồn tại</h1>';
        }

        $config = require __DIR__ . '/../../config/config.php';
        $product = Product::getById($ma_sp, $config);

        if (!$product) {
            http_response_code(404);
            return '<h1>Sản phẩm không tồn tại</h1>';
        }

        $content = $this->render('products/show.php', ['product' => $product]);

        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function byCategory($params)
    {
        $ma_loai = $params['category'] ?? null;
        $config = require __DIR__ . '/../../config/config.php';

        $products = Product::getByCategory($ma_loai, $config);
        $categories = Category::getAll($config);
        $currentCategory = Category::getById($ma_loai, $config);

        $content = $this->render('products/category.php', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $currentCategory
        ]);

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
