<?php

class ModuleController extends BaseController
{
    private ModuleRepository $repo;

    public function __construct()
    {
        $this->repo = new ModuleRepository();
    }

    public function index(): void
    {
        $module = $_GET['module'] ?? '';
        $config = $this->modules()[$module] ?? null;
        if (!$config) {
            http_response_code(404);
            echo 'Módulo no encontrado';
            return;
        }

        if (!Auth::canViewModule($module)) {
            http_response_code(403);
            echo 'No tienes permisos para ver este módulo.';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Auth::canEditModule($module)) {
                flash('error', 'Tu perfil tiene acceso solo lectura en este módulo.');
                $this->redirect("index.php?controller=module&action=index&module={$module}");
            }
            if (!verify_csrf($_POST['csrf_token'] ?? null)) {
                flash('error', 'Token de seguridad inválido.');
                $this->redirect("index.php?controller=module&action=index&module={$module}");
            }

            $intent = $_POST['intent'] ?? 'save';
            if ($intent === 'delete') {
                $id = (int) ($_POST['id'] ?? 0);
                if ($id > 0) {
                    $this->repo->softDelete($config['table'], $id, $config['has_estado']);
                    $this->repo->audit($module, $id, 'DELETE', ['id' => $id]);
                    flash('success', 'Registro actualizado correctamente.');
                }
                $this->redirect("index.php?controller=module&action=index&module={$module}");
            }

            $id = (int) ($_POST['id'] ?? 0);
            $payload = [];
            $errors = [];
            foreach ($config['fields'] as $field => $meta) {
                if (($meta['readonly'] ?? false) === true) {
                    continue;
                }
                $value = trim((string) ($_POST[$field] ?? ''));
                if (($meta['required'] ?? false) && $value === '') {
                    $errors[$field] = 'Campo obligatorio';
                }
                $payload[$field] = $value === '' ? null : $value;
            }

            if ($errors) {
                flash('error', 'Hay campos obligatorios pendientes.');
                $_SESSION['_form_errors'] = $errors;
                $_SESSION['_old'] = $_POST;
                $url = "index.php?controller=module&action=index&module={$module}" . ($id ? '&edit=' . $id : '');
                $this->redirect($url);
            }

            if ($module === 'clinic_profile' && isset($_FILES['logo_file']) && (int) ($_FILES['logo_file']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../assets/images/clinic';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }
                $ext = strtolower(pathinfo((string) $_FILES['logo_file']['name'], PATHINFO_EXTENSION));
                $ext = in_array($ext, ['png', 'jpg', 'jpeg', 'svg', 'webp'], true) ? $ext : 'png';
                $target = 'assets/images/clinic/logo-' . time() . '.' . $ext;
                $fullPath = __DIR__ . '/../../' . $target;
                if (move_uploaded_file($_FILES['logo_file']['tmp_name'], $fullPath)) {
                    $payload['logo_path'] = $target;
                }
            }

            if ($module === 'users') {
                $plainPassword = trim((string) ($payload['password'] ?? ''));
                if ($plainPassword === '') {
                    unset($payload['password']);
                } else {
                    $payload['password'] = password_hash($plainPassword, PASSWORD_DEFAULT);
                }
            }

            try {
                $savedId = $this->repo->save($config['table'], $payload, $id ?: null);
            } catch (PDOException $e) {
                $sqlState = (string) ($e->errorInfo[0] ?? $e->getCode());
                $message = (string) $e->getMessage();
                $isDuplicate = $sqlState === '23000' && (strpos($message, 'Duplicate entry') !== false || strpos($message, 'UNIQUE') !== false);

                if ($isDuplicate) {
                    flash('error', 'No se pudo guardar: el valor ingresado ya existe (por ejemplo, email duplicado).');
                    $_SESSION['_old'] = $_POST;
                    $url = "index.php?controller=module&action=index&module={$module}" . ($id ? '&edit=' . $id : '');
                    $this->redirect($url);
                }

                throw $e;
            }

            if ($module === 'clinic_profile') {
                $_SESSION['clinic_profile'] = $this->repo->find('clinic_profile', $savedId) ?? [];
            }
            if ($module === 'permissions' || $module === 'users') {
                Auth::refresh();
            }
            $this->repo->audit($module, $savedId, $id ? 'UPDATE' : 'CREATE', $payload);
            flash('success', $id ? 'Registro actualizado.' : 'Registro creado.');
            $this->redirect("index.php?controller=module&action=index&module={$module}");
        }

        $filters = [
            'q' => trim((string) ($_GET['q'] ?? '')),
            'estado' => trim((string) ($_GET['estado'] ?? '')),
        ];
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $perPage = 10;
        $result = $this->repo->paginate($config['table'], $config['search_columns'], $filters, $page, $perPage);
        $totalPages = max(1, (int) ceil($result['total'] / $perPage));

        $editing = null;
        if (!empty($_GET['edit'])) {
            $editing = $this->repo->find($config['table'], (int) $_GET['edit']);
        }

        $options = [
            'owners' => $this->repo->options('owners', 'nombre_completo'),
            'pets' => $this->repo->options('pets', 'nombre'),
            'vets' => $this->repo->options('vets', 'nombre'),
            'products' => $this->repo->options('products', 'nombre'),
            'users' => $this->repo->options('system_users', 'nombre'),
            'appointments' => $this->repo->options('appointments', 'motivo'),
        ];

        $view = is_file(__DIR__ . '/../Views/' . $module . '/index.php') ? $module . '/index' : 'modules/index';
        $this->render($view, [
            'moduleKey' => $module,
            'config' => $config,
            'rows' => $result['data'],
            'filters' => $filters,
            'page' => $page,
            'totalPages' => $totalPages,
            'editing' => $editing,
            'options' => $options,
            'success' => flash('success'),
            'error' => flash('error'),
            'formErrors' => $_SESSION['_form_errors'] ?? [],
            'old' => $_SESSION['_old'] ?? [],
            'canEdit' => Auth::canEditModule($module),
        ]);

        unset($_SESSION['_form_errors'], $_SESSION['_old']);
    }

