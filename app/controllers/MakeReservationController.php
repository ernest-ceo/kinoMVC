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
        echo $this->twig->render('Main.php', [
            'content' => 'MakeReservation.php',
            'menu' => $this->menu,
            'url' => _BASE_URL_
        ]);
    }

    public function showFreeSeats(int $showID)
    {
        if($this->isBanned())
            header('location: '._BASE_URL_.'repertoire');

        $this->options['errors'] = $this->errors;
        $this->options['confirmations'] = $this->confirmations;
        $this->options['freeSeats'] = $this->model->getUntakenSeats($showID);
        $this->options['show_id'] = $showID;
        echo $this->twig->render('Main.php', [
            'content' => 'Reservation.php',
            'options' => $this->options,
            'menu' => $this->menu,
            'url' => _BASE_URL_
        ]);
    }

    public function bookASeat($seatID, $showID)
    {
        if($this->isBanned())
            header('location: '._BASE_URL_.'repertoire');

        $resvkey = md5(time().$_SESSION['username']);

        if(!$this->mailer->sendReservationConfirmationMessage($_SESSION['user_email'], $resvkey)) {
            return $this->errors[] = "Wystąpił problem z wysłaniem wiadomości email!";
        }
        if(!$this->model->bookASeat($seatID, $showID, $_SESSION['username'], $resvkey)) {
             return $this->errors[] = "Nie udało się zarezerwować miejsca!";
        }
        $this->model->insertReservationItemToReservationsHistory($seatID, $showID, $_SESSION['username']);
        $this->confirmations[] = "Wysłano wiadomość email. Prosimy o potwierdzenie rezerwacji.";
        $this->showFreeSeats($showID);
    }

    public function confirm($resvkey)
    {
        $this->confirmationProcess($resvkey);
        $this->options['errors'] = $this->errors;
        $this->options['confirmations'] = $this->confirmations;
        echo $this->twig->render('Main.php', [
            'content' => 'Index.php',
            'url' => _BASE_URL_,
            'menu' => $this->menu,
            'options' => $this->options
        ]);
    }

    private function confirmationProcess($resvkey)
    {
        if(!$this->model->verifyReservation($resvkey))
        {
            return $this->errors[] = "Rezerwacja nie istnieje!";
        }
        return $this->confirmations[] = "Dziękujemy za potwierdzenie rezerwacji!";
    }
}