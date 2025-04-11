
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Criar Utilizador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            max-width: 600px;
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
    </style>
</head>

<body>


<?php
session_start();


include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";
include "./funcoesAuxiliares.php";


if (isset($_SESSION["idUtilizador"])) {
    $idUtilizador = $_SESSION["idUtilizador"];
    $nome = $_SESSION["nome"];
    $tipoUtilizador= $_SESSION["tipoUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipoUtilizador"] = $tipoUtilizador;
}
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <!-- Logotipo à esquerda -->
            <a class="navbar-brand" href="index.html">
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
                        <div class="dropdown-header text-left text-info" style="font-size: 18px; font-weight: bold;">
                            Perfis:
                            <?php
                            if (isset($_SESSION['nome'])) {
                                echo '<span style="margin-left: 10px; color: #00a8e1;">' . htmlspecialchars($nome) . '</span>';
                            }
                            ?>
                        </div>
                        <a class="dropdown-item" href="alterarperfil.html">Alterar Perfil</a>
                        <a class="dropdown-item" href="ajuda.html">Ajuda</a>
                        <div class="dropdown-header text-left text-info" style="font-size: 18px; font-weight: bold;">A tua conta:</div>
                        <a class="dropdown-item" href="definicoes.html">Definições</a>
                        <a class="dropdown-item" href="logout.php">Terminar Sessão</a>
                    </div>
                </div>

            </div>
    </nav>



    <section class="vh-100 gradient-custom ">
        <div class="d-flex justify-content-center align-items-center h-100 ">
            <div class="container mb-0 md-5 mt-0 md-4 pb-5">
                <h1 class="mb-4">Novo Utilizador</h1>
                <form method="GET" action="./adicionarUtilizador.php">

                <?php
                if(isset($tipoUtilizador) && $tipoUtilizador==1){
                    listaTipoUtilizadorAdmin($tipoUtilizador);
                    ///////////
                }
                ?>
               
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required>

                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>

                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>

                    <label>Data de Nascimento</label>
                    <input type="date" name="dataNascimento"class="form-control" required>

                    <label>Morada</label>
                    <input type="text" name="morada" class="form-control" required>

                    <label>Contacto</label>
                    <input type="tel" name="telefone" class="form-control" required>

                    <button type="submit" class="btn btn-primary mt-3" name="Registar">Registar</button>


                    <a href="pagina_gestao_filmes.php" class="btn btn-primary mt-3">Voltar</a>
                </form>

            </div>
            <div>
    </section>


    <footer class="footer fixed-bottom">
        <div class="container-footer text-center align-items-center">
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