<?php

class ResetPasswordController extends Controller
{
    private $mailer;
    private $options;

    public function __construct($db = null)
    {
        $this->model = new ResetPasswordModel($db);
        $PHPMailer = new PHPMailer\PHPMailer\PHPMailer();
        $this->mailer = new Mailer($PHPMailer);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->postProcess();
        $this->options['errors'] = $this->errors;
        $this->options['confirmations'] = $this->confirmations;
        echo $this->twig->render('Main.php', [
            'content' => 'ResetPassword.php',
            'url' => _BASE_URL_,
            'menu' => $this->menu,
            'options' => $this->options
        ]);
    }

    private function postProcess()
    {
        if(isset($_POST['reset']))
        {
            $this->resetProcess();
        }
    }

    private function resetProcess()
    {
        if(isset($_POST['userEmail'])) {
            $userEmail = $_POST['userEmail'];
            if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                return $this->errors[] = "To nie jest adres e-mail!";
            }
            if(!$this->model->emailAddressExists($userEmail)) {
                return $this->errors[] = "Konto dla podanego adresu email nie istnieje!";
            }
            $vkey = md5(time().$_POST['userEmail']);
            if(!$this->model->updateVerificationKey($vkey, $_POST['userEmail'])) {
                return $this->errors[] = "Nie udało się zaktualizować klucza!";
            }
            if(!$this->mailer->sendResetMessage($userEmail, $vkey)) {
                return $this->errors[] = "Nie udało się wysłać wiadomości z kluczem aktywacyjnym!";
            }
            $this->confirmations[] = "Na podany adres wysłano wiadomość.";
        }
    }

    public function insertNewPassword($vkey)
    {
        $this->options['vkey'] = $vkey;
        echo $this->twig->render('Main.php', [
            'url' => _BASE_URL_,
            'menu' => $this->menu,
            'options' => $this->options,
            'content' => 'InsertNewPassword.php'
        ]);
    }

    public function setNewPassword()
    {
        $this->updatePasswordProccess();
        $this->options['errors'] = $this->errors;
        $this->options['confirmations'] = $this->confirmations;
        echo $this->twig->render('Main.php', [
            'content' => 'Index.php',
            'menu' => $this->menu,
            'url' => _BASE_URL_,
            'options' => $this->options
        ]);

    }

    private function updatePasswordProccess()
    {
        if(!isset($_POST['vkey'])) {
            return $this->errors[] = "Nie podano klucza weryfikacyjnego!";
        }
        $vkey = $_POST['vkey'];
        if(isset($_POST['setNewPassword']))
        {
            if(!$this->isNewPasswordOk()) {
                return $this->errors[] = "Podane hasła są różne!";
            }
            if(!$this->model->setNewPassword($_POST['newPassword'], $vkey, "tajny klucz")) {
                return $this->errors[] = "Nie ustawiono nowego hasła!";
            }
            return $this->confirmations[] = "Ustawiono nowe hasło.";
        }
    }

    private function isNewPasswordOk()
    {
        return (bool) ($_POST['newPassword']===$_POST['newPasswordValidate']);
    }
}