<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';
require_once '../app/models/UserModel.php';

use App\Models\UserModel;

class AdminUsersController extends BaseController
{
    public function index()
    {
        requireRole(1); // admin seulement

        $model = new UserModel();
        $users = $model->getAll();

        return $this->render('admin/users/index', ['users' => $users]);
    }

    public function create()
    {
        requireRole(1);
        return $this->render('admin/users/create');
    }

    public function store()
    {
        requireRole(1);

        $firstname = trim($_POST['firstname'] ?? '');
        $lastname = trim($_POST['lastname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role_id = (int)($_POST['role_id'] ?? 3);
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        // validation rudimentaire
        $errors = [];
        if (strlen($firstname) < 2) $errors[] = 'Prénom trop court';
        if (strlen($lastname) < 2) $errors[] = 'Nom trop court';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email invalide';
        if (empty($password) || strlen($password) < 8) $errors[] = 'Mot de passe invalide (8+ chars)';

        if (!empty($errors)) {
            return $this->render('admin/users/create', ['errors' => $errors]);
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $model = new UserModel();
        $model->createUser([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $passwordHash,
            'role_id' => $role_id,
            'is_active' => $is_active
        ]);

        header('Location: /admin/users/index');
        exit;
    }

    public function edit($id)
    {
        requireRole(1);

        $model = new UserModel();
        $user = $model->findById((int)$id);

        if (!$user) {
            http_response_code(404);
            echo '404 - Utilisateur non trouvé';
            return;
        }

        return $this->render('admin/users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        requireRole(1);

        $firstname = trim($_POST['firstname'] ?? '');
        $lastname = trim($_POST['lastname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? null; // facultatif
        $role_id = (int)($_POST['role_id'] ?? 3);
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        // validation minimale
        $errors = [];
        if (strlen($firstname) < 2) $errors[] = 'Prénom trop court';
        if (strlen($lastname) < 2) $errors[] = 'Nom trop court';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email invalide';

        if (!empty($errors)) {
            return $this->render('admin/users/edit', ['errors' => $errors, 'user' => $_POST]);
        }

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'role_id' => $role_id,
            'is_active' => $is_active
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $model = new UserModel();
        $model->updateUser((int)$id, $data);

        header('Location: /admin/users/index');
        exit;
    }

    public function delete($id)
    {
        requireRole(1);

        // éviter suppression de soi-même
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == (int)$id) {
            http_response_code(403);
            echo 'Vous ne pouvez pas supprimer votre propre compte.';
            return;
        }

        $model = new UserModel();
        $model->deleteUser((int)$id);

        header('Location: /admin/users/index');
        exit;
    }
}
