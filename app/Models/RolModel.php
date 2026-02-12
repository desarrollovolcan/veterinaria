<?php

require_once __DIR__ . '/../Core/Database.php';

class RolModel
{
    public function all(): array
    {
        $result = Database::connection()->query('SELECT id, nombre, descripcion, es_sistema, created_at FROM roles ORDER BY id');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function create(string $nombre, string $descripcion): bool
    {
        $stmt = Database::connection()->prepare('INSERT INTO roles (nombre, descripcion) VALUES (?, ?)');
        $stmt->bind_param('ss', $nombre, $descripcion);
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = Database::connection()->prepare('DELETE FROM roles WHERE id = ? AND es_sistema = 0');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
