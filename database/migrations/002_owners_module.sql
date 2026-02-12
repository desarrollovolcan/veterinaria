USE veterinaria;

CREATE TABLE IF NOT EXISTS owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rut VARCHAR(20) NULL,
    nombre_completo VARCHAR(150) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    email VARCHAR(120) NULL,
    direccion VARCHAR(255) NULL,
    observacion TEXT NULL,
    estado ENUM('ACTIVO', 'INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_owner_nombre (nombre_completo),
    INDEX idx_owner_estado (estado)
);

CREATE TABLE IF NOT EXISTS pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    estado ENUM('ACTIVO', 'INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_pets_owner FOREIGN KEY (owner_id) REFERENCES owners(id)
);

CREATE TABLE IF NOT EXISTS audit_logs (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    entidad VARCHAR(80) NOT NULL,
    entidad_id INT NOT NULL,
    accion VARCHAR(40) NOT NULL,
    usuario_id INT NULL,
    payload_json JSON NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_audit_entidad (entidad, entidad_id),
    INDEX idx_audit_usuario (usuario_id),
    CONSTRAINT fk_audit_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO permisos (nombre, descripcion, es_sistema)
VALUES
('owners.view', 'Ver listado de propietarios', 1),
('owners.create', 'Crear propietarios', 1),
('owners.edit', 'Editar propietarios', 1),
('owners.delete', 'Inactivar propietarios', 1)
ON DUPLICATE KEY UPDATE descripcion = VALUES(descripcion);

INSERT IGNORE INTO rol_permiso (rol_id, permiso_id)
SELECT r.id, p.id
FROM roles r
JOIN permisos p ON p.nombre IN ('owners.view', 'owners.create', 'owners.edit', 'owners.delete')
WHERE r.nombre IN ('SuperRoot', 'Administrador');
