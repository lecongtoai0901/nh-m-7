<?php
namespace App\Controller;

class AuthController
{
    private function view($view, $data = [])
    {
        $baseUrl = $GLOBALS['baseUrl'] ?? '';
        extract($data);
        ob_start();
        include __DIR__ . '/../View/Auth/' . $view;
        return ob_get_clean();
    }

    private function render($template, $data = [])
    {
        extract($data);
        ob_start();
        include __DIR__ . '/../../templates/main_layout.php';
        return ob_get_clean();
    }

    public function showLogin()
    {
        $content = $this->view('login.php', ['error' => $_SESSION['login_error'] ?? null]);
        unset($_SESSION['login_error']);
        return $this->render('main_layout.php', ['content' => $content]);
    }

    public function login()
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Đơn giản: tài khoản cố định
        $validEmail = 'admin@example.com';
        $validPass  = '123456';

        if ($email === $validEmail && $password === $validPass) {
            $_SESSION['auth_user'] = [
                'email' => $email,
                'name'  => 'Quản trị viên'
            ];
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
            exit;
        }

        $_SESSION['login_error'] = 'Sai tài khoản hoặc mật khẩu.';
        header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Login');
        exit;
    }

    public function logout()
    {
        unset($_SESSION['auth_user']);
        header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Login');
        exit;
    }
}

