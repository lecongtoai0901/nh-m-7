<?php
namespace App\Model;

class Apartment
{
    public $id;
    public $name;
    public $building;
    public $floor;
    public $bedrooms;
    public $bathrooms;
    public $area;
    public $price;
    public $status;
    public $owner_name;
    public $owner_phone;
    public $note;
    public $created_at;
    public $updated_at;

    public function __construct(array $data = [])
    {
        foreach ($data as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    public static function all($pdo): array
    {
        $stmt = $pdo->query('SELECT * FROM apartments ORDER BY created_at DESC');
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(fn($r) => new self($r), $rows);
    }

    public static function find($pdo, int $id): ?self
    {
        $stmt = $pdo->prepare('SELECT * FROM apartments WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ? new self($row) : null;
    }

    public static function create($pdo, array $data): bool
    {
        $sql = 'INSERT INTO apartments
            (name, building, floor, bedrooms, bathrooms, area, price, status, owner_name, owner_phone, note)
            VALUES (:name, :building, :floor, :bedrooms, :bathrooms, :area, :price, :status, :owner_name, :owner_phone, :note)';
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':building' => $data['building'],
            ':floor' => $data['floor'],
            ':bedrooms' => $data['bedrooms'],
            ':bathrooms' => $data['bathrooms'],
            ':area' => $data['area'],
            ':price' => $data['price'],
            ':status' => $data['status'],
            ':owner_name' => $data['owner_name'],
            ':owner_phone' => $data['owner_phone'],
            ':note' => $data['note'] ?? '',
        ]);
    }

    public static function updateOne($pdo, int $id, array $data): bool
    {
        $sql = 'UPDATE apartments
                SET name = :name, building = :building, floor = :floor, bedrooms = :bedrooms,
                    bathrooms = :bathrooms, area = :area, price = :price, status = :status,
                    owner_name = :owner_name, owner_phone = :owner_phone, note = :note, updated_at = CURRENT_TIMESTAMP
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $data['name'],
            ':building' => $data['building'],
            ':floor' => $data['floor'],
            ':bedrooms' => $data['bedrooms'],
            ':bathrooms' => $data['bathrooms'],
            ':area' => $data['area'],
            ':price' => $data['price'],
            ':status' => $data['status'],
            ':owner_name' => $data['owner_name'],
            ':owner_phone' => $data['owner_phone'],
            ':note' => $data['note'] ?? '',
        ]);
    }

    public static function deleteOne($pdo, int $id): bool
    {
        $stmt = $pdo->prepare('DELETE FROM apartments WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

