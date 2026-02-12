<?php

class ModuleRepository
{
    public function paginate(string $table, array $columns, array $filters, int $page, int $perPage): array
    {
        $pdo = Database::connection();
        $offset = ($page - 1) * $perPage;

        $where = ['1=1'];
        $params = [];

        if (!empty($filters['q']) && !empty($columns)) {
            $likes = [];
            foreach ($columns as $i => $column) {
                $param = 'q' . $i;
                $likes[] = "$column LIKE :$param";
                $params[$param] = '%' . $filters['q'] . '%';
            }
            $where[] = '(' . implode(' OR ', $likes) . ')';
        }

        if (!empty($filters['estado'])) {
            $where[] = "estado = :estado";
            $params['estado'] = $filters['estado'];
        }

        $whereSql = implode(' AND ', $where);

        $countStmt = $pdo->prepare("SELECT COUNT(*) FROM {$table} WHERE {$whereSql}");
        $countStmt->execute($params);
        $total = (int) $countStmt->fetchColumn();

        $sql = "SELECT * FROM {$table} WHERE {$whereSql} ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return ['data' => $stmt->fetchAll(), 'total' => $total];
    }

    public function find(string $table, int $id): ?array
    {
        $stmt = Database::connection()->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function save(string $table, array $payload, ?int $id = null): int
    {
        $pdo = Database::connection();
        if ($id) {
            $sets = [];
            foreach (array_keys($payload) as $column) {
                $sets[] = "{$column} = :{$column}";
            }
            $payload['id'] = $id;
            $sql = "UPDATE {$table} SET " . implode(', ', $sets) . ", updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($payload);
            return $id;
        }

        $columns = array_keys($payload);
        $placeholders = array_map(fn ($col) => ':' . $col, $columns);
        $sql = "INSERT INTO {$table} (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ')';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($payload);
        return (int) $pdo->lastInsertId();
    }

    public function softDelete(string $table, int $id, bool $hasEstado): void
    {
        if ($hasEstado) {
            $stmt = Database::connection()->prepare("UPDATE {$table} SET estado = 'INACTIVO', updated_at = CURRENT_TIMESTAMP WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return;
        }

        $stmt = Database::connection()->prepare("DELETE FROM {$table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function audit(string $entity, int $entityId, string $action, array $payload): void
    {
        $stmt = Database::connection()->prepare('INSERT INTO audit_logs (entidad, entidad_id, accion, usuario_id, payload_json) VALUES (:entidad,:entidad_id,:accion,:usuario_id,:payload_json)');
        $stmt->execute([
            'entidad' => $entity,
            'entidad_id' => $entityId,
            'accion' => $action,
            'usuario_id' => (int) (Auth::user()['id'] ?? 0) ?: null,
            'payload_json' => json_encode($payload, JSON_UNESCAPED_UNICODE),
        ]);
    }

    public function options(string $table, string $label = 'nombre_completo'): array
    {
        $stmt = Database::connection()->query("SELECT id, {$label} AS label FROM {$table} ORDER BY {$label} ASC");
        return $stmt->fetchAll();
    }
}
