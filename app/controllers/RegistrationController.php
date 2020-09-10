<?php

class RegistrationController extends Controller
{
    public function IndexAction()
    {
        $this->postProcess();
        $this->renderer->render('Main', 'Registration', $this->errors);
    }

    private function postProcess()
    {
        if(isset($_POST['register']))
        {
            if($_POST['username']==="" OR $_POST['newPassword']==="" OR $_POST['newPasswordValidate']==="" OR $_POST['userEmail']==="")
            {
                $this->errors[] = 'Wypełnij wymagane pola!';
            }
        }
    }
}