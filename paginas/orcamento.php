<?php
session_start();
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
      href="https://fonts.googleapis.com/css2?family=Asap:ital@1&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>ORÇAMENTO - ELETRÔNICA UNIVERSAL</title>
  </head>
  <body>
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
        id="cabecalho"
      >
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
      <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Alterna navegação"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-uppercase"
                id="link-menu" href="../index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                class="nav-link text-uppercase"
                id="link-menu"
                href="produtos.html"
                >Produtos</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-uppercase"
                  id="link-menu"
                  href="orcamento.php"
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
          <img class="redeSocial" src="../src/img/facebook.png" alt="logo facebook" />
        </a>
        <a 
        class="nav-link "
         href="https://wa.me/5504299845335?text=Olá,%20encontrei%20seu%20contato%20no%20site%20e"
         target="_blank"
        >
          <img class="redeSocial" src="../src/img/whatsapp.png" alt="logo whatsapp" />
        </a>
        <a class="nav-link "
        href="https://twitter.com/intent/tweet?url=https://eletronicauniversal.com.br"
        target="_blank"
         >
          <img class="redeSocial" src="../src/img/twitter.png" alt="logo twitter" />
        </a>
          </div>
        </nav>
        <div class="orcamento d-flex justify-content-between">
          <section class="secao1">

            <form class="formulario mt-3" action="enviarEmail.php" method="POST">
              <label for="nome">Nome:</label>
              <input name="nome" class="campo-input" type="text" id="nome" required>
              <label for="email">Email:</label>
              <input name="email" class="campo-input" type="email" id="email" required>
              <label for="cidade">Cidade:</label>
              <input name="cidade" class="campo-input" type="text" id="cidade" required>
              <label  for="telefone">Telefone:</label>
              <input name="telefone" class="campo-input" type="number" id="telefone" required>
              <label for="textarea">Descrição:</label>
              <textarea name="mensagem" id="textarea" cols="30" rows="7" required></textarea>
              <img src="captcha.php" alt="Código captcha">
              <label for="codcaptcha">Digite o código:</label>
              <input type="text" name="captcha"  class="campo-captcha" id="captcha">
              <input class="btn btn-primary mt-2 p-2" type="submit" value="enviar" id="botao-input" />
            </form>
            <?php
            if(isset($_SESSION['msg'])){              
              echo "{$_SESSION['msg']}";              
              unset($_SESSION['msg']);
            }
            ?>
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
        <div
          class="
            d-flex
            justify-content-between
            align-items-center
            mt-5
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
              <img src="../src/img/facebook-rodape.png" alt="" class="rodape-social-img"/>
            </a>
          </li>
          <li class="mr-3">
            <a
            class="rodape-social-link rodape-social-link--twitter"
            href="https://twitter.com/intent/tweet?url=https://eletronicauniversal.com.br"
            target="_blank"
            >
              <img src="../src/img/twitter-rodape.png" alt="" class="rodape-social-img"/>
            </a>
          </li>
          <li>
            <a
            class="rodape-social-link rodape-social-link--Whatsapp"
            href="https://wa.me/5504299845335?text=Olá,%20encontrei%20seu%20contato%20no%20site%20e"
            target="_blank"
            >
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
  </body>
</html>
