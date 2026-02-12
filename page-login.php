<?php
require_once __DIR__ . '/config/dz.php';
require_once __DIR__ . '/app/bootstrap.php';

if (Auth::check()) {
    header('Location: index.php');
    exit;
}

$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = (string) ($_POST['password'] ?? '');

    if (!verify_csrf($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Token de seguridad inválido. Recarga la página e intenta nuevamente.';
    } elseif (!Auth::attempt($email, $password)) {
        $errors[] = 'Credenciales inválidas. Verifica tu correo y contraseña.';
    } else {
        flash('success', 'Inicio de sesión correcto. ¡Bienvenido!');
        header('Location: index.php');
        exit;
    }
}

$demoCredentials = Auth::demoCredentials();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <title><?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
    <?php include 'elements/meta.php'; ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon'] ?>">
    <?php include 'elements/page-css.php'; ?>
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.php" class="brand-logo">
                                            <svg class="logo-abbr" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect class="svg-logo-rect" width="50" height="50" rx="6" fill="#EB8153"/>
                                                <path class="svg-logo-path"  d="M17.5158 25.8619L19.8088 25.2475L14.8746 11.1774C14.5189 9.84988 15.8701 9.0998 16.8205 9.75055L33.0924 22.2055C33.7045 22.5589 33.8512 24.0717 32.6444 24.3951L30.3514 25.0095L35.2856 39.0796C35.6973 40.1334 34.4431 41.2455 33.3397 40.5064L17.0678 28.0515C16.2057 27.2477 16.5504 26.1205 17.5158 25.8619ZM18.685 14.2955L22.2224 24.6007L29.4633 22.6605L18.685 14.2955ZM31.4751 35.9615L27.8171 25.6886L20.5762 27.6288L31.4751 35.9615Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Inicia sesión en tu cuenta</h4>

                                    <?php if (!empty($errors)): ?>
                                        <div class="alert alert-danger">
                                            <?php foreach ($errors as $error): ?>
                                                <div><?php echo e($error); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="alert alert-info">
                                        <strong>Acceso demo:</strong><br>
                                        Usuario: <code><?php echo e($demoCredentials['email']); ?></code><br>
                                        Contraseña: <code><?php echo e($demoCredentials['password']); ?></code>
                                    </div>

                                    <form method="POST" action="page-login.php">
                                        <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="<?php echo e($email); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Contraseña</strong></label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2 flex-wrap">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1" disabled>
                                                    <label class="form-check-label" for="basic_checkbox_1">Recordarme (próximamente)</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.php">¿Olvidaste tu contraseña?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'elements/page-js.php'; ?>
</body>
</html>
