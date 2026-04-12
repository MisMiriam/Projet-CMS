<?php

require_once 'BaseController.php';

class DesignGuideController extends BaseController
{
    public function index()
    {
        return $this->render('design-guide');
    }
}
