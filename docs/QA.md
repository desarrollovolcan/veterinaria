# QA Manual - Módulo Propietarios

## Precondiciones
- Migraciones ejecutadas (`001` y `002`).
- Aplicación accesible en navegador.

## Casos de prueba

1. **Abrir módulo**
   - Ir a `index.php?controller=owners&action=index`.
   - Validar que se vea formulario arriba y tabla abajo.

2. **Crear propietario exitoso**
   - Completar `Nombre completo`, `Teléfono`, opcionales y guardar.
   - Esperar alerta de éxito y nueva fila en tabla.

3. **Validación obligatoria**
   - Enviar formulario vacío.
   - Verificar mensajes por campo en nombre y teléfono.

4. **Editar propietario**
   - Clic en `Editar`.
   - Cambiar datos y guardar.
   - Validar persistencia y alerta de éxito.

5. **Inactivar propietario**
   - Clic en `Inactivar`.
   - Confirmar en modal.
   - Verificar estado `INACTIVO` en tabla.

6. **Filtrar y paginar**
   - Usar buscador por nombre/teléfono.
   - Filtrar por estado.
   - Validar paginación en parte inferior.

7. **Auditoría**
   - Revisar en DB que cada crear/editar/inactivar registre fila en `audit_logs`.
