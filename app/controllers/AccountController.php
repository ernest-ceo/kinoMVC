<?php

class AccountController extends Controller
{
    private $options = array();

    public function __construct($db)
    {
        $this->model = new AccountModel($db);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->options['errors'] = $this->errors;
        $this->options['reservationList'] = $this->loadUserReservationList();
        $this->renderer->render('Main', 'Account', $this->options);
        unset($this->options);
        unset($this->errors);
    }

    public function cancelReservation($reservationID = null)
    {
        if(!$this->model->cancelReservation($reservationID))
            $this->errors[] = "Nie udało się odwołać rezerwacji!";
        $this->options['errors'] = $this->errors;
        $this->options['reservationList'] = $this->loadUserReservationList();
        $this->renderer->render('Main', 'Account', $this->options);
        unset($this->options);
        unset($this->errors);
    }

    private function loadUserReservationList()
    {
        $reservationList = $this->model->loadUserReservationList($_SESSION['user_id']);
        return $reservationList;
    }

    public function deleteAccount()
    {
        if(isset($_POST['deleteUser'])) {
            if(!$this->model->deleteAccount($_SESSION['username'])) {
                $this->errors[] = "Nie udało się usunąć konta!";
                $this->options['errors'] = $this->errors;
                $this->options['reservationList'] = $this->loadUserReservationList();
                $this->renderer->render('Main', 'Account', $this->options);
                unset($this->options);
                unset($this->errors);
                return;
            }
            else {
                $this->renderer->render('Main', 'Index');
                unset($this->options);
                unset($this->errors);
                unset($_SESSION);
                return;
            }
        } else {
            $this->options['errors'] = $this->errors;
            $this->options['reservationList'] = $this->loadUserReservationList();
            $this->renderer->render('Main', 'Account', $this->options);
            unset($this->options);
            unset($this->errors);
            return;
        }
    }
}