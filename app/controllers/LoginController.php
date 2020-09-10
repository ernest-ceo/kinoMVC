<?php

class LoginController extends Controller
{
    private $options = array();
    protected $model;

    public function __construct($db = null)
    {
        $this->model = new LoginModel($db);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->postProcess();
        $this->options['errors'][] = $this->errors;
        if(isset($_SESSION['username'])) {
            header('location: '._BASE_URL_.'index');
            die();
        }
        $this->renderer->render('Main', 'Login', $this->options);
    }

    public function postProcess()
    {
        if(isset($_POST['logIn']))
        {
            if(isset($_POST['username']))
                $username = $_POST['username'];
            if(!$this->validate($username))
                return $this->errors = "Wprowadzono nieprawidłową nazwę użytkownika!";

            if(isset($_POST['password']))
                $password = $_POST['password'];
            if(!$this->validate($password))
                return $this->errors = "Wprowadzono nieprawidłowe hasło!";

            if(!$userData = $this->model->tryToLogIn($username, $password, "tajny klucz"))
                return $this->errors = "Wprowadzono niepoprawne dane!";

            $_SESSION['username'] = $userData['username'];
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['is_admin'] = $userData['is_admin'];
            $_SESSION['user_email'] = $userData['email'];
        }
    }

    public function validate($username)
    {
        if(empty($username))
            return false;
        if($username != strip_tags($username))
            return false;
        return true;
    }

    public function logout()
    {
        session_destroy();
        header('location: '._BASE_URL_.'index');
    }
}