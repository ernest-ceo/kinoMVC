<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer
{

    public $mailer;
    public $users;
//    private const ROOT_URL = "http://bd19587.wsbpoz.solidhost.pl/kino/" ;
    private const ROOT_URL = "http://localhost/kino/" ;
//    private const ROOT_URL = "http://localhost/GitHub/kino/" ;

    /**
     * Mailer constructor.
     * @param PHPMailer $mailer
     * This method sets parameters for external e-mail account from which messages are being sent
     */
    public function __construct(PHPMailer $mailer)
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
//            $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->isSMTP();
//            $this->mailer->Host = 'mail.bd19587.wsbpoz.solidhost.pl';
//            $this->mailer->Username = 'projektkinowsb@bd19587.wsbpoz.solidhost.pl';
//            $this->mailer->Password = 'projektkinoWSB1!';
            $this->mailer->Host = 'smtp.mailtrap.io';
            $this->mailer->Username = '20f99de4000faa';
            $this->mailer->Password = '0a882300f33477';
            $this->mailer->SMTPAuth = true;
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
        } catch (Exception $e) {
            $_SESSION['info'] = "<p class='text-center text-danger table-dark'>Nie udało się poprawnie zainicjować obiektu klasy Mailer.</p>";
        }
    }

    /**
     * @param string $receiver
     * @param string $verificationKey
     * @return bool
     * This method is responsible for sending account activation message to the user who has just registered
     */
    public function sendAccountActivationMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('projektkinowsb@bd19587.wsbpoz.solidhost.pl', 'Kino');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Aktywacja konta';
            $body = '<p>Witaj,</p><p>możesz teraz aktywować konto klikając w link.</p><a href="'.self::ROOT_URL.'aktywacja.php?vkey=' . $verificationKey . '">Aktywuj konto</a>';
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            $_SESSION['info'] = "<p class='text-center text-danger table-dark'>Wiadomość nie została wysłana!</p>";
            return false;
        }
    }

    /**
     * @param string $receiver
     * @param string $verificationKey
     * @return bool
     * This method is responsible for sending the password reset message in case user forgot the password
     */
    public function sendTheResetMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('projektkinowsb@bd19587.wsbpoz.solidhost.pl', 'Kino');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Aktualizacja hasła';
            $body = '<p>Witaj,</p><p>możesz ustawić nowe hasło klikając w link.</p><a href="'.self::ROOT_URL.'reset.php?vkey=' . $verificationKey . '">Ustaw nowe hasło</a>';
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            $_SESSION['info'] = "<p class='text-center text-danger table-dark'>Wiadomość nie została wysłana!</p>";
            return false;
        }
    }

    /**
     * @param string $receiver
     * @param string $verificationKey
     * @return bool
     * This method is responsible for sending reservation confirmation message in case user has made a reservation
     */
    public function sendReservationConfirmationMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('projektkinowsb@bd19587.wsbpoz.solidhost.pl', 'Kino');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Potwierdzenie rezerwacji';
            $body = '<p>Witaj,</p><p>możesz teraz potwierdzić rezerwację klikając w link.</p><a href="'.self::ROOT_URL.'aktywacja.php?resvkey=' . $verificationKey . '">Potwierdź rezerwację</a>';
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