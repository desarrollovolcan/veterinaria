<?php
$record = $editing ?? [];
if ($old) {
    $record = array_merge($record, $old);
}
$canEdit = $canEdit ?? true;
$isClinic = $moduleKey === 'clinic_profile';
$themeClass = 'module-maintenance-theme-' . preg_replace('/[^a-z0-9_-]+/i', '-', (string) $moduleKey);
?>
<style>
.<?php echo e($themeClass); ?> .compact-form .form-label{font-size:.76rem;margin-bottom:.2rem!important;line-height:1.1;}
.<?php echo e($themeClass); ?> .compact-form .form-control,
.<?php echo e($themeClass); ?> .compact-form .form-control-sm,
.<?php echo e($themeClass); ?> .compact-form .default-select,
.<?php echo e($themeClass); ?> .compact-form .bootstrap-select .btn,
.<?php echo e($themeClass); ?> .compact-form .bootstrap-select .dropdown-toggle,
.<?php echo e($themeClass); ?> .compact-form .input-group-text{min-height:28px!important;height:28px!important;padding:.14rem .5rem!important;font-size:.78rem!important;line-height:1.1;}
.<?php echo e($themeClass); ?> .compact-form textarea.form-control,
.<?php echo e($themeClass); ?> .compact-form textarea.form-control-sm{min-height:48px!important;height:auto!important;padding-top:.28rem!important;padding-bottom:.28rem!important;}
.<?php echo e($themeClass); ?> .compact-form .btn{min-height:28px!important;padding:.14rem .55rem!important;font-size:.76rem!important;line-height:1.1;}
.<?php echo e($themeClass); ?> .compact-form .btn-sm,.<?php echo e($themeClass); ?> .compact-form .btn.btn-sm{min-height:24px!important;padding:.08rem .45rem!important;font-size:.7rem!important;}
.<?php echo e($themeClass); ?> .compact-form .btn-xs,.<?php echo e($themeClass); ?> .compact-form .btn.btn-xs{min-height:21px!important;padding:.04rem .35rem!important;font-size:.66rem!important;}
.<?php echo e($themeClass); ?> .compact-form.row{--bs-gutter-y:.35rem;--bs-gutter-x:.65rem;}
</style>

