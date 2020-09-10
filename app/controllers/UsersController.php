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
        $this->renderer->render('Main', 'Users', $this->options);
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
        $this->renderer->render('Main', 'UserReservations', $this->options);
    }
}