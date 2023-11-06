<?php

$nome = "Testador Sk8 Surf";
$email = "betoside@gmail.com";
$assunto = "Testando html tiktok sesi lab";
$mensagem = '';


$mensagem .= '<table border="0" cellpadding="0" cellspacing="0" style="width:100%" align="center">';
$mensagem .= '<tbody>';
    $mensagem .= '<tr>';
        $mensagem .= '<td><img alt="TikTok | SESI LAB" src="https://www.vilaplural.com.br/_newsletter_apoio/_231027Agradecimento/topo-tiktok-sesi-lab.jpg" style="width: 100%;" /></td>';
    $mensagem .= '</tr>';
$mensagem .= '</tbody>';
$mensagem .= '</table>';

$mensagem .= '<table border="0" cellpadding="0" cellspacing="0" style="width:100%" align="center">';
$mensagem .= '<tbody>';
    $mensagem .= '<tr>';
        $mensagem .= '<td width="45px">&nbsp;</td>';
        $mensagem .= '<td>';
            $mensagem .= '<br>';
            $mensagem .= '<br>';
            $mensagem .= '<p>';
                $mensagem .= '<strong style="font-size: 26px; font-family:Sofia Pro, Arial;">Terminou, mas é só o começo!</strong>';
            $mensagem .= '</p>';
            $mensagem .= '<p style="font-size: 22px; font-family:Sofia Pro, Arial;">';
                $mensagem .= 'Nossa jornada junto ao <strong>SESI Lab</strong> não poderia ter iniciado de forma melhor!';
            $mensagem .= '</p>';
            $mensagem .= '<p style="font-size: 22px; font-family:Sofia Pro, Arial;">';
                $mensagem .= 'O foco sempre será impulsionar mudanças, educação, segurança e empreendedorismo por meio da conexão, da capacitação e da criatividade por meio da nossa plataforma.';
            $mensagem .= '</p>';
            $mensagem .= '<p style="font-size: 22px; font-family:Sofia Pro, Arial;">';
                $mensagem .= 'E agora, você também faz parte disso e queremos agradecer a sua presença neste encontro que vai ajudar a multiplicar nossos produtos, serviços e políticas de segurança.  ';
            $mensagem .= '</p>';
            $mensagem .= '<p style="font-size: 22px; font-family:Sofia Pro, Arial;">';
                $mensagem .= '<strong>Vem muito mais por aí.</strong>';
            $mensagem .= '</p>';

        $mensagem .= '</td>';
        $mensagem .= '<td  width="90px"">&nbsp;</td>';
    $mensagem .= '</tr>';
$mensagem .= '</tbody>';
$mensagem .= '</table>';

$mensagem .= '<table border="0" cellpadding="0" cellspacing="0" style="width:100%" align="center">';
$mensagem .= '<tbody>';
    $mensagem .= '<tr>';
        $mensagem .= '<td width="25%">&nbsp;</td>';
        $mensagem .= '<td style="text-align: center;">';
            $mensagem .= '<p style="font-size: 26px; font-family:Sofia Pro, Arial; text-align: center;">';
                $mensagem .= '<strong>';
                $mensagem .= 'Até breve e obrigado.';
                $mensagem .= '</strong>';
            $mensagem .= '</p>';
        $mensagem .= '</td>';
        $mensagem .= '<td width="25%" align="right"><img alt="" src="https://www.vilaplural.com.br/_newsletter_apoio/_231027Agradecimento/ico-dir.jpg" style="max-width:100%" /></td>';
    $mensagem .= '</tr>';
$mensagem .= '</tbody>';
$mensagem .= '</table>';

$mensagem .= '<table border="0" cellpadding="0" cellspacing="0" style="width:100%" align="center">';
$mensagem .= '<tbody>';
    $mensagem .= '<tr>';
        $mensagem .= '<td style="width: 20%;"><img alt="" src="https://www.vilaplural.com.br/_newsletter_apoio/_231027Agradecimento/ico-esq.jpg" style="width:100%" /></td>';
        $mensagem .= '<td>';
            $mensagem .= '<p style="font-size: 25px; font-family:Sofia Pro, Arial; color: #000000;"><a href="https://survey.isnssdk.com/q/59893/ZX0WD036/01da/#/" target="_blank"><img alt="" src="https://www.vilaplural.com.br/_newsletter_apoio/_231027Agradecimento/botao.gif" style="width: auto; height: auto; max-width: 100%;" /></a></p>';
        $mensagem .= '</td>';
    $mensagem .= '</tr>';
$mensagem .= '</tbody>';
$mensagem .= '</table>';





    require("/home1/vilapl67/public_html/PHPMailer-master/src/PHPMailer.php");
    require("/home1/vilapl67/public_html/PHPMailer-master/src/SMTP.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
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
        echo "Mensagem enviada com sucesso";
        // header('Location: ../index.html?formStatus=FALE');
        exit;
    }
