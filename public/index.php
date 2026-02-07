<?php

$controller = $_GET['controller'] ?? 'producto';
$action = $_GET['action'] ?? 'index';

require_once __DIR__ . '/../controllers/ProductoController.php';

$controllerName = ucfirst($controller) . 'Controller';
$ctrl = new $controllerName();

if ($action == "destroy") {
    $ctrl->destroy();
} else {
    $ctrl->$action();
}
