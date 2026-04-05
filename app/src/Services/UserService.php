<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Interfaces\IReservationRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Services\Interfaces\IUserService;

final class UserService implements IUserService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly IReservationRepository $reservationRepository
    ) {
    }

    public function getById(int $id): ?array
    {
        return $this->userRepository->findById($id);
    }

    public function updatePreferences(int $id, array $data): void
    {
        $this->userRepository->updatePreferences($id, $data);
    }

    public function softDelete(int $id): void
    {
        $this->userRepository->softDelete($id);
    }

    public function getAll(): array
    {
        return $this->userRepository->getAll();
    }
}
