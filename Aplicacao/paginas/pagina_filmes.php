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
                <a href="#" id="menu2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
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

    <section class="espaço">
        
    </section>


    <section class="Filmes">
        <div class="container">
            <h2><strong>Filmes</strong></h2>
            <p>______________________________________</p>
            <div class="row">
                <?php
                    include "../basedados/basedados.h"; // Liga à base de dados ($conn)
    
                    $query = "SELECT nomeFilme, imagem, idEstadoFilme FROM filme";

                    $resultado = mysqli_query($conn, $query);
    
                    if (!$resultado) {
                        echo "<p>Erro ao obter filmes: " . mysqli_error($conn) . "</p>";
                    } else {
                        while ($filme = mysqli_fetch_assoc($resultado)) {
                            
                            $estado = intval($filme['idEstadoFilme']);
        $estadoTexto = '';
        $estadoCor = '';

        switch ($estado) {
            case 1:
                $estadoTexto = 'Disponível';
                $estadoCor = 'green';
                break;
            case 2:
                $estadoTexto = 'Reservado';
                $estadoCor = 'orange';
                break;
            case 3:
                $estadoTexto = 'Alugado';
                $estadoCor = 'red';
                break;
            default:
                $estadoTexto = 'Desconhecido';
                $estadoCor = 'gray';
        }

        echo '<div class="col-lg-3 col-md-6 col-sm-12">
                <div class="filmes">
                    <img src="imagens/' . htmlspecialchars($filme['imagem']) . '" alt="' . htmlspecialchars($filme['nomeFilme']) . '">
                    <p class="filmes-titulo"><strong>' . htmlspecialchars($filme['nomeFilme']) . '</strong></p>
                    <div style="background-color: #f0f0f0; border-radius: 8px; padding: 6px 10px; margin-bottom: 10px; display: flex; align-items: center; justify-content: center;">
                        <span style="width: 12px; height: 12px; background-color: ' . $estadoCor . '; border-radius: 50%; display: inline-block; margin-right: 8px;"></span>
                        <span style="color: black;">' . $estadoTexto . '</span>
                    </div>
                    <a href="#" class="btn btn-primary">Ver Filme</a>
                </div>
              </div>';
    }
                        }
                    
                ?>
            </div>
        </div>
    </section>

    <section class="espaço">
        
    </section>


    <footer class="footer fixed-bottom">
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