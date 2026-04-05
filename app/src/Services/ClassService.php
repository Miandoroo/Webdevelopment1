<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Interfaces\IClassRepository;
use App\Repositories\Interfaces\ITrainerRepository;
use App\Services\Interfaces\IClassService;

final class ClassService implements IClassService
{
    public function __construct(
        private readonly IClassRepository $classRepository,
        private readonly ITrainerRepository $trainerRepository
    ) {
    }

    public function getSchedule(array $filters = []): array
    {
        return $this->classRepository->getAll($filters);
    }

    public function getDetails(int $id): ?array
    {
        $class = $this->classRepository->findById($id);

        if ($class === null) {
            return null;
        }

        $class['active_reservations'] = $this->classRepository->countActiveReservations($id);

        return $class;
    }
}
