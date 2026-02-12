# Base de datos (MySQL)

Esta carpeta centraliza la base de datos y **todas sus actualizaciones**.

## Regla de mantenimiento
- Cada cambio estructural o de datos debe agregarse en `database/migrations/` con un nuevo archivo SQL incremental.
- Nunca editar migraciones ya ejecutadas en producción.

## Migraciones actuales
1. `001_initial_schema.sql`: seguridad base (usuarios, roles, permisos).
2. `002_owners_module.sql`: módulo de propietarios + auditoría.
3. `003_vet_clinic_modules.sql`: módulos clínicos y administrativos restantes de la veterinaria.

## Acceso inicial
- Usuario: `superroot`
- Contraseña temporal: `SuperRoot#2026!`

> Cambiar contraseña luego del primer inicio de sesión.
