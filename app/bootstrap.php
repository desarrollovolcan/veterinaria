<?php

session_start();

require_once __DIR__ . '/Core/Database.php';
require_once __DIR__ . '/Core/Auth.php';
require_once __DIR__ . '/Models/Owner.php';
require_once __DIR__ . '/Models/ModuleRepository.php';
require_once __DIR__ . '/Controllers/BaseController.php';
require_once __DIR__ . '/Controllers/OwnerController.php';
require_once __DIR__ . '/Controllers/ModuleController.php';

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (!isset($_SESSION['clinic_profile'])) {
    try {
        $clinicStmt = Database::connection()->query("SELECT * FROM clinic_profile ORDER BY id DESC LIMIT 1");
        $_SESSION['clinic_profile'] = $clinicStmt->fetch() ?: [];
    } catch (Throwable $e) {
        $_SESSION['clinic_profile'] = [];
    }
}

function csrf_token(): string
{
    return $_SESSION['csrf_token'] ?? '';
}

function verify_csrf(?string $token): bool
{
    return is_string($token) && hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

function flash(string $key, ?string $value = null): ?string
{
    if ($value !== null) {
        $_SESSION['_flash'][$key] = $value;
        return null;
    }

    $message = $_SESSION['_flash'][$key] ?? null;
    unset($_SESSION['_flash'][$key]);
    return $message;
}

function e(?string $text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

function is_database_connection_error(Throwable $e): bool
{
    $message = $e->getMessage();
    if (str_contains($message, 'No se pudo conectar a MySQL') || str_contains($message, 'solo soporta MySQL')) {
        return true;
    }

    $previous = $e->getPrevious();
    while ($previous instanceof Throwable) {
        $prevMessage = $previous->getMessage();
        if (str_contains($prevMessage, 'SQLSTATE') || str_contains($prevMessage, 'Access denied') || str_contains($prevMessage, 'Connection refused')) {
            return true;
        }
        $previous = $previous->getPrevious();
    }

    return false;
}

function render_database_error_page(Throwable $e): void
{
    http_response_code(503);
    echo '<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Configuración MySQL requerida</title>';
    echo '<meta name="viewport" content="width=device-width,initial-scale=1">';
    echo '<style>body{font-family:Arial,sans-serif;background:#f6f8fb;margin:0;padding:32px}';
    echo '.box{max-width:800px;margin:0 auto;background:#fff;border:1px solid #e5e7eb;border-radius:10px;padding:24px}';
    echo 'code{background:#f3f4f6;padding:2px 6px;border-radius:4px}</style></head><body><div class="box">';
    echo '<h2>No se pudo conectar a MySQL</h2>';
    echo '<p>El sistema está configurado para funcionar únicamente con MySQL. Ajusta las variables de entorno y vuelve a intentar.</p>';
    echo '<ul><li><code>DB_HOST</code></li><li><code>DB_PORT</code></li><li><code>DB_NAME</code></li><li><code>DB_USER</code></li><li><code>DB_PASS</code></li><li><code>DB_SOCKET</code> (opcional)</li><li>Archivo <code>config/database.php</code></li></ul>';
    echo '<p><strong>Detalle:</strong> ' . e($e->getMessage()) . '</p>';
    echo '</div></body></html>';
}

set_exception_handler(static function (Throwable $e): void {
    if (is_database_connection_error($e)) {
        render_database_error_page($e);
        return;
    }

    http_response_code(500);
    echo 'Error interno del servidor.';
});
