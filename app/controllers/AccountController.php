<?php

class AccountController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Account');
    }
}