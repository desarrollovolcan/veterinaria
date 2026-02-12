CREATE DATABASE IF NOT EXISTS veterinaria CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE veterinaria;

-- =========================================================
-- SCRIPT ACUMULATIVO DE ACTUALIZACIÓN
-- Deja la BD lista para el código actual de la aplicación
-- =========================================================


-- =========================================================
-- ESQUEMA COMPLETO (instalación limpia)
-- Alineado al código actual (app/Core/Database.php + formularios)
-- =========================================================

CREATE TABLE IF NOT EXISTS system_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    descripcion TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    UNIQUE KEY uk_system_roles_nombre (nombre)
);

CREATE TABLE IF NOT EXISTS system_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    email VARCHAR(180) NULL,
    password VARCHAR(255) NULL,
    rol VARCHAR(80) NULL,
    telefono VARCHAR(40) NULL,
    rut VARCHAR(20) NULL,
    cargo VARCHAR(120) NULL,
    especialidad VARCHAR(120) NULL,
    direccion TEXT NULL,
    fecha_ingreso DATE NULL,
    ultimo_acceso DATETIME NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    UNIQUE KEY uk_system_users_email (email)
);

CREATE TABLE IF NOT EXISTS user_permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    module_key VARCHAR(120) NOT NULL,
    can_view TINYINT(1) DEFAULT 1,
    can_edit TINYINT(1) DEFAULT 0,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    KEY idx_user_permissions_user (user_id),
    UNIQUE KEY uk_user_module (user_id, module_key)
);

CREATE TABLE IF NOT EXISTS clinic_profile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_clinica VARCHAR(180) NULL,
    razon_social VARCHAR(180) NULL,
    telefono VARCHAR(40) NULL,
    email VARCHAR(180) NULL,
    direccion TEXT NULL,
    logo_path VARCHAR(255) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    entidad VARCHAR(120) NULL,
    entidad_id INT NULL,
    accion VARCHAR(60) NULL,
    usuario_id INT NULL,
    payload_json LONGTEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    KEY idx_audit_logs_entidad (entidad, entidad_id),
    KEY idx_audit_logs_usuario (usuario_id)
);

CREATE TABLE IF NOT EXISTS owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rut VARCHAR(20) NULL,
    nombre_completo VARCHAR(180) NULL,
    telefono VARCHAR(40) NULL,
    email VARCHAR(180) NULL,
    direccion TEXT NULL,
    observacion TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT NULL,
    nombre VARCHAR(120) NULL,
    especie VARCHAR(80) NULL,
    raza VARCHAR(120) NULL,
    sexo VARCHAR(20) NULL,
    fecha_nacimiento DATE NULL,
    microchip VARCHAR(80) NULL,
    esterilizado VARCHAR(20) NULL,
    color VARCHAR(80) NULL,
    peso VARCHAR(40) NULL,
    notas TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    KEY idx_pets_owner (owner_id)
);

