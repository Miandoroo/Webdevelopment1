<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Interfaces\IReservationRepository;
use PDO;

final class ReservationRepository implements IReservationRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function create(int $userId, int $classId): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO reservations (user_id, class_id, status) VALUES (:user_id, :class_id, 'active')"
        );
        $statement->execute(['user_id' => $userId, 'class_id' => $classId]);
    }

    public function cancel(int $reservationId, int $userId): void
    {
        $statement = $this->pdo->prepare(
            "UPDATE reservations SET status = 'cancelled' WHERE id = :id AND user_id = :user_id"
        );
        $statement->execute(['id' => $reservationId, 'user_id' => $userId]);
    }

    public function findByUser(int $userId): array
    {
        $statement = $this->pdo->prepare(
            "SELECT r.*, c.title, c.class_date, c.start_time
             FROM reservations r
             INNER JOIN classes c ON c.id = r.class_id
             WHERE r.user_id = :user_id
             ORDER BY c.class_date, c.start_time"
        );
        $statement->execute(['user_id' => $userId]);

        return $statement->fetchAll();
    }

    public function existsActive(int $userId, int $classId): bool
    {
        $statement = $this->pdo->prepare(
            "SELECT COUNT(*) FROM reservations
             WHERE user_id = :user_id AND class_id = :class_id AND status = 'active'"
        );
        $statement->execute(['user_id' => $userId, 'class_id' => $classId]);

        return (int) $statement->fetchColumn() > 0;
    }
}
