<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

class Mail extends CI_Model {

    public function send($to, $subject, $msg) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->SMTPAuth = false;
            $mail->Port = 25;
            $mail->setFrom('samfelgar@gmail.com', 'Samuel Felipe');
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $msg;
            if(!$mail->send()) {
                throw new Exception('Houve um problema no envio do e-mail.');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}