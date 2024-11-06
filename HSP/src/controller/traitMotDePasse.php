<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit-reset"])){
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';


    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $lien = "http://hsp-projet/HSP/vue/auth/nouveauMotDePasse.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $temps = date("U") + 1800;

    $ins = new Utilisateur([
        'email' => $_POST['email'],
        'token' => $token,
        'selector' => $selector,
        'temp' => $temps
    ]);

    $ins->PasswordTokenDel();
    $ins->PasswordTokenIns();

    $receveur = $_POST['email'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
    require 'C:\Users\FAYE Victor\Desktop\Programation\HSP-Projet\HSP\vendor\autoload.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'phpmailprs@gmail.com';                     //SMTP username
        $mail->Password = 'pyyf dfrp anmu hqby';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('phpmailprs@gmail.com', 'HSP');
        $mail->addAddress($receveur, 'Client');     //Add a recipient
        $mail->addReplyTo('phpmailprs@gmail.com', 'Client Reply');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reinitialiser du mot de passe HSP';
        $mail->Body = 'Voici le lien pour réinitialiser votre mot de passe HSP
                       Lien : <a href="' . $lien . '">' . $lien . '</a>';
        $mail->AltBody = '';

        $mail->send();
        header("Location:/HSP/vue/auth/motDePasse.php?reset=success");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
else{
    header("Location:/HSP/index.php");

}