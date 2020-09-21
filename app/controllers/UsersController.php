<?php

class UsersController extends Controller
{
    private $options = array();

    public function __construct($db)
    {
        $this->adminAuth();
        $this->model = new UsersModel($db);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->postProcess();
        $this->options['users'] = $this->getAllUsersForAdmin();
        echo $this->twig->render('Main.php', [
            'welcome' => $this->welcome,
            'menu' => $this->menu,
            'options' => $this->options,
            'content' => 'Users.php',
            'url' => _BASE_URL_
        ]);
    }

    public function getAllUsersForAdmin()
    {
        return $this->model->getAllUsersForAdmin();
    }

    private function postProcess()
    {
        if(isset($_POST['banning'])) {
            $this->model->banUser($_POST['banning']);
        } elseif(isset($_POST['unbanning'])) {
            $this->model->unbanUser($_POST['unbanning']);
        }
    }

    public function showReservationsHistory($id)
    {
        $this->options['reservationsHistory'] = $this->model->getAllReservationsByUserID($id);
        echo $this->twig->render('Main.php', [
            'welcome' => $this->welcome,
            'url' => _BASE_URL_,
            'menu' => $this->menu,
            'content' => 'UserReservations.php',
            'options' => $this->options
        ]);
    }
}