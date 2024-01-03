<?php

namespace App\src\controller;
use App\config\View;

class ErrorController extends Controller {
    public function errorNotFound()
    {
        require '../view/error/error_404.php';
    }

    public function errorServer()
    {
        require '../view/error/error_500.php';
    }
}

