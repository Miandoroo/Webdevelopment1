<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Interfaces\IUserRepository;
use PDO;

final class UserRepository implements IUserRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function create(array $data): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO users (name, email, password_hash, role)
             VALUES (:name, :email, :password_hash, :role)"
        );
        $statement->execute($data);
    }

    public function findByEmail(string $email): ?array
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM users WHERE email = :email AND is_deleted = 0"
        );
        $statement->execute(['email' => $email]);
        $user = $statement->fetch();

        return $user ?: null;
    }

    public function findById(int $id): ?array
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM users WHERE id = :id AND is_deleted = 0"
        );
        $statement->execute(['id' => $id]);
        $user = $statement->fetch();

        return $user ?: null;
    }

    public function getAll(): array
    {
        $statement = $this->pdo->query(
            "SELECT id, name, email, role, theme_preference, is_deleted FROM users ORDER BY name"
        );

        return $statement->fetchAll();
    }

    public function updatePreferences(int $id, array $data): void
    {
        $statement = $this->pdo->prepare(
            "UPDATE users
             SET training_level = :training_level,
                 preferred_training_type = :preferred_training_type,
                 theme_preference = :theme_preference
             WHERE id = :id"
        );
        $statement->execute([
            'id' => $id,
            'training_level' => $data['training_level'],
            'preferred_training_type' => $data['preferred_training_type'],
            'theme_preference' => $data['theme_preference'],
        ]);
    }

    public function softDelete(int $id): void
    {
        $statement = $this->pdo->prepare("UPDATE users SET is_deleted = 1 WHERE id = :id");
        $statement->execute(['id' => $id]);
    }
}
