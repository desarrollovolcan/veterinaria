# Actualización de Base de Datos (MySQL)

## Opción A: instalación limpia (esquema completo)
Ejecuta un solo archivo:

```bash
mysql -u root -p < database/migrations/006_complete_mysql_schema.sql
```

## Opción B: actualización acumulativa (instalaciones existentes)
Este script aplica estructura completa y corrige compatibilidad con estructuras anteriores:

```bash
mysql -u root -p < database/migrations/007_cumulative_update_to_mysql_full.sql
```

## ¿Qué corrige el acumulativo?
- Deja el esquema en el formato actual del sistema (`system_users`, `system_roles`, `user_permissions`, etc.).
- Agrega columnas usadas por el **formulario de Usuarios**: `telefono`, `rut`, `cargo`, `especialidad`, `direccion`, `fecha_ingreso`, `ultimo_acceso`.
- Crea tablas funcionales faltantes de módulos clínicos/administrativos.
- Migra usuarios legacy desde `usuarios` hacia `system_users` si la tabla antigua existe.

## Credenciales demo del sistema
- Email: `superroot@veterinaria.local`
- Contraseña: `admin123`
