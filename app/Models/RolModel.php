<?php

require_once __DIR__ . '/../Core/Database.php';

class RolModel
{
    public function all(): array
    {
        $sql = 'SELECT r.id, r.nombre, r.descripcion, r.es_sistema, r.created_at, GROUP_CONCAT(p.nombre ORDER BY p.nombre SEPARATOR ", ") AS permisos
                FROM roles r
                LEFT JOIN rol_permiso rp ON rp.rol_id = r.id
                LEFT JOIN permisos p ON p.id = rp.permiso_id
                GROUP BY r.id
                ORDER BY r.id';
        $result = Database::connection()->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function permisosByRol(): array
    {
        $sql = 'SELECT rol_id, permiso_id FROM rol_permiso';
        $result = Database::connection()->query($sql);

        if (!$result) {
            return [];
        }

        $map = [];
        while ($row = $result->fetch_assoc()) {
            $rolId = (int)$row['rol_id'];
            $map[$rolId] ??= [];
            $map[$rolId][] = (int)$row['permiso_id'];
        }

        return $map;
    }

    public function create(string $nombre, string $descripcion): bool
    {
        $stmt = Database::connection()->prepare('INSERT INTO roles (nombre, descripcion) VALUES (?, ?)');
        $stmt->bind_param('ss', $nombre, $descripcion);
        return $stmt->execute();
    }

    public function update(int $id, string $nombre, string $descripcion): bool
    {
        $stmt = Database::connection()->prepare('UPDATE roles SET nombre = ?, descripcion = ? WHERE id = ? AND es_sistema = 0');
        $stmt->bind_param('ssi', $nombre, $descripcion, $id);
        return $stmt->execute();
    }

    public function syncPermisos(int $rolId, array $permisoIds): bool
    {
        $conn = Database::connection();

        $deleteStmt = $conn->prepare('DELETE rp FROM rol_permiso rp INNER JOIN roles r ON r.id = rp.rol_id WHERE rp.rol_id = ? AND r.es_sistema = 0');
        $deleteStmt->bind_param('i', $rolId);
        if (!$deleteStmt->execute()) {
            return false;
        }

        if ($permisoIds === []) {
            return true;
        }

        $insertStmt = $conn->prepare('INSERT IGNORE INTO rol_permiso (rol_id, permiso_id) VALUES (?, ?)');
        foreach ($permisoIds as $permisoId) {
            $permisoId = (int)$permisoId;
            $insertStmt->bind_param('ii', $rolId, $permisoId);
            if (!$insertStmt->execute()) {
                return false;
            }
        }

        return true;
    }

    public function delete(int $id): bool
    {
        $stmt = Database::connection()->prepare('DELETE FROM roles WHERE id = ? AND es_sistema = 0');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
