USE veterinaria;

CREATE TABLE IF NOT EXISTS access_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(120) NOT NULL,
    rol VARCHAR(120) NOT NULL,
    permiso VARCHAR(140) NOT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave VARCHAR(120) NOT NULL,
    valor VARCHAR(255) NOT NULL,
    categoria VARCHAR(120) NULL,
    detalle TEXT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    UNIQUE KEY uk_setting_clave (clave)
);

CREATE TABLE IF NOT EXISTS master_catalogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(80) NOT NULL,
    nombre VARCHAR(140) NOT NULL,
    descripcion VARCHAR(255) NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    INDEX idx_master_tipo (tipo)
);

CREATE TABLE IF NOT EXISTS service_rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(40) NULL,
    servicio VARCHAR(140) NOT NULL,
    precio DECIMAL(12,2) NOT NULL,
    descuento DECIMAL(12,2) NULL,
    convenio VARCHAR(120) NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS suppliers_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proveedor VARCHAR(160) NOT NULL,
    nro_documento VARCHAR(60) NOT NULL,
    fecha DATE NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS receivables (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(160) NOT NULL,
    documento VARCHAR(80) NOT NULL,
    monto DECIMAL(12,2) NOT NULL,
    vencimiento DATE NOT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    recordatorio TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS audit_trail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(120) NOT NULL,
    modulo VARCHAR(120) NOT NULL,
    accion VARCHAR(120) NOT NULL,
    detalle TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS documents_consents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(60) NOT NULL,
    titulo VARCHAR(180) NOT NULL,
    archivo VARCHAR(255) NULL,
    detalle TEXT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS communications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canal VARCHAR(40) NOT NULL,
    destino VARCHAR(160) NOT NULL,
    asunto VARCHAR(180) NOT NULL,
    mensaje TEXT NOT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS client_portal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(160) NOT NULL,
    email VARCHAR(160) NOT NULL,
    tipo VARCHAR(60) NOT NULL,
    detalle TEXT NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

INSERT INTO permisos (nombre, descripcion, es_sistema)
VALUES
('rbac_access.manage', 'Gestionar accesos RBAC', 1),
('settings.manage', 'Gestionar parametrización', 1),
('master_catalogs.manage', 'Gestionar catálogos maestros', 1),
('service_rates.manage', 'Gestionar servicios y tarifario', 1),
('suppliers_purchases.manage', 'Gestionar proveedores y compras', 1),
('receivables.manage', 'Gestionar cuentas por cobrar', 1),
('audit_trail.view', 'Ver bitácora de auditoría', 1),
('documents_consents.manage', 'Gestionar documentos y consentimientos', 1),
('communications.manage', 'Gestionar comunicaciones y recordatorios', 1),
('client_portal.manage', 'Gestionar portal de cliente / reservas', 1)
ON DUPLICATE KEY UPDATE descripcion = VALUES(descripcion);

INSERT IGNORE INTO rol_permiso (rol_id, permiso_id)
SELECT r.id, p.id
FROM roles r
JOIN permisos p ON p.nombre IN (
'rbac_access.manage','settings.manage','master_catalogs.manage','service_rates.manage',
'suppliers_purchases.manage','receivables.manage','audit_trail.view','documents_consents.manage',
'communications.manage','client_portal.manage'
)
WHERE r.nombre IN ('SuperRoot','Administrador');
