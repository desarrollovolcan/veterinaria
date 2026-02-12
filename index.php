<?php
require_once __DIR__ . '/config/dz.php';
require_once __DIR__ . '/app/Controllers/ConfiguracionController.php';

$controller = strtolower($_GET['controller'] ?? 'configuracion');
$action = strtolower($_GET['action'] ?? 'usuarios');

try {
    if ($controller !== 'configuracion') {
        throw new RuntimeException('Controlador no encontrado.');
    }

    $configController = new ConfiguracionController();
    if (!method_exists($configController, $action)) {
        throw new RuntimeException('Acción no encontrada.');
    }

    $configController->$action();
} catch (Throwable $e) {
    http_response_code(500);
    echo '<h2>Error de aplicación</h2>';
    echo '<p>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
