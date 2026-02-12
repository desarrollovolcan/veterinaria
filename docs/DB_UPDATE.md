# Actualización de Base de Datos

## Migraciones a ejecutar

1. `database/migrations/001_initial_schema.sql`
2. `database/migrations/002_owners_module.sql`

## Ejecución recomendada

```bash
mysql -u root -p < database/migrations/001_initial_schema.sql
mysql -u root -p < database/migrations/002_owners_module.sql
```

## Qué agrega `002_owners_module.sql`

- Tabla `owners` para el mantenimiento de propietarios.
- Tabla `pets` mínima (soporte para conteo de mascotas por propietario).
- Tabla `audit_logs` para auditoría de crear/editar/inactivar.
- Permisos `owners.*` y asignación automática a `SuperRoot` y `Administrador`.
