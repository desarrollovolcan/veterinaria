<?php
require_once __DIR__ . '/config/dz.php';
require_once __DIR__ . '/app/bootstrap.php';

if (($_GET['action'] ?? '') === 'logout') {
    Auth::logout();
    flash('success', 'Sesión cerrada correctamente.');
    header('Location: page-login.php');
    exit;
}

if (!Auth::check()) {
    header('Location: page-login.php');
    exit;
}

if (isset($_GET['controller']) && in_array($_GET['controller'], ['owners', 'module'], true)) {
    if ($_GET['controller'] === 'owners') {
        $controller = new OwnerController();
    } else {
        $controller = new ModuleController();
    }
    $controller->index();
    exit;
}

$authUser = Auth::user();
$db = Database::connection();
$stats = [
    'owners' => (int) $db->query("SELECT COUNT(*) FROM owners WHERE COALESCE(estado,'ACTIVO') <> 'INACTIVO'")->fetchColumn(),
    'pets' => (int) $db->query("SELECT COUNT(*) FROM pets WHERE COALESCE(estado,'ACTIVO') <> 'INACTIVO'")->fetchColumn(),
    'appointments' => (int) $db->query("SELECT COUNT(*) FROM appointments")->fetchColumn(),
    'products_low' => (int) $db->query("SELECT COUNT(*) FROM products WHERE CAST(COALESCE(stock_actual,'0') AS DECIMAL(10,2)) <= CAST(COALESCE(stock_minimo,'0') AS DECIMAL(10,2))")->fetchColumn(),
];
$recentOwners = $db->query("SELECT id, nombre_completo, telefono, estado FROM owners ORDER BY id DESC LIMIT 5")->fetchAll();
$recentAppointments = $db->query("SELECT id, inicio, motivo, estado FROM appointments ORDER BY id DESC LIMIT 5")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $DexignZoneSettings['site_level']['site_title']; ?> - Dashboard</title>
    <?php include 'elements/meta.php'; ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']; ?>">
    <?php include 'elements/page-css.php'; ?>
</head>
<body>
<?php include 'elements/pre-loader.php'; ?>
<div id="main-wrapper">
    <?php include 'elements/nav-header.php'; ?>
    <?php include 'elements/chatbox.php'; ?>
    <?php include 'elements/header.php'; ?>
    <?php include 'elements/sidebar.php'; ?>

    <div class="content-body">
        <div class="container-fluid">
            <div class="form-head mb-3 d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h2 class="font-w600 title mb-1">Dashboard Clínico</h2>
                    <p class="text-muted mb-0">Bienvenido, <?php echo e($authUser['nombre']); ?>.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="index.php?controller=owners&action=index" class="btn btn-sm btn-primary">Nuevo cliente</a>
                    <a href="index.php?controller=module&action=index&module=appointments" class="btn btn-sm btn-outline-primary">Agenda</a>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-xl-3 col-md-6"><div class="card"><div class="card-body py-3"><div class="d-flex justify-content-between"><span>Propietarios</span><strong><?php echo $stats['owners']; ?></strong></div></div></div></div>
                <div class="col-xl-3 col-md-6"><div class="card"><div class="card-body py-3"><div class="d-flex justify-content-between"><span>Mascotas</span><strong><?php echo $stats['pets']; ?></strong></div></div></div></div>
                <div class="col-xl-3 col-md-6"><div class="card"><div class="card-body py-3"><div class="d-flex justify-content-between"><span>Citas</span><strong><?php echo $stats['appointments']; ?></strong></div></div></div></div>
                <div class="col-xl-3 col-md-6"><div class="card"><div class="card-body py-3"><div class="d-flex justify-content-between"><span>Stock crítico</span><strong class="text-danger"><?php echo $stats['products_low']; ?></strong></div></div></div></div>
            </div>

            <div class="row g-3 mt-1">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header py-3"><h4 class="card-title mb-0">Últimos propietarios</h4></div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead><tr><th>Nombre</th><th>Teléfono</th><th>Estado</th></tr></thead>
                                    <tbody>
                                    <?php if (!$recentOwners): ?><tr><td colspan="3" class="text-center text-muted py-3">Sin datos</td></tr><?php endif; ?>
                                    <?php foreach ($recentOwners as $item): ?><tr><td><?php echo e($item['nombre_completo']); ?></td><td><?php echo e($item['telefono']); ?></td><td><?php echo e($item['estado']); ?></td></tr><?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header py-3"><h4 class="card-title mb-0">Últimas citas</h4></div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead><tr><th>Inicio</th><th>Motivo</th><th>Estado</th></tr></thead>
                                    <tbody>
                                    <?php if (!$recentAppointments): ?><tr><td colspan="3" class="text-center text-muted py-3">Sin datos</td></tr><?php endif; ?>
                                    <?php foreach ($recentAppointments as $item): ?><tr><td><?php echo e((string) $item['inicio']); ?></td><td><?php echo e((string) $item['motivo']); ?></td><td><?php echo e((string) $item['estado']); ?></td></tr><?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'elements/footer.php'; ?>
<?php include 'elements/page-js.php'; ?>
</body>
</html>
