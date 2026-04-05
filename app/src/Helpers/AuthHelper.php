<?php

declare(strict_types=1);

namespace App\Helpers;

final class AuthHelper
{
    public static function userId(): ?int
    {
        return SessionHelper::get('user_id');
    }

    public static function role(): ?string
    {
        return SessionHelper::get('role');
    }

    public static function check(): bool
    {
        return self::userId() !== null;
    }

    public static function isAdmin(): bool
    {
        return self::role() === 'admin';
    }
}
