<?php

class MakeReservationController extends Controller
{
    private $options = array();
    private $mailer;

    public function __construct($db)
    {
        $this->auth();
        $this->model = new MakeReservationModel($db);
        $PHPMailer =  new PHPMailer\PHPMailer\PHPMailer();
        $this->mailer = new Mailer($PHPMailer);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->renderer->render('Main', 'MakeReservation');
    }

    public function showFreeSeats(int $showID)
    {
        $this->options['freeSeats'] = $this->model->getUntakenSeats($showID);
        $this->renderer->render('Main', 'Reservation', $this->options);
    }

    public function bookASeat($seatID, $showID)
    {
        $resvkey = md5(time().$_SESSION['username']);

        if($this->mailer->sendReservationConfirmationMessage($_SESSION['user_email'], $resvkey)) {
            $this->model->bookASeat($seatID, $showID, $_SESSION['username'], $resvkey);
            $this->model->insertReservationItemToReservationsHistory($seatID, $showID, $_SESSION['username']);
            $this->showFreeSeats($showID);
        }
    }
}