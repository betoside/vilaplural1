<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

$nome = trim(filter_input(INPUT_POST, 'nome'));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$assunto = trim(filter_input(INPUT_POST, 'assunto'));
$mensagem = trim(filter_input(INPUT_POST, 'mensagem'));

if($nome && $email && $assunto && $mensagem){
    
    // echo 'NOME: ' . $nome . '<br>';
    // echo 'EMAIL: ' . $email . '<br>';
    // echo 'ASSUNTO: ' . $assunto . '<br>';
    // echo 'MENSAGEM: ' . nl2br($mensagem) . '<br>';
    // die;
    
    // if(file_exists("/home1/vilapl67/public_html/home-teste/PHPMailer-master/src/PHPMailer.php")){
    //     echo 'file_exists("/home1/vilapl67/public_html/home-teste/PHPMailer-master/src/PHPMailer.php") <br>';
    // }
    // if(file_exists("/home1/vilapl67/public_html/home-teste/PHPMailer-master/src/SMTP.php")){
    //     echo 'file_exists("/home1/vilapl67/public_html/home-teste/PHPMailer-master/src/SMTP.php") <br>';
    // }
    // echo '111';
    // die;

        //Load Composer's autoloader
        // require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            echo 'NOME: ' . $nome . '<br>';
            echo 'EMAIL: ' . $email . '<br>';
            echo 'ASSUNTO: ' . $assunto . '<br>';
            echo 'MENSAGEM: ' . nl2br($mensagem) . '<br>';
            die;

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.vilaplural.com.br';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'developer@vilaplural.com.br';                     //SMTP username
            $mail->Password   = '!@#123qwe';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email, $nome);
            // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('contato@vilaplural.com.br', 'Contato');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Fale Conosco: '.$assunto;
            $mail->Body    = $mensagem;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }



}