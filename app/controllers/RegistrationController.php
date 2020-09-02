<?php

class RegistrationController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Registration');
    }
}