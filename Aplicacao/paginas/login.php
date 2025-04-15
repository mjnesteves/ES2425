<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <title>Codivideo</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />


  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
  <link rel="stylesheet" href="style.css?v=1.0">
=======
  <link rel="stylesheet" href="style.css">
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

<<<<<<< HEAD
  <style>
    body {
      background-image: url('Imagens/background.png');
      background-size: cover;
      background-repeat: no-repeat;
      color: white;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.95);
      padding: 2rem;
      border-radius: 1rem;
      margin-top: 2rem;
      max-width: 500px;
    }

    label {
      font-weight: bold;
    }

    input,
    textarea {
      margin-bottom: 1rem;
    }

    .btn-primary {
      font-weight: bold;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
    }


    .modal-header {
      border-bottom: 0 none;
    }

    .modal-footer {
      border-top: 0 none;
    }
  </style>
  </head>

=======
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
  <?php
  ob_start();
  session_start();

  if (isset($_SESSION["idUtilizador"])) {
    $idUtilizador = $_SESSION["idUtilizador"];
    $nome = $_SESSION["nome"];
    $tipoUtilizador = $_SESSION["tipoUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipoUtilizador"] = $tipoUtilizador;
  }
  ?>

<<<<<<< HEAD
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-center align-items-center">
      <!-- Logotipo à esquerda -->
      <a class="navbar-brand" href="pagina_inicial.php">
        <img src="imagens/Codivideo Logo2.png" alt="Codivideo" style="height: 50px;">
      </a>

      <!-- Menu principal alinhado à esquerda -->
      <div class="collapse navbar-collapse" id="navbarNav ">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="pagina_inicial.php">Inicio</a>
          </li>
        </ul>
      </div>


  </nav>

  <section class="vh-100 gradient-custom">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="container md-4 mt-0 md-4 pb-5">
        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
        <p class="text-white-50 mb-5">Introduza o seu email e password</p>
        <form  method="GET" id="formulario">
          <div data-mdb-input-init class="form-outline form-white mb-3">
            <input type="email" class="form-control form-control-lg" name="email" required />
            <label class="form-label">Email</label>
          </div>
          <div data-mdb-input-init class="form-outline form-white mb-3">
            <input type="password" class="form-control form-control-lg" name="password" required />
            <label class="form-label">Password</label>
          </div>
          <p class="small mb-5 pb-lg-2" data-toggle="modal" data-target="#recuperarPassword"><a class="text-white-50">Esqueceu-se da password?</a></p>
          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg px-5" type="submit" name="login">Login</button>
        </form>
        <p class="mt-3 mb-0">Não tem uma conta? <a href="criar_utilizador.php" class="text-white-50 fw-bold">Crie uma</a></p>
        <div>

        </div>
      </div>
=======
<?php include "./nav_bar_menus.php"; ?>

  <section class="section-form-login-criar">
    <div class="container-login-criar ">
      <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
      <p class="text-white-50 mb-5">Introduza o seu email e password</p>
      <form method="GET" id="formulario">
        <div data-mdb-input-init class="form-outline form-white mb-3">
          <input type="email" class="form-control form-control-lg" name="email" required />
          <label class="form-label">Email</label>
        </div>
        <div data-mdb-input-init class="form-outline form-white mb-3">
          <input type="password" class="form-control form-control-lg" name="password" required />
          <label class="form-label">Password</label>
        </div>
        <p class="small mb-5 pb-lg-2" data-toggle="modal" data-target="#recuperarPassword"><a class="text-white-50">Esqueceu-se da password?</a></p>
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg px-5" type="submit" name="login">Login</button>
      </form>
      <p class="mt-3 mb-0">Não tem uma conta? <a href="criar_utilizador.php" class="text-white-50 fw-bold">Crie uma</a></p>
    </div>
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
  </section>



  <!-- Modal Login -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
<<<<<<< HEAD
        <div class="modal-header mt-1">
        </div>
        <div class="modal-body">
          <h3 class="font-weight-bold text-secondary text-center" id="mensagem"> </h3>
        </div>
        <div class="modal-footer mx-auto">
          <button id="botao" class="btn btn-primary" data-toggle="modal" data-dismiss="modal">ok</button>
=======
        <div class="modal-header mx-auto">
          <h3 class="font-weight-bold text-secondary">Informação do Sistema</h3>
        </div>
        <div class="modal-body mx-auto">
          <h3 class="font-weight-bold" id="mensagem"> </h3>
        </div>
        <div class="modal-header mx-auto">
          <h3 class="font-weight-bold text-secondary">A redirecionar...</h3>
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
        </div>
      </div>
    </div>
  </div>


