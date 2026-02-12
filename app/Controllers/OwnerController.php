<?php

class OwnerController extends BaseController
{
    private Owner $model;

    public function __construct()
    {
        $this->model = new Owner();
    }

    public function index(): void
    {
        if (!Auth::can('owners.view')) {
            http_response_code(403);
            echo 'Sin permisos para ver propietarios';
            return;
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf_token'] ?? null)) {
                $errors['general'] = 'Token de seguridad inválido.';
            } else {
                $intent = $_POST['intent'] ?? 'create';
                if ($intent === 'delete') {
                    $this->handleDelete($errors);
                } else {
                    $this->handleSave($errors);
                }
            }
        }

        $page = max(1, (int) ($_GET['page'] ?? 1));
        $perPage = 10;
        $filters = [
            'q' => trim((string) ($_GET['q'] ?? '')),
            'estado' => trim((string) ($_GET['estado'] ?? '')),
        ];

        $result = $this->model->paginate($filters, $page, $perPage);
        $totalPages = max(1, (int) ceil($result['total'] / $perPage));

        $editingOwner = null;
        if (!empty($_GET['edit'])) {
            $editingOwner = $this->model->find((int) $_GET['edit']);
        }

        $this->render('owners/index', [
            'owners' => $result['data'],
            'filters' => $filters,
            'page' => $page,
            'totalPages' => $totalPages,
            'errors' => $errors,
            'editingOwner' => $editingOwner,
            'success' => flash('success'),
            'error' => flash('error'),
        ]);
    }

    private function handleSave(array &$errors): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = [
            'rut' => trim((string) ($_POST['rut'] ?? '')),
            'nombre_completo' => trim((string) ($_POST['nombre_completo'] ?? '')),
            'telefono' => trim((string) ($_POST['telefono'] ?? '')),
            'email' => trim((string) ($_POST['email'] ?? '')),
            'direccion' => trim((string) ($_POST['direccion'] ?? '')),
            'observacion' => trim((string) ($_POST['observacion'] ?? '')),
            'estado' => ($_POST['estado'] ?? 'ACTIVO') === 'INACTIVO' ? 'INACTIVO' : 'ACTIVO',
        ];

        if ($data['nombre_completo'] === '') {
            $errors['nombre_completo'] = 'El nombre completo es obligatorio.';
        }
        if ($data['telefono'] === '') {
            $errors['telefono'] = 'El teléfono es obligatorio.';
        }
        if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El email tiene formato inválido.';
        }

        if ($errors) {
            flash('error', 'Corrige los errores del formulario para continuar.');
            return;
        }

        $actorId = (int) (Auth::user()['id'] ?? 0);

        if ($id > 0) {
            if (!Auth::can('owners.edit')) {
                flash('error', 'No tienes permisos para editar propietarios.');
                $this->redirect('index.php?controller=owners&action=index');
            }
            $this->model->update($id, $data, $actorId);
            flash('success', 'Propietario actualizado correctamente.');
        } else {
            if (!Auth::can('owners.create')) {
                flash('error', 'No tienes permisos para crear propietarios.');
                $this->redirect('index.php?controller=owners&action=index');
            }
            $this->model->create($data, $actorId);
            flash('success', 'Propietario creado correctamente.');
        }

        $this->redirect('index.php?controller=owners&action=index');
    }

    private function handleDelete(array &$errors): void
    {
        if (!Auth::can('owners.delete')) {
            flash('error', 'No tienes permisos para inactivar propietarios.');
            $this->redirect('index.php?controller=owners&action=index');
        }

        $id = (int) ($_POST['id'] ?? 0);
        if ($id <= 0) {
            $errors['general'] = 'No se recibió un ID válido para inactivar.';
            return;
        }

        $this->model->softDelete($id, (int) (Auth::user()['id'] ?? 0));
        flash('success', 'Propietario inactivado correctamente.');
        $this->redirect('index.php?controller=owners&action=index');
    }
}
