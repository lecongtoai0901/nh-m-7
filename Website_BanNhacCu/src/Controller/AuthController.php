<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Order;

class AuthController
{
    public function showRegister()
    {
        $content = $this->render('auth/register.php');
        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function showLogin()
    {
        $content = $this->render('auth/login.php');
        ob_start();
        include __DIR__ . '/../../templates/layout.php';
        return ob_get_clean();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit;
        }

        $tennd = trim($_POST['tennd'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $matkhau = $_POST['matkhau'] ?? '';
        $matkhau2 = $_POST['matkhau2'] ?? '';

        if (!$tennd || !$email || !$matkhau) {
            $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin';
            header('Location: /register');
            exit;
        }

        if ($matkhau !== $matkhau2) {
            $_SESSION['error'] = 'Mật khẩu không khớp';
            header('Location: /register');
            exit;
        }

        $config = require __DIR__ . '/../../config/config.php';
        $result = User::register($tennd, $email, $matkhau, $config);

        if ($result['success']) {
            $_SESSION['success'] = 'Đăng ký thành công, vui lòng đăng nhập';
            header('Location: /login');
        } else {
            $_SESSION['error'] = $result['error'] ?? 'Lỗi đăng ký';
            header('Location: /register');
        }
        exit;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $matkhau = $_POST['matkhau'] ?? '';

        if (!$email || !$matkhau) {
            $_SESSION['error'] = 'Vui lòng điền email và mật khẩu';
            header('Location: /login');
            exit;
        }

        $config = require __DIR__ . '/../../config/config.php';
        $result = User::login($email, $matkhau, $config);

        if ($result['success']) {
            $_SESSION['user'] = $result['user'];
            $_SESSION['success'] = 'Đăng nhập thành công';
            header('Location: /');
        } else {
            $_SESSION['error'] = $result['error'] ?? 'Lỗi đăng nhập';
            header('Location: /login');
        }
        exit;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /');
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
