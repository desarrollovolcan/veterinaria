<?php
$isEditing = !empty($editingOwner);
$formData = $editingOwner ?? [
    'id' => '',
    'rut' => '',
    'nombre_completo' => '',
    'telefono' => '',
    'email' => '',
    'direccion' => '',
    'observacion' => '',
    'estado' => 'ACTIVO',
];
?>
<div class="form-head mb-sm-4 mb-3 d-flex flex-wrap align-items-center">
    <h2 class="font-w600 title mb-2 me-auto">Mantenimiento de Propietarios</h2>
</div>

<?php if ($success): ?>
    <div class="alert alert-success solid alert-dismissible fade show">
        <strong>Éxito:</strong> <?php echo e($success); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
<?php endif; ?>

<?php if ($error || !empty($errors['general'])): ?>
    <div class="alert alert-danger solid alert-dismissible fade show">
        <strong>Error:</strong> <?php echo e($error ?: $errors['general']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0"><?php echo $isEditing ? 'Editar propietario' : 'Nuevo propietario'; ?></h4>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php?controller=owners&action=index" class="row">
            <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e((string) $formData['id']); ?>">

            <div class="mb-3 col-md-3">
                <label class="form-label">RUT</label>
                <input type="text" class="form-control" name="rut" value="<?php echo e($formData['rut']); ?>" maxlength="20">
            </div>
            <div class="mb-3 col-md-5">
                <label class="form-label">Nombre completo <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo isset($errors['nombre_completo']) ? 'is-invalid' : ''; ?>" name="nombre_completo" value="<?php echo e($formData['nombre_completo']); ?>" required>
                <?php if (isset($errors['nombre_completo'])): ?><div class="invalid-feedback"><?php echo e($errors['nombre_completo']); ?></div><?php endif; ?>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo isset($errors['telefono']) ? 'is-invalid' : ''; ?>" name="telefono" value="<?php echo e($formData['telefono']); ?>" required>
                <?php if (isset($errors['telefono'])): ?><div class="invalid-feedback"><?php echo e($errors['telefono']); ?></div><?php endif; ?>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Email</label>
                <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo e($formData['email']); ?>">
                <?php if (isset($errors['email'])): ?><div class="invalid-feedback"><?php echo e($errors['email']); ?></div><?php endif; ?>
            </div>
            <div class="mb-3 col-md-5">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo e($formData['direccion']); ?>">
            </div>
            <div class="mb-3 col-md-3">
                <label class="form-label">Estado</label>
                <select class="default-select form-control" name="estado">
                    <option value="ACTIVO" <?php echo $formData['estado'] === 'ACTIVO' ? 'selected' : ''; ?>>Activo</option>
                    <option value="INACTIVO" <?php echo $formData['estado'] === 'INACTIVO' ? 'selected' : ''; ?>>Inactivo</option>
                </select>
            </div>
            <div class="mb-3 col-12">
                <label class="form-label">Observación</label>
                <textarea class="form-control" rows="2" name="observacion"><?php echo e($formData['observacion']); ?></textarea>
            </div>
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary" type="submit"><?php echo $isEditing ? 'Actualizar propietario' : 'Guardar propietario'; ?></button>
                <?php if ($isEditing): ?><a href="index.php?controller=owners&action=index" class="btn btn-light">Cancelar edición</a><?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Listado de propietarios</h4>
    </div>
    <div class="card-body">
        <form class="row mb-4" method="GET" action="index.php">
            <input type="hidden" name="controller" value="owners">
            <input type="hidden" name="action" value="index">
            <div class="col-md-6 mb-2">
                <input type="text" class="form-control" name="q" placeholder="Buscar por nombre, teléfono o email" value="<?php echo e($filters['q']); ?>">
            </div>
            <div class="col-md-3 mb-2">
                <select class="default-select form-control" name="estado">
                    <option value="">Todos los estados</option>
                    <option value="ACTIVO" <?php echo $filters['estado'] === 'ACTIVO' ? 'selected' : ''; ?>>Activo</option>
                    <option value="INACTIVO" <?php echo $filters['estado'] === 'INACTIVO' ? 'selected' : ''; ?>>Inactivo</option>
                </select>
            </div>
            <div class="col-md-3 mb-2 d-flex gap-2">
                <button class="btn btn-secondary" type="submit">Filtrar</button>
                <a class="btn btn-outline-secondary" href="index.php?controller=owners&action=index">Limpiar</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-responsive-md">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Creado</th>
                    <th class="text-end">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!$owners): ?>
                    <tr><td colspan="7" class="text-center text-muted">No hay propietarios registrados.</td></tr>
                <?php endif; ?>
                <?php foreach ($owners as $owner): ?>
                    <tr>
                        <td><?php echo (int) $owner['id']; ?></td>
                        <td><?php echo e($owner['nombre_completo']); ?></td>
                        <td><?php echo e($owner['telefono']); ?></td>
                        <td><?php echo e($owner['email'] ?: '-'); ?></td>
                        <td>
                            <span class="badge light <?php echo $owner['estado'] === 'ACTIVO' ? 'badge-success' : 'badge-danger'; ?>">
                                <?php echo e($owner['estado']); ?>
                            </span>
                        </td>
                        <td><?php echo e((string) $owner['created_at']); ?></td>
                        <td class="text-end">
                            <a href="index.php?controller=owners&action=index&edit=<?php echo (int) $owner['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
                            <button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#deleteOwnerModal" data-id="<?php echo (int) $owner['id']; ?>" data-name="<?php echo e($owner['nombre_completo']); ?>">Inactivar</button>
                            <a href="index.php?controller=owners&action=index&q=<?php echo urlencode($owner['nombre_completo']); ?>" class="btn btn-info btn-xs">Ver</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <nav>
            <ul class="pagination pagination-gutter pagination-primary no-bg justify-content-end">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?controller=owners&action=index&page=<?php echo $i; ?>&q=<?php echo urlencode($filters['q']); ?>&estado=<?php echo urlencode($filters['estado']); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<div class="modal fade" id="deleteOwnerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar inactivación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="index.php?controller=owners&action=index">
                <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="intent" value="delete">
                <input type="hidden" name="id" id="delete-owner-id" value="">
                <div class="modal-body">
                    <p>¿Seguro que deseas inactivar al propietario <strong id="delete-owner-name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Inactivar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteOwnerModal');
    if (!deleteModal) return;
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        document.getElementById('delete-owner-id').value = button.getAttribute('data-id');
        document.getElementById('delete-owner-name').textContent = button.getAttribute('data-name');
    });
});
</script>
