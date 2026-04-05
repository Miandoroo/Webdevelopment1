<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Repositories\Interfaces\IUserRepository;
use App\Services\Interfaces\IAuthService;

final class AuthService implements IAuthService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    public function register(array $data): bool
    {
        if ($this->userRepository->findByEmail($data['email']) !== null) {
            return false;
        }

        $this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 'user',
        ]);

        return true;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user === null || !password_verify($password, $user['password_hash'])) {
            return false;
        }

        session_regenerate_id(true);
        SessionHelper::set('user_id', (int) $user['id']);
        SessionHelper::set('role', $user['role']);
        SessionHelper::set('user_name', $user['name']);

        return true;
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
    }
}
