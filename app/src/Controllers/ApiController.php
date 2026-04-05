<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\AuthHelper;
use App\Helpers\ResponseHelper;
use App\Services\Interfaces\IClassService;
use App\Services\Interfaces\IReservationService;

final class ApiController
{
    public function __construct(
        private readonly IClassService $classService,
        private readonly IReservationService $reservationService
    ) {
    }

    public function getClasses(): void
    {
        ResponseHelper::json([
            'data' => $this->classService->getSchedule($_GET),
        ]);
    }

    public function createReservation(): void
    {
        $userId = AuthHelper::userId();
        if ($userId === null) {
            ResponseHelper::json(['message' => 'Login required.'], 401);
            return;
        }

        $payload = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
        $result = $this->reservationService->create($userId, (int) ($payload['class_id'] ?? 0));
        ResponseHelper::json($result, $result['success'] ? 200 : 422);
    }

    public function deleteReservation(int $id): void
    {
        $userId = AuthHelper::userId();
        if ($userId === null) {
            ResponseHelper::json(['message' => 'Login required.'], 401);
            return;
        }

        $this->reservationService->cancel($id, $userId);
        ResponseHelper::json(['message' => 'Reservation cancelled.']);
    }
}
