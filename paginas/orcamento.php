<?php
	date_default_timezone_set('America/Sao_Paulo');
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  function clean_input($data){
    $cleandata = trim($data);
    $cleandata = stripslashes($cleandata);
    $cleandata = htmlspecialchars($cleandata);

    return $cleandata;
  }
  $sucess_email = "";
  $erro_nome = "";
  $erro_email = "";
  $erro_cidade = "";
  $erro_telefone = "";
  $erro_menssagem = "";
  $numero_IP = "";
  $dispositivo = "";
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email1 = $_POST['email'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $numero_IP = $_SERVER['REMOTE_ADDR'];
    $dispositivo = $_SERVER['HTTP_USER_AGENT'];
    if ($nome == "") {
      $erro_nome = '<p style="color:red;">* O nome é obrigatório</p>';
    } elseif($email1 == "") {
      $erro_email = '<p style="color:red;">* O e-mail é obrigatório</p>';
    } elseif($cidade == "") {
      $erro_cidade = '<p style="color:red;">* O campo cidade é obrigatório</p>';
    } elseif($telefone == "") {
      $erro_telefone = '<p style="color:red;">* O telefone é obrigatório</p>';
    }elseif($mensagem == "") {
      $erro_menssagem = '<p style="color:red;">* O campo mensagem é obrigatório</p>';
    }elseif( filter_var($email1, FILTER_VALIDATE_EMAIL) == false) {
      $erro_email = '<p style="color:red;">* O e-mail informado é invalido!</p>';
    } else {
      $nome = clean_input($nome);
      $email1 = clean_input($email1);
      $cidade = clean_input($cidade);
      $telefone = clean_input($telefone);
      $mensagem = clean_input($mensagem);      
    }
     
   //Defino a Chave do meu site
    $secret_key = '6LflYkUcAAAAAFimcaOi9sXwc2jV3kzdY6jqlk_e'; 

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
        <p><b>Numero-IP: </b>$numero_IP</p>
        <p><b>Dispositivo: </b>$dispositivo</p>
        <p>Este e-mail foi enviado em <b>$data_envio</b> ---> <b>$hora_envio</b></p>
      </html>";


      $mail = new PHPMailer(true);
      $mail->CharSet="UTF-8";
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
    
    if ($msg == 1) {
      $sucess_email = '<h2 style="color:green;">E-mail enviado com sucesso!</h2>';
    } else if ($msg == 2) {
      $sucess_email = '<p style="color:red;">Email não foi enviado por causa de um erro desconhecido. Volte mais tarde e tente novamente.</p>';  
    } else if ($msg == 3) {
      $sucess_email = '<h2 style="color:red;">ERRO! Valide com o reCAPTCHA!</h2>';  
    }

  }
 
}  
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../src/css/_reset.css" />
    <link rel="stylesheet" href="../src/css/header.css" />
    <link rel="stylesheet" href="../src/css/style.css" />
    <link rel="stylesheet" href="../src/css/menu.css">
    <link rel="stylesheet" href="../src/css/orcamento.css" />
    <link rel="stylesheet" href="../src/css/footer.css">
    <link rel="stylesheet" href="../src/css/rodape.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital@1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    
    <title>ORÇAMENTO - ELETRÔNICA UNIVERSAL</title>
    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

  </head>
  <body class="corpo">
  
    <header class="cabecalho header_banner d-flex flex-row justify-content-around align-items-center" id="cabecalho">
      <h1>
        <img src="../src/img/logoedit.png" alt="Logotipo eletronica universal" />
        <img src="../src/img/nome.png" alt="eletronica universal" />
      </h1>
      <h2 class="cabecalho__subtitulo">Nossa Experiência Faz a Diferença</h2>
      <span>+ de 50 Anos no mercado</span>
    </header>
    <main>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
          aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="link-menu" href="../index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="link-menu" href="produtos.html">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="link-menu" href="orcamento.html">Faça seu Orçamento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="link-menu" href="sobre.html">Sobre Nós</a>
            </li>
          </ul>
        </div>
        <div class="d-flex flex-row bd-highlight mt-1 mb-2 align-items-center">
        <a class="nav-link" href="https://www.facebook.com/eletronicauniversalguarapuava/" target="_blank">
        <img class="redeSocial" src="../src/img/facebook.png" alt="logo facebook" />
      </a>
      <a class="nav-link" href="https://wa.me/5504299845335?text=Olá,%20encontrei%20seu%20contato%20no%20site%20e" target="_blank"
      >
        <img class="redeSocial" src="../src/img/whatsapp.png" alt="logo whatsapp" />
      </a>
      <a class="nav-link" href="https://twitter.com/intent/tweet?url=https://eletronicauniversal.com.br" target="_blank">
        <img class="redeSocial" src="../src/img/twitter.png" alt="logo twitter" />
      </a>
        </div>
      </nav>
      <div class="orcamento d-flex justify-content-between">
        <section class="secao1">

          <form class="formulario mt-3" action="orcamento.php"  method="POST">
            <div class="sucesso-form"><?php echo $sucess_email;?></div>
            <label for="nome">Nome:</label>
            <input name="nome" class="campo-input" type="text" id="nome" required>
            <div class="erro-form"><?php echo $erro_nome;?></div>
            <label for="email">Email:</label>
            <input name="email" class="campo-input" type="email" id="email" required>
            <div class="erro-form"><?php echo $erro_email;?></div>
            <label for="cidade">Cidade:</label>
            <input name="cidade" class="campo-input" type="text" id="cidade" required>
            <div class="erro-form"><?php echo $erro_cidade;?></div>
            <label  for="telefone">Telefone:</label>
            <input name="telefone" class="campo-input" type="number" id="telefone" required>
            <div class="erro-form"><?php echo $erro_telefone;?></div>
            <label for="textarea">Descrição:</label>
            <textarea name="mensagem" id="textarea" cols="30" rows="7" required></textarea>
            <div class="erro-form"><?php echo $erro_menssagem;?></div>
            <div class="g-recaptcha" data-sitekey="6LflYkUcAAAAADP5F-WQ21J23v45hkFLMJIyGtZd" required></div>
            <input class="btn btn-primary mt-2 p-2" type="submit" value="enviar" id="botao-input" />              
          </form>
        </section>
        <section class="secao2 d-flex flex-column align-items-center justify-content-around">
          <div class="contato mt-5">
            <h3>Fale Conosco</h3>
            <p>Nossa equipe está aguardando seu contato!</p> 
            <a href="tel:( 42 ) 3623-5325">
              <img src="../src/img/c-telefone.png" alt=""> ( 42 ) 3623-5325    
            </a>
            <br>
            <a href="mailto:universaleletronica2@gmail.com">
              <img src="../src/img/email.png" alt=""> universaleletronica2@gmail.com    
            </a>
          </div>
          <div class="contatoZap mt-5">
            <h3>Deseja atendimento pelo whatsapp?</h3>
            <p>Pode utilizar o botão abaixo, para entrar em contato diretamente com a nossa equipe de atendimento</p>
            <button type="button" class="btn btn-success" data-botaozap>
              <img src="../src/img/c-whatsapp.png" alt="botao entrar em contato via whatsapp">
              WhatsApp
            </button>
          </div>
          <div class="contatoEndereco mt-5">
            <h3>Ou venha nos fazer uma visita!</h3>
            <p>Nossa equipe qualificada terá o enorme prazer em atende-lo!</p>
            <address class="text-center">
              <img src="../src/img/mapa.png" alt="">
              Rua Dr Laranjeiras nº 1014, Batel, Guarapuava - PR      
            </address>
          </div>          
        </section>
      </div>
    </main>
    <footer class="rodape">
      <div class="d-flex justify-content-between align-items-center mt-5 p-3 bg-dark text-white" id="rodape">
        <div class="rodape-imagem">
          <img src="../src/img/logoedit.png" class="rodape-logo imagem-logo" alt="Logotipo eletronica universal" />
          <img src="../src/img/nome.png" class="rodape-logo imagem-nome" alt="eletronica universal" />
        </div>

        <ul class=" rodape-social d-flex justify-content-around align-items-center">
        <li class="mr-3">
          <a href="https://www.facebook.com/eletronicauniversalguarapuava/" class="rodape-social-link rodape-social-link--facebook">
            <img src="../src/img/facebook-rodape.png" alt="" class="rodape-social-img"/>
          </a>
        </li>
        <li class="mr-3">
          <a class="rodape-social-link rodape-social-link--twitter" href="https://twitter.com/intent/tweet?url=https://eletronicauniversal.com.br" target="_blank"
          >
            <img src="../src/img/twitter-rodape.png" alt="" class="rodape-social-img"/>
          </a>
        </li>
        <li>
          <a class="rodape-social-link rodape-social-link--Whatsapp" href="https://wa.me/5504299845335?text=Olá,%20encontrei%20seu%20contato%20no%20site%20e"
          target="_blank">
            <img src="../src/img/whatsapp-rodape.png" alt="" class="rodape-social-img"/>
          </a>
        </li>
        </ul>

        <nav class="rodape-nav">
          <ul class="d-flex justify-content-around align-items-center">
            <li class="mr-3">
              <a href="../index.html" class="text-white text-uppercase">home</a>
            </li>
            <li class="mr-3">
              <a href="./produtos.html" class="text-white text-uppercase">produtos</a>
            </li>
            <li class="mr-3">
              <a href="./orcamento.html" class="text-white text-uppercase">orçamento</a>
            </li>
            <li class="mr-3">
              <a href="./sobre.html" class="text-white text-uppercase">sobre nós</a>
            </li>
          </ul>
        </nav>
      </div>
    </footer>
    
    <script src="../src/script/index.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
   
  </body>
</html>
