<?php
/**
 * Enviar correos electrónicos con PHP en 10 minutos | PHPMailer
 * https://youtu.be/gfuuohGgD9I
 */

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Se usa de esta forma cuando se tiene Composer instalado
//Load Composer's autoloader
// require 'vendor/autoload.php';

// Se usa de esta forma cuando se descargo el zip de GitHub
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output (0=desctivar debug, 2=activo)
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.paginaswebrr.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'envios@paginaswebrr.com';                     //SMTP username
    $mail->Password   = 'aaaaa';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption (si el sitio tiene CANDADITO usar ssl, si no, usar tls)
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('envios@paginaswebrr.com', 'Paginas Web RyR');
    $mail->addAddress('juan.roldan.zamudio@gmail.com', 'Juancho');     //Add a recipient
    $mail->addAddress('juan.roldan.z@hotmail.com');               //Name is optional
    $mail->addReplyTo('info@paginaswebrr.com', 'Information');
    $mail->addCC('juan.manuel.roldan.garcia@gmail.com');
    $mail->addBCC('angelica.riveramx@gmail.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';       // Texto del mensaje

    // Para que el body se encuentre fuera de este archivo se usa lo siguiente
    $file = fopen("bodyEmails.html", "r");
    $str = fread($file, filesize("bodyEmails.html"));
    $str = trim($str);
    fclose($file);
    $mail->Body    = $str;       // Texto del mensaje

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}