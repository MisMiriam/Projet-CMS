<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';

class AdminRolesController extends BaseController
{
    public function index()
    {
        requireRole(2);

        // Vue placeholder
        return $this->render('admin/roles/index');
    }
}
