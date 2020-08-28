<?php

class LoginController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Login.php';
        $this->renderer->render('Main', $content);
    }
}