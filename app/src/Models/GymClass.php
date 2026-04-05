<?php

declare(strict_types=1);

namespace App\Models;

final class GymClass
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $description,
        public string $classDate,
        public string $startTime,
        public int $durationMinutes,
        public string $level,
        public string $trainingType,
        public int $maxParticipants,
        public ?int $trainerId
    ) {
    }
}
