<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Interfaces\ITrainerService;
use App\Support\View;

final class TrainerController
{
    public function __construct(private readonly ITrainerService $trainerService)
    {
    }

    public function index(): void
    {
        View::render('trainers/index', [
            'trainers' => $this->trainerService->getAll(),
            'pageTitle' => 'Trainers',
        ]);
    }

    public function details(int $id): void
    {
        View::render('trainers/details', [
            'trainer' => $this->trainerService->getDetails($id),
            'pageTitle' => 'Trainer Details',
        ]);
    }
}
