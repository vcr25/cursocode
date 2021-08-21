<?php

if (isset($_POST['email']) && !empty($_POST['email']) ){
    $email = addslashes($_POST['email']);

    $to = "vagner.correa.revocio@gmail.com";
    $subject  = "Testando a Landing Page";
    $body = "Email: ".$email ;

    $header = "From: vagnercorrearevocio@hotmail.com" . "\r\n"
    . "Replay-to: ".$email. "\r\n"
    ."X=Mailer:PHP/".phpversion();

    if(mail($to, $subject, $body, $header)){
        echo("Email enviado com sucesso!");
    }else{
        echo ("Ouve um erro ao enviar o email");
    }
}