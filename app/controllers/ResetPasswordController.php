<?php

class ResetPasswordController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('ResetPassword');
    }
}