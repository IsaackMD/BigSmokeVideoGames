<?php
use PHPMailer\PHPMailer\{PHPMailer,SMTP,Exception};
    
require '../../docs/phpemail/src/PHPMailer.php';
require '../docs/phpemail/src/SMTP.php';
require '../../docs/phpemail/src/Exception.php';

$mail = new PHPMailer();

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        //Enable verbose debug output
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Port       = 465;
    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

    $mail->SMTPAuth   = true;

    $email = 'bigsmokevideogames@gmail.com'; 
    $mail->Username   =  $email;                 //SMTP username
    $mail->Password   = 'dcie ezcs cvhf nbnk';                               //SMTP password

    //Recipients
    $mail->setFrom($email, 'Big-Smoke Corps');
    $mail->addAddress($emailClient, $nom);     //Add a recipient
//Optional name

    $mail->Subject = 'Correo de Confirmación de Compra';
    //Content

    $mail->isHTML(true); 
    $mail->CharSet = 'UTF-8'; 
    $body=  '<h3>El Numero de la transacción es: <b>'.$id_transaccion.'</b></h3>';
    $body.= '<p>Monto De La Compra <b>'.$monto.'</b></p>';                               //Set email format to HTML
    $mail->Body    = $body;
    $mail->AltBody = 'Muchas Gracias Por Tu Compra';

    if(!$mail->send()){
        throw new Exception($mail->ErrorInfo);
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit;
}









?>