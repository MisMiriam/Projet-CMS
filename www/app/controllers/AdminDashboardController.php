<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';

class AdminDashboardController extends BaseController
{
    public function index()
    {
        requireRole(2); // les admin ET les éditeurs ont accès à cette page
        return $this->render('admin/dashboard');
    }
}
