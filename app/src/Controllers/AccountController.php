<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\AuthHelper;
use App\Helpers\ResponseHelper;
use App\Services\Interfaces\IReservationService;
use App\Services\Interfaces\IUserService;
use App\Support\View;

final class AccountController
{
    public function __construct(
        private readonly IUserService $userService,
        private readonly IReservationService $reservationService
    ) {
    }

    public function dashboard(): void
    {
        $userId = AuthHelper::userId();
        if ($userId === null) {
            ResponseHelper::redirect('/login');
        }

        View::render('account/dashboard', [
            'user' => $this->userService->getById($userId),
            'reservations' => $this->reservationService->getForUser($userId),
            'pageTitle' => 'Dashboard',
        ]);
    }

    public function settings(): void
    {
        $userId = AuthHelper::userId();
        if ($userId === null) {
            ResponseHelper::redirect('/login');
        }

        View::render('account/settings', [
            'user' => $this->userService->getById($userId),
            'pageTitle' => 'Settings',
        ]);
    }

    public function updateSettings(): void
    {
        $userId = AuthHelper::userId();
        if ($userId !== null) {
            $this->userService->updatePreferences($userId, $_POST);
        }

        ResponseHelper::redirect('/account/settings');
    }

    public function softDelete(): void
    {
        $userId = AuthHelper::userId();
        if ($userId !== null) {
            $this->userService->softDelete($userId);
        }

        ResponseHelper::redirect('/');
    }
}
