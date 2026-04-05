<?php

declare(strict_types=1);

namespace App\Models;

final class Trainer
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $biography,
        public string $certifications,
        public string $specializations,
        public ?string $photoUrl = null
    ) {
    }
}
