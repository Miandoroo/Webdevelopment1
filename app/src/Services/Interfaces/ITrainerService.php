<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

interface ITrainerService
{
    public function getAll(): array;

    public function getDetails(int $id): ?array;
}
