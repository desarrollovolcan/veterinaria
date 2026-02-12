<?php

class Auth
{
    public static function user(): array
    {
        return $_SESSION['auth_user'] ?? [
            'id' => 0,
            'nombre' => 'SuperRoot Demo',
            'rol' => 'SuperRoot',
            'permisos' => ['owners.view', 'owners.create', 'owners.edit', 'owners.delete'],
        ];
    }

    public static function can(string $permission): bool
    {
        $user = self::user();
        return in_array($permission, $user['permisos'], true);
    }
}
