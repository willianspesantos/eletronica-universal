<?php

session_start();

//Variáveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');


//if($_SESSION['captcha'] == $_POST['captcha']){
  

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Cidade: </b>$cidade</p>
      <p><b>Telefone: </b>$telefone</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";

    
  //Emails para quem será enviado o formulário
  $destino = "iniciandoprojetoscompic@gmail.com";
  $assunto = "Contato pelo Site (Orçamento)";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $email_remetente = "josemoura@task.com.br";
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email_remetente>";
  $headers .= "Reply-To: $email\n"; // Endereço (devidamente validado) que o seu usuário informou no contato

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);

  $_SESSION['msg'] = "<h3 style='color:green; margin-left: 8%;'>Email enviado com sucesso<h3>";

  header("location:orcamento.php");	/*
} else{

  $_SESSION['msg'] = "<h4 style='color:red; margin-left: 8%;'>ERRO! Caracteres anti-robô inválido.<h4>";
  header("Location: orcamento.php");


  }*/
?>