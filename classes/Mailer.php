<?php


class Mailer
{
    public $mailer;
    public $users;

    public function __construct($mailer)
    {
        $this->mailer=$mailer;
        try {
            $this->mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isSMTP();
//            $this->mailer->Host = 'mail.bd19587.wsbpoz.solidhost.pl';
//            $this->mailer->Username = 'projektkinowsb@bd19587.wsbpoz.solidhost.pl';
//            $this->mailer->Password = 'projektkinoWSB1!';
            $this->mailer->Host = 'smtp.mailtrap.io';
            $this->mailer->Username = '20f99de4000faa';
            $this->mailer->Password = '0a882300f33477';
            $this->mailer->SMTPAuth = true;
            $this->mailer->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
        } catch (Exception $e) {
            $_SESSION['info'] = "Nie udało się poprawnie zainicjować obiektu klasy Mailer.";
        }
    }

    public function sendAccountActivationMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('projektkinowsb@bd19587.wsbpoz.solidhost.pl', 'Kino');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Aktywacja konta';
            $body = '<p>Witaj,</p><p>możesz teraz aktywować konto klikając w link.</p><a href="'._BASE_URL_.'Registration/activate/' . $verificationKey . '">Aktywuj konto</a>';
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            $_SESSION['info'] = "<p class='text-center text-danger table-dark'>Wiadomość nie została wysłana!</p>";
            return false;
        }
    }

    public function sendResetMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('projektkinowsb@bd19587.wsbpoz.solidhost.pl', 'Kino');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Aktualizacja hasła';
            $body = '<p>Witaj,</p><p>możesz ustawić nowe hasło klikając w link.</p><a href="'._BASE_URL_.'ResetPassword/insertNewPassword/' . $verificationKey . '">Ustaw nowe hasło</a>';
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            $_SESSION['info'] = "<p class='text-center text-danger table-dark'>Wiadomość nie została wysłana!</p>";
            return false;
        }
    }

    public function sendReservationConfirmationMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('projektkinowsb@bd19587.wsbpoz.solidhost.pl', 'Kino');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Potwierdzenie rezerwacji';
            $body = '<p>Witaj,</p><p>możesz teraz potwierdzić rezerwację klikając w link.</p><a href="'._BASE_URL_.'MakeReservation/confirm/' . $verificationKey . '">Potwierdź rezerwację</a>';
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            $_SESSION['info'] = "<p class='text-center text-danger table-dark'>Wiadomość nie została wysłana!</p>";
            return false;
        }
    }
}