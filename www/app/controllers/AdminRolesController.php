<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';
require_once '../app/models/RoleModel.php';
require_once '../app/models/UserModel.php';

use App\Models\RoleModel;
use App\Models\UserModel;

class AdminRolesController extends BaseController
{
    public function index()
    {
        requireRole(1); // admin seulement

        $model = new RoleModel();
        try {
            $roles = $model->getAll();
        } catch (\PDOException $e) {
            // Afficher une vue d'erreur conviviale avec instructions pour créer la table
            $message = 'La table des rôles est introuvable ou une erreur de base de données est survenue. Veuillez exécuter le fichier sql/schema.sql pour créer les tables requises.';
            return $this->render('admin/roles/error', ['message' => $message, 'exception' => $e]);
        }

        return $this->render('admin/roles/index', ['roles' => $roles]);
    }

    public function create()
    {
        requireRole(1);
        return $this->render('admin/roles/create');
    }

    public function store()
    {
        requireRole(1);

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');

        $errors = [];
        if ($name === '') $errors[] = 'Le nom du rôle est requis.';

        if (!empty($errors)) {
            return $this->render('admin/roles/create', ['errors' => $errors]);
        }

        $model = new RoleModel();
        $model->create(['name' => $name, 'description' => $description]);

        header('Location: /admin/roles');
        exit;
    }

    public function edit($id)
    {
        requireRole(1);

        $model = new RoleModel();
        $role = $model->findById((int)$id);
        if (!$role) {
            http_response_code(404);
            echo '404 - Rôle introuvable';
            return;
        }

        return $this->render('admin/roles/edit', ['role' => $role]);
    }

    public function update($id)
    {
        requireRole(1);

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');

        $errors = [];
        if ($name === '') $errors[] = 'Le nom du rôle est requis.';

        if (!empty($errors)) {
            return $this->render('admin/roles/edit', ['errors' => $errors, 'role' => ['id_role' => $id, 'name' => $name, 'description' => $description]]);
        }

        $model = new RoleModel();
        $model->update((int)$id, ['name' => $name, 'description' => $description]);

        header('Location: /admin/roles');
        exit;
    }

    public function delete($id)
    {
        requireRole(1);

        $userModel = new UserModel();
        $count = $userModel->countByRole((int)$id);
        if ($count > 0) {
            // Retourner message d'erreur simple
            http_response_code(400);
            echo 'Impossible de supprimer ce rôle : il est attribué à des utilisateurs.';
            return;
        }

        $model = new RoleModel();
        $model->delete((int)$id);

        header('Location: /admin/roles');
        exit;
    }
}
