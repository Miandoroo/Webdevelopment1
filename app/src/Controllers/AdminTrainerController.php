<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\AuthHelper;
use App\Helpers\ResponseHelper;
use App\Services\Interfaces\ITrainerService;
use App\Support\View;

final class AdminTrainerController
{
    public function __construct(private readonly ITrainerService $trainerService)
    {
    }

    public function index(): void
    {
        if (!AuthHelper::isAdmin()) {
            ResponseHelper::redirect('/login');
        }

        View::render('admin/trainers/index', [
            'trainers' => $this->trainerService->getAll(),
            'pageTitle' => 'Admin Trainers',
        ]);
    }
}
