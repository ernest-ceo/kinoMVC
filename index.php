<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'src/Core/Database/Database.php';
require_once 'src/Core/Mailer/Mailer.php';
require_once 'app/controllers/Controller.php';
require_once 'app/controllers/AccountController.php';
require_once 'app/controllers/ActivationController.php';
require_once 'app/controllers/IndexController.php';
require_once 'app/controllers/LoginController.php';
require_once 'app/controllers/MakeReservationController.php';
require_once 'app/controllers/MyReservationsController.php';
require_once 'app/controllers/RegistrationController.php';
require_once 'app/controllers/RepertoireController.php';
require_once 'app/controllers/ReservationController.php';
require_once 'app/controllers/ResetPasswordController.php';
require_once 'app/controllers/ShowsController.php';
require_once 'app/controllers/UsersController.php';
//require_once 'classes/Bootstrap.php';
require_once 'classes/Renderer.php';
require_once 'config/session.php';

use PHPMailer\PHPMailer\PHPMailer;

$db = new Database(require_once 'config/database.php');
$PHPMailer = new PHPMailer();
$mailer = new Mailer($PHPMailer);

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
