<?php

class Owner
{
    public function paginate(array $filters, int $page, int $perPage): array
    {
        $pdo = Database::connection();
        $offset = ($page - 1) * $perPage;

        $where = ['1=1'];
        $params = [];

        if (!empty($filters['q'])) {
            $where[] = '(o.nombre_completo LIKE :q OR o.telefono LIKE :q OR o.email LIKE :q)';
            $params['q'] = '%' . $filters['q'] . '%';
        }

        if (!empty($filters['estado'])) {
            $where[] = 'o.estado = :estado';
            $params['estado'] = $filters['estado'];
        }

        $whereSql = implode(' AND ', $where);

        $countStmt = $pdo->prepare("SELECT COUNT(*) FROM owners o WHERE {$whereSql}");
        $countStmt->execute($params);
        $total = (int) $countStmt->fetchColumn();

        $sql = "SELECT o.*,
                       (SELECT COUNT(*) FROM pets p WHERE p.owner_id = o.id AND p.estado = 'ACTIVO') AS total_mascotas
                FROM owners o
                WHERE {$whereSql}
                ORDER BY o.id DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return [
            'data' => $stmt->fetchAll(),
            'total' => $total,
        ];
    }

    public function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM owners WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $data, int $actorId): void
    {
        $sql = 'INSERT INTO owners (rut, nombre_completo, telefono, email, direccion, observacion, estado) VALUES (:rut, :nombre, :telefono, :email, :direccion, :observacion, :estado)';
        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([
            'rut' => $data['rut'] ?: null,
            'nombre' => $data['nombre_completo'],
            'telefono' => $data['telefono'],
            'email' => $data['email'] ?: null,
            'direccion' => $data['direccion'] ?: null,
            'observacion' => $data['observacion'] ?: null,
            'estado' => $data['estado'],
        ]);

        $id = (int) Database::connection()->lastInsertId();
        $this->audit('owners', $id, 'CREATE', $actorId, $data);
    }

    public function update(int $id, array $data, int $actorId): void
    {
        $sql = 'UPDATE owners SET rut=:rut, nombre_completo=:nombre, telefono=:telefono, email=:email, direccion=:direccion, observacion=:observacion, estado=:estado, updated_at=NOW() WHERE id=:id';
        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'rut' => $data['rut'] ?: null,
            'nombre' => $data['nombre_completo'],
            'telefono' => $data['telefono'],
            'email' => $data['email'] ?: null,
            'direccion' => $data['direccion'] ?: null,
            'observacion' => $data['observacion'] ?: null,
            'estado' => $data['estado'],
        ]);

        $this->audit('owners', $id, 'UPDATE', $actorId, $data);
    }

    public function softDelete(int $id, int $actorId): void
    {
        $stmt = Database::connection()->prepare("UPDATE owners SET estado='INACTIVO', deleted_at=NOW(), updated_at=NOW() WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $this->audit('owners', $id, 'INACTIVATE', $actorId, ['estado' => 'INACTIVO']);
    }

    private function audit(string $entity, int $entityId, string $action, int $userId, array $payload): void
    {
        $stmt = Database::connection()->prepare('INSERT INTO audit_logs (entidad, entidad_id, accion, usuario_id, payload_json) VALUES (:entidad, :entidad_id, :accion, :usuario_id, :payload_json)');
        $stmt->execute([
            'entidad' => $entity,
            'entidad_id' => $entityId,
            'accion' => $action,
            'usuario_id' => $userId ?: null,
            'payload_json' => json_encode($payload, JSON_UNESCAPED_UNICODE),
        ]);
    }
}
