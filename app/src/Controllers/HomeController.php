<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Interfaces\IClassService;
use App\Services\Interfaces\ITrainerService;
use App\Support\View;

final class HomeController
{
    public function __construct(
        private readonly IClassService $classService,
        private readonly ITrainerService $trainerService
    ) {
    }

    public function index(): void
    {
        View::render('home/index', [
            'featuredClasses' => array_slice($this->classService->getSchedule(), 0, 3),
            'trainers' => array_slice($this->trainerService->getAll(), 0, 3),
            'pageTitle' => 'Gym Class Booking Platform',
        ]);
    }
}
