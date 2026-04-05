<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Interfaces\ITrainerRepository;
use PDO;

final class TrainerRepository implements ITrainerRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function getAll(): array
    {
        $statement = $this->pdo->query(
            "SELECT * FROM trainers WHERE is_deleted = 0 ORDER BY name"
        );

        return $statement->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM trainers WHERE id = :id AND is_deleted = 0"
        );
        $statement->execute(['id' => $id]);
        $trainer = $statement->fetch();

        return $trainer ?: null;
    }
}
