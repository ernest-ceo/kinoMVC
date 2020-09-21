<?php
require_once 'vendor/autoload.php';
require_once 'src/Core/Database/Database.php';
require_once 'classes/Mailer.php';
require_once 'app/controllers/Controller.php';
require_once 'app/controllers/AccountController.php';
require_once 'app/controllers/IndexController.php';
require_once 'app/controllers/LoginController.php';
require_once 'app/controllers/MakeReservationController.php';
require_once 'app/controllers/RegistrationController.php';
require_once 'app/controllers/RepertoireController.php';
require_once 'app/controllers/ResetPasswordController.php';
require_once 'app/controllers/ShowsController.php';
require_once 'app/controllers/UsersController.php';
require_once 'app/models/Model.php';
require_once 'app/models/IndexModel.php';
require_once 'app/models/RepertoireModel.php';
require_once 'app/models/LoginModel.php';
require_once 'app/models/AccountModel.php';
require_once 'app/models/MakeReservationModel.php';
require_once 'app/models/ShowsModel.php';
require_once 'app/models/UsersModel.php';
require_once 'app/models/ResetPasswordModel.php';
require_once 'app/models/RegistrationModel.php';
require_once 'classes/Renderer.php';
require_once 'config/session.php';

$db = new Database(require_once ('config/database.php'));