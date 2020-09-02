<?php

class MakeReservationController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('MakeReservation');
    }
}