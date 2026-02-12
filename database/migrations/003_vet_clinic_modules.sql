USE veterinaria;

CREATE TABLE IF NOT EXISTS vets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    especialidad VARCHAR(120) NULL,
    firma VARCHAR(255) NULL,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    CONSTRAINT fk_vets_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

ALTER TABLE pets
    ADD COLUMN IF NOT EXISTS especie VARCHAR(80) NULL,
    ADD COLUMN IF NOT EXISTS raza VARCHAR(80) NULL,
    ADD COLUMN IF NOT EXISTS sexo VARCHAR(5) NULL,
    ADD COLUMN IF NOT EXISTS fecha_nacimiento DATE NULL,
    ADD COLUMN IF NOT EXISTS microchip VARCHAR(80) NULL,
    ADD COLUMN IF NOT EXISTS esterilizado VARCHAR(10) NULL,
    ADD COLUMN IF NOT EXISTS color VARCHAR(80) NULL,
    ADD COLUMN IF NOT EXISTS peso DECIMAL(10,2) NULL,
    ADD COLUMN IF NOT EXISTS notas TEXT NULL,
    ADD COLUMN IF NOT EXISTS updated_at TIMESTAMP NULL;

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inicio DATETIME NOT NULL,
    fin DATETIME NOT NULL,
    vet_id INT NOT NULL,
    pet_id INT NOT NULL,
    motivo VARCHAR(255) NOT NULL,
    estado VARCHAR(30) NOT NULL DEFAULT 'Agendada',
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (vet_id) REFERENCES vets(id),
    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

CREATE TABLE IF NOT EXISTS clinical_visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    appointment_id INT NULL,
    vet_id INT NOT NULL,
    pet_id INT NOT NULL,
    peso DECIMAL(10,2) NULL,
    temperatura DECIMAL(5,2) NULL,
    motivo VARCHAR(255) NOT NULL,
    examen_fisico TEXT NULL,
    diagnostico TEXT NOT NULL,
    plan_tratamiento TEXT NOT NULL,
    receta_json LONGTEXT NULL,
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (appointment_id) REFERENCES appointments(id),
    FOREIGN KEY (vet_id) REFERENCES vets(id),
    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

CREATE TABLE IF NOT EXISTS vaccinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    tipo_vacuna VARCHAR(120) NOT NULL,
    fecha_aplicada DATE NOT NULL,
    proxima_fecha DATE NULL,
    lote VARCHAR(60) NULL,
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

CREATE TABLE IF NOT EXISTS dewormings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    producto VARCHAR(120) NULL,
    fecha DATE NOT NULL,
    proxima_fecha DATE NULL,
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(80) NULL,
    nombre VARCHAR(140) NOT NULL,
    tipo ENUM('MEDICAMENTO','PRODUCTO','SERVICIO') NOT NULL,
    unidad VARCHAR(40) NULL,
    precio_compra DECIMAL(12,2) NULL,
    precio_venta DECIMAL(12,2) NOT NULL,
    stock_minimo DECIMAL(12,2) NULL,
    stock_actual DECIMAL(12,2) NOT NULL DEFAULT 0,
    estado ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    folio VARCHAR(50) NULL,
    owner_id INT NOT NULL,
    pet_id INT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    items_json LONGTEXT NOT NULL,
    descuento DECIMAL(12,2) NULL,
    total DECIMAL(12,2) NOT NULL,
    metodo_pago VARCHAR(30) NULL,
    estado_pago VARCHAR(20) NOT NULL DEFAULT 'Pendiente',
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (owner_id) REFERENCES owners(id),
    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

CREATE TABLE IF NOT EXISTS hospitalizations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    vet_id INT NOT NULL,
    fecha_ingreso DATETIME NOT NULL,
    motivo VARCHAR(255) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Activa',
    observacion TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id),
    FOREIGN KEY (vet_id) REFERENCES vets(id)
);

CREATE TABLE IF NOT EXISTS surgeries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    vet_id INT NOT NULL,
    fecha_programada DATETIME NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Programada',
    consentimiento VARCHAR(255) NULL,
    protocolo TEXT NULL,
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id),
    FOREIGN KEY (vet_id) REFERENCES vets(id)
);

CREATE TABLE IF NOT EXISTS laboratory_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    vet_id INT NOT NULL,
    fecha DATE NOT NULL,
    tipo_examen VARCHAR(120) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Solicitado',
    observacion TEXT NULL,
    resultado_archivo VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (pet_id) REFERENCES pets(id),
    FOREIGN KEY (vet_id) REFERENCES vets(id)
);

CREATE TABLE IF NOT EXISTS report_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(60) NOT NULL,
    rango_desde DATE NOT NULL,
    rango_hasta DATE NOT NULL,
    formato VARCHAR(20) NOT NULL DEFAULT 'Pantalla',
    notas TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL
);

INSERT INTO permisos (nombre, descripcion, es_sistema) VALUES
('pets.view','Ver mascotas',1),('pets.manage','Gestionar mascotas',1),
('vets.view','Ver veterinarios',1),('vets.manage','Gestionar veterinarios',1),
('appointments.view','Ver citas',1),('appointments.manage','Gestionar citas',1),
('clinical.view','Ver ficha clínica',1),('clinical.manage','Gestionar ficha clínica',1),
('vaccinations.view','Ver vacunas',1),('vaccinations.manage','Gestionar vacunas',1),
('dewormings.view','Ver desparasitación',1),('dewormings.manage','Gestionar desparasitación',1),
('products.view','Ver inventario',1),('products.manage','Gestionar inventario',1),
('invoices.view','Ver facturación',1),('invoices.manage','Gestionar facturación',1),
('hospitalizations.view','Ver hospitalización',1),('hospitalizations.manage','Gestionar hospitalización',1),
('surgeries.view','Ver cirugías',1),('surgeries.manage','Gestionar cirugías',1),
('laboratory.view','Ver laboratorio',1),('laboratory.manage','Gestionar laboratorio',1),
('reports.view','Ver reportes',1)
ON DUPLICATE KEY UPDATE descripcion=VALUES(descripcion);

INSERT IGNORE INTO rol_permiso (rol_id, permiso_id)
SELECT r.id, p.id
FROM roles r
JOIN permisos p ON p.nombre IN (
'owners.view','owners.create','owners.edit','owners.delete',
'pets.view','pets.manage','vets.view','vets.manage','appointments.view','appointments.manage',
'clinical.view','clinical.manage','vaccinations.view','vaccinations.manage','dewormings.view','dewormings.manage',
'products.view','products.manage','invoices.view','invoices.manage','hospitalizations.view','hospitalizations.manage',
'surgeries.view','surgeries.manage','laboratory.view','laboratory.manage','reports.view'
)
WHERE r.nombre IN ('SuperRoot','Administrador');
