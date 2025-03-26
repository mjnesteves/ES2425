<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>Codivideo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logotipo à esquerda -->
            <a class="navbar-brand" href="index.php">
                <img src="imagens/Codivideo Logo2.png" alt="Codivideo" style="height: 50px;">
            </a>
    
            <!-- Menu principal alinhado à esquerda -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagina_filmes.php">Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagina_gestao_filmes.php">Filmes Gestao</a>
                    </li>
                </ul>
            </div>
    
            <!-- Imagens à direita como botões -->
            <div class="d-flex align-items-center">

                <!-- Menu 1 (ícone de lista) -->
                <div class="dropdown custom-dropdown mr-3">
                    <a href="#" id="menu1Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="imagens/list.svg" alt="Menu 1" class="menu-icon">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dark-dropdown" aria-labelledby="menu1Dropdown">
                    <div class="dropdown-header text-center text-info" style="font-size: 18px; font-weight: bold;">Géneros:</div>
                        <a class="dropdown-item" href="genero.php?genero=1">Ação</a>
                        <a class="dropdown-item" href="genero.php?genero=2">Aventura</a>
                        <a class="dropdown-item" href="genero.php?genero=3">Comédia</a>
                        <a class="dropdown-item" href="genero.php?genero=4">Documentário</a>
                        <a class="dropdown-item" href="genero.php?genero=5">Desenhos Animados</a>
                        <a class="dropdown-item" href="genero.php?genero=6">Drama</a>
                        <a class="dropdown-item" href="genero.php?genero=7">Ficção Científica</a>
                        <a class="dropdown-item" href="genero.php?genero=8">Terror</a>
                        <a class="dropdown-item" href="genero.php?genero=9">Romance</a>

                    </div>
                </div>
            
                <!-- Menu 2 (ícone de utilizador) -->
                <div class="dropdown custom-dropdown">
                    <a href="#" id="menu2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="imagens/utilizador.svg" alt="Menu 2" class="menu-icon">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dark-dropdown" aria-labelledby="menu2Dropdown">
                        <a class="dropdown-item">Perfis:</a>
                        <a class="dropdown-item" href="alterarperfil.html">Alterar Perfil</a>
                        <a class="dropdown-item" href="ajuda.html">Ajuda</a>
                        <a class="dropdown-item">A tua conta:</a>
                        <a class="dropdown-item" href="definicoes.html">Definições</a>
                        <a class="dropdown-item" href="login.html">Terminar Secção</a>
                    </div>
                </div>
            
            </div>
    </nav>

    <!-- Trailers -->
    <section class="banner-full">
        <div id="trailerCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
          <div class="carousel-inner">
      
            <!-- Trailer 1 -->
            <div class="carousel-item active">
              <div class="video-wrapper">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/rUSdnuOLebE?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
      
            <!-- Trailer 2 -->
            <div class="carousel-item">
              <div class="video-wrapper">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/rZfwvLe961k?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
      
            <!-- Trailer 3 -->
            <div class="carousel-item">
              <div class="video-wrapper">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/3n5u-zWC4mY?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>
      
          <!-- Controles -->
          <a class="carousel-control-prev" href="#trailerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#trailerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
          </a>
        </div>
      </section>

    <section class="Em breve">
        <div class="container">
            <h2><strong>Em breve</strong></h2>
            <p>______________________________________</p>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="Imagens/The+Gorge.jpg" alt="Filme 1">
                        <p class="filmes-titulo"><strong>The Gorge </strong></p>
                        <a href="theGorge.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="imagens/avatar-3.jpg" alt="Filme 2">
                        <p class="filmes-titulo"><strong>Avatar 3</strong></p>
                        <a href="avatar.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="imagens/Vingadores.jpg" alt="Filme 3">
                        <p class="filmes-titulo"><strong>Avengers: Secret Wars</strong></p>
                        <a href="avengers.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="imagens/UntilDawn.jpg" alt="Filme 4">
                        <p class="filmes-titulo"><strong>Until Dawn</strong></p>
                        <a href="untilDawn.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="Top alugados">
        <div class="container">
            <h2><strong>Top alugados</strong></h2>
            <p>______________________________________</p>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="Imagens/AmericanPie.jpg" alt="Filme 1">
                        <p class="filmes-titulo"><strong>American Pie: A Primeira Vez É Inesquecível </strong></p>
                        <a href="americanPie.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="imagens/harry-potter-and-the-deadly-hallows.jpg" alt="Filme 2">
                        <p class="filmes-titulo"><strong>Harry Potter And The Deadly Hallows Part II</strong></p>
                        <a href="harryPotter.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="imagens/Saw.jpg" alt="Filme 3">
                        <p class="filmes-titulo"><strong>Saw</strong></p>
                        <a href="saw.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="filmes">
                        <img src="imagens/FF1.jpg" alt="Filme 4">
                        <p class="filmes-titulo"><strong>The Fast & The Furious</strong></p>
                        <a href="fastFurious.html" class="btn btn-primary">Ver Filme</a>
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <footer class="footer">
        <div class="container text-center">
            <p class="footer-title">Codivideo</p>
            <p class="footer-text">© 2024-2025 Codivideo. Todos os direitos reservados.</p>
            <p class="footer-text"><a href="https://www.codivideo.pt">www.codivideo.pt</a></p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>