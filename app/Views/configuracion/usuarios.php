<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Usuarios</h2>
</div>

<div class="card mb-4">
    <div class="card-header"><h4 class="card-title mb-0">Crear usuario</h4></div>
    <div class="card-body">
        <form method="post" class="row g-3">
            <input type="hidden" name="action" value="create">
            <div class="col-md-2"><input required name="usuario" class="form-control" placeholder="Usuario"></div>
            <div class="col-md-2"><input required name="nombre" class="form-control" placeholder="Nombre"></div>
            <div class="col-md-3"><input required type="email" name="email" class="form-control" placeholder="Correo"></div>
            <div class="col-md-2"><input required type="password" name="password" class="form-control" placeholder="Contraseña"></div>
            <div class="col-md-2">
                <select name="rol_id" class="form-control" required>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?= (int)$rol['id'] ?>"><?= htmlspecialchars($rol['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-1"><button class="btn btn-primary w-100" type="submit">Guardar</button></div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header"><h4 class="card-title mb-0">Listado</h4></div>
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead><tr><th>Usuario</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Activo</th><th>Acciones</th></tr></thead>
            <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['rol']) ?></td>
                    <td><?= (int)$usuario['activo'] === 1 ? 'Sí' : 'No' ?></td>
                    <td>
                        <?php if ((int)$usuario['es_superroot'] === 1): ?>
                            <span class="badge bg-danger">SuperRoot protegido</span>
                        <?php else: ?>
                            <form method="post" class="d-inline-flex gap-1 align-items-center">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= (int)$usuario['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if ((int)$usuario['es_superroot'] === 0): ?>
                    <tr>
                        <td colspan="6">
                            <form method="post" class="row g-2 align-items-center">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?= (int)$usuario['id'] ?>">
                                <div class="col-md-3"><input required name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" class="form-control"></div>
                                <div class="col-md-3"><input required type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" class="form-control"></div>
                                <div class="col-md-2">
                                    <select name="rol_id" class="form-control" required>
                                        <?php foreach ($roles as $rol): ?>
                                            <option value="<?= (int)$rol['id'] ?>" <?= $rol['nombre'] === $usuario['rol'] ? 'selected' : '' ?>><?= htmlspecialchars($rol['nombre']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 form-check">
                                    <input class="form-check-input" type="checkbox" name="activo" id="activo<?= (int)$usuario['id'] ?>" <?= (int)$usuario['activo'] === 1 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="activo<?= (int)$usuario['id'] ?>">Activo</label>
                                </div>
                                <div class="col-md-2"><button class="btn btn-sm btn-secondary" type="submit">Actualizar</button></div>
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
