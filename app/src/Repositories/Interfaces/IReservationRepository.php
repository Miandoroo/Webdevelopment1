<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface IReservationRepository
{
    public function create(int $userId, int $classId): void;

    public function cancel(int $reservationId, int $userId): void;

    public function findByUser(int $userId): array;

    public function existsActive(int $userId, int $classId): bool;
}
