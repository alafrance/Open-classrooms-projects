<?php
    require '../vendor/autoload.php';
    session_start();
    $router = new Config\Alexis\Router();
    $router->run();
?>