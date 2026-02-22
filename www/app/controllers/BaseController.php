<?php

abstract class BaseController
{
    protected function render($view, $data = [])
    {
        extract($data);
        require "../app/views/$view.php";
    }
}
