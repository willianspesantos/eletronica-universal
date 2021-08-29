<?php

  session_start();


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 
   //Defino a Chave do meu site
  $secret_key = '6Lebny0cAAAAAL0BMhtS4yECUof-GjyDKf6bWBEo'; 

  //Pego a validação do Captcha feita pelo usuário
  $recaptcha_response = $_POST['g-recaptcha-response'];

  // Verifico se foi feita a postagem do Captcha 
  if(isset($recaptcha_response)){
		
	// Valido se a ação do usuário foi correta junto ao google
	$answer = 
		json_decode(
			file_get_contents(
				'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.
				'&response='.$_POST['g-recaptcha-response']
			)
		);

	// Se a ação do usuário foi correta executo o restante do meu formulário
	if($answer->success) {

    
  //Variáveis
  $nome = $_POST['nome'];
  $email1 = $_POST['email'];
  $cidade = $_POST['cidade'];
  $telefone = $_POST['telefone'];
  $mensagem = $_POST['mensagem'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  require "bibliotecas/PHPMailer/Exception.php";
	require "bibliotecas/PHPMailer/OAuth.php";
	require "bibliotecas/PHPMailer/PHPMailer.php";
	require "bibliotecas/PHPMailer/POP3.php";
	require "bibliotecas/PHPMailer/SMTP.php";
 

  //Campo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email1</p>
      <p><b>Cidade: </b>$cidade</p>
      <p><b>Telefone: </b>$telefone</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> ---> <b>$hora_envio</b></p>
    </html>
  ";


	$mail = new PHPMailer(true);
	try {
			//Server settings
      
			//$mail->SMTPDebug = 1;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host= 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail -> SMTPOptions = [
        'ssl' => [
            'verify_peer' => false ,
            'verify_peer_name' => true ,
            'allow_self_signed' => true ,
       ]
   ];
			$mail->Username = 'josemourateste1@gmail.com';                     //SMTP username
			$mail->Password='300kms300kms';                               //SMTP password
			$mail->SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS;       //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    //TCP port to connect to, use 465 587 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('josemourateste1@gmail.com', 'Contato pelo site(ORCAMENTO)');
			$mail->addAddress('iniciandoprojetoscompic@gmail.com', 'destinatario');     //Add a recipient
			//$mail->addAddress($mensagem->__get('para'));     //Add a recipient
			$mail->addReplyTo($email1, 'Cliente');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Contato pelo site(ORCAMENTO)';
			$mail->Body    = $arquivo;
			$mail->AltBody = 'Este Email não suporta HTML, contatar o desenvolverdor e reportar esse problema.';

			$mail->send();
			$msg = 1;
      
	} catch (Exception $e) {
		$msg = 2;        
	}
  }else{
	  $msg = 3;
  }
  }

  $_SESSION['mensagem'] = $msg;
  header("Location: status.php");
  die();
?>