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
        $this->renderer->render('Main', 'Shows', $this->options);
    }

    public function showReservations($showID)
    {
        $this->adminAuth();
        $this->options['reservationsList'] = $this->model->getAllReservationByShowID($showID);
        $this->renderer->render('Main', 'ReservationsList', $this->options);
    }
}