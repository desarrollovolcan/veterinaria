USE veterinaria;

-- =========================================================
-- Actualización de esquema para formularios generales + usuarios
-- Ejecutar una vez en MySQL 8+
-- =========================================================

CREATE TABLE IF NOT EXISTS audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    entidad VARCHAR(120) NULL,
    entidad_id INT NULL,
    accion VARCHAR(60) NULL,
    usuario_id INT NULL,
    payload_json LONGTEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE system_users
    ADD COLUMN IF NOT EXISTS telefono VARCHAR(40) NULL,
    ADD COLUMN IF NOT EXISTS rut VARCHAR(20) NULL,
    ADD COLUMN IF NOT EXISTS cargo VARCHAR(120) NULL,
    ADD COLUMN IF NOT EXISTS especialidad VARCHAR(120) NULL,
    ADD COLUMN IF NOT EXISTS direccion TEXT NULL,
    ADD COLUMN IF NOT EXISTS fecha_ingreso DATE NULL,
    ADD COLUMN IF NOT EXISTS ultimo_acceso DATETIME NULL;

CREATE TABLE IF NOT EXISTS report_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(120),
    rango_desde DATE NULL,
    rango_hasta DATE NULL,
    formato VARCHAR(60),
    notas TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS access_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(160),
    rol VARCHAR(120),
    permiso VARCHAR(120),
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    observacion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave VARCHAR(160),
    valor TEXT,
    categoria VARCHAR(120),
    detalle TEXT,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS master_catalogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(120),
    nombre VARCHAR(160),
    descripcion TEXT,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS service_rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(80),
    servicio VARCHAR(180),
    precio DECIMAL(12,2) NULL,
    descuento DECIMAL(12,2) NULL,
    convenio VARCHAR(180),
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS suppliers_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proveedor VARCHAR(180),
    nro_documento VARCHAR(120),
    fecha DATE NULL,
    total DECIMAL(12,2) NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    observacion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS receivables (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(180),
    documento VARCHAR(120),
    monto DECIMAL(12,2) NULL,
    vencimiento DATE NULL,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    recordatorio TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS audit_trail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(160),
    modulo VARCHAR(120),
    accion VARCHAR(120),
    detalle TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS documents_consents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(120),
    titulo VARCHAR(180),
    archivo VARCHAR(255),
    detalle TEXT,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS communications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canal VARCHAR(60),
    destino VARCHAR(180),
    asunto VARCHAR(180),
    mensaje TEXT,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS client_portal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(180),
    email VARCHAR(180),
    tipo VARCHAR(120),
    detalle TEXT,
    estado VARCHAR(20) DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);
