<?php
$currentController = strtolower($_GET['controller'] ?? '');
$currentAction = strtolower($_GET['action'] ?? '');
$isConfiguracion = $currentController === 'configuracion';

$configuracionLinks = [
    'usuarios' => 'Usuarios',
    'roles' => 'Roles',
    'permisos' => 'Permisos',
];
?>

<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="assets/images/Untitled-1.jpg" alt="Panel de administración">
            </div>
            <h5 class="name"><span class="font-w400">Panel</span> Configuración</h5>
            <p class="email">superroot@veterinaria.local</p>
        </div>

        <div class="menu-summary">
            <h6>Accesos rápidos</h6>
            <p>Centraliza usuarios, roles y permisos desde un menú más claro y fácil de navegar.</p>
        </div>

        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menú</li>
            <li class="<?= $isConfiguracion ? 'mm-active' : '' ?>">
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="<?= $isConfiguracion ? 'true' : 'false' ?>">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Configuración <span class="menu-pill">3 módulos</span></span>
                </a>
                <ul aria-expanded="<?= $isConfiguracion ? 'true' : 'false' ?>" class="<?= $isConfiguracion ? 'mm-show' : '' ?>">
                    <?php foreach ($configuracionLinks as $action => $label): ?>
                        <?php $isActive = $isConfiguracion && $currentAction === $action; ?>
                        <li class="<?= $isActive ? 'mm-active' : '' ?>">
                            <a href="index.php?controller=configuracion&action=<?= urlencode($action) ?>" <?= $isActive ? 'aria-current="page"' : '' ?>>
                                <?= htmlspecialchars($label) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>Veterinaria MVC</strong> © 2026</p>
        </div>
    </div>
</div>
