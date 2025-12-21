<?php
namespace App\Controller;

use App\Model\Apartment;

class ApartmentController
{
    private function pdo()
    {
        return require __DIR__ . '/../../config/config.php';
    }

    private function view($view, $data = [])
    {
        extract($data);
        ob_start();
        include __DIR__ . '/../View/Apartment/' . $view;
        return ob_get_clean();
    }

    private function render($template, $data = [])
    {
        extract($data);
        ob_start();
        include __DIR__ . '/../../templates/' . $template;
        return ob_get_clean();
    }

    private function requireAuth()
    {
        if (!isset($_SESSION['auth_user'])) {
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Login');
            exit;
        }
    }

    public function index()
    {
        $this->requireAuth();
        $pdo = $this->pdo();
        $apartments = Apartment::all($pdo);

        // filter
        $status = $_GET['status'] ?? '';
        if ($status) {
            $apartments = array_values(array_filter($apartments, fn($a) => $a->status === $status));
        }

        $search = trim($_GET['q'] ?? '');
        if ($search !== '') {
            $apartments = array_values(array_filter($apartments, function ($a) use ($search) {
                return str_contains(mb_strtolower($a->name), mb_strtolower($search))
                    || str_contains(mb_strtolower($a->building), mb_strtolower($search))
                    || str_contains(mb_strtolower($a->owner_name ?? ''), mb_strtolower($search));
            }));
        }

        $stats = [
            'total' => count($apartments),
            'available' => count(array_filter($apartments, fn($a) => $a->status === 'available')),
            'rented' => count(array_filter($apartments, fn($a) => $a->status === 'rented')),
            'maintenance' => count(array_filter($apartments, fn($a) => $a->status === 'maintenance')),
        ];

        $content = $this->view('index.php', [
            'apartments' => $apartments,
            'stats' => $stats,
            'search' => $search,
            'status' => $status,
        ]);
        return $this->render('apartment_layout.php', ['content' => $content, 'title' => 'Quản lý căn hộ']);
    }

    public function create()
    {
        $this->requireAuth();
        $content = $this->view('form.php', [
            'action' => 'store',
            'apartment' => null,
        ]);
        return $this->render('apartment_layout.php', ['content' => $content, 'title' => 'Thêm căn hộ']);
    }

    public function store()
    {
        $this->requireAuth();
        $pdo = $this->pdo();
        $data = $this->sanitize($_POST);
        if ($this->validate($data, $errors)) {
            Apartment::create($pdo, $data);
            $_SESSION['message'] = 'Thêm căn hộ thành công.';
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
            exit;
        }
        $content = $this->view('form.php', [
            'action' => 'store',
            'apartment' => (object)$data,
            'errors' => $errors,
        ]);
        return $this->render('apartment_layout.php', ['content' => $content, 'title' => 'Thêm căn hộ']);
    }

    public function edit()
    {
        $this->requireAuth();
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
            exit;
        }
        $pdo = $this->pdo();
        $apartment = Apartment::find($pdo, $id);
        if (!$apartment) {
            $_SESSION['message'] = 'Không tìm thấy căn hộ.';
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
            exit;
        }
        $content = $this->view('form.php', [
            'action' => 'update',
            'apartment' => $apartment,
        ]);
        return $this->render('apartment_layout.php', ['content' => $content, 'title' => 'Sửa căn hộ']);
    }

    public function update()
    {
        $this->requireAuth();
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
            exit;
        }
        $pdo = $this->pdo();
        $data = $this->sanitize($_POST);
        if ($this->validate($data, $errors)) {
            Apartment::updateOne($pdo, $id, $data);
            $_SESSION['message'] = 'Cập nhật căn hộ thành công.';
            header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
            exit;
        }
        $apartment = Apartment::find($pdo, $id);
        $apartment = (object)array_merge((array)$apartment, $data);
        $content = $this->view('form.php', [
            'action' => 'update',
            'apartment' => $apartment,
            'errors' => $errors,
        ]);
        return $this->render('apartment_layout.php', ['content' => $content, 'title' => 'Sửa căn hộ']);
    }

    public function delete()
    {
        $this->requireAuth();
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        if ($id) {
            $pdo = $this->pdo();
            Apartment::deleteOne($pdo, $id);
            $_SESSION['message'] = 'Đã xóa căn hộ.';
        }
        header('Location: ' . ($GLOBALS['baseUrl'] ?? '') . '/Apartments');
        exit;
    }

    private function sanitize(array $input): array
    {
        return [
            'name' => trim($input['name'] ?? ''),
            'building' => trim($input['building'] ?? ''),
            'floor' => (int)($input['floor'] ?? 0),
            'bedrooms' => (int)($input['bedrooms'] ?? 0),
            'bathrooms' => (int)($input['bathrooms'] ?? 0),
            'area' => (int)($input['area'] ?? 0),
            'price' => (float)($input['price'] ?? 0),
            'status' => $input['status'] ?? 'available',
            'owner_name' => trim($input['owner_name'] ?? ''),
            'owner_phone' => trim($input['owner_phone'] ?? ''),
            'note' => trim($input['note'] ?? ''),
        ];
    }

    private function validate(array $data, &$errors = []): bool
    {
        $errors = [];
        if ($data['name'] === '') $errors[] = 'Tên căn hộ không được để trống.';
        if ($data['building'] === '') $errors[] = 'Tòa nhà không được để trống.';
        if ($data['floor'] <= 0) $errors[] = 'Tầng phải lớn hơn 0.';
        if ($data['area'] <= 0) $errors[] = 'Diện tích phải lớn hơn 0.';
        if ($data['price'] <= 0) $errors[] = 'Giá phải lớn hơn 0.';
        if (!in_array($data['status'], ['available','rented','maintenance'], true)) {
            $errors[] = 'Trạng thái không hợp lệ.';
        }
        return empty($errors);
    }
}

