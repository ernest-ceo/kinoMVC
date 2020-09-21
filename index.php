<?php
declare(strict_types=1);
require_once 'settings.php';

const DEFAULT_CONTROLLER = 'Index';

$controllerName = DEFAULT_CONTROLLER;

if (isset($_GET['controller']) && $_GET['controller'] != '') {
    $controllerName = $_GET['controller'];
}
$controllerName = ucfirst($controllerName) . 'Controller';

$filename = 'app/controllers/' . $controllerName . '.php';

if (file_exists($filename)) {
        $controller = new $controllerName($db);
} else {
    die('404');
}