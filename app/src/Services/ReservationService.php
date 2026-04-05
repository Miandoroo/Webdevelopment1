<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Interfaces\IClassRepository;
use App\Repositories\Interfaces\IReservationRepository;
use App\Services\Interfaces\IReservationService;

final class ReservationService implements IReservationService
{
    public function __construct(
        private readonly IReservationRepository $reservationRepository,
        private readonly IClassRepository $classRepository
    ) {
    }

    public function create(int $userId, int $classId): array
    {
        if ($this->reservationRepository->existsActive($userId, $classId)) {
            return ['success' => false, 'message' => 'You already booked this class.'];
        }

        $class = $this->classRepository->findById($classId);
        if ($class === null) {
            return ['success' => false, 'message' => 'Class not found.'];
        }

        $booked = $this->classRepository->countActiveReservations($classId);
        if ($booked >= (int) $class['max_participants']) {
            return ['success' => false, 'message' => 'This class is already full.'];
        }

        $this->reservationRepository->create($userId, $classId);

        return ['success' => true, 'message' => 'Reservation created successfully.'];
    }

    public function cancel(int $reservationId, int $userId): void
    {
        $this->reservationRepository->cancel($reservationId, $userId);
    }

    public function getForUser(int $userId): array
    {
        return $this->reservationRepository->findByUser($userId);
    }
}