<<<<<<< HEAD

  <script>
    var mensagem;

    $("#formulario").on("submit", function(e) {
      var serializeData = $('#formulario').serialize();
      e.preventDefault();
      $.ajax({
        url: './processa_login.php',
        type: 'GET',
        data: serializeData,
        success: function(data) {
          mensagem = JSON.parse(data);
          const screenToShow = document.getElementById('mensagem');
          mensagem.forEach(erro => {
            const linha = document.createElement('p')
            linha.innerText = erro
            screenToShow.append(linha);

          })

          $("#login").modal('show');
=======
   
  <script>
    // Script para processar os dados do formulário de forma assíncrona. O objetivo é não atualizar a página e apresentar  
    // os resultados da consulta num modal 


    //varável a ser utilizada para guardar as mensagens enviadas do processamento da página processa_login.php
    var mensagem;

    $("#formulario").on("submit", function(e) {

      //Definir variável para armazenar os dados do formulário
      var serializeData = $('#formulario').serialize();
      
      //Impredir que a página seja atualizada
      e.preventDefault();

      //Pedido feito via ajax
      $.ajax({

        // Página de destino dos dados do formulário
        url: './processa_login.php',

        //Tipo de request
        type: 'GET',

        //Informação a ser enviada
        data: serializeData,

        //Em caso da resposta do pedido ter sucesso
        success: function(data) {

          //Fazer o parse da informação recebida da página processa_login.php para JSON
          mensagem = JSON.parse(data);

          //Campo HTML onde a mensagem vai aparecer
          const screenToShow = document.getElementById('mensagem');

          //Ciclo para percorrer o array com as mensagens enviadas da página processa_login.php
          mensagem.forEach(erro => {

            //Criar um parágrafo para cada linha 
            const linha = document.createElement('p')
            
            //Conteúdo do parágrafo
            linha.innerText = erro

            // O que vai aparecer no campo 
            screenToShow.append(linha);
          })
          
          // Chamada ao modal
          $("#login").modal('show');

          //Se a mensagem for de insucesso, redireciona para a página login.php após 3 segundos, se for de sucesso redireciona para a página inicial
          if (mensagem[0] === 'Credenciais Invalidas!') {
            setTimeout(function() {
              window.location.href = 'login.php';
            }, 3000)
          } else {
            setTimeout(function() {
              window.location.href = 'pagina_inicial.php';
            }, 3000)
          }
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
        },
        error: function(data) {
          alert("error");
        }
      });
    });
<<<<<<< HEAD



    $('#botao').on('click', function() {
      $.ajax({
        success: function(response) {
          if (mensagem[0] === "Credenciais Invalidas!") {
            location.reload();
          }else{
            window.location.href = 'pagina_inicial.php';
          } 
        },
        error: function(xhr, status, error) {
          alert('Something went wrong!');
        }
      });
    });
=======
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
  </script>



<<<<<<< HEAD













=======
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
  <!-- Modal Recuperar Password-->
  <div class="modal fade" id="recuperarPassword" tabindex="-1" role="dialog" aria-labelledby="recuperarPassoword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header mt-1">
          <h3 class="font-weight-bold text-secondary text-center" id="recuperarPasswsord">Inserir email</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./processa_login.php" method="GET">
            <div data-mdb-input-init class="form-outline mb-3">
              <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" required />
            </div>
          </form>
        </div>
        <div class="modal-footer mx-auto">
          <button type="submit" class="btn btn-primary" data-target="#confirmacao" data-toggle="modal" data-dismiss="modal">Recuperar Palavra Passe</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="confirmacao" tabindex="-1" role="dialog" aria-labelledby="confirmacao" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header mt-1">
          <button type="button btn-primary" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
        <div class="modal-body">
          <h3 class="font-weight-bold text-secondary text-center">Verifique o seu email</h3>
        </div>
        <div class="modal-footer mx-auto">
          <button class="btn btn-primary" data-toggle="modal" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

<<<<<<< HEAD








  <footer class="footer fixed-bottom">
    <div class="container-footer text-center align-items-center">
      <p class="footer-title">Codivideo</p>
      <p class="footer-text">© 2024-2025 Codivideo. Todos os direitos reservados.</p>
      <p class="footer-text"><a href="https://www.codivideo.pt">www.codivideo.pt</a></p>
    </div>
  </footer>
=======
  <?php include "./footer.php"; ?>
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>