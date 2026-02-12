# Actualización de Base de Datos

## Migraciones a ejecutar (orden)
1. `database/migrations/001_initial_schema.sql`
2. `database/migrations/002_owners_module.sql`
3. `database/migrations/003_vet_clinic_modules.sql`

## Ejecución
```bash
mysql -u root -p < database/migrations/001_initial_schema.sql
mysql -u root -p < database/migrations/002_owners_module.sql
mysql -u root -p < database/migrations/003_vet_clinic_modules.sql
```

## Alcance de la 003
- Mascotas (estructura completa), Veterinarios, Citas, Ficha Clínica, Vacunas, Desparasitación.
- Productos/Inventario, Facturación/Caja, Hospitalización, Cirugías, Laboratorio y Reportes.
- Inserción de permisos de todos los módulos y asignación inicial a `SuperRoot` y `Administrador`.
