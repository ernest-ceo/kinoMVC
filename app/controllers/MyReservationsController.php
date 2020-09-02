<?php

class MyReservationsController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('MyReservations');
    }
}