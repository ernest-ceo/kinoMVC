<?php

class RegistrationController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Registration.php';
        $this->renderer->render('Main', $content);
    }
}