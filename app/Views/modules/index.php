<?php
$record = $editing ?? [];
if ($old) {
    $record = array_merge($record, $old);
}
?>
<div class="form-head mb-sm-4 mb-3 d-flex flex-wrap align-items-center">
    <h2 class="font-w600 title mb-2 me-auto">Mantenimiento de <?php echo e($config['title']); ?></h2>
</div>

<?php if ($success): ?><div class="alert alert-success solid"><?php echo e($success); ?></div><?php endif; ?>
<?php if ($error): ?><div class="alert alert-danger solid"><?php echo e($error); ?></div><?php endif; ?>

<div class="card">
    <div class="card-header"><h4 class="card-title mb-0"><?php echo $editing ? 'Editar' : 'Nuevo'; ?> registro</h4></div>
    <div class="card-body">
        <form method="POST" action="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>" class="row">
            <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e((string) ($record['id'] ?? '')); ?>">
            <?php foreach ($config['fields'] as $field => $meta): ?>
                <div class="mb-3 col-md-4">
                    <label class="form-label"><?php echo e($meta['label']); ?></label>
                    <?php $value = $record[$field] ?? ''; ?>
                    <?php if (($meta['type'] ?? 'text') === 'textarea'): ?>
                        <textarea class="form-control <?php echo isset($formErrors[$field]) ? 'is-invalid' : ''; ?>" name="<?php echo e($field); ?>" rows="2"><?php echo e((string) $value); ?></textarea>
                    <?php elseif (($meta['type'] ?? 'text') === 'select'): ?>
                        <select class="default-select form-control <?php echo isset($formErrors[$field]) ? 'is-invalid' : ''; ?>" name="<?php echo e($field); ?>">
                            <option value="">Seleccionar...</option>
                            <?php if (!empty($meta['source'])): ?>
                                <?php foreach (($options[$meta['source']] ?? []) as $opt): ?>
                                    <option value="<?php echo (int) $opt['id']; ?>" <?php echo (string) $value === (string) $opt['id'] ? 'selected' : ''; ?>><?php echo e($opt['label']); ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach (($meta['options'] ?? []) as $opt): ?>
                                    <option value="<?php echo e((string) $opt); ?>" <?php echo (string) $value === (string) $opt ? 'selected' : ''; ?>><?php echo e((string) $opt); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    <?php else: ?>
                        <input type="<?php echo e($meta['type'] ?? 'text'); ?>" class="form-control <?php echo isset($formErrors[$field]) ? 'is-invalid' : ''; ?>" name="<?php echo e($field); ?>" value="<?php echo e((string) $value); ?>">
                    <?php endif; ?>
                    <?php if (isset($formErrors[$field])): ?><div class="invalid-feedback"><?php echo e($formErrors[$field]); ?></div><?php endif; ?>
                </div>
            <?php endforeach; ?>
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary" type="submit"><?php echo $editing ? 'Actualizar' : 'Guardar'; ?></button>
                <?php if ($editing): ?><a class="btn btn-light" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>">Cancelar</a><?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header"><h4 class="card-title mb-0">Listado</h4></div>
    <div class="card-body">
        <form class="row mb-4" method="GET" action="index.php">
            <input type="hidden" name="controller" value="module"><input type="hidden" name="action" value="index"><input type="hidden" name="module" value="<?php echo e($moduleKey); ?>">
            <div class="col-md-6 mb-2"><input type="text" class="form-control" name="q" value="<?php echo e($filters['q']); ?>" placeholder="Buscar..."></div>
            <div class="col-md-3 mb-2"><select class="default-select form-control" name="estado"><option value="">Todos</option><option value="ACTIVO" <?php echo $filters['estado']==='ACTIVO'?'selected':''; ?>>Activo</option><option value="INACTIVO" <?php echo $filters['estado']==='INACTIVO'?'selected':''; ?>>Inactivo</option></select></div>
            <div class="col-md-3 mb-2 d-flex gap-2"><button class="btn btn-secondary" type="submit">Filtrar</button><a class="btn btn-outline-secondary" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>">Limpiar</a></div>
        </form>

        <div class="table-responsive">
            <table class="table table-responsive-md">
                <thead><tr><?php foreach ($config['columns'] as $label): ?><th><?php echo e($label); ?></th><?php endforeach; ?><th class="text-end">Acciones</th></tr></thead>
                <tbody>
                <?php if (!$rows): ?><tr><td colspan="99" class="text-center text-muted">Sin registros.</td></tr><?php endif; ?>
                <?php foreach ($rows as $row): ?><tr>
                    <?php foreach ($config['columns'] as $col => $label): ?><td><?php echo e((string) ($row[$col] ?? '-')); ?></td><?php endforeach; ?>
                    <td class="text-end">
                        <a class="btn btn-primary btn-xs" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>&edit=<?php echo (int) $row['id']; ?>">Editar</a>
                        <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo (int) $row['id']; ?>">Eliminar/Inactivar</button>
                        <a class="btn btn-info btn-xs" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>&q=<?php echo urlencode((string) ($row[array_key_first($config['columns'])] ?? '')); ?>">Ver</a>
                    </td>
                </tr><?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <ul class="pagination pagination-gutter pagination-primary no-bg justify-content-end">
            <?php for ($i=1; $i <= $totalPages; $i++): ?><li class="page-item <?php echo $i===$page?'active':''; ?>"><a class="page-link" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>&page=<?php echo $i; ?>&q=<?php echo urlencode($filters['q']); ?>&estado=<?php echo urlencode($filters['estado']); ?>"><?php echo $i; ?></a></li><?php endfor; ?>
        </ul>
    </div>
</div>

<div class="modal fade" id="deleteModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirmar</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><form method="POST" action="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>"><input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>"><input type="hidden" name="intent" value="delete"><input type="hidden" id="delete-id" name="id"><div class="modal-body">¿Deseas continuar?</div><div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="submit">Confirmar</button></div></form></div></div></div>
<script>document.addEventListener('DOMContentLoaded',function(){var m=document.getElementById('deleteModal');if(!m)return;m.addEventListener('show.bs.modal',function(e){document.getElementById('delete-id').value=e.relatedTarget.getAttribute('data-id');});});</script>
