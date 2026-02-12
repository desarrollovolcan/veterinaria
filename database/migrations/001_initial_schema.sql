CREATE DATABASE IF NOT EXISTS veterinaria CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE veterinaria;

CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(60) NOT NULL UNIQUE,
    descripcion VARCHAR(255) NULL,
    es_sistema TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS permisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    descripcion VARCHAR(255) NULL,
    es_sistema TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS rol_permiso (
    rol_id INT NOT NULL,
    permiso_id INT NOT NULL,
    PRIMARY KEY (rol_id, permiso_id),
    CONSTRAINT fk_rol_permiso_rol FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE,
    CONSTRAINT fk_rol_permiso_permiso FOREIGN KEY (permiso_id) REFERENCES permisos(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(120) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    rol_id INT NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    es_superroot TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_rol FOREIGN KEY (rol_id) REFERENCES roles(id)
);

INSERT INTO roles (nombre, descripcion, es_sistema)
VALUES ('SuperRoot', 'Acceso total de plataforma', 1), ('Administrador', 'Administración general', 1)
ON DUPLICATE KEY UPDATE descripcion = VALUES(descripcion);

INSERT INTO permisos (nombre, descripcion, es_sistema)
VALUES
('usuarios.gestionar', 'Crear/editar/eliminar usuarios', 1),
('roles.gestionar', 'Crear/eliminar roles', 1),
('permisos.gestionar', 'Crear/eliminar permisos', 1)
ON DUPLICATE KEY UPDATE descripcion = VALUES(descripcion);

INSERT IGNORE INTO rol_permiso (rol_id, permiso_id)
SELECT r.id, p.id
FROM roles r
JOIN permisos p ON 1=1
WHERE r.nombre = 'SuperRoot';

INSERT INTO usuarios (usuario, nombre, email, password_hash, rol_id, activo, es_superroot)
SELECT 'superroot', 'SuperRoot del sistema', 'superroot@veterinaria.local', '$2y$12$WXF1vsmF/PVzJjJzFcWSL.6Yxr6NquSSMJoqVbgYoku4Loq2KM2Lq', r.id, 1, 1
FROM roles r
WHERE r.nombre = 'SuperRoot'
AND NOT EXISTS (SELECT 1 FROM usuarios WHERE usuario = 'superroot');
