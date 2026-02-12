<?php
$currentController = strtolower($_GET['controller'] ?? '');
$currentAction = strtolower($_GET['action'] ?? '');
$isConfiguracion = $currentController === 'configuracion';

$configuracionLinks = [
    'usuarios' => [
        'label' => 'Usuarios',
        'icon' => '👤',
        'description' => 'Gestión de cuentas y acceso',
    ],
    'roles' => [
        'label' => 'Roles',
        'icon' => '🛡️',
        'description' => 'Perfiles con permisos agrupados',
    ],
    'permisos' => [
        'label' => 'Permisos',
        'icon' => '🔐',
        'description' => 'Control granular de acciones',
    ],
];
?>

<style>
    .menu-summary {
        margin: 0 1.25rem 1rem;
        padding: .9rem 1rem;
        border-radius: .75rem;
        background: linear-gradient(135deg, rgba(54, 145, 255, 0.16), rgba(6, 190, 229, 0.12));
        border: 1px solid rgba(54, 145, 255, 0.25);
    }

    .menu-summary h6 {
        margin: 0;
        font-size: .92rem;
        color: #ffffff;
    }

    .menu-summary p {
        margin: .35rem 0 0;
        font-size: .75rem;
        color: rgba(255, 255, 255, .75);
        line-height: 1.4;
    }

    .menu-item-hint {
        display: block;
        font-size: .68rem;
        color: rgba(255, 255, 255, .65);
        margin-top: .15rem;
    }

    .menu-item-icon {
        display: inline-flex;
        width: 1.25rem;
        margin-right: .5rem;
        justify-content: center;
    }

    .menu-pill {
        margin-left: .5rem;
        font-size: .62rem;
        padding: .15rem .4rem;
        border-radius: 999px;
        background-color: rgba(255, 255, 255, .17);
        color: #fff;
        vertical-align: middle;
    }
</style>

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
            <li class="nav-label first">Menú principal</li>
            <li class="<?= $isConfiguracion ? 'mm-active' : '' ?>">
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="<?= $isConfiguracion ? 'true' : 'false' ?>">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Configuración <span class="menu-pill">3 módulos</span></span>
                </a>
                <ul aria-expanded="<?= $isConfiguracion ? 'true' : 'false' ?>" class="<?= $isConfiguracion ? 'mm-show' : '' ?>">
                    <?php foreach ($configuracionLinks as $action => $menuItem): ?>
                        <?php $isActive = $isConfiguracion && $currentAction === $action; ?>
                        <li class="<?= $isActive ? 'mm-active' : '' ?>">
                            <a href="index.php?controller=configuracion&action=<?= urlencode($action) ?>" <?= $isActive ? 'aria-current="page"' : '' ?>>
                                <span class="menu-item-icon" aria-hidden="true"><?= $menuItem['icon'] ?></span>
                                <span>
                                    <?= htmlspecialchars($menuItem['label']) ?>
                                    <span class="menu-item-hint"><?= htmlspecialchars($menuItem['description']) ?></span>
                                </span>
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
