<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

interface IClassService
{
    public function getSchedule(array $filters = []): array;

    public function getDetails(int $id): ?array;
}
