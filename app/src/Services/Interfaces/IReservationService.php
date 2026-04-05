<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

interface IReservationService
{
    public function create(int $userId, int $classId): array;

    public function cancel(int $reservationId, int $userId): void;

    public function getForUser(int $userId): array;
}
