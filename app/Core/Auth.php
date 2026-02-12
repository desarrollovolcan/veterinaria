<?php

class Auth
{
    private const DEMO_USERS = [
        'admin@veterinaria.local' => [
            'id' => 1,
            'nombre' => 'Administrador Demo',
            'rol' => 'Administrador',
            'password' => 'AdminVet2026!',
            'permisos' => ['owners.view', 'owners.create', 'owners.edit', 'owners.delete'],
        ],
    ];

    public static function user(): ?array
    {
        return $_SESSION['auth_user'] ?? null;
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function attempt(string $email, string $password): bool
    {
        $emailKey = strtolower(trim($email));
        $candidate = self::DEMO_USERS[$emailKey] ?? null;

        if (!$candidate || !hash_equals($candidate['password'], $password)) {
            return false;
        }

        unset($candidate['password']);
        $candidate['email'] = $emailKey;
        $_SESSION['auth_user'] = $candidate;

        return true;
    }

    public static function logout(): void
    {
        unset($_SESSION['auth_user']);
    }

    public static function can(string $permission): bool
    {
        $user = self::user();
        return $user !== null && in_array($permission, $user['permisos'], true);
    }

    public static function demoCredentials(): array
    {
        return [
            'email' => 'admin@veterinaria.local',
            'password' => 'AdminVet2026!',
        ];
    }
}
