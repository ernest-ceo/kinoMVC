<?php

class AccountController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Account.php';
        $this->renderer->render('Main', $content);
    }
}