CREATE TABLE IF NOT EXISTS vets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NULL,
    nombre VARCHAR(120) NULL,
    especialidad VARCHAR(120) NULL,
    firma VARCHAR(255) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inicio DATETIME NULL,
    fin DATETIME NULL,
    vet_id INT NULL,
    pet_id INT NULL,
    motivo VARCHAR(255) NULL,
    estado VARCHAR(50) NULL,
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS clinical_visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NULL,
    appointment_id INT NULL,
    vet_id INT NULL,
    pet_id INT NULL,
    peso VARCHAR(40) NULL,
    temperatura VARCHAR(40) NULL,
    motivo VARCHAR(255) NULL,
    examen_fisico TEXT NULL,
    diagnostico TEXT NULL,
    plan_tratamiento TEXT NULL,
    receta_json LONGTEXT NULL,
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS vaccinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NULL,
    tipo_vacuna VARCHAR(160) NULL,
    fecha_aplicada DATE NULL,
    proxima_fecha DATE NULL,
    lote VARCHAR(120) NULL,
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS dewormings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NULL,
    tipo VARCHAR(120) NULL,
    producto VARCHAR(180) NULL,
    fecha DATE NULL,
    proxima_fecha DATE NULL,
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(120) NULL,
    nombre VARCHAR(180) NULL,
    tipo VARCHAR(120) NULL,
    unidad VARCHAR(40) NULL,
    precio_compra DECIMAL(12,2) NULL,
    precio_venta DECIMAL(12,2) NULL,
    stock_minimo DECIMAL(12,2) NULL,
    stock_actual DECIMAL(12,2) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    folio VARCHAR(80) NULL,
    owner_id INT NULL,
    pet_id INT NULL,
    fecha DATETIME NULL,
    items_json LONGTEXT NULL,
    descuento DECIMAL(12,2) NULL,
    total DECIMAL(12,2) NULL,
    metodo_pago VARCHAR(60) NULL,
    estado_pago VARCHAR(60) NULL,
    updated_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS hospitalizations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NULL,
    vet_id INT NULL,
    fecha_ingreso DATETIME NULL,
    motivo VARCHAR(255) NULL,
    estado VARCHAR(60) NULL,
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS surgeries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NULL,
    vet_id INT NULL,
    fecha_programada DATETIME NULL,
    estado VARCHAR(60) NULL,
    consentimiento TEXT NULL,
    protocolo TEXT NULL,
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS laboratory_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NULL,
    vet_id INT NULL,
    fecha DATE NULL,
    tipo_examen VARCHAR(180) NULL,
    estado VARCHAR(60) NULL,
    observacion TEXT NULL,
    resultado_archivo VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS audit_trail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(160) NULL,
    modulo VARCHAR(120) NULL,
    accion VARCHAR(120) NULL,
    detalle TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS report_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(120) NULL,
    rango_desde DATE NULL,
    rango_hasta DATE NULL,
    formato VARCHAR(60) NULL,
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS access_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(160) NULL,
    rol VARCHAR(120) NULL,
    permiso VARCHAR(120) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave VARCHAR(160) NULL,
    valor TEXT NULL,
    categoria VARCHAR(120) NULL,
    detalle TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS master_catalogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(120) NULL,
    nombre VARCHAR(160) NULL,
    descripcion TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS service_rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(80) NULL,
    servicio VARCHAR(180) NULL,
    precio DECIMAL(12,2) NULL,
    descuento DECIMAL(12,2) NULL,
    convenio VARCHAR(180) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS suppliers_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proveedor VARCHAR(180) NULL,
    nro_documento VARCHAR(120) NULL,
    fecha DATE NULL,
    total DECIMAL(12,2) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS receivables (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(180) NULL,
    documento VARCHAR(120) NULL,
    monto DECIMAL(12,2) NULL,
    vencimiento DATE NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    recordatorio TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS documents_consents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(120) NULL,
    titulo VARCHAR(180) NULL,
    archivo VARCHAR(255) NULL,
    detalle TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS communications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canal VARCHAR(60) NULL,
    destino VARCHAR(180) NULL,
    asunto VARCHAR(180) NULL,
    mensaje TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS client_portal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(180) NULL,
    email VARCHAR(180) NULL,
    tipo VARCHAR(120) NULL,
    detalle TEXT NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

INSERT INTO system_roles (nombre, descripcion, estado)
SELECT 'SuperRoot', 'Acceso total del sistema', 'ACTIVO'
WHERE NOT EXISTS (SELECT 1 FROM system_roles WHERE nombre = 'SuperRoot');

INSERT INTO system_users (nombre, email, password, rol, estado)
SELECT 'SuperRoot Demo', 'superroot@veterinaria.local', '', 'SuperRoot', 'ACTIVO'
WHERE NOT EXISTS (SELECT 1 FROM system_users WHERE email = 'superroot@veterinaria.local');

INSERT INTO system_users (nombre, email, password, rol, estado)
SELECT 'Administrador General', 'admin@veterinaria.local', '$2y$12$GSYpm4btlT7c6OMSz15FYuTk5Lb/ZM1acdBE0rh4mDw6Hd16i8fcS', 'SuperRoot', 'ACTIVO'
WHERE NOT EXISTS (SELECT 1 FROM system_users WHERE email = 'admin@veterinaria.local');

INSERT INTO user_permissions (user_id, module_key, can_view, can_edit, estado)
SELECT su.id, '*', 1, 1, 'ACTIVO'
FROM system_users su
WHERE su.rol = 'SuperRoot'
  AND NOT EXISTS (
      SELECT 1
      FROM user_permissions up
      WHERE up.user_id = su.id
        AND up.module_key = '*'
  );

INSERT INTO clinic_profile (nombre_clinica, razon_social, telefono, email, direccion, estado)
SELECT 'Clínica Veterinaria', 'Clínica Veterinaria', '+56 9 0000 0000', 'contacto@veterinaria.local', 'Dirección principal', 'ACTIVO'
WHERE NOT EXISTS (SELECT 1 FROM clinic_profile);

-- =========================================================
-- Migración de datos legacy (si existen tablas antiguas)
-- =========================================================

INSERT INTO system_users (nombre, email, password, rol, estado, created_at)
SELECT u.nombre,
       u.email,
       u.password_hash,
       COALESCE(r.nombre, 'Administrador') AS rol,
       CASE WHEN u.activo = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END AS estado,
       u.created_at
FROM usuarios u
LEFT JOIN roles r ON r.id = u.rol_id
WHERE EXISTS (
    SELECT 1
    FROM information_schema.tables t
    WHERE t.table_schema = DATABASE()
      AND t.table_name = 'usuarios'
)
AND NOT EXISTS (
    SELECT 1
    FROM system_users su
    WHERE su.email = u.email
);

-- Columnas requeridas por formulario de Usuarios (idempotente)
SET @schema_name = DATABASE();

SET @sql_add_telefono = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'telefono'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN telefono VARCHAR(40) NULL')
);
PREPARE st FROM @sql_add_telefono; EXECUTE st; DEALLOCATE PREPARE st;

SET @sql_add_rut = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'rut'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN rut VARCHAR(20) NULL')
);
PREPARE st FROM @sql_add_rut; EXECUTE st; DEALLOCATE PREPARE st;

SET @sql_add_cargo = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'cargo'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN cargo VARCHAR(120) NULL')
);
PREPARE st FROM @sql_add_cargo; EXECUTE st; DEALLOCATE PREPARE st;

SET @sql_add_especialidad = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'especialidad'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN especialidad VARCHAR(120) NULL')
);
PREPARE st FROM @sql_add_especialidad; EXECUTE st; DEALLOCATE PREPARE st;

SET @sql_add_direccion = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'direccion'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN direccion TEXT NULL')
);
PREPARE st FROM @sql_add_direccion; EXECUTE st; DEALLOCATE PREPARE st;

SET @sql_add_fecha_ingreso = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'fecha_ingreso'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN fecha_ingreso DATE NULL')
);
PREPARE st FROM @sql_add_fecha_ingreso; EXECUTE st; DEALLOCATE PREPARE st;

SET @sql_add_ultimo_acceso = (
    SELECT IF(EXISTS(SELECT 1 FROM information_schema.columns WHERE table_schema = @schema_name AND table_name = 'system_users' AND column_name = 'ultimo_acceso'),
        'SELECT 1',
        'ALTER TABLE system_users ADD COLUMN ultimo_acceso DATETIME NULL')
);
PREPARE st FROM @sql_add_ultimo_acceso; EXECUTE st; DEALLOCATE PREPARE st;
