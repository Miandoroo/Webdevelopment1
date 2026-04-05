<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Interfaces\IClassService;
use App\Support\View;

final class ClassController
{
    public function __construct(private readonly IClassService $classService)
    {
    }

    public function index(): void
    {
        View::render('classes/index', [
            'classes' => $this->classService->getSchedule($_GET),
            'pageTitle' => 'Class Schedule',
        ]);
    }

    public function details(int $id): void
    {
        View::render('classes/details', [
            'class' => $this->classService->getDetails($id),
            'pageTitle' => 'Class Details',
        ]);
    }
}
