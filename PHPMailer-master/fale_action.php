<?php

$nome = trim(filter_input(INPUT_POST, 'nome'));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$assunto = trim(filter_input(INPUT_POST, 'assunto'));
$mensagem = trim(filter_input(INPUT_POST, 'mensagem'));

if($nome && $email && $assunto && $mensagem){

    require("/home1/vilapl67/public_html/PHPMailer-master/src/PHPMailer.php");
    require("/home1/vilapl67/public_html/PHPMailer-master/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.titan.email";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->Username = "developer@vilaplural.com.br";
    $mail->Password = "!@#123qwe";
    $mail->SetFrom("developer@vilaplural.com.br");
    $mail->Subject = $assunto . ' - ' . $nome;
    $msg1 = '<strong>Nome</strong>:' . $nome .' - ' . $email . '<br><br>';
    $mail->Body = $msg1 . nl2br($mensagem);
    $mail->AddAddress("contato@vilaplural.com.br");
    $mail->addReplyTo($email, $nome);
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        // echo "Mensagem enviada com sucesso";
        header('Location: ../index.html?formStatus=FALE');
        exit;
    }
}
header('Location: ../index.html?formStatus=ERRO');
