<?php

class ResetPasswordController extends Controller
{
    public function IndexAction()
    {
        $this->postProcess();
        $this->renderer->render('Main', 'ResetPassword');
    }

    private function postProcess()
    {
        if(isset($_POST['reset']))
        {
            $userEmail = $_POST['userEmail'];
            if(filter_var($userEmail, FILTER_VALIDATE_EMAIL))
            {
                
            }
        }
    }
}