<div class="<?php echo e($themeClass); ?>">
    <div class="form-head mb-sm-4 mb-3 d-flex flex-wrap align-items-center">
        <h2 class="font-w600 title mb-2 me-auto">Mantenimiento de <?php echo e($config['title']); ?></h2>
    </div>

    <?php if ($success): ?><div class="alert alert-success solid"><?php echo e($success); ?></div><?php endif; ?>
    <?php if ($error): ?><div class="alert alert-danger solid"><?php echo e($error); ?></div><?php endif; ?>

    <div class="card">
        <div class="card-header"><h4 class="card-title mb-0"><?php echo $editing ? 'Editar' : 'Nuevo'; ?> registro</h4></div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>" class="row g-2 compact-form" <?php echo $isClinic ? 'enctype="multipart/form-data"' : ''; ?>>
                <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="id" value="<?php echo e((string) ($record['id'] ?? '')); ?>">
                <?php foreach ($config['fields'] as $field => $meta): ?>
                    <div class="col-md-<?php echo e((string) ($meta['col'] ?? 3)); ?>">
                        <label class="form-label mb-1"><?php echo e($meta['label']); ?><?php if (($meta['required'] ?? false) && strpos((string) $meta['label'], '*') === false): ?> <span class="text-danger">*</span><?php endif; ?></label>
                        <?php $value = $record[$field] ?? ''; ?>
                        <?php if (($meta['readonly'] ?? false) === true): ?>
                            <input type="text" class="form-control form-control-sm" readonly value="<?php echo e((string) $value); ?>">
                        <?php elseif (($meta['type'] ?? 'text') === 'textarea'): ?>
                            <textarea class="form-control form-control-sm <?php echo isset($formErrors[$field]) ? 'is-invalid' : ''; ?>" name="<?php echo e($field); ?>" rows="1" <?php echo $canEdit ? '' : 'disabled'; ?>><?php echo e((string) $value); ?></textarea>
                        <?php elseif (($meta['type'] ?? 'text') === 'select'): ?>
                            <select class="default-select form-control form-control-sm <?php echo isset($formErrors[$field]) ? 'is-invalid' : ''; ?>" name="<?php echo e($field); ?>" <?php echo $canEdit ? '' : 'disabled'; ?>>
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
                            <input type="<?php echo e($meta['type'] ?? 'text'); ?>" class="form-control form-control-sm <?php echo isset($formErrors[$field]) ? 'is-invalid' : ''; ?>" name="<?php echo e($field); ?>" value="<?php echo e((string) $value); ?>" <?php echo $canEdit ? '' : 'readonly'; ?>>
                        <?php endif; ?>
                        <?php if (isset($formErrors[$field])): ?><div class="invalid-feedback"><?php echo e($formErrors[$field]); ?></div><?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <?php if ($isClinic): ?>
                    <div class="col-md-3">
                        <label class="form-label mb-1">Subir logo</label>
                        <input type="file" name="logo_file" class="form-control form-control-sm" accept=".png,.jpg,.jpeg,.svg,.webp" <?php echo $canEdit ? '' : 'disabled'; ?>>
                        <?php if (!empty($record['logo_path'])): ?><small class="d-block mt-1"><img src="<?php echo e($record['logo_path']); ?>" alt="Logo" style="max-height:42px"></small><?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="col-12 d-flex gap-2">
                    <?php if ($canEdit): ?><button class="btn btn-primary" type="submit"><?php echo $editing ? 'Actualizar' : 'Guardar'; ?></button><?php endif; ?>
                    <?php if ($editing): ?><a class="btn btn-light" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>">Cancelar</a><?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h4 class="card-title mb-0">Listado</h4></div>
        <div class="card-body">
            <form class="row g-2 mb-3 compact-form" method="GET" action="index.php">
                <input type="hidden" name="controller" value="module"><input type="hidden" name="action" value="index"><input type="hidden" name="module" value="<?php echo e($moduleKey); ?>">
                <div class="col-md-6"><input type="text" class="form-control form-control-sm" name="q" value="<?php echo e($filters['q']); ?>" placeholder="Buscar..."></div>
                <?php if ($config['has_estado']): ?>
                    <div class="col-md-3"><select class="default-select form-control form-control-sm" name="estado"><option value="">Todos</option><option value="ACTIVO" <?php echo $filters['estado']==='ACTIVO'?'selected':''; ?>>Activo</option><option value="INACTIVO" <?php echo $filters['estado']==='INACTIVO'?'selected':''; ?>>Inactivo</option></select></div>
                <?php endif; ?>
                <div class="col-md-<?php echo $config['has_estado'] ? '3' : '6'; ?> d-flex gap-2"><button class="btn btn-secondary btn-sm" type="submit">Filtrar</button><a class="btn btn-outline-secondary btn-sm" href="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>">Limpiar</a></div>
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
                            <?php if ($canEdit): ?><button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo (int) $row['id']; ?>">Eliminar/Inactivar</button><?php endif; ?>
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

    <?php if ($canEdit): ?>
    <div class="modal fade" id="deleteModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Confirmar</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><form method="POST" action="index.php?controller=module&action=index&module=<?php echo e($moduleKey); ?>"><input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>"><input type="hidden" name="intent" value="delete"><input type="hidden" id="delete-id" name="id"><div class="modal-body">¿Deseas continuar?</div><div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="submit">Confirmar</button></div></form></div></div></div>
    <script>document.addEventListener('DOMContentLoaded',function(){var m=document.getElementById('deleteModal');if(!m)return;m.addEventListener('show.bs.modal',function(e){document.getElementById('delete-id').value=e.relatedTarget.getAttribute('data-id');});});</script>
    <?php endif; ?>
</div>
