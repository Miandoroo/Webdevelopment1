<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function create(array $data): void;

    public function findByEmail(string $email): ?array;

    public function findById(int $id): ?array;

    public function getAll(): array;

    public function updatePreferences(int $id, array $data): void;

    public function softDelete(int $id): void;
}
