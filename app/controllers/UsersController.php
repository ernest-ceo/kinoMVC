<?php

class UsersController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Users');
    }
}