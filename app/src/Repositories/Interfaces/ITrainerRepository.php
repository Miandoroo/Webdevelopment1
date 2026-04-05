<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface ITrainerRepository
{
    public function getAll(): array;

    public function findById(int $id): ?array;
}
