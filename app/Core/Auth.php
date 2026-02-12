<?php

class Auth
{
    public static function user(): array
    {
        if (isset($_SESSION['auth_user']) && is_array($_SESSION['auth_user'])) {
            return $_SESSION['auth_user'];
        }

        $default = [
            'id' => 1,
            'nombre' => 'SuperRoot Demo',
            'rol' => 'SuperRoot',
            'permisos' => ['*'],
            'modulos' => ['*' => ['view' => true, 'edit' => true]],
        ];

        try {
            $pdo = Database::connection();
            $user = $pdo->query("SELECT id, nombre, rol FROM system_users WHERE estado = 'ACTIVO' ORDER BY id ASC LIMIT 1")->fetch();
            if (!$user) {
                $_SESSION['auth_user'] = $default;
                return $default;
            }

            $stmt = $pdo->prepare('SELECT module_key, can_view, can_edit FROM user_permissions WHERE user_id = :user_id AND estado = :estado');
            $stmt->execute(['user_id' => (int) $user['id'], 'estado' => 'ACTIVO']);
            $rows = $stmt->fetchAll();

            $modules = [];
            foreach ($rows as $row) {
                $key = (string) ($row['module_key'] ?? '');
                if ($key === '') {
                    continue;
                }
                $modules[$key] = [
                    'view' => (int) ($row['can_view'] ?? 0) === 1,
                    'edit' => (int) ($row['can_edit'] ?? 0) === 1,
                ];
            }

            $_SESSION['auth_user'] = [
                'id' => (int) $user['id'],
                'nombre' => (string) $user['nombre'],
                'rol' => (string) ($user['rol'] ?? 'Sin rol'),
                'permisos' => array_keys($modules),
                'modulos' => $modules ?: ['*' => ['view' => true, 'edit' => true]],
            ];
        } catch (Throwable $e) {
            $_SESSION['auth_user'] = $default;
        }

        return $_SESSION['auth_user'];
    }

    public static function can(string $permission): bool
    {
        $user = self::user();
        return in_array('*', $user['permisos'] ?? [], true) || in_array($permission, $user['permisos'] ?? [], true);
    }

    public static function canViewModule(string $module): bool
    {
        $mods = self::user()['modulos'] ?? [];
        if (isset($mods['*'])) {
            return true;
        }

        return (bool) ($mods[$module]['view'] ?? false);
    }

    public static function canEditModule(string $module): bool
    {
        $mods = self::user()['modulos'] ?? [];
        if (isset($mods['*'])) {
            return true;
        }

        return (bool) ($mods[$module]['edit'] ?? false);
    }
}
