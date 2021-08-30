<?php
session_start();
$msg = $_SESSION['mensagem'];
session_destroy();

if ($msg == 1) {
  $tipo = 'alert alert-success';
  $titulo = 'E-MAIL enviado com sucesso!';
  $assunto= 'Agradecemos seu contato.';
  $orientacao = 'Assim que for possível retornaremos o contato.';
} else if ($msg == 2) {
  $tipo = 'alert alert-info';
  $titulo = 'Email não foi enviado por causa de um erro desconhecido.';
  $assunto= 'Volte mais tarde e tente novamente.';
  $orientacao = 'Se não conseguir enviar sua mensagem, tente os outros meios de contato.';
} else if ($msg == 3) {
  $tipo = 'alert alert-danger';
  $titulo = 'ERRO! Caracteres do CAPTCHA inválido!';
  $assunto= 'Volte a página do formulário e tente novamente.';
  $orientacao = 'Se não conseguir enviar sua mensagem, tente os outros meios de contato.';
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

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Asap:ital@1&display=swap"rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"crossorigin="anonymous"/>
      <title>STATUS DE ENVIO - ELETRÔNICA UNIVERSAL</title>             
  </head>
  <body>
    <body id="teste1">
      <div class="corpo">
        <header
          class="
            cabecalho
            header_banner
            d-flex
            flex-row
            justify-content-around
            align-items-center
          "
          id="cabecalho">
          <h1>
            <img
              src="../src/img/logoedit.png"
             
              alt="Logotipo eletronica universal"
            />
            <img
              src="../src/img/nome.png"
              
              alt="eletronica universal"
            />
          </h1>
          <h2 id="chamada">Nossa Experiência Faz a Diferença</h2>
          <span>+ de 50 Anos no mercado</span>
        </header>
        <main class="principal-sobre">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-uppercase"
                  id="link-menu" href="../index.html"
                    >Home</a>
                </li>
                <li class="nav-item">
                  <a
                  class="nav-link text-uppercase"
                  id="link-menu"
                  href="produtos.html"
                  >Produtos</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link text-uppercase"
                    id="link-menu"
                    href="orcamento.html"
                    >Faça seu Orçamento</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link text-uppercase"
                    id="link-menu"
                    href="contato.html"
                    >Contato</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link text-uppercase"
                    id="link-menu"
                    href="sobre.html"
                    >Sobre Nós</a
                  >
                </li>
              </ul>
            </div>
            <div
              class="d-flex flex-row bd-highlight mt-1 mb-2 align-items-center"
            >
            <a
            class="nav-link "
            href="https://www.facebook.com/eletronicauniversalguarapuava/"
            target="_blank"
          >
            <img src="../src/img/facebook.png" alt="logo facebook" />
          </a>
          <a 
          class="nav-link "
           href="https://wa.me/5504299845335?text=Olá,%20encontrei%20seu%20contato%20no%20site%20e"
           target="_blank"
          >
            <img src="../src/img/whatsapp.png" alt="logo whatsapp" />
          </a>
          <a class="nav-link "
          href="https://twitter.com/intent/tweet?url=https://eletronicauniversal.com.br"
          target="_blank"
           >
            <img src="../src/img/twitter.png" alt="logo twitter" />
          </a>
            </div>
          </nav>
          
        </main>

        <section class="teste">
        <div class="<?php echo $tipo; ?>" role="alert">
        <h4 class="alert-heading"><?php echo $titulo; ?></h4>
        <p><?php echo $assunto; ?>
        <hr>
        <p class="mb-0"><?php echo $orientacao; ?></p>
        </div>
        </section>        
        <footer class="rodape">
          <div
            class="
              d-flex
              justify-content-between
              align-items-center
              p-3
              bg-dark
              text-white
            "
            id="rodape"
          >
            <div class="rodape-imagem">
              <img
                src="../src/img/logoedit.png"
                class="rodape-logo imagem-logo"
                alt="Logotipo eletronica universal"
              />
              <img
                src="../src/img/nome.png"
                class="rodape-logo imagem-nome"
                alt="eletronica universal"
              />
            </div>
  
            <ul
              class="
                rodape-social
                d-flex
                justify-content-around
                align-items-center
              "
            >
            <li class="mr-3">
              <a
                href="#"
                class="rodape-social-link rodape-social-link--facebook"
              >
                <img class="redeSocial" src="../src/img/facebook-rodape.png" alt="" class="rodape-social-img"/>
              </a>
            </li>
            <li class="mr-3">
              <a
              class="rodape-social-link rodape-social-link--twitter"
              href="https://twitter.com/intent/tweet?url=https://eletronicauniversal.com.br"
              target="_blank"
              >
                <img class="redeSocial" src="../src/img/twitter-rodape.png" alt="" class="rodape-social-img"/>
              </a>
            </li>
            <li>
              <a
              class="rodape-social-link rodape-social-link--Whatsapp"
              href="https://wa.me/5504299845335?text=Olá,%20encontrei%20seu%20contato%20no%20site%20e"
              target="_blank"
              >
                <img class="redeSocial" src="../src/img/whatsapp-rodape.png" alt="" class="rodape-social-img"/>
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
                  <a href="./contato.html" class="text-white text-uppercase">contato</a>
                </li>
                <li class="mr-3">
                  <a href="./sobre.html" class="text-white text-uppercase">sobre nós</a>
                </li>
              </ul>
            </nav>
          </div>
        </footer>
      </div>
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
      <script>
        var msg1 = "<?php echo $msg; ?>";
      </script>
      <script src="teste.js"></script>
         
    </body>
  </body>
</html>




