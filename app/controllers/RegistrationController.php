<?php

class RegistrationController extends Controller
{
    private $options = array();
    private $mailer;

    public function __construct($db = null)
    {
        $this->model = new RegistrationModel($db);
        $PHPMailer = new \PHPMailer\PHPMailer\PHPMailer();
        $this->mailer = new Mailer($PHPMailer);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->postProcess();
        $this->options['errors'] = $this->errors;
        $this->options['confirmations'] = $this->confirmations;
        echo $this->twig->render('Main.php', array(
            'welcome' =>$this->welcome,
            'content' => 'Registration.php',
            'menu' => $this->menu,
            'url' => _BASE_URL_
        ));
    }

    private function postProcess()
    {
        if(isset($_POST['register']))
        {
            if($_POST['username']==="" OR $_POST['newPassword']==="" OR $_POST['newPasswordValidate']==="" OR $_POST['userEmail']==="") {
                return $this->errors[] = 'Wypełnij wymagane pola!';
            }
            if($this->model->userExists($_POST['username'])) {
                return $this->errors[] = "Użytkownik o podanej nazwie już istnieje!";
            }
            if($this->model->emailTaken($_POST['userEmail'])) {
                return $this->errors[] = "Dla podanego adresu email istnieje konto!";
            }
            if(!$this->isNewPasswordOk($_POST['newPassword'], $_POST['newPasswordValidate'])) {
                return $this->errors[] = "Podane hasła nie są jednakowe!";
            }
            $vkey = md5(time().$_POST['username']);
            if(!$this->mailer->sendAccountActivationMessage($_POST['userEmail'], $vkey)) {
                return $this->errors[] = "Nie udało się wysłać wiadomości aktywacyjnej!";
            }
            if(!$this->model->addNewUser($_POST['username'], $_POST['newPassword'], "tajny klucz", $_POST['userEmail'], $vkey)) {
                return $this->errors[] = "Nie udało się dodać użytkownika!";
            }
            return $this->confirmations[] = "Dodano nowego użytkownika. Link aktywacyjny został wysłany na podany adres email.";
        }
    }

    public function activate($vkey)
    {
        if(!$this->model->verifyAccount($vkey)) {
            $this->errors[] = "Weryfikacja konta nie powiodła się!";
        } else {
            $this->confirmations[] = "Konto zweryfikowano pomyślnie.";
        }
        $this->options['errors'] = $this->errors;
        $this->options['confirmations'] = $this->confirmations;
        $this->renderer->render('Main', 'Login', $this->options);
    }

    private function isNewPasswordOk($newPassword, $newPasswordValidate)
    {
        return (bool) ($newPassword===$newPasswordValidate);
    }
}