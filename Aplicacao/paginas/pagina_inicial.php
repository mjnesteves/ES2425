<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>Codivideo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- POPUP DE CONFIRMAÇÃO -->

    <?php if (isset($_GET['reserva']) && $_GET['reserva'] == 'sucesso'): ?>
  <div class="popup-confirma" id="popupReserva">
    Reserva efetuada com sucesso!
    <img src="Imagens/Icons/cancelar.png" alt="Fechar"
     style="width:20px; height:20px; cursor:pointer;"
     onclick="document.getElementById('popupReserva').style.display='none'">
  </div>

  <script>
    setTimeout(() => {
      const popup = document.getElementById('popupReserva');
      if (popup) popup.style.display = 'none';
    }, 3000); // desaparece após 10 segundos
  </script>
<?php endif; ?>

    <!-- Navbar -->
    <?php include_once('nav_bar_menus.php'); ?>



    <!-- Conteúdo Principal -->
    <main>

        <?php
        if (!isset($idUtilizador)){
            ?>
        
        <!-- Trailers -->
        <div class="carousel-item active">
            <section class="banner-full">
                <div id="trailerCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">

                        <!-- Trailer 1 -->
                        <div class="carousel-item active">
                            <div class="video-wrapper">
                                <iframe id="player1" class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/rUSdnuOLebE?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1&enablejsapi=1"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>

                        <!-- Trailer 2 -->
                        <div class="carousel-item">
                            <div class="video-wrapper">
                                <iframe id="player2" class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/rZfwvLe961k?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1&enablejsapi=1"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>

                        <!-- Trailer 3 -->
                        <div class="carousel-item">
                            <div class="video-wrapper">
                                <iframe id="player3" class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/3n5u-zWC4mY?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1&enablejsapi=1"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Controles -->
                    <a class="carousel-control-prev" href="#trailerCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>

                    <!-- Botão de som -->
                    <button id="volumeBtn" class="btn btn-primary volume-toggle">
                        <i class="fas fa-volume-mute"></i>
                    </button>

                    <a class="carousel-control-next" href="#trailerCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </section>

            <?php
        }
        ?>

            <section class="Em Breve">
                <div class="container" style="margin-top: 50px;">
                    <h2><strong>Em breve</strong></h2>
                    <p>______________________________________</p>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="Imagens/The+Gorge.jpg" alt="Filme 1">
                                <p class="filmes-titulo"><strong>The Gorge </strong></p>
                                <a href="pagina_reserva.php?id=36" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="imagens/avatar-3.jpg" alt="Filme 2">
                                <p class="filmes-titulo"><strong>Avatar 3</strong></p>
                                <a href="pagina_reserva.php?id=5" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="imagens/Vingadores.jpg" alt="Filme 3">
                                <p class="filmes-titulo"><strong>Avengers: Secret Wars</strong></p>
                                <a href="pagina_reserva.php?id=41" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="imagens/UntilDawn.jpg" alt="Filme 4">
                                <p class="filmes-titulo"><strong>Until Dawn</strong></p>
                                <a href="pagina_reserva.php?id=39" class="btn btn-primary">Ver Filme</a>
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
                                <p class="filmes-titulo"><strong>American Pie: A Primeira Vez É Inesquecível </strong>
                                </p>
                                <a href="pagina_reserva.php?id=3" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="imagens/harry-potter-and-the-deadly-hallows.jpg" alt="Filme 2">
                                <p class="filmes-titulo"><strong>Harry Potter And The Deadly Hallows Part II</strong>
                                </p>
                                <a href="pagina_reserva.php?id=16" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="imagens/Saw.jpg" alt="Filme 3">
                                <p class="filmes-titulo"><strong>Saw</strong></p>
                                <a href="pagina_reserva.php?id=27" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="filmes">
                                <img src="imagens/FF1.jpg" alt="Filme 4">
                                <p class="filmes-titulo"><strong>The Fast & The Furious</strong></p>
                                <a href="pagina_reserva.php?id=13" class="btn btn-primary">Ver Filme</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Código para funcionamento do botão mute dos trailers -->

    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        let players = {};
        let isMuted = true;
        let currentSlide = 0;

        function onYouTubeIframeAPIReady() {
            players.player1 = new YT.Player('player1');
            players.player2 = new YT.Player('player2');
            players.player3 = new YT.Player('player3');
        }

        function playCurrentSlide(index) {
            const keys = Object.keys(players);
            keys.forEach((key, i) => {
                if (i === index) {
                    players[key].playVideo();
                    if (isMuted) players[key].mute();
                    else players[key].unMute();
                } else {
                    players[key].pauseVideo();
                }
            });
        }

        $('#trailerCarousel').on('slid.bs.carousel', function (e) {
            currentSlide = $(e.relatedTarget).index();
            playCurrentSlide(currentSlide);
        });

        document.getElementById('volumeBtn').addEventListener('click', function () {
            isMuted = !isMuted;
            const keys = Object.keys(players);
            const currentPlayer = keys[currentSlide];
            if (isMuted) players[currentPlayer].mute();
            else players[currentPlayer].unMute();

            const icon = this.querySelector('i');
            icon.classList.toggle('fa-volume-mute', isMuted);
            icon.classList.toggle('fa-volume-up', !isMuted);
        });

        window.addEventListener('load', function () {
            setTimeout(() => {
                playCurrentSlide(0);
            }, 1500);
        });
    </script>


</body>

</html>