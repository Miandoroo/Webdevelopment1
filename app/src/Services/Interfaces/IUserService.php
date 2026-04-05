<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

interface IUserService
{
    public function getById(int $id): ?array;

    public function updatePreferences(int $id, array $data): void;

    public function softDelete(int $id): void;

    public function getAll(): array;
}
