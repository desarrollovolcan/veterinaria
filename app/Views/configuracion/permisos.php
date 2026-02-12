<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Permisos</h2>
</div>

<div class="card mb-4">
    <div class="card-header"><h4 class="card-title mb-0">Crear permiso</h4></div>
    <div class="card-body">
        <form method="post" class="row g-3">
            <input type="hidden" name="action" value="create">
            <div class="col-md-4"><input required name="nombre" class="form-control" placeholder="Nombre"></div>
            <div class="col-md-6"><input name="descripcion" class="form-control" placeholder="Descripción"></div>
            <div class="col-md-2"><button class="btn btn-primary w-100" type="submit">Guardar</button></div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered align-middle">
            <thead><tr><th>Nombre</th><th>Descripción</th><th>Roles</th><th>Sistema</th><th>Acciones</th></tr></thead>
            <tbody>
            <?php foreach ($permisos as $permiso): ?>
                <tr>
                    <td><?= htmlspecialchars($permiso['nombre']) ?></td>
                    <td><?= htmlspecialchars($permiso['descripcion']) ?></td>
                    <td><?= htmlspecialchars($permiso['roles'] ?? '') ?></td>
                    <td><?= (int)$permiso['es_sistema'] === 1 ? 'Sí' : 'No' ?></td>
                    <td>
                        <?php if ((int)$permiso['es_sistema'] === 1): ?>
                            <span class="badge bg-info">Protegido</span>
                        <?php else: ?>
                            <form method="post" class="d-inline-block">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= (int)$permiso['id'] ?>">
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>

                <?php if ((int)$permiso['es_sistema'] === 0): ?>
                    <tr>
                        <td colspan="5">
                            <form method="post" class="row g-2 align-items-center">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?= (int)$permiso['id'] ?>">
                                <div class="col-md-4">
                                    <input required name="nombre" value="<?= htmlspecialchars($permiso['nombre']) ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input name="descripcion" value="<?= htmlspecialchars($permiso['descripcion']) ?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-sm btn-secondary w-100" type="submit">Actualizar permiso</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
