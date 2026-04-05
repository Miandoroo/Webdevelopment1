<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\AuthHelper;
use App\Helpers\ResponseHelper;
use App\Services\Interfaces\IUserService;
use App\Support\View;

final class AdminUserController
{
    public function __construct(private readonly IUserService $userService)
    {
    }

    public function index(): void
    {
        if (!AuthHelper::isAdmin()) {
            ResponseHelper::redirect('/login');
        }

        View::render('admin/users/index', [
            'users' => $this->userService->getAll(),
            'pageTitle' => 'Admin Users',
        ]);
    }
}
