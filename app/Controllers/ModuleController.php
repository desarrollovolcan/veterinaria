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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            $savedId = $this->repo->save($config['table'], $payload, $id ?: null);
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
            'users' => $this->repo->options('usuarios', 'nombre'),
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
        ]);

        unset($_SESSION['_form_errors'], $_SESSION['_old']);
    }

    private function modules(): array
    {
        return [
            'pets' => ['title' => 'Mascotas', 'table' => 'pets', 'has_estado' => true, 'search_columns' => ['nombre', 'microchip', 'color'], 'fields' => [
                'owner_id' => ['label' => 'Propietario *', 'type' => 'select', 'source' => 'owners', 'required' => true],
                'nombre' => ['label' => 'Nombre mascota *', 'required' => true],
                'especie' => ['label' => 'Especie *', 'type' => 'select', 'options' => ['Canino', 'Felino', 'Otro'], 'required' => true],
                'raza' => ['label' => 'Raza'], 'sexo' => ['label' => 'Sexo *', 'type' => 'select', 'options' => ['M', 'H'], 'required' => true],
                'fecha_nacimiento' => ['label' => 'Fecha nacimiento', 'type' => 'date'], 'microchip' => ['label' => 'Microchip'],
                'esterilizado' => ['label' => 'Esterilizado', 'type' => 'select', 'options' => ['SI', 'NO']], 'color' => ['label' => 'Color'],
                'peso' => ['label' => 'Peso'], 'notas' => ['label' => 'Notas', 'type' => 'textarea'], 'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO']]],
                'columns' => ['id' => 'ID', 'nombre' => 'Mascota', 'owner_id' => 'Propietario', 'especie' => 'Especie', 'raza' => 'Raza', 'sexo' => 'Sexo', 'estado' => 'Estado']],
            'vets' => ['title' => 'Veterinarios', 'table' => 'vets', 'has_estado' => true, 'search_columns' => ['nombre', 'especialidad'], 'fields' => [
                'usuario_id' => ['label' => 'Usuario del sistema *', 'type' => 'select', 'source' => 'users', 'required' => true],
                'nombre' => ['label' => 'Nombre *', 'required' => true], 'especialidad' => ['label' => 'Especialidad'], 'firma' => ['label' => 'Firma'], 'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO']]],
                'columns' => ['id' => 'ID', 'nombre' => 'Nombre', 'especialidad' => 'Especialidad', 'estado' => 'Estado']],
            'appointments' => ['title' => 'Agenda y Citas', 'table' => 'appointments', 'has_estado' => false, 'search_columns' => ['motivo', 'estado'], 'fields' => [
                'inicio' => ['label' => 'Fecha/Hora inicio *', 'type' => 'datetime-local', 'required' => true], 'fin' => ['label' => 'Fecha/Hora fin *', 'type' => 'datetime-local', 'required' => true],
                'vet_id' => ['label' => 'Veterinario *', 'type' => 'select', 'source' => 'vets', 'required' => true], 'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true],
                'motivo' => ['label' => 'Motivo *', 'required' => true], 'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Agendada', 'Confirmada', 'Atendida', 'Cancelada', 'No asistió']], 'notas' => ['label' => 'Notas', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'inicio' => 'Inicio', 'vet_id' => 'Veterinario', 'pet_id' => 'Mascota', 'estado' => 'Estado']],
            'clinical_visits' => ['title' => 'Ficha Clínica', 'table' => 'clinical_visits', 'has_estado' => false, 'search_columns' => ['motivo', 'diagnostico'], 'fields' => [
                'fecha' => ['label' => 'Fecha *', 'type' => 'date', 'required' => true], 'appointment_id' => ['label' => 'Cita relacionada', 'type' => 'number'],
                'vet_id' => ['label' => 'Veterinario *', 'type' => 'select', 'source' => 'vets', 'required' => true], 'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true],
                'peso' => ['label' => 'Peso (kg)'], 'temperatura' => ['label' => 'Temperatura'], 'motivo' => ['label' => 'Motivo *', 'required' => true],
                'examen_fisico' => ['label' => 'Examen físico', 'type' => 'textarea'], 'diagnostico' => ['label' => 'Diagnóstico *', 'required' => true],
                'plan_tratamiento' => ['label' => 'Plan/Tratamiento *', 'type' => 'textarea', 'required' => true], 'receta_json' => ['label' => 'Receta (ítems: medicamento, dosis, frecuencia, duración, vía, observación)', 'type' => 'textarea'], 'notas' => ['label' => 'Notas', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'fecha' => 'Fecha', 'pet_id' => 'Mascota', 'vet_id' => 'Veterinario', 'diagnostico' => 'Diagnóstico']],
            'vaccinations' => ['title' => 'Vacunas', 'table' => 'vaccinations', 'has_estado' => false, 'search_columns' => ['tipo_vacuna', 'lote'], 'fields' => [
                'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true], 'tipo_vacuna' => ['label' => 'Tipo vacuna *', 'required' => true],
                'fecha_aplicada' => ['label' => 'Fecha aplicada *', 'type' => 'date', 'required' => true], 'proxima_fecha' => ['label' => 'Próxima fecha', 'type' => 'date'],
                'lote' => ['label' => 'Lote'], 'observacion' => ['label' => 'Observación', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'pet_id' => 'Mascota', 'tipo_vacuna' => 'Tipo', 'fecha_aplicada' => 'Fecha', 'proxima_fecha' => 'Próxima']],
            'dewormings' => ['title' => 'Desparasitación', 'table' => 'dewormings', 'has_estado' => false, 'search_columns' => ['tipo', 'producto'], 'fields' => [
                'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true], 'tipo' => ['label' => 'Tipo *', 'type' => 'select', 'options' => ['interna', 'externa'], 'required' => true],
                'producto' => ['label' => 'Producto'], 'fecha' => ['label' => 'Fecha *', 'type' => 'date', 'required' => true], 'proxima_fecha' => ['label' => 'Próxima fecha', 'type' => 'date'], 'observacion' => ['label' => 'Observación', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'pet_id' => 'Mascota', 'tipo' => 'Tipo', 'fecha' => 'Fecha', 'proxima_fecha' => 'Próxima', 'producto' => 'Producto']],
            'products' => ['title' => 'Productos e Inventario', 'table' => 'products', 'has_estado' => true, 'search_columns' => ['sku', 'nombre', 'tipo'], 'fields' => [
                'sku' => ['label' => 'SKU'], 'nombre' => ['label' => 'Nombre *', 'required' => true], 'tipo' => ['label' => 'Tipo *', 'type' => 'select', 'options' => ['MEDICAMENTO', 'PRODUCTO', 'SERVICIO'], 'required' => true],
                'unidad' => ['label' => 'Unidad'], 'precio_compra' => ['label' => 'Precio compra'], 'precio_venta' => ['label' => 'Precio venta *', 'required' => true],
                'stock_minimo' => ['label' => 'Stock mínimo'], 'stock_actual' => ['label' => 'Stock actual'], 'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['ACTIVO', 'INACTIVO']]],
                'columns' => ['id' => 'ID', 'sku' => 'SKU', 'nombre' => 'Nombre', 'tipo' => 'Tipo', 'precio_venta' => 'Precio venta', 'stock_actual' => 'Stock', 'estado' => 'Estado']],
            'invoices' => ['title' => 'Facturación y Caja', 'table' => 'invoices', 'has_estado' => false, 'search_columns' => ['folio', 'estado_pago'], 'fields' => [
                'folio' => ['label' => 'Folio'], 'owner_id' => ['label' => 'Propietario *', 'type' => 'select', 'source' => 'owners', 'required' => true], 'pet_id' => ['label' => 'Mascota', 'type' => 'select', 'source' => 'pets'],
                'items_json' => ['label' => 'Ítems (JSON)', 'type' => 'textarea', 'required' => true], 'descuento' => ['label' => 'Descuento'], 'total' => ['label' => 'Total calculado *', 'required' => true],
                'metodo_pago' => ['label' => 'Método de pago', 'type' => 'select', 'options' => ['efectivo', 'tarjeta', 'transferencia']], 'estado_pago' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Pagada', 'Pendiente']]],
                'columns' => ['id' => 'ID', 'folio' => 'Folio', 'fecha' => 'Fecha', 'owner_id' => 'Cliente', 'total' => 'Total', 'estado_pago' => 'Estado']],
            'hospitalizations' => ['title' => 'Hospitalización', 'table' => 'hospitalizations', 'has_estado' => false, 'search_columns' => ['motivo', 'estado'], 'fields' => [
                'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true], 'vet_id' => ['label' => 'Veterinario *', 'type' => 'select', 'source' => 'vets', 'required' => true],
                'fecha_ingreso' => ['label' => 'Fecha ingreso *', 'type' => 'datetime-local', 'required' => true], 'motivo' => ['label' => 'Motivo *', 'required' => true],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Activa', 'Alta']], 'observacion' => ['label' => 'Observación', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'pet_id' => 'Mascota', 'fecha_ingreso' => 'Ingreso', 'vet_id' => 'Vet', 'estado' => 'Estado']],
            'surgeries' => ['title' => 'Cirugías', 'table' => 'surgeries', 'has_estado' => false, 'search_columns' => ['estado', 'protocolo'], 'fields' => [
                'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true], 'vet_id' => ['label' => 'Veterinario *', 'type' => 'select', 'source' => 'vets', 'required' => true],
                'fecha_programada' => ['label' => 'Fecha programada *', 'type' => 'datetime-local', 'required' => true], 'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Programada', 'Realizada', 'Cancelada']],
                'consentimiento' => ['label' => 'Consentimiento (ruta archivo)'], 'protocolo' => ['label' => 'Protocolo', 'type' => 'textarea'], 'notas' => ['label' => 'Notas', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'fecha_programada' => 'Fecha', 'pet_id' => 'Mascota', 'vet_id' => 'Vet', 'estado' => 'Estado']],
            'laboratory_orders' => ['title' => 'Laboratorio', 'table' => 'laboratory_orders', 'has_estado' => false, 'search_columns' => ['tipo_examen', 'estado'], 'fields' => [
                'pet_id' => ['label' => 'Mascota *', 'type' => 'select', 'source' => 'pets', 'required' => true], 'vet_id' => ['label' => 'Veterinario *', 'type' => 'select', 'source' => 'vets', 'required' => true],
                'fecha' => ['label' => 'Fecha *', 'type' => 'date', 'required' => true], 'tipo_examen' => ['label' => 'Tipo examen *', 'required' => true],
                'estado' => ['label' => 'Estado', 'type' => 'select', 'options' => ['Solicitado', 'Recibido', 'Entregado']], 'observacion' => ['label' => 'Observación', 'type' => 'textarea'], 'resultado_archivo' => ['label' => 'Resultado/archivo']],
                'columns' => ['id' => 'ID', 'fecha' => 'Fecha', 'pet_id' => 'Mascota', 'tipo_examen' => 'Tipo', 'estado' => 'Estado']],
            'reports' => ['title' => 'Reportes', 'table' => 'report_requests', 'has_estado' => false, 'search_columns' => ['tipo', 'rango_desde', 'rango_hasta'], 'fields' => [
                'tipo' => ['label' => 'Tipo reporte *', 'type' => 'select', 'options' => ['Ventas', 'Inventario', 'Citas', 'Vacunas', 'Clínico'], 'required' => true],
                'rango_desde' => ['label' => 'Desde *', 'type' => 'date', 'required' => true], 'rango_hasta' => ['label' => 'Hasta *', 'type' => 'date', 'required' => true],
                'formato' => ['label' => 'Formato', 'type' => 'select', 'options' => ['Pantalla', 'PDF', 'Excel']], 'notas' => ['label' => 'Notas', 'type' => 'textarea']],
                'columns' => ['id' => 'ID', 'tipo' => 'Tipo', 'rango_desde' => 'Desde', 'rango_hasta' => 'Hasta', 'formato' => 'Formato', 'created_at' => 'Solicitado']],
        ];
    }
}
