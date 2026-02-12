<?php
$authUser = class_exists('Auth') ? Auth::user() : ['nombre' => 'SuperRoot Demo'];
$clinicName = $_SESSION['clinic_profile']['nombre_clinica'] ?? 'Clínica Veterinaria';
$clinicEmail = $_SESSION['clinic_profile']['email'] ?? 'superroot@veterinaria.local';
$clinicLogo = $_SESSION['clinic_profile']['logo_path'] ?? 'assets/images/Untitled-1.jpg';
$canViewModule = static function (string $module): bool {
    return !class_exists('Auth') || Auth::canViewModule($module);
};
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
            <li class="nav-label first">Menú</li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">1. Administración</span>
                </a>
                <ul aria-expanded="false">
                    <?php if ($canViewModule('users')): ?><li><a href="index.php?controller=module&action=index&module=users">Usuarios</a></li><?php endif; ?>
                    <?php if ($canViewModule('roles')): ?><li><a href="index.php?controller=module&action=index&module=roles">Roles</a></li><?php endif; ?>
                    <?php if ($canViewModule('permissions')): ?><li><a href="index.php?controller=module&action=index&module=permissions">Permisos</a></li><?php endif; ?>
                    <?php if ($canViewModule('clinic_profile')): ?><li><a href="index.php?controller=module&action=index&module=clinic_profile">Datos Clínica y Logo</a></li><?php endif; ?>
                    <?php if ($canViewModule('master_catalogs')): ?><li><a href="index.php?controller=module&action=index&module=master_catalogs">Catálogos Maestros</a></li><?php endif; ?>
                    <?php if ($canViewModule('service_rates')): ?><li><a href="index.php?controller=module&action=index&module=service_rates">Servicios y Tarifario</a></li><?php endif; ?>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="true">
                    <i class="flaticon-381-user"></i>
                    <span class="nav-text">2. Ficha del Cliente</span>
                </a>
                <ul aria-expanded="true">
                    <li><a href="index.php?controller=owners&action=index">Propietarios</a></li>
                    <?php if ($canViewModule('pets')): ?><li><a href="index.php?controller=module&action=index&module=pets">Mascotas</a></li><?php endif; ?>
                    <?php if ($canViewModule('vets')): ?><li><a href="index.php?controller=module&action=index&module=vets">Veterinarios</a></li><?php endif; ?>
                    <?php if ($canViewModule('documents_consents')): ?><li><a href="index.php?controller=module&action=index&module=documents_consents">Documentos y Consentimientos</a></li><?php endif; ?>
                    <?php if ($canViewModule('client_portal')): ?><li><a href="index.php?controller=module&action=index&module=client_portal">Portal del Cliente</a></li><?php endif; ?>
                </ul>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>Veterinaria MVC</strong> © 2026</p>
        </div>
    </div>
</div>
