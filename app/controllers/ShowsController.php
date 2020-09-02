<?php

class ShowsController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Shows');
    }
}