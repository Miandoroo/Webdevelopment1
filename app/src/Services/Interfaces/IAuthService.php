<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

interface IAuthService
{
    public function register(array $data): bool;

    public function login(string $email, string $password): bool;

    public function logout(): void;
}