    private function modules(): array
    {
        return [
            'pets' => ['title' => 'Mascotas', 'table' => 'pets', 'has_estado' => true, 'search_columns' => ['nombre', 'microchip', 'color'], 'fields' => [
                'owner_id' => ['label' => 'Propietario', 'type' => 'select', 'source' => 'owners', 'required' => true, 'col' => 3],
                'nombre' => ['label' => 'Nombre mascota', 'required' => true, 'col' => 3],
                'especie' => ['label' => 'Especie', 'type' => 'select', 'options' => ['Canino', 'Felino', 'Ave', 'Exótico', 'Otro'], 'required' => true, 'col' => 2],
                'raza' => ['label' => 'Raza', 'col' => 2],
                'sexo' => ['label' => 'Sexo', 'type' => 'select', 'options' => ['M', 'H'], 'required' => true, 'col' => 2],
                'fecha_nacimiento' => ['label' => 'F. nac.', 'type' => 'date', 'col' => 2],
                'microchip' => ['label' => 'Microchip', 'col' => 2],
                'esterilizado' => ['label' => 'Esterilizado', 'type' => 'select', 'options' => ['SI', 'NO'], 'col' => 2],
                'color' => ['label' => 'Color', 'col' => 2],
                'peso' => ['label' => 'Peso (kg)', 'type' => 'number', 'col' => 2],
                'notas' => ['label' => 'Notas', 'type' => 'textarea', 'col' => 4],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'nombre' => 'Mascota', 'owner_id' => 'Propietario', 'especie' => 'Especie', 'raza' => 'Raza', 'estado' => 'Estado']],
            'vets' => ['title' => 'Veterinarios', 'table' => 'vets', 'has_estado' => true, 'search_columns' => ['nombre', 'especialidad'], 'fields' => [
                'usuario_id' => ['label' => 'Usuario sistema', 'type' => 'select', 'source' => 'users', 'required' => true, 'col' => 3],
                'nombre' => ['label' => 'Nombre', 'required' => true, 'col' => 3],
                'especialidad' => ['label' => 'Especialidad', 'col' => 3],
                'firma' => ['label' => 'Firma', 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'nombre' => 'Nombre', 'especialidad' => 'Especialidad', 'estado' => 'Estado']],
            'appointments' => ['title' => 'Agenda y Citas', 'table' => 'appointments', 'has_estado' => false, 'search_columns' => ['motivo', 'estado'], 'fields' => [
                'inicio' => ['label' => 'Inicio', 'type' => 'datetime-local', 'required' => true, 'col' => 3],
                'fin' => ['label' => 'Fin', 'type' => 'datetime-local', 'required' => true, 'col' => 3],
                'vet_id' => ['label' => 'Veterinario', 'type' => 'select', 'source' => 'vets', 'required' => true, 'col' => 2],
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 2],
                'motivo' => ['label' => 'Motivo', 'required' => true, 'col' => 2],
                'estado' => ['label' => 'Estado cita', 'type' => 'select', 'options' => ['Agendada', 'Confirmada', 'Atendida', 'Cancelada', 'No asistió'], 'col' => 2],
                'notas' => ['label' => 'Notas', 'type' => 'textarea', 'col' => 4],
            ], 'columns' => ['id' => 'ID', 'inicio' => 'Inicio', 'vet_id' => 'Vet', 'pet_id' => 'Mascota', 'motivo' => 'Motivo', 'estado' => 'Estado']],
            'clinical_visits' => ['title' => 'Ficha Clínica', 'table' => 'clinical_visits', 'has_estado' => false, 'search_columns' => ['motivo', 'diagnostico'], 'fields' => [
                'fecha' => ['label' => 'Fecha', 'type' => 'date', 'required' => true, 'col' => 2],
                'appointment_id' => ['label' => 'Cita', 'type' => 'select', 'source' => 'appointments', 'col' => 2],
                'vet_id' => ['label' => 'Veterinario', 'type' => 'select', 'source' => 'vets', 'required' => true, 'col' => 2],
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 2],
                'peso' => ['label' => 'Peso', 'type' => 'number', 'col' => 2],
                'temperatura' => ['label' => 'Temp.', 'type' => 'number', 'col' => 2],
                'motivo' => ['label' => 'Motivo', 'required' => true, 'col' => 3],
                'examen_fisico' => ['label' => 'Examen físico', 'type' => 'textarea', 'col' => 3],
                'diagnostico' => ['label' => 'Diagnóstico', 'required' => true, 'col' => 3],
                'plan_tratamiento' => ['label' => 'Tratamiento', 'required' => true, 'col' => 3],
                'receta_json' => ['label' => 'Receta', 'type' => 'textarea', 'col' => 6],
                'notas' => ['label' => 'Notas', 'type' => 'textarea', 'col' => 6],
            ], 'columns' => ['id' => 'ID', 'fecha' => 'Fecha', 'pet_id' => 'Mascota', 'vet_id' => 'Vet', 'diagnostico' => 'Diagnóstico']],
            'vaccinations' => ['title' => 'Vacunas', 'table' => 'vaccinations', 'has_estado' => false, 'search_columns' => ['tipo_vacuna', 'lote'], 'fields' => [
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 3],
                'tipo_vacuna' => ['label' => 'Tipo vacuna', 'required' => true, 'col' => 3],
                'fecha_aplicada' => ['label' => 'Fecha aplicada', 'type' => 'date', 'required' => true, 'col' => 2],
                'proxima_fecha' => ['label' => 'Próxima fecha', 'type' => 'date', 'col' => 2],
                'lote' => ['label' => 'Lote', 'col' => 2],
                'observacion' => ['label' => 'Observación', 'type' => 'textarea', 'col' => 4],
            ], 'columns' => ['id' => 'ID', 'pet_id' => 'Mascota', 'tipo_vacuna' => 'Vacuna', 'fecha_aplicada' => 'Aplicada', 'proxima_fecha' => 'Próxima']],
            'dewormings' => ['title' => 'Desparasitación', 'table' => 'dewormings', 'has_estado' => false, 'search_columns' => ['tipo', 'producto'], 'fields' => [
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 3],
                'tipo' => ['label' => 'Tipo', 'type' => 'select', 'options' => ['Interna', 'Externa'], 'required' => true, 'col' => 2],
                'producto' => ['label' => 'Producto', 'col' => 3],
                'fecha' => ['label' => 'Fecha', 'type' => 'date', 'required' => true, 'col' => 2],
                'proxima_fecha' => ['label' => 'Próxima fecha', 'type' => 'date', 'col' => 2],
                'observacion' => ['label' => 'Observación', 'type' => 'textarea', 'col' => 4],
            ], 'columns' => ['id' => 'ID', 'pet_id' => 'Mascota', 'tipo' => 'Tipo', 'fecha' => 'Fecha', 'proxima_fecha' => 'Próxima']],
            'products' => ['title' => 'Inventario / Farmacia', 'table' => 'products', 'has_estado' => true, 'search_columns' => ['sku', 'nombre', 'tipo'], 'fields' => [
                'sku' => ['label' => 'SKU', 'col' => 2],
                'nombre' => ['label' => 'Nombre', 'required' => true, 'col' => 3],
                'tipo' => ['label' => 'Tipo', 'type' => 'select', 'options' => ['MEDICAMENTO', 'PRODUCTO', 'SERVICIO'], 'required' => true, 'col' => 2],
                'unidad' => ['label' => 'Unidad', 'col' => 2],
                'precio_compra' => ['label' => 'P. compra', 'type' => 'number', 'col' => 2],
                'precio_venta' => ['label' => 'P. venta', 'type' => 'number', 'required' => true, 'col' => 2],
                'stock_minimo' => ['label' => 'Stock mín.', 'type' => 'number', 'col' => 2],
                'stock_actual' => ['label' => 'Stock actual', 'type' => 'number', 'col' => 2],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'sku' => 'SKU', 'nombre' => 'Nombre', 'tipo' => 'Tipo', 'precio_venta' => 'P. Venta', 'stock_actual' => 'Stock', 'estado' => 'Estado']],
            'invoices' => ['title' => 'Facturación / Caja', 'table' => 'invoices', 'has_estado' => false, 'search_columns' => ['folio', 'metodo_pago', 'estado_pago'], 'fields' => [
                'folio' => ['label' => 'Folio', 'col' => 2],
                'owner_id' => ['label' => 'Propietario', 'type' => 'select', 'source' => 'owners', 'required' => true, 'col' => 3],
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'col' => 3],
                'items_json' => ['label' => 'Ítems', 'type' => 'textarea', 'required' => true, 'col' => 4],
                'descuento' => ['label' => 'Descuento', 'type' => 'number', 'col' => 2],
                'total' => ['label' => 'Total', 'type' => 'number', 'required' => true, 'col' => 2],
                'metodo_pago' => ['label' => 'Método pago', 'type' => 'select', 'options' => ['Efectivo', 'Tarjeta', 'Transferencia'], 'col' => 2],
                'estado_pago' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Pagada', 'Pendiente', 'Anulada'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'folio' => 'Folio', 'owner_id' => 'Cliente', 'total' => 'Total', 'metodo_pago' => 'Pago', 'estado_pago' => 'Estado']],
            'hospitalizations' => ['title' => 'Hospitalización', 'table' => 'hospitalizations', 'has_estado' => false, 'search_columns' => ['motivo', 'estado'], 'fields' => [
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 3],
                'vet_id' => ['label' => 'Veterinario', 'type' => 'select', 'source' => 'vets', 'required' => true, 'col' => 3],
                'fecha_ingreso' => ['label' => 'Ingreso', 'type' => 'datetime-local', 'required' => true, 'col' => 3],
                'motivo' => ['label' => 'Motivo', 'required' => true, 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Activa', 'Alta'], 'col' => 2],
                'observacion' => ['label' => 'Observación', 'type' => 'textarea', 'col' => 4],
            ], 'columns' => ['id' => 'ID', 'pet_id' => 'Mascota', 'vet_id' => 'Vet', 'fecha_ingreso' => 'Ingreso', 'estado' => 'Estado']],
            'surgeries' => ['title' => 'Cirugías', 'table' => 'surgeries', 'has_estado' => false, 'search_columns' => ['estado', 'protocolo'], 'fields' => [
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 3],
                'vet_id' => ['label' => 'Veterinario', 'type' => 'select', 'source' => 'vets', 'required' => true, 'col' => 3],
                'fecha_programada' => ['label' => 'Fecha programada', 'type' => 'datetime-local', 'required' => true, 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Programada', 'Realizada', 'Cancelada'], 'col' => 3],
                'consentimiento' => ['label' => 'Consentimiento', 'col' => 4],
                'protocolo' => ['label' => 'Protocolo', 'type' => 'textarea', 'col' => 4],
                'notas' => ['label' => 'Notas', 'type' => 'textarea', 'col' => 4],
            ], 'columns' => ['id' => 'ID', 'fecha_programada' => 'Fecha', 'pet_id' => 'Mascota', 'vet_id' => 'Vet', 'estado' => 'Estado']],
            'laboratory_orders' => ['title' => 'Laboratorio', 'table' => 'laboratory_orders', 'has_estado' => false, 'search_columns' => ['tipo_examen', 'estado'], 'fields' => [
                'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets', 'required' => true, 'col' => 3],
                'vet_id' => ['label' => 'Veterinario', 'type' => 'select', 'source' => 'vets', 'required' => true, 'col' => 3],
                'fecha' => ['label' => 'Fecha', 'type' => 'date', 'required' => true, 'col' => 2],
                'tipo_examen' => ['label' => 'Tipo examen', 'required' => true, 'col' => 2],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Solicitado', 'Recibido', 'Entregado'], 'col' => 2],
                'resultado_archivo' => ['label' => 'Resultado', 'col' => 3],
                'observacion' => ['label' => 'Observación', 'type' => 'textarea', 'col' => 4],
            ], 'columns' => ['id' => 'ID', 'fecha' => 'Fecha', 'pet_id' => 'Mascota', 'tipo_examen' => 'Examen', 'estado' => 'Estado']],
            'reports' => ['title' => 'Reportes', 'table' => 'report_requests', 'has_estado' => false, 'search_columns' => ['tipo', 'formato'], 'fields' => [
                'tipo' => ['label' => 'Tipo reporte', 'type' => 'select', 'options' => ['Ventas', 'Clínico', 'Vacunas', 'Inventario', 'Cuentas por cobrar'], 'required' => true, 'col' => 3],
                'rango_desde' => ['label' => 'Desde', 'type' => 'date', 'required' => true, 'col' => 2],
                'rango_hasta' => ['label' => 'Hasta', 'type' => 'date', 'required' => true, 'col' => 2],
                'formato' => ['label' => 'Formato', 'type' => 'select', 'options' => ['Pantalla', 'Excel', 'PDF'], 'required' => true, 'col' => 2],
                'notas' => ['label' => 'Notas', 'type' => 'textarea', 'col' => 3],
            ], 'columns' => ['id' => 'ID', 'tipo' => 'Tipo', 'rango_desde' => 'Desde', 'rango_hasta' => 'Hasta', 'formato' => 'Formato']],
            'users' => ['title' => 'Usuarios', 'table' => 'system_users', 'has_estado' => true, 'search_columns' => ['nombre', 'email', 'rol', 'telefono', 'cargo'], 'fields' => [
                'nombre' => ['label' => 'Nombre completo', 'required' => true, 'col' => 3],
                'email' => ['label' => 'Correo', 'type' => 'email', 'required' => true, 'col' => 3],
                'telefono' => ['label' => 'Teléfono', 'col' => 2],
                'rut' => ['label' => 'RUT / Documento', 'col' => 2],
                'cargo' => ['label' => 'Cargo', 'col' => 2],
                'especialidad' => ['label' => 'Especialidad', 'col' => 3],
                'direccion' => ['label' => 'Dirección', 'type' => 'textarea', 'col' => 4],
                'fecha_ingreso' => ['label' => 'Fecha ingreso', 'type' => 'date', 'col' => 2],
                'password' => ['label' => 'Contraseña (solo si deseas cambiar)', 'type' => 'password', 'col' => 3],
                'rol' => ['label' => 'Rol', 'type' => 'select', 'options' => ['SuperRoot', 'Administrador', 'Veterinario', 'Recepción'], 'required' => true, 'col' => 2],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'nombre' => 'Nombre', 'email' => 'Correo', 'telefono' => 'Teléfono', 'cargo' => 'Cargo', 'rol' => 'Rol', 'estado' => 'Estado']],
            'roles' => ['title' => 'Roles', 'table' => 'system_roles', 'has_estado' => true, 'search_columns' => ['nombre', 'descripcion'], 'fields' => [
                'nombre' => ['label' => 'Nombre del rol', 'required' => true, 'col' => 4],
                'descripcion' => ['label' => 'Descripción', 'type' => 'textarea', 'col' => 6],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'nombre' => 'Rol', 'descripcion' => 'Descripción', 'estado' => 'Estado']],
            'permissions' => ['title' => 'Permisos por usuario', 'table' => 'user_permissions', 'has_estado' => true, 'search_columns' => ['module_key'], 'fields' => [
                'user_id' => ['label' => 'Usuario', 'type' => 'select', 'source' => 'users', 'required' => true, 'col' => 3],
                'module_key' => ['label' => 'Módulo', 'type' => 'select', 'required' => true, 'options' => ['users', 'roles', 'permissions', 'clinic_profile', 'owners', 'pets', 'vets', 'appointments', 'clinical_visits', 'vaccinations', 'dewormings', 'products', 'invoices', 'report_requests', 'settings', 'service_rates', 'suppliers_purchases', 'receivables', 'documents_consents', 'communications', 'client_portal', 'master_catalogs'], 'col' => 3],
                'can_view' => ['label' => 'Puede ver', 'type' => 'select', 'options' => ['1', '0'], 'required' => true, 'col' => 2],
                'can_edit' => ['label' => 'Puede editar', 'type' => 'select', 'options' => ['1', '0'], 'required' => true, 'col' => 2],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'user_id' => 'Usuario', 'module_key' => 'Módulo', 'can_view' => 'Ver', 'can_edit' => 'Editar', 'estado' => 'Estado']],
            'clinic_profile' => ['title' => 'Configuración de Clínica', 'table' => 'clinic_profile', 'has_estado' => true, 'search_columns' => ['nombre_clinica', 'email', 'telefono'], 'fields' => [
                'nombre_clinica' => ['label' => 'Nombre clínica', 'required' => true, 'col' => 3],
                'razon_social' => ['label' => 'Razón social', 'col' => 3],
                'telefono' => ['label' => 'Teléfono', 'col' => 2],
                'email' => ['label' => 'Email', 'type' => 'email', 'col' => 2],
                'direccion' => ['label' => 'Dirección', 'type' => 'textarea', 'col' => 4],
                'logo_path' => ['label' => 'Logo actual', 'readonly' => true, 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'nombre_clinica' => 'Clínica', 'telefono' => 'Teléfono', 'email' => 'Email', 'logo_path' => 'Logo', 'estado' => 'Estado']],
            'rbac_access' => ['title' => 'RBAC y Accesos', 'table' => 'access_requests', 'has_estado' => true, 'search_columns' => ['usuario', 'rol', 'permiso'], 'fields' => [
                'usuario' => ['label' => 'Usuario', 'required' => true, 'col' => 3],
                'rol' => ['label' => 'Rol', 'required' => true, 'col' => 3],
                'permiso' => ['label' => 'Permiso', 'required' => true, 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 3],
                'observacion' => ['label' => 'Observación', 'type' => 'textarea', 'col' => 6],
            ], 'columns' => ['id' => 'ID', 'usuario' => 'Usuario', 'rol' => 'Rol', 'permiso' => 'Permiso', 'estado' => 'Estado']],
            'settings' => ['title' => 'Parametrización', 'table' => 'settings', 'has_estado' => true, 'search_columns' => ['clave', 'valor', 'categoria'], 'fields' => [
                'clave' => ['label' => 'Clave', 'required' => true, 'col' => 3],
                'valor' => ['label' => 'Valor', 'required' => true, 'col' => 3],
                'categoria' => ['label' => 'Categoría', 'col' => 3],
                'detalle' => ['label' => 'Detalle', 'type' => 'textarea', 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'clave' => 'Clave', 'valor' => 'Valor', 'categoria' => 'Categoría', 'estado' => 'Estado']],
            'master_catalogs' => ['title' => 'Catálogos Maestros', 'table' => 'master_catalogs', 'has_estado' => true, 'search_columns' => ['tipo', 'nombre'], 'fields' => [
                'tipo' => ['label' => 'Tipo', 'type' => 'select', 'options' => ['Especie', 'Raza', 'Vacuna', 'Desparasitación', 'Servicio', 'Diagnóstico'], 'required' => true, 'col' => 3],
                'nombre' => ['label' => 'Nombre', 'required' => true, 'col' => 3],
                'descripcion' => ['label' => 'Descripción', 'col' => 4],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'tipo' => 'Tipo', 'nombre' => 'Nombre', 'descripcion' => 'Descripción', 'estado' => 'Estado']],
            'service_rates' => ['title' => 'Servicios y Tarifario', 'table' => 'service_rates', 'has_estado' => true, 'search_columns' => ['codigo', 'servicio'], 'fields' => [
                'codigo' => ['label' => 'Código', 'col' => 2],
                'servicio' => ['label' => 'Servicio', 'required' => true, 'col' => 3],
                'precio' => ['label' => 'Precio', 'type' => 'number', 'required' => true, 'col' => 2],
                'descuento' => ['label' => 'Descuento', 'type' => 'number', 'col' => 2],
                'convenio' => ['label' => 'Convenio', 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'codigo' => 'Código', 'servicio' => 'Servicio', 'precio' => 'Precio', 'descuento' => 'Desc.', 'estado' => 'Estado']],
            'suppliers_purchases' => ['title' => 'Proveedores y Compras', 'table' => 'suppliers_purchases', 'has_estado' => true, 'search_columns' => ['proveedor', 'nro_documento'], 'fields' => [
                'proveedor' => ['label' => 'Proveedor', 'required' => true, 'col' => 3],
                'nro_documento' => ['label' => 'Nro documento', 'required' => true, 'col' => 2],
                'fecha' => ['label' => 'Fecha', 'type' => 'date', 'required' => true, 'col' => 2],
                'total' => ['label' => 'Total', 'type' => 'number', 'required' => true, 'col' => 2],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
                'observacion' => ['label' => 'Observación', 'type' => 'textarea', 'col' => 3],
            ], 'columns' => ['id' => 'ID', 'proveedor' => 'Proveedor', 'nro_documento' => 'Documento', 'fecha' => 'Fecha', 'total' => 'Total', 'estado' => 'Estado']],
            'receivables' => ['title' => 'Morosos / Cuentas por Cobrar', 'table' => 'receivables', 'has_estado' => true, 'search_columns' => ['cliente', 'documento'], 'fields' => [
                'cliente' => ['label' => 'Cliente', 'required' => true, 'col' => 3],
                'documento' => ['label' => 'Documento', 'required' => true, 'col' => 2],
                'monto' => ['label' => 'Monto', 'type' => 'number', 'required' => true, 'col' => 2],
                'vencimiento' => ['label' => 'Vencimiento', 'type' => 'date', 'required' => true, 'col' => 2],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
                'recordatorio' => ['label' => 'Recordatorio', 'type' => 'textarea', 'col' => 3],
            ], 'columns' => ['id' => 'ID', 'cliente' => 'Cliente', 'documento' => 'Documento', 'monto' => 'Monto', 'vencimiento' => 'Vence', 'estado' => 'Estado']],
            'audit_trail' => ['title' => 'Auditoría / Bitácora', 'table' => 'audit_trail', 'has_estado' => false, 'search_columns' => ['usuario', 'accion', 'modulo'], 'fields' => [
                'usuario' => ['label' => 'Usuario', 'required' => true, 'col' => 3],
                'modulo' => ['label' => 'Módulo', 'required' => true, 'col' => 3],
                'accion' => ['label' => 'Acción', 'required' => true, 'col' => 3],
                'detalle' => ['label' => 'Detalle', 'type' => 'textarea', 'col' => 3],
            ], 'columns' => ['id' => 'ID', 'usuario' => 'Usuario', 'modulo' => 'Módulo', 'accion' => 'Acción', 'created_at' => 'Fecha']],
            'documents_consents' => ['title' => 'Documentos / Consentimientos', 'table' => 'documents_consents', 'has_estado' => true, 'search_columns' => ['tipo', 'titulo'], 'fields' => [
                'tipo' => ['label' => 'Tipo', 'type' => 'select', 'options' => ['Consentimiento', 'Certificado', 'Plantilla'], 'required' => true, 'col' => 3],
                'titulo' => ['label' => 'Título', 'required' => true, 'col' => 3],
                'archivo' => ['label' => 'Archivo/Firma', 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 3],
                'detalle' => ['label' => 'Detalle', 'type' => 'textarea', 'col' => 6],
            ], 'columns' => ['id' => 'ID', 'tipo' => 'Tipo', 'titulo' => 'Título', 'archivo' => 'Archivo', 'estado' => 'Estado']],
            'communications' => ['title' => 'Comunicaciones / Recordatorios', 'table' => 'communications', 'has_estado' => true, 'search_columns' => ['canal', 'destino', 'asunto'], 'fields' => [
                'canal' => ['label' => 'Canal', 'type' => 'select', 'options' => ['WhatsApp', 'Email', 'SMS'], 'required' => true, 'col' => 2],
                'destino' => ['label' => 'Destino', 'required' => true, 'col' => 3],
                'asunto' => ['label' => 'Asunto', 'required' => true, 'col' => 3],
                'mensaje' => ['label' => 'Mensaje', 'type' => 'textarea', 'required' => true, 'col' => 4],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 2],
            ], 'columns' => ['id' => 'ID', 'canal' => 'Canal', 'destino' => 'Destino', 'asunto' => 'Asunto', 'estado' => 'Estado']],
            'client_portal' => ['title' => 'Portal Cliente / Reserva Online', 'table' => 'client_portal', 'has_estado' => true, 'search_columns' => ['cliente', 'email', 'tipo'], 'fields' => [
                'cliente' => ['label' => 'Cliente', 'required' => true, 'col' => 3],
                'email' => ['label' => 'Email', 'required' => true, 'type' => 'email', 'col' => 3],
                'tipo' => ['label' => 'Tipo', 'type' => 'select', 'options' => ['Reserva', 'Historial', 'Descarga', 'Pago online'], 'required' => true, 'col' => 3],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO'], 'col' => 3],
                'detalle' => ['label' => 'Detalle', 'type' => 'textarea', 'col' => 6],
            ], 'columns' => ['id' => 'ID', 'cliente' => 'Cliente', 'email' => 'Email', 'tipo' => 'Tipo', 'estado' => 'Estado']],
        ];
    }
}
