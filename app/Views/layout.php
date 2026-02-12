<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= htmlspecialchars($pageTitle ?? $DexignZoneSettings['site_level']['site_title']) ?></title>
    <?php include __DIR__ . '/../../elements/meta.php'; ?>
    <link rel="shortcut icon" type="image/png" href="<?= $DexignZoneSettings['site_level']['favicon'] ?>">
    <?php include __DIR__ . '/../../elements/page-css.php'; ?>
</head>
<body>
<?php include __DIR__ . '/../../elements/pre-loader.php'; ?>
<div id="main-wrapper">
    <?php include __DIR__ . '/../../elements/nav-header.php'; ?>
    <?php include __DIR__ . '/../../elements/chatbox.php'; ?>
    <?php include __DIR__ . '/../../elements/header.php'; ?>
    <?php include __DIR__ . '/../../elements/sidebar.php'; ?>

    <div class="content-body">
        <div class="container-fluid">
            <?php include $viewFile; ?>
        </div>
    </div>

    <?php include __DIR__ . '/../../elements/footer.php'; ?>
</div>
<?php include __DIR__ . '/../../elements/page-js.php'; ?>
</body>
</html>
