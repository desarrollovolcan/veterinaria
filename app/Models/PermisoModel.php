<?php

require_once __DIR__ . '/../Core/Database.php';

class PermisoModel
{
    public function all(): array
    {
        $sql = 'SELECT p.id, p.nombre, p.descripcion, p.es_sistema, GROUP_CONCAT(r.nombre ORDER BY r.nombre SEPARATOR ", ") AS roles
                FROM permisos p
                LEFT JOIN rol_permiso rp ON rp.permiso_id = p.id
                LEFT JOIN roles r ON r.id = rp.rol_id
                GROUP BY p.id
                ORDER BY p.id';
        $result = Database::connection()->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function create(string $nombre, string $descripcion): bool
    {
        $stmt = Database::connection()->prepare('INSERT INTO permisos (nombre, descripcion) VALUES (?, ?)');
        $stmt->bind_param('ss', $nombre, $descripcion);
        return $stmt->execute();
    }

    public function update(int $id, string $nombre, string $descripcion): bool
    {
        $stmt = Database::connection()->prepare('UPDATE permisos SET nombre = ?, descripcion = ? WHERE id = ? AND es_sistema = 0');
        $stmt->bind_param('ssi', $nombre, $descripcion, $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = Database::connection()->prepare('DELETE FROM permisos WHERE id = ? AND es_sistema = 0');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
