<?php
   


$name = $_POST['name'];
$email = $_POST['email'];


require_once("/opt/NetMake/v9/wwwroot/HTML/portfolio/PHPMailer/class.phpmailer.php");

$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'a.santos@netmake.com.br';                 // SMTP username
    $mail->Password = '1772004516Ap';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients

    $from = "a.santos@netmake.com.br";

    $mail->setFrom($from, 'Arthur Pedro');
    $mail->addAddress($from, $name);     // Add a recipient

    /*//Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contato';
    $mail->Body    = 'Email enviado de '.$email.' para '.$from;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


?>