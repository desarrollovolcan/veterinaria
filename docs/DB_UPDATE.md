# Actualización de Base de Datos

## Migraciones a ejecutar (orden)
1. `database/migrations/001_initial_schema.sql`
2. `database/migrations/002_owners_module.sql`
3. `database/migrations/003_vet_clinic_modules.sql`
4. `database/migrations/004_admin_support_modules.sql`

## Ejecución
```bash
mysql -u root -p < database/migrations/001_initial_schema.sql
mysql -u root -p < database/migrations/002_owners_module.sql
mysql -u root -p < database/migrations/003_vet_clinic_modules.sql
mysql -u root -p < database/migrations/004_admin_support_modules.sql
```

## Alcance de la 004
- Usuarios/Roles/Permisos (gestión de accesos complementaria).
- Configuración/parametrización.
- Catálogos maestros.
- Servicios y tarifario.
- Proveedores y compras.
- Morosos / cuentas por cobrar.
- Auditoría / bitácora.
- Documentos / consentimientos.
- Comunicaciones / recordatorios.
- Portal cliente / reserva online.
