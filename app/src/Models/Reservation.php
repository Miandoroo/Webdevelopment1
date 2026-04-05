<?php

declare(strict_types=1);

namespace App\Models;

final class Reservation
{
    public function __construct(
        public ?int $id,
        public int $userId,
        public int $classId,
        public string $status = 'active'
    ) {
    }
}
