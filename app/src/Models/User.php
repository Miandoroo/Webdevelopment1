<?php

declare(strict_types=1);

namespace App\Models;

final class User
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $email,
        public string $passwordHash,
        public string $role = 'user',
        public ?string $trainingLevel = null,
        public ?string $preferredTrainingType = null,
        public string $themePreference = 'light'
    ) {
    }
}
