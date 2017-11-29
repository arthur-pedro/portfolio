
<?php
   



$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



function pegaValor($valor) {
    return isset($_POST[$name]) ? $_POST[$name] : '';
}

function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}



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

    $from = "arthurpedroweb@gmail.com";

    $mail->setFrom($from, 'suporte');
    $mail->addAddress($from, $name);     // Add a recipient

    /*//Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $name;
    $mail->Body    = 'Email enviado de '.$email.' para '.$from.'<br /><br />'.$message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    
    header("Location: /HTML/portfolio/email_enviado.html");

  

} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


?>

