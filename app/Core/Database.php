<?php

class Database
{
    private static ?PDO $connection = null;

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $dbConfig = self::databaseConfig();
        $database = (string) ($dbConfig['name'] ?? 'veterinaria');
        $username = (string) ($dbConfig['user'] ?? 'root');
        $password = (string) ($dbConfig['pass'] ?? '');
        $charset = (string) ($dbConfig['charset'] ?? 'utf8mb4');
        $port = (string) ($dbConfig['port'] ?? '3306');

        $candidates = [];
        $socket = trim((string) ($dbConfig['socket'] ?? ''));
        if ($socket !== '') {
            $candidates[] = [
                'dsn' => sprintf('mysql:unix_socket=%s;dbname=%s;charset=%s', $socket, $database, $charset),
                'label' => 'socket ' . $socket,
            ];
        }

        $host = trim((string) ($dbConfig['host'] ?? 'localhost'));
        $hosts = array_values(array_unique(array_filter([$host, 'localhost', '127.0.0.1'])));
        foreach ($hosts as $candidateHost) {
            $candidates[] = [
                'dsn' => sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $candidateHost, $port, $database, $charset),
                'label' => $candidateHost . ':' . $port,
            ];
        }

        $errors = [];
        foreach ($candidates as $candidate) {
            try {
                self::$connection = new PDO($candidate['dsn'], $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
                break;
            } catch (Throwable $e) {
                $errors[] = $candidate['label'] . ' => ' . $e->getMessage();
            }
        }

        if (!(self::$connection instanceof PDO)) {
            throw new RuntimeException(
                'No se pudo conectar a MySQL. Revisa DB_HOST/DB_PORT/DB_NAME/DB_USER/DB_PASS.'
                . ' Intentos: ' . implode(' | ', $errors)
            );
        }

        $driver = (string) self::$connection->getAttribute(PDO::ATTR_DRIVER_NAME);
        if ($driver !== 'mysql') {
            throw new RuntimeException('Conexión inválida: el sistema solo soporta MySQL.');
        }

        self::ensureCoreSchema(self::$connection);
        return self::$connection;
    }

    private static function databaseConfig(): array
    {
        $fileConfig = [];
        $configFiles = [
            __DIR__ . '/../../cxbd/database.php',
            __DIR__ . '/../../config/database.php',
        ];

        foreach ($configFiles as $configFile) {
            if (!is_file($configFile)) {
                continue;
            }
            $loaded = require $configFile;
            if (is_array($loaded)) {
                $fileConfig = $loaded;
                break;
            }
        }

        return [
            'host' => getenv('DB_HOST') ?: ($fileConfig['host'] ?? 'localhost'),
            'port' => getenv('DB_PORT') ?: ($fileConfig['port'] ?? '3306'),
            'name' => getenv('DB_NAME') ?: ($fileConfig['name'] ?? 'veterinaria'),
            'user' => getenv('DB_USER') ?: ($fileConfig['user'] ?? 'root'),
            'pass' => getenv('DB_PASS') ?: ($fileConfig['pass'] ?? ''),
            'charset' => getenv('DB_CHARSET') ?: ($fileConfig['charset'] ?? 'utf8mb4'),
            'socket' => getenv('DB_SOCKET') ?: ($fileConfig['socket'] ?? ''),
        ];
    }

    private static function ensureCoreSchema(PDO $pdo): void
    {
        $driver = (string) $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $isMysql = $driver === 'mysql';

        $sql = $isMysql ? [
            "CREATE TABLE IF NOT EXISTS system_roles (id INT AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(120) NOT NULL, descripcion TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS system_users (id INT AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(120) NOT NULL, email VARCHAR(180), password VARCHAR(255), rol VARCHAR(80), estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS user_permissions (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, module_key VARCHAR(120) NOT NULL, can_view TINYINT(1) DEFAULT 1, can_edit TINYINT(1) DEFAULT 0, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS clinic_profile (id INT AUTO_INCREMENT PRIMARY KEY, nombre_clinica VARCHAR(180), razon_social VARCHAR(180), telefono VARCHAR(40), email VARCHAR(180), direccion TEXT, logo_path VARCHAR(255), estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS audit_logs (id INT AUTO_INCREMENT PRIMARY KEY, entidad VARCHAR(120), entidad_id INT, accion VARCHAR(60), usuario_id INT NULL, payload_json LONGTEXT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)",
        ] : [
            "CREATE TABLE IF NOT EXISTS system_roles (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT NOT NULL, descripcion TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS system_users (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT NOT NULL, email TEXT, password TEXT, rol TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS user_permissions (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER NOT NULL, module_key TEXT NOT NULL, can_view INTEGER DEFAULT 1, can_edit INTEGER DEFAULT 0, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS clinic_profile (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre_clinica TEXT, razon_social TEXT, telefono TEXT, email TEXT, direccion TEXT, logo_path TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS audit_logs (id INTEGER PRIMARY KEY AUTOINCREMENT, entidad TEXT, entidad_id INTEGER, accion TEXT, usuario_id INTEGER, payload_json TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP)",
        ];

        foreach ($sql as $statement) {
            $pdo->exec($statement);
        }

        $pdo->exec("INSERT INTO system_roles (nombre, descripcion, estado) SELECT 'SuperRoot', 'Acceso total del sistema', 'ACTIVO' WHERE NOT EXISTS (SELECT 1 FROM system_roles)");
        $pdo->exec("INSERT INTO system_users (nombre, email, password, rol, estado) SELECT 'SuperRoot Demo', 'superroot@veterinaria.local', '', 'SuperRoot', 'ACTIVO' WHERE NOT EXISTS (SELECT 1 FROM system_users WHERE email = 'superroot@veterinaria.local')");
        $pdo->exec("INSERT INTO system_users (nombre, email, password, rol, estado) SELECT 'Administrador General', 'admin@veterinaria.local', '\$2y\$12\$GSYpm4btlT7c6OMSz15FYuTk5Lb/ZM1acdBE0rh4mDw6Hd16i8fcS', 'SuperRoot', 'ACTIVO' WHERE NOT EXISTS (SELECT 1 FROM system_users WHERE email = 'admin@veterinaria.local')");
        $pdo->exec("INSERT INTO user_permissions (user_id, module_key, can_view, can_edit, estado) SELECT su.id, '*', 1, 1, 'ACTIVO' FROM system_users su WHERE su.rol = 'SuperRoot' AND NOT EXISTS (SELECT 1 FROM user_permissions up WHERE up.user_id = su.id AND up.module_key = '*')");
        $pdo->exec("INSERT INTO clinic_profile (nombre_clinica, razon_social, telefono, email, direccion, estado) SELECT 'Clínica Veterinaria', 'Clínica Veterinaria', '+56 9 0000 0000', 'contacto@veterinaria.local', 'Dirección principal', 'ACTIVO' WHERE NOT EXISTS (SELECT 1 FROM clinic_profile)");

        self::ensureUserColumns($pdo);
        self::ensureFunctionalSchema($pdo);
    }

    private static function ensureUserColumns(PDO $pdo): void
    {
        self::ensureColumnExists($pdo, 'system_users', 'telefono', "VARCHAR(40) NULL");
        self::ensureColumnExists($pdo, 'system_users', 'rut', "VARCHAR(20) NULL");
        self::ensureColumnExists($pdo, 'system_users', 'cargo', "VARCHAR(120) NULL");
        self::ensureColumnExists($pdo, 'system_users', 'especialidad', "VARCHAR(120) NULL");
        self::ensureColumnExists($pdo, 'system_users', 'direccion', "TEXT NULL");
        self::ensureColumnExists($pdo, 'system_users', 'fecha_ingreso', "DATE NULL");
        self::ensureColumnExists($pdo, 'system_users', 'ultimo_acceso', "DATETIME NULL");
    }

    private static function ensureFunctionalSchema(PDO $pdo): void
    {
        $driver = (string) $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $isMysql = $driver === 'mysql';
        $sql = $isMysql ? [
            "CREATE TABLE IF NOT EXISTS owners (id INT AUTO_INCREMENT PRIMARY KEY, rut VARCHAR(20), nombre_completo VARCHAR(180), telefono VARCHAR(40), email VARCHAR(180), direccion TEXT, observacion TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL, deleted_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS pets (id INT AUTO_INCREMENT PRIMARY KEY, owner_id INT, nombre VARCHAR(120), especie VARCHAR(80), raza VARCHAR(120), sexo VARCHAR(20), fecha_nacimiento DATE NULL, microchip VARCHAR(80), esterilizado VARCHAR(20), color VARCHAR(80), peso VARCHAR(40), notas TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS vets (id INT AUTO_INCREMENT PRIMARY KEY, usuario_id INT, nombre VARCHAR(120), especialidad VARCHAR(120), firma VARCHAR(255), estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS appointments (id INT AUTO_INCREMENT PRIMARY KEY, inicio DATETIME NULL, fin DATETIME NULL, vet_id INT, pet_id INT, motivo VARCHAR(255), estado VARCHAR(50), notas TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",

            "CREATE TABLE IF NOT EXISTS clinical_visits (id INT AUTO_INCREMENT PRIMARY KEY, fecha DATE NULL, appointment_id INT, vet_id INT, pet_id INT, peso VARCHAR(40), temperatura VARCHAR(40), motivo VARCHAR(255), examen_fisico TEXT, diagnostico TEXT, plan_tratamiento TEXT, receta_json LONGTEXT, notas TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS vaccinations (id INT AUTO_INCREMENT PRIMARY KEY, pet_id INT, tipo_vacuna VARCHAR(160), fecha_aplicada DATE NULL, proxima_fecha DATE NULL, lote VARCHAR(120), observacion TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS dewormings (id INT AUTO_INCREMENT PRIMARY KEY, pet_id INT, tipo VARCHAR(120), producto VARCHAR(180), fecha DATE NULL, proxima_fecha DATE NULL, observacion TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS products (id INT AUTO_INCREMENT PRIMARY KEY, sku VARCHAR(120), nombre VARCHAR(180), tipo VARCHAR(120), unidad VARCHAR(40), precio_compra DECIMAL(12,2) NULL, precio_venta DECIMAL(12,2) NULL, stock_minimo DECIMAL(12,2) NULL, stock_actual DECIMAL(12,2) NULL, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS invoices (id INT AUTO_INCREMENT PRIMARY KEY, folio VARCHAR(80), owner_id INT, pet_id INT, fecha DATETIME NULL, items_json LONGTEXT, descuento DECIMAL(12,2) NULL, total DECIMAL(12,2) NULL, metodo_pago VARCHAR(60), estado_pago VARCHAR(60), updated_at TIMESTAMP NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)",
            "CREATE TABLE IF NOT EXISTS hospitalizations (id INT AUTO_INCREMENT PRIMARY KEY, pet_id INT, vet_id INT, fecha_ingreso DATETIME NULL, motivo VARCHAR(255), estado VARCHAR(60), observacion TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS surgeries (id INT AUTO_INCREMENT PRIMARY KEY, pet_id INT, vet_id INT, fecha_programada DATETIME NULL, estado VARCHAR(60), consentimiento TEXT, protocolo TEXT, notas TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS laboratory_orders (id INT AUTO_INCREMENT PRIMARY KEY, pet_id INT, vet_id INT, fecha DATE NULL, tipo_examen VARCHAR(180), estado VARCHAR(60), observacion TEXT, resultado_archivo VARCHAR(255), created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS audit_trail (id INT AUTO_INCREMENT PRIMARY KEY, usuario VARCHAR(160), modulo VARCHAR(120), accion VARCHAR(120), detalle TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS report_requests (id INT AUTO_INCREMENT PRIMARY KEY, tipo VARCHAR(120), rango_desde DATE NULL, rango_hasta DATE NULL, formato VARCHAR(60), notas TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS access_requests (id INT AUTO_INCREMENT PRIMARY KEY, usuario VARCHAR(160), rol VARCHAR(120), permiso VARCHAR(120), estado VARCHAR(20) DEFAULT 'ACTIVO', observacion TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS settings (id INT AUTO_INCREMENT PRIMARY KEY, clave VARCHAR(160), valor TEXT, categoria VARCHAR(120), detalle TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS master_catalogs (id INT AUTO_INCREMENT PRIMARY KEY, tipo VARCHAR(120), nombre VARCHAR(160), descripcion TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS service_rates (id INT AUTO_INCREMENT PRIMARY KEY, codigo VARCHAR(80), servicio VARCHAR(180), precio DECIMAL(12,2) NULL, descuento DECIMAL(12,2) NULL, convenio VARCHAR(180), estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS suppliers_purchases (id INT AUTO_INCREMENT PRIMARY KEY, proveedor VARCHAR(180), nro_documento VARCHAR(120), fecha DATE NULL, total DECIMAL(12,2) NULL, estado VARCHAR(20) DEFAULT 'ACTIVO', observacion TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS receivables (id INT AUTO_INCREMENT PRIMARY KEY, cliente VARCHAR(180), documento VARCHAR(120), monto DECIMAL(12,2) NULL, vencimiento DATE NULL, estado VARCHAR(20) DEFAULT 'ACTIVO', recordatorio TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS documents_consents (id INT AUTO_INCREMENT PRIMARY KEY, tipo VARCHAR(120), titulo VARCHAR(180), archivo VARCHAR(255), detalle TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS communications (id INT AUTO_INCREMENT PRIMARY KEY, canal VARCHAR(60), destino VARCHAR(180), asunto VARCHAR(180), mensaje TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
            "CREATE TABLE IF NOT EXISTS client_portal (id INT AUTO_INCREMENT PRIMARY KEY, cliente VARCHAR(180), email VARCHAR(180), tipo VARCHAR(120), detalle TEXT, estado VARCHAR(20) DEFAULT 'ACTIVO', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NULL)",
        ] : [
            "CREATE TABLE IF NOT EXISTS owners (id INTEGER PRIMARY KEY AUTOINCREMENT, rut TEXT, nombre_completo TEXT, telefono TEXT, email TEXT, direccion TEXT, observacion TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT, deleted_at TEXT)",
            "CREATE TABLE IF NOT EXISTS pets (id INTEGER PRIMARY KEY AUTOINCREMENT, owner_id INTEGER, nombre TEXT, especie TEXT, raza TEXT, sexo TEXT, fecha_nacimiento TEXT, microchip TEXT, esterilizado TEXT, color TEXT, peso TEXT, notas TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS vets (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario_id INTEGER, nombre TEXT, especialidad TEXT, firma TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS appointments (id INTEGER PRIMARY KEY AUTOINCREMENT, inicio TEXT, fin TEXT, vet_id INTEGER, pet_id INTEGER, motivo TEXT, estado TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",

            "CREATE TABLE IF NOT EXISTS clinical_visits (id INTEGER PRIMARY KEY AUTOINCREMENT, fecha TEXT, appointment_id INTEGER, vet_id INTEGER, pet_id INTEGER, peso TEXT, temperatura TEXT, motivo TEXT, examen_fisico TEXT, diagnostico TEXT, plan_tratamiento TEXT, receta_json TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS vaccinations (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, tipo_vacuna TEXT, fecha_aplicada TEXT, proxima_fecha TEXT, lote TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS dewormings (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, tipo TEXT, producto TEXT, fecha TEXT, proxima_fecha TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS products (id INTEGER PRIMARY KEY AUTOINCREMENT, sku TEXT, nombre TEXT, tipo TEXT, unidad TEXT, precio_compra TEXT, precio_venta TEXT, stock_minimo TEXT, stock_actual TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS invoices (id INTEGER PRIMARY KEY AUTOINCREMENT, folio TEXT, owner_id INTEGER, pet_id INTEGER, fecha TEXT, items_json TEXT, descuento TEXT, total TEXT, metodo_pago TEXT, estado_pago TEXT, updated_at TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP)",
            "CREATE TABLE IF NOT EXISTS hospitalizations (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha_ingreso TEXT, motivo TEXT, estado TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS surgeries (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha_programada TEXT, estado TEXT, consentimiento TEXT, protocolo TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS laboratory_orders (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha TEXT, tipo_examen TEXT, estado TEXT, observacion TEXT, resultado_archivo TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS audit_trail (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario TEXT, modulo TEXT, accion TEXT, detalle TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS report_requests (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, rango_desde TEXT, rango_hasta TEXT, formato TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS access_requests (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario TEXT, rol TEXT, permiso TEXT, estado TEXT DEFAULT 'ACTIVO', observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS settings (id INTEGER PRIMARY KEY AUTOINCREMENT, clave TEXT, valor TEXT, categoria TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS master_catalogs (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, nombre TEXT, descripcion TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS service_rates (id INTEGER PRIMARY KEY AUTOINCREMENT, codigo TEXT, servicio TEXT, precio TEXT, descuento TEXT, convenio TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS suppliers_purchases (id INTEGER PRIMARY KEY AUTOINCREMENT, proveedor TEXT, nro_documento TEXT, fecha TEXT, total TEXT, estado TEXT DEFAULT 'ACTIVO', observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS receivables (id INTEGER PRIMARY KEY AUTOINCREMENT, cliente TEXT, documento TEXT, monto TEXT, vencimiento TEXT, estado TEXT DEFAULT 'ACTIVO', recordatorio TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS documents_consents (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, titulo TEXT, archivo TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS communications (id INTEGER PRIMARY KEY AUTOINCREMENT, canal TEXT, destino TEXT, asunto TEXT, mensaje TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS client_portal (id INTEGER PRIMARY KEY AUTOINCREMENT, cliente TEXT, email TEXT, tipo TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
        ];

        foreach ($sql as $statement) {
            $pdo->exec($statement);
        }
    }

    private static function ensureColumnExists(PDO $pdo, string $table, string $column, string $definition): void
    {
        $driver = (string) $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

        if ($driver === 'mysql') {
            $stmt = $pdo->prepare('SHOW COLUMNS FROM ' . $table . ' LIKE :column');
            $stmt->execute(['column' => $column]);
            if ($stmt->fetch()) {
                return;
            }
            $pdo->exec('ALTER TABLE ' . $table . ' ADD COLUMN ' . $column . ' ' . $definition);
            return;
        }

        $rows = $pdo->query('PRAGMA table_info(' . $table . ')')->fetchAll();
        foreach ($rows as $row) {
            if (($row['name'] ?? null) === $column) {
                return;
            }
        }

        $sqliteDefinition = str_replace(['VARCHAR(40)', 'VARCHAR(20)', 'VARCHAR(120)', 'DATETIME', 'DATE'], ['TEXT', 'TEXT', 'TEXT', 'TEXT', 'TEXT'], $definition);
        $pdo->exec('ALTER TABLE ' . $table . ' ADD COLUMN ' . $column . ' ' . $sqliteDefinition);
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
            "CREATE TABLE IF NOT EXISTS invoices (id INTEGER PRIMARY KEY AUTOINCREMENT, folio TEXT, owner_id INTEGER, pet_id INTEGER, fecha TEXT, items_json TEXT, descuento TEXT, total TEXT, metodo_pago TEXT, estado_pago TEXT, updated_at TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP)",
            "CREATE TABLE IF NOT EXISTS hospitalizations (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha_ingreso TEXT, motivo TEXT, estado TEXT, observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS surgeries (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha_programada TEXT, estado TEXT, consentimiento TEXT, protocolo TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS laboratory_orders (id INTEGER PRIMARY KEY AUTOINCREMENT, pet_id INTEGER, vet_id INTEGER, fecha TEXT, tipo_examen TEXT, estado TEXT, observacion TEXT, resultado_archivo TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS audit_trail (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario TEXT, modulo TEXT, accion TEXT, detalle TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS report_requests (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, rango_desde TEXT, rango_hasta TEXT, formato TEXT, notas TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS access_requests (id INTEGER PRIMARY KEY AUTOINCREMENT, usuario TEXT, rol TEXT, permiso TEXT, estado TEXT DEFAULT 'ACTIVO', observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS settings (id INTEGER PRIMARY KEY AUTOINCREMENT, clave TEXT, valor TEXT, categoria TEXT, detalle TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS master_catalogs (id INTEGER PRIMARY KEY AUTOINCREMENT, tipo TEXT, nombre TEXT, descripcion TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS service_rates (id INTEGER PRIMARY KEY AUTOINCREMENT, codigo TEXT, servicio TEXT, precio TEXT, descuento TEXT, convenio TEXT, estado TEXT DEFAULT 'ACTIVO', created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS suppliers_purchases (id INTEGER PRIMARY KEY AUTOINCREMENT, proveedor TEXT, nro_documento TEXT, fecha TEXT, total TEXT, estado TEXT DEFAULT 'ACTIVO', observacion TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
            "CREATE TABLE IF NOT EXISTS receivables (id INTEGER PRIMARY KEY AUTOINCREMENT, cliente TEXT, documento TEXT, monto TEXT, vencimiento TEXT, estado TEXT DEFAULT 'ACTIVO', recordatorio TEXT, created_at TEXT DEFAULT CURRENT_TIMESTAMP, updated_at TEXT)",
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
