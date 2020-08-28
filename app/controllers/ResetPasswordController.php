<?php

class ResetPasswordController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/ResetPassword.php';
        $this->renderer->render('Main', $content);
    }
}