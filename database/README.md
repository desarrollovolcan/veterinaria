# Base de datos (MySQL)

Esta carpeta centraliza la base de datos y **todas sus actualizaciones**.

## Regla de mantenimiento
- Cada cambio estructural o de datos debe agregarse en `database/migrations/` con un nuevo archivo SQL incremental.
- Nunca editar migraciones ya ejecutadas en producción.

## Migraciones recomendadas (estado actual)
1. `006_complete_mysql_schema.sql`: esquema completo para instalación limpia.
2. `007_cumulative_update_to_mysql_full.sql`: script acumulativo para actualizar instalaciones previas.

## Nota sobre migraciones antiguas
Las migraciones `001` a `005` se conservan por historial del proyecto, pero el código actual de la app trabaja con el esquema `system_*` + módulos clínicos/administrativos definidos en la migración 006.

## Acceso inicial
- Email: `superroot@veterinaria.local`
- Contraseña temporal: `admin123`
