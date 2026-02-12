# Base de datos (MySQL)

Esta carpeta centraliza la base de datos y **todas sus actualizaciones**.

## Regla de mantenimiento

- Cada cambio estructural o de datos debe agregarse en `database/migrations/` con un nuevo archivo SQL incremental.
- Nunca editar migraciones ya ejecutadas en producción.

## Migraciones actuales

1. `001_initial_schema.sql`: crea esquema de seguridad (usuarios, roles, permisos), inserta permisos base y crea usuario protegido **SuperRoot**.

## Acceso inicial

- Usuario: `superroot`
- Contraseña temporal: `SuperRoot#2026!`

> Cambiar contraseña luego del primer inicio de sesión en un entorno real.
