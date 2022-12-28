<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('./vendor/autoload.php');
//utilser une dependance
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
//les dependances
require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

//creer une instance de mailer

$mail = new PHPMailer(false);//capturer les erreurs des requettes




try {

    //configuration du serveur

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();//envoyer le mail avec smtp
    $mail->Host =   'smtp.gmail.com';
    $mail->SMTPAuth = true;//activer authentification smtp
    $mail->Username = 'pounguisimeon@gmail.com';
    $mail->Password = 'hdlgbptztxzkttwr';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;


//receveur
    $mail->setFrom('simeonpoungui@gmail.com','simeon');
    $mail->addAddress('neldynicha@gmail.com','neldy');

//contenu
    $mail->isHTML(true);
    $mail->Subject = "sable";
    $mail->Body = "neldy sable ahhhhhhhhh";

    if($mail->send()){

        $message = 'mail bien envoye';
        header('Location:succes.php?message='.$message);

    }else{

        $message = 'mail mal envoye';
        header('Location:succes.php?message='.$message);
    }
    
} catch (Exception $e) {

    $er = $mail->ErrorInfo;
    echo 'imposible d\envoyer le mail'.' '.$er;

}



?>