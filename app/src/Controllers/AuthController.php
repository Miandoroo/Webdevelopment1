<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\Interfaces\IAuthService;
use App\Support\View;

final class AuthController
{
    public function __construct(private readonly IAuthService $authService)
    {
    }

    public function loginForm(): void
    {
        View::render('auth/login', ['pageTitle' => 'Login']);
    }

    public function registerForm(): void
    {
        View::render('auth/register', ['pageTitle' => 'Register']);
    }

    public function login(): void
    {
        $success = $this->authService->login($_POST['email'] ?? '', $_POST['password'] ?? '');
        ResponseHelper::redirect($success ? '/dashboard' : '/login');
    }

    public function register(): void
    {
        $success = $this->authService->register($_POST);
        ResponseHelper::redirect($success ? '/login' : '/register');
    }

    public function logout(): void
    {
        $this->authService->logout();
        ResponseHelper::redirect('/');
    }
}
