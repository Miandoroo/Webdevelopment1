<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Interfaces\IClassRepository;
use PDO;

final class ClassRepository implements IClassRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function getAll(array $filters = []): array
    {
        $sql = "SELECT c.*, t.name AS trainer_name
                FROM classes c
                LEFT JOIN trainers t ON t.id = c.trainer_id
                WHERE c.is_deleted = 0";
        $params = [];

        if (!empty($filters['level'])) {
            $sql .= " AND c.level = :level";
            $params['level'] = $filters['level'];
        }

        if (!empty($filters['training_type'])) {
            $sql .= " AND c.training_type = :training_type";
            $params['training_type'] = $filters['training_type'];
        }

        $sql .= " ORDER BY c.class_date, c.start_time";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $statement = $this->pdo->prepare(
            "SELECT c.*, t.name AS trainer_name
             FROM classes c
             LEFT JOIN trainers t ON t.id = c.trainer_id
             WHERE c.id = :id AND c.is_deleted = 0"
        );
        $statement->execute(['id' => $id]);
        $class = $statement->fetch();

        return $class ?: null;
    }

    public function countActiveReservations(int $classId): int
    {
        $statement = $this->pdo->prepare(
            "SELECT COUNT(*) FROM reservations WHERE class_id = :class_id AND status = 'active'"
        );
        $statement->execute(['class_id' => $classId]);

        return (int) $statement->fetchColumn();
    }
}
