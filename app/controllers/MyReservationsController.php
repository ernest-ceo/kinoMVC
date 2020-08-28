<?php

class MyReservationsController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/MyReservations.php';
        $this->renderer->render('Main', $content);
    }
}