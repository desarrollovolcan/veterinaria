<?php

require_once __DIR__ . '/../Core/Database.php';

class UsuarioModel
{
    public function all(): array
    {
        $sql = 'SELECT u.id, u.usuario, u.nombre, u.email, u.activo, u.es_superroot, r.nombre AS rol
                FROM usuarios u
                INNER JOIN roles r ON r.id = u.rol_id
                ORDER BY u.id';
        $result = Database::connection()->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function create(string $usuario, string $nombre, string $email, string $password, int $rolId): bool
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = Database::connection()->prepare('INSERT INTO usuarios (usuario, nombre, email, password_hash, rol_id) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssi', $usuario, $nombre, $email, $hash, $rolId);
        return $stmt->execute();
    }

    public function update(int $id, string $nombre, string $email, int $rolId, int $activo): bool
    {
        $stmt = Database::connection()->prepare('UPDATE usuarios SET nombre = ?, email = ?, rol_id = ?, activo = ? WHERE id = ? AND es_superroot = 0');
        $stmt->bind_param('ssiii', $nombre, $email, $rolId, $activo, $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = Database::connection()->prepare('DELETE FROM usuarios WHERE id = ? AND es_superroot = 0');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
