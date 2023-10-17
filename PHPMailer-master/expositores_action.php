<?php

$outros = trim(filter_input(INPUT_POST, 'outros'));

$nome = trim(filter_input(INPUT_POST, 'nome'));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$assunto = "Form Expositores";

$marca = trim(filter_input(INPUT_POST, 'marca'));
$site = trim(filter_input(INPUT_POST, 'site'));
$pessoa_fisica = trim(filter_input(INPUT_POST, 'pessoa_fisica'));
$pessoa_juridica = trim(filter_input(INPUT_POST, 'pessoa_juridica'));
$instagram = trim(filter_input(INPUT_POST, 'instagram'));
$facebook = trim(filter_input(INPUT_POST, 'facebook'));
$ecommerce = trim(filter_input(INPUT_POST, 'ecommerce'));
$telefone = trim(filter_input(INPUT_POST, 'telefone'));
$endereco = trim(filter_input(INPUT_POST, 'endereco'));
$bairro = trim(filter_input(INPUT_POST, 'bairro'));
$CEP = trim(filter_input(INPUT_POST, 'CEP'));
$cidade = trim(filter_input(INPUT_POST, 'cidade'));
$uf = trim(filter_input(INPUT_POST, 'uf'));
$mensagem = trim(filter_input(INPUT_POST, 'mensagem'));

if ($nome && $email  && $marca && $telefone ){

    $email_msg = '';
    $email_msg .= '<strong>Segmentos:</strong> <br>';
    foreach($_POST['segmento'] as $item){
        $email_msg .= '- ' . $item . '<br>';
    }
    $email_msg .= '<br>';
    $email_msg .= '<strong>Outros Segmentos:</strong> ' . $outros . '<br>';
    $email_msg .= '<strong>Nome:</strong> ' . $nome . '<br>';
    $email_msg .= '<strong>Email:</strong> ' . $email . '<br>';
    $email_msg .= '<strong>Assunto:</strong> ' . $assunto . '<br>';
    $email_msg .= '<strong>Marca:</strong> ' . $marca . '<br>';
    $email_msg .= '<strong>Site:</strong> ' . $site . '<br>';
    $email_msg .= '<strong>Pessoa Física:</strong> ' . $pessoa_fisica . '<br>';
    $email_msg .= '<strong>Pessoa Jurídica:</strong> ' . $pessoa_juridica . '<br>';
    $email_msg .= '<strong>Instagram:</strong> ' . $instagram . '<br>';
    $email_msg .= '<strong>Facebook:</strong> ' . $facebook . '<br>';
    $email_msg .= '<strong>E-commerce:</strong> ' . $ecommerce . '<br>';
    $email_msg .= '<strong>Telefone:</strong> ' . $telefone . '<br>';
    $email_msg .= '<strong>Endereço:</strong> ' . $endereco . '<br>';
    $email_msg .= '<strong>Bairro:</strong> ' . $bairro . '<br>';
    $email_msg .= '<strong>CEP:</strong> ' . $CEP . '<br>';
    $email_msg .= '<strong>Cidade:</strong> ' . $cidade . '<br>';
    $email_msg .= '<strong>UF:</strong> ' . $uf . '<br>';
    $email_msg .= '<strong>Mensagem:</strong> <br>' . nl2br($mensagem) . '<br>';
    // echo $email_msg;

    $assunto_email = $assunto . ' - ' . $nome . ' - ' . $marca;
    // echo $assunto_email;
    // exit;

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
    $mail->Subject = $assunto_email;
    $mail->Body = $email_msg;
    $mail->AddAddress("contato@vilaplural.com.br");
    $mail->addReplyTo($email, $nome);
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        // echo "Mensagem enviada com sucesso";
        header('Location: ../expositores.html?formStatus=EXPOSITOR');
        exit;
    }
}
header('Location: ../expositores.html');