<?php

class Database
{
    private static ?PDO $connection = null;

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $port = getenv('DB_PORT') ?: '3306';
        $database = getenv('DB_NAME') ?: 'veterinaria';
        $username = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASS') ?: '';

        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $host, $port, $database);

        try {
            self::$connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (Throwable $e) {
            self::$connection = new PDO('sqlite::memory:');
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::bootstrapSqlite(self::$connection);
        }

        return self::$connection;
    }

    private static function bootstrapSqlite(PDO $pdo): void
    {
        $sql = [
            "CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT)",
            "INSERT INTO usuarios (nombre) SELECT 'SuperRoot Demo' WHERE NOT EXISTS (SELECT 1 FROM usuarios)",
            "CREATE TABLE IF NOT EXISTS owners (id INTEGER PRIMARY KEY AUTOINCREMENT, rut TEXT, nombre_completo TEXT, telefono TEXT, email TEXT, direccion TEXT, observacion TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT, deleted_at TEXT)",
            "CREATE TABLE IF NOT EXISTS pets (id INTEGER PRIMARY KEY AUTOINCREMENT, owner_id INTEGER, nombre TEXT, especie TEXT, raza TEXT, sexo TEXT, fecha_nacimiento TEXT, microchip TEXT, esterilizado TEXT, color TEXT, peso TEXT, notas TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS vets (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario_id INTEGER, nombre TEXT, especialidad TEXT, firma TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS appointments (id INTEGER PRIMARY KEY AUTOINCREMENT, inicio TEXT, fin TEXT, vet_id INTEGER, pet_id INTEGER, motivo TEXT, estado TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS clinical_visits (id INTEGER PRIMARY KEY AUTOINCREMENT, fecha TEXT, appointment_id INTEGER, vet_id INTEGER, pet_id INTEGER, peso TEXT, temperatura TEXT, motivo TEXT, examen_fisico TEXT, diagnostico TEXT, plan_tratamiento TEXT, receta_json TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS vaccinations (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, tipo_vacuna TEXT, fecha_aplicada TEXT, proxima_fecha TEXT, lote TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS dewormings (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, tipo TEXT, producto TEXT, fecha TEXT, proxima_fecha TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS products (id INTEGER PRIMARY KEY AUTOINCREMENT, sku TEXT, nombre TEXT, tipo TEXT, unidad TEXT, precio_compra TEXT, precio_venta TEXT, stock_minimo TEXT, stock_actual TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS invoices (id INTEGER PRIMARY KEY AUTOINCREMENT, folio TEXT, owner_id INTEGER, pet_id INTEGER, fecha TEXT DEFAULT CURRENT_TIMESTAMP, items_json TEXT, descuento TEXT, total TEXT, metodo_pago TEXT, estado_pago TEXT, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS hospitalizations (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha_ingreso TEXT, motivo TEXT, estado TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS surgeries (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha_programada TEXT, estado TEXT, consentimiento TEXT, protocolo TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS laboratory_orders (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha TEXT, tipo_examen TEXT, estado TEXT, observacion TEXT, resultado_archivo TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS report_requests (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, rango_desde TEXT, rango_hasta TEXT, formato TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS access_requests (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario TEXT, rol TEXT, permiso TEXT, estado TEXT DEFAULT 'ACTIVO', observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS settings (id INTEGER PRIMARY KEY AUTOINCREMENT, clave TEXT, valor TEXT, categoria TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS master_catalogs (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, nombre TEXT, descripcion TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS service_rates (id INTEGER PRIMARY KEY AUTOINCREMENT, codigo TEXT, servicio TEXT, precio TEXT, descuento TEXT, convenio TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS suppliers_purchases (id INTEGER PRIMARY KEY AUTOINCREMENT, proveedor TEXT, nro_documento TEXT, fecha TEXT, total TEXT, estado TEXT DEFAULT 'ACTIVO', observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS receivables (id INTEGER PRIMARY KEY AUTOINCREMENT, cliente TEXT, documento TEXT, monto TEXT, vencimiento TEXT, estado TEXT DEFAULT 'ACTIVO', recordatorio TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS audit_trail (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario TEXT, modulo TEXT, accion TEXT, detalle TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS documents_consents (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, titulo TEXT, archivo TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS communications (id INTEGER PRIMARY KEY AUTOINCREMENT, canal TEXT, destino TEXT, asunto TEXT, mensaje TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS client_portal (id INTEGER PRIMARY KEY AUTOINCREMENT, cliente TEXT, email TEXT, tipo TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS audit_logs (id INTEGER PRIMARY KEY AUTOINCREMENT, entidad TEXT, entidad_id INTEGER, accion TEXT, usuario_id INTEGER, payload_json TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP)",
        ];

        foreach ($sql as $statement) {
            $pdo->exec($statement);
        }
    }
}
