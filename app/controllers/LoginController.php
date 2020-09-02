<?php

class LoginController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Login');
    }
}