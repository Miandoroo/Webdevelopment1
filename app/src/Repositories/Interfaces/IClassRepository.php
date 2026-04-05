<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface IClassRepository
{
    public function getAll(array $filters = []): array;

    public function findById(int $id): ?array;

    public function countActiveReservations(int $classId): int;
}
