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
