<?php

class ShowsController extends Controller
{
    private $options = array();

    public function __construct($db)
    {
        $this->model = new ShowsModel($db);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->options['filmShows'] = $this->model->getAllFilmShows();
        echo $this->twig->render('Main.php', [
            'welcome' => $this->welcome,
            'menu' => $this->menu,
            'content' => 'Shows.php',
            'url' => _BASE_URL_,
            'options' => $this->options
        ]);
    }

    public function showReservations($showID)
    {
        $this->adminAuth();
        $this->options['reservationsList'] = $this->model->getAllReservationByShowID($showID);
        echo $this->twig->render('Main.php', [
            'welcome' => $this->welcome,
            'content' => 'ReservationsList.php',
            'menu' => $this->menu,
            'url' => _BASE_URL_,
            'options' => $this->options
        ]);
    }
}