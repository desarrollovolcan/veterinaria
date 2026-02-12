<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../Models/UsuarioModel.php';
require_once __DIR__ . '/../Models/RolModel.php';
require_once __DIR__ . '/../Models/PermisoModel.php';

class ConfiguracionController extends BaseController
{
    private UsuarioModel $usuarioModel;
    private RolModel $rolModel;
    private PermisoModel $permisoModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->rolModel = new RolModel();
        $this->permisoModel = new PermisoModel();
    }

    public function usuarios(): void
    {
        $this->handleUsuarioActions();

        $this->render('configuracion/usuarios', [
            'pageTitle' => 'Configuración / Usuarios',
            'usuarios' => $this->usuarioModel->all(),
            'roles' => $this->rolModel->all(),
        ]);
    }

    public function roles(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            if ($action === 'create') {
                $this->rolModel->create(trim($_POST['nombre'] ?? ''), trim($_POST['descripcion'] ?? ''));
            }
            if ($action === 'delete') {
                $this->rolModel->delete((int)($_POST['id'] ?? 0));
            }
            $this->redirect('index.php?controller=configuracion&action=roles');
        }

        $this->render('configuracion/roles', [
            'pageTitle' => 'Configuración / Roles',
            'roles' => $this->rolModel->all(),
        ]);
    }

    public function permisos(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            if ($action === 'create') {
                $this->permisoModel->create(trim($_POST['nombre'] ?? ''), trim($_POST['descripcion'] ?? ''));
            }
            if ($action === 'delete') {
                $this->permisoModel->delete((int)($_POST['id'] ?? 0));
            }
            $this->redirect('index.php?controller=configuracion&action=permisos');
        }

        $this->render('configuracion/permisos', [
            'pageTitle' => 'Configuración / Permisos',
            'permisos' => $this->permisoModel->all(),
        ]);
    }

    private function handleUsuarioActions(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $action = $_POST['action'] ?? '';

        if ($action === 'create') {
            $this->usuarioModel->create(
                trim($_POST['usuario'] ?? ''),
                trim($_POST['nombre'] ?? ''),
                trim($_POST['email'] ?? ''),
                trim($_POST['password'] ?? ''),
                (int)($_POST['rol_id'] ?? 0)
            );
        }

        if ($action === 'update') {
            $this->usuarioModel->update(
                (int)($_POST['id'] ?? 0),
                trim($_POST['nombre'] ?? ''),
                trim($_POST['email'] ?? ''),
                (int)($_POST['rol_id'] ?? 0),
                isset($_POST['activo']) ? 1 : 0
            );
        }

        if ($action === 'delete') {
            $this->usuarioModel->delete((int)($_POST['id'] ?? 0));
        }

        $this->redirect('index.php?controller=configuracion&action=usuarios');
    }
}
