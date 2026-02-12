<?php
$authUser = class_exists('Auth') ? Auth::user() : ['nombre' => 'SuperRoot Demo'];
$clinicName = $_SESSION['clinic_profile']['nombre_clinica'] ?? 'Clínica Veterinaria';
$clinicEmail = $_SESSION['clinic_profile']['email'] ?? 'superroot@veterinaria.local';
$clinicLogo = $_SESSION['clinic_profile']['logo_path'] ?? 'assets/images/Untitled-1.jpg';
$canViewModule = static function (string $module): bool {
    return !class_exists('Auth') || Auth::canViewModule($module);
};

$menuGroups = [
    [
        'label' => 'Dashboard',
        'icon' => 'flaticon-381-networking',
        'items' => [
            ['label' => 'Inicio', 'href' => 'index.php'],
        ],
    ],
    [
        'label' => 'Administración',
        'icon' => 'flaticon-381-settings-2',
        'items' => [
            ['label' => 'Usuarios', 'module' => 'users'],
            ['label' => 'Roles', 'module' => 'roles'],
            ['label' => 'Permisos', 'module' => 'permissions'],
            ['label' => 'Datos Clínica y Logo', 'module' => 'clinic_profile'],
        ],
    ],
    [
        'label' => 'Personas y Perfiles',
        'icon' => 'flaticon-381-user',
        'items' => [
            ['label' => 'Gestión de Clientes', 'href' => 'index.php?controller=owners&action=index'],
            ['label' => 'Dueños - Mascotas', 'module' => 'owner_pet_relationship'],
            ['label' => 'Mascotas', 'module' => 'pets'],
            ['label' => 'Gestión de Médicos', 'module' => 'vets'],
            ['label' => 'Perfil de Gerente', 'module' => 'manager_profile'],
            ['label' => 'Perfil de Médico', 'module' => 'doctor_profile'],
            ['label' => 'Perfil de Técnico', 'module' => 'technician_profile'],
            ['label' => 'Perfil de Recepción', 'module' => 'reception_profile'],
        ],
    ],
    [
        'label' => 'Operaciones Clínicas',
        'icon' => 'flaticon-381-calendar',
        'items' => [
            ['label' => 'Agenda Clínica', 'module' => 'appointments'],
            ['label' => 'Ficha Clínica', 'module' => 'clinical_visits'],
            ['label' => 'Recetas Electrónicas', 'module' => 'electronic_prescriptions'],
            ['label' => 'Asistente IA', 'module' => 'ai_assistant'],
            ['label' => 'Vacunación', 'module' => 'vaccinations'],
            ['label' => 'Desparasitación', 'module' => 'dewormings'],
            ['label' => 'Gestión de Hospitalizados', 'module' => 'hospitalizations'],
            ['label' => 'Gestión de Jaulas', 'module' => 'cage_management'],
            ['label' => 'Tratamientos hospitalizado', 'module' => 'hospitalized_treatments'],
            ['label' => 'Altas de Hospitalizado', 'module' => 'hospital_discharge'],
            ['label' => 'Cirugías', 'module' => 'surgeries'],
            ['label' => 'Órdenes de Laboratorio', 'module' => 'laboratory_orders'],
            ['label' => 'Gestión de Examenes', 'module' => 'exams_management'],
            ['label' => 'Conexión con PACS DX/US/CT/MR/MG', 'module' => 'pacs_connections'],
        ],
    ],
    [
        'label' => 'Finanzas, Ventas y DTE',
        'icon' => 'flaticon-381-notebook',
        'items' => [
            ['label' => 'Gestión de Productos', 'module' => 'products'],
            ['label' => 'Toma de inventario', 'module' => 'inventory_count'],
            ['label' => 'Ventas Farmacia', 'module' => 'pharmacy_sales'],
            ['label' => 'Cobros Ambulatoria', 'module' => 'ambulatory_charges'],
            ['label' => 'Cobros Hospitalizado', 'module' => 'hospital_charges'],
            ['label' => 'Gestión de cajas', 'module' => 'cash_management'],
            ['label' => 'Facturación', 'module' => 'invoices'],
            ['label' => 'Gestión de DTE', 'module' => 'dte_management'],
            ['label' => 'Libro DTE', 'module' => 'dte_book'],
            ['label' => 'Boleta Interna', 'module' => 'internal_receipts'],
            ['label' => 'Cuentas corrientes', 'module' => 'current_accounts'],
            ['label' => 'Gestion de Abonos', 'module' => 'payments_installments'],
            ['label' => 'Gestión Medios de Pago', 'module' => 'payment_methods'],
            ['label' => 'Gestión de Prestaciones', 'module' => 'benefits_management'],
            ['label' => 'Servicios y Tarifario', 'module' => 'service_rates'],
            ['label' => 'Proveedores y Compras', 'module' => 'suppliers_purchases'],
            ['label' => 'Cuentas por Cobrar', 'module' => 'receivables'],
            ['label' => 'Gestión de Pagos Médicos', 'module' => 'medical_payments'],
        ],
    ],
    [
        'label' => 'Comunicación, RRHH y Control',
        'icon' => 'flaticon-381-file',
        'items' => [
            ['label' => 'Recordatorios Whatsapps / Email', 'module' => 'whatsapp_email_reminders'],
            ['label' => 'Campañas de Marketing Whatsapps / Email', 'module' => 'marketing_campaigns'],
            ['label' => 'Catálogos Maestros', 'module' => 'master_catalogs'],
            ['label' => 'Documentos Prestablecidos', 'module' => 'preset_documents'],
            ['label' => 'Documentos y Consentimientos', 'module' => 'documents_consents'],
            ['label' => 'Comunicaciones', 'module' => 'communications'],
            ['label' => 'Portal del Cliente', 'module' => 'client_portal'],
            ['label' => 'Módulo de Asistencia', 'module' => 'attendance_module'],
            ['label' => 'Solicitudes de Reportes', 'module' => 'reports'],
            ['label' => 'Auditoría', 'module' => 'audit_trail'],
        ],
    ],
];
?>
<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="<?php echo htmlspecialchars((string) $clinicLogo, ENT_QUOTES, 'UTF-8'); ?>" alt="logo clínica">
            </div>
            <h5 class="name"><span class="font-w400">Panel</span> <?php echo htmlspecialchars((string) $clinicName, ENT_QUOTES, 'UTF-8'); ?></h5>
            <p class="email"><?php echo htmlspecialchars((string) ($authUser['nombre'] ?? $clinicEmail), ENT_QUOTES, 'UTF-8'); ?></p>
        </div>

        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menú principal</li>
            <?php foreach ($menuGroups as $group): ?>
                <?php
                $visibleItems = [];
                foreach ($group['items'] as $item) {
                    if (isset($item['module']) && !$canViewModule($item['module'])) {
                        continue;
                    }
                    $visibleItems[] = $item;
                }

                if (!$visibleItems) {
                    continue;
                }
                ?>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                        <i class="<?php echo htmlspecialchars((string) $group['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                        <span class="nav-text"><?php echo htmlspecialchars((string) $group['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </a>
                    <ul aria-expanded="false">
                        <?php foreach ($visibleItems as $item): ?>
                            <?php
                            $href = $item['href'] ?? ('index.php?controller=module&action=index&module=' . $item['module']);
                            ?>
                            <li><a href="<?php echo htmlspecialchars((string) $href, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars((string) $item['label'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="copyright">
            <p><strong>Veterinaria MVC</strong> © 2026</p>
        </div>
    </div>
</div>
