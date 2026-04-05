<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

final class Database
{
    public static function create(array $config): PDO
    {
        return new PDO(
            $config['dsn'],
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }
}
