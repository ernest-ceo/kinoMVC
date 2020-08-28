<?php

class ReservationController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Reservation.php';
        $this->renderer->render('Main', $content);
    }
}