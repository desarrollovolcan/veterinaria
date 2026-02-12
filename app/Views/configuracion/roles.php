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
            <div class="col-md-2"><button class="btn btn-primary w-100">Guardar</button></div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead><tr><th>Nombre</th><th>Descripción</th><th>Sistema</th><th>Acciones</th></tr></thead>
            <tbody>
            <?php foreach ($roles as $rol): ?>
                <tr>
                    <td><?= htmlspecialchars($rol['nombre']) ?></td>
                    <td><?= htmlspecialchars($rol['descripcion']) ?></td>
                    <td><?= (int)$rol['es_sistema'] === 1 ? 'Sí' : 'No' ?></td>
                    <td>
                        <?php if ((int)$rol['es_sistema'] === 1): ?>
                            <span class="badge bg-info">Protegido</span>
                        <?php else: ?>
                            <form method="post">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= (int)$rol['id'] ?>">
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
