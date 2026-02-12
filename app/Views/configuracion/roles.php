<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Roles</h2>
</div>

<div class="card mb-4">
    <div class="card-header"><h4 class="card-title mb-0">Crear rol</h4></div>
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
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Permisos</th>
                    <th>Sistema</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($roles as $rol): ?>
                <tr>
                    <td><?= htmlspecialchars($rol['nombre']) ?></td>
                    <td><?= htmlspecialchars($rol['descripcion']) ?></td>
                    <td><?= htmlspecialchars($rol['permisos'] ?? '') ?></td>
                    <td><?= (int)$rol['es_sistema'] === 1 ? 'Sí' : 'No' ?></td>
                    <td>
                        <?php if ((int)$rol['es_sistema'] === 1): ?>
                            <span class="badge bg-info">Protegido</span>
                        <?php else: ?>
                            <form method="post" class="d-inline-block">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= (int)$rol['id'] ?>">
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>

                <?php if ((int)$rol['es_sistema'] === 0): ?>
                    <tr>
                        <td colspan="5">
                            <form method="post" class="row g-2 mb-2">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?= (int)$rol['id'] ?>">
                                <div class="col-md-4">
                                    <input required name="nombre" class="form-control" value="<?= htmlspecialchars($rol['nombre']) ?>">
                                </div>
                                <div class="col-md-6">
                                    <input name="descripcion" class="form-control" value="<?= htmlspecialchars($rol['descripcion']) ?>">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-sm btn-secondary w-100" type="submit">Actualizar rol</button>
                                </div>
                            </form>

                            <form method="post" class="row g-2 align-items-start">
                                <input type="hidden" name="action" value="sync_permisos">
                                <input type="hidden" name="id" value="<?= (int)$rol['id'] ?>">
                                <div class="col-12">
                                    <label class="form-label mb-2"><strong>Permisos del rol</strong></label>
                                    <div class="d-flex flex-wrap gap-3">
                                        <?php $seleccionados = $permisosPorRol[(int)$rol['id']] ?? []; ?>
                                        <?php foreach ($permisos as $permiso): ?>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="permiso_ids[]"
                                                    id="rol<?= (int)$rol['id'] ?>permiso<?= (int)$permiso['id'] ?>"
                                                    value="<?= (int)$permiso['id'] ?>"
                                                    <?= in_array((int)$permiso['id'], $seleccionados, true) ? 'checked' : '' ?>
                                                >
                                                <label class="form-check-label" for="rol<?= (int)$rol['id'] ?>permiso<?= (int)$permiso['id'] ?>">
                                                    <?= htmlspecialchars($permiso['nombre']) ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary" type="submit">Guardar permisos</button>
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
