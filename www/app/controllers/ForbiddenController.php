<?php

require_once 'BaseController.php';

class ForbiddenController extends BaseController
{
    public function index()
    {
        http_response_code(403);
        return $this->render('forbidden');
    }
}
