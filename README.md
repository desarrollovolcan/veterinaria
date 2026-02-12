# Veterinaria - PHP MVC

Proyecto ajustado a arquitectura PHP MVC básica con módulo único de **Configuración**.

## Menú actual

- Configuración
  - Usuarios
  - Roles
  - Permisos

## Base de datos

- Motor: MySQL
- Scripts en: `database/migrations/`
- Script inicial: `database/migrations/001_initial_schema.sql`

## Usuario protegido

- Usuario: `superroot`
- Password inicial: `SuperRoot#2026!`
- Restricción: no se puede editar ni eliminar desde el módulo de usuarios.

## Variables de entorno para conexión

- `DB_HOST` (default `127.0.0.1`)
- `DB_PORT` (default `3306`)
- `DB_NAME` (default `veterinaria`)
- `DB_USER` (default `root`)
- `DB_PASS` (default vacío)
