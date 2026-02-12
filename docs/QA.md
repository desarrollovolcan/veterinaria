# QA Manual - Plataforma Veterinaria

## Flujo general por módulo
1. Ingresar desde el menú lateral al módulo.
2. Verificar patrón: **formulario arriba** + **tabla abajo** + acciones.
3. Crear registro con campos obligatorios.
4. Editar registro desde la tabla.
5. Eliminar/Inactivar con modal de confirmación.
6. Filtrar por buscador y estado.
7. Validar paginación.

## Módulos cubiertos
- Propietarios
- Mascotas
- Veterinarios
- Agenda y Citas
- Ficha Clínica
- Vacunas
- Desparasitación
- Inventario/Farmacia
- Facturación/Caja
- Hospitalización
- Cirugías
- Laboratorio
- Reportes

## Auditoría
- Confirmar inserciones en `audit_logs` para create/update/delete desde cada módulo.
