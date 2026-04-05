<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Interfaces\ITrainerRepository;
use App\Services\Interfaces\ITrainerService;

final class TrainerService implements ITrainerService
{
    public function __construct(private readonly ITrainerRepository $trainerRepository)
    {
    }

    public function getAll(): array
    {
        return $this->trainerRepository->getAll();
    }

    public function getDetails(int $id): ?array
    {
        return $this->trainerRepository->findById($id);
    }
}
