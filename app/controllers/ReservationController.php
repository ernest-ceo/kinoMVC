<?php

class ReservationController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Reservation');
    }
}