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
        'label' => 'Pacientes y Clientes',
        'icon' => 'flaticon-381-user',
        'items' => [
            ['label' => 'Propietarios', 'href' => 'index.php?controller=owners&action=index'],
            ['label' => 'Mascotas', 'module' => 'pets'],
            ['label' => 'Veterinarios', 'module' => 'vets'],
        ],
    ],
    [
        'label' => 'Operaciones Clínicas',
        'icon' => 'flaticon-381-calendar',
        'items' => [
            ['label' => 'Citas', 'module' => 'appointments'],
            ['label' => 'Consultas Clínicas', 'module' => 'clinical_visits'],
            ['label' => 'Asistente IA', 'module' => 'ai_assistant'],
            ['label' => 'Vacunación', 'module' => 'vaccinations'],
            ['label' => 'Desparasitación', 'module' => 'dewormings'],
            ['label' => 'Hospitalización', 'module' => 'hospitalizations'],
            ['label' => 'Cirugías', 'module' => 'surgeries'],
            ['label' => 'Órdenes de Laboratorio', 'module' => 'laboratory_orders'],
        ],
    ],
    [
        'label' => 'Comercial y Caja',
        'icon' => 'flaticon-381-notebook',
        'items' => [
            ['label' => 'Productos e Inventario', 'module' => 'products'],
            ['label' => 'Facturación', 'module' => 'invoices'],
            ['label' => 'Servicios y Tarifario', 'module' => 'service_rates'],
            ['label' => 'Proveedores y Compras', 'module' => 'suppliers_purchases'],
            ['label' => 'Cuentas por Cobrar', 'module' => 'receivables'],
        ],
    ],
    [
        'label' => 'Configuración y Reportes',
        'icon' => 'flaticon-381-file',
        'items' => [
            ['label' => 'Catálogos Maestros', 'module' => 'master_catalogs'],
            ['label' => 'Documentos y Consentimientos', 'module' => 'documents_consents'],
            ['label' => 'Comunicaciones', 'module' => 'communications'],
            ['label' => 'Portal del Cliente', 'module' => 'client_portal'],
            ['label' => 'Solicitudes de Reportes', 'module' => 'report_requests'],
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
