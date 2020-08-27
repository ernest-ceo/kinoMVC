<?php
declare(strict_types=1);
require_once 'app/controllers/Controller.php';
require_once 'config/session.php';
require_once 'config/menu.php';
// require_once ('Routes.php');


// if(isset($_GET['url']))
// $class_name = $_GET['url'];
// $class_name = ucfirst($class_name);

// function __autoload($class_name)
// {
//     if (file_exists('./classes/'.$class_name.'.php'))
//         require_once './classes/'.$class_name.'.php';
//     elseif (file_exists('./controllers'.$class_name.'.php'))
//         require_once './controllers/'.$class_name.'.php';
// }

if(isset($_GET['controller']))
{
    if($_GET['controller'] == 'index' OR $_GET['controller'] == 'index.php')
        $controllerName = 'Index';
    elseif($_GET['controller'] == 'aktywacja')
        $controllerName = 'Activation';
    elseif($_GET['controller'] == 'konto')
        $controllerName = 'Account';
    elseif($_GET['controller'] == 'mojerezerwacje')
        $controllerName = 'MyReservations';
    elseif($_GET['controller'] == 'repertuar')
        $controllerName = 'Repertoire';
    elseif($_GET['controller'] == 'reset')
        $controllerName = 'ResetPassword';
    elseif($_GET['controller'] == 'rezerwacja')
        $controllerName = 'Reservation';
    elseif($_GET['controller'] == 'seanse')
        $controllerName = 'Shows';
    elseif($_GET['controller'] == 'uzytkownicy')
        $controllerName = 'Users';
    elseif($_GET['controller'] == 'logowanie')
        $controllerName = 'Login';
    elseif($_GET['controller'] == 'rejestracja')
        $controllerName = 'Registration';
    elseif($_GET['controller'] == 'zarezerwuj')
        $controllerName = 'MakeReservation';
    else
        die('Invalid route');
}

if (isset($controllerName) && file_exists('app/controllers/'.$controllerName.'Controller.php')) 
{
    require_once 'app/controllers/'.$controllerName.'Controller.php';
    $controller = $controllerName.'Controller';
    $controller = new $controller();
    $controller->CreateView($controllerName);
}