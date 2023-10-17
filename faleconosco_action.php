<?php

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

    // /home1/vilapl67/public_html/home-teste/PHPMailer-master.zip
    // a1fa2714c447adda7e6b07c4bfa290dfc1a035b2
    
    // if(file_exists("PHPMailer-master/src/PHPMailer.php")){
    //     echo 'file_exists("PHPMailer-master/src/PHPMailer.php") <br>';
    // }
    // if(file_exists("PHPMailer-master/src/SMTP.php")){
    //     echo 'file_exists("PHPMailer-master/src/SMTP.php") <br>';
    // }
    // echo '111';
    // die;

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->Debugoutput = 'html';
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    // $mail->Host = "servidor.hostgator.com.br";
    $mail->Host = "mail.vilaplural.com.br";
    $mail->Port = 465; // 465 or 587
    $mail->IsHTML(true);
    $mail->Username = "developer@vilaplural.com.br";
    $mail->Password = "!@#123qwe";
    // contato@vilaplural.com.br
    // 123!@#qwe
    // developer@vilaplural.com.br
    // !@#123qwe
    $mail->SetFrom("developer@vilaplural.com.br");
    $mail->Subject = $assunto;
    $mail->Body = nl2br($mensagem);
    $mail->AddAddress("contato@vilaplural.com.br");
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Mensagem enviada com sucesso";
        }

}

// echo 'teste';
// header('Location: '.getcwd());

// NOME: Paulo
// EMAIL: paulo@email.com
// ASSUNTO: teste fale conosco
// MENSAGEM: 
/*
algum teste de msg 
quebra de linha teste
*/ 