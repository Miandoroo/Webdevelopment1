<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\AuthHelper;
use App\Helpers\ResponseHelper;
use App\Services\Interfaces\IClassService;
use App\Support\View;

final class AdminClassController
{
    public function __construct(private readonly IClassService $classService)
    {
    }

    public function index(): void
    {
        if (!AuthHelper::isAdmin()) {
            ResponseHelper::redirect('/login');
        }

        View::render('admin/classes/index', [
            'classes' => $this->classService->getSchedule(),
            'pageTitle' => 'Admin Classes',
        ]);
    }
}
