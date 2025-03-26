<?php
session_start();
include "../basedados/basedados.h";

// Buscar os filmes da base de dados
$sql = "SELECT * FROM filme";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
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
                padding: 2rem;
                border-radius: 1rem;
                margin-top: 2rem;
            }
            table, th, td {
                color: white;
            }
            
            a.btn {
                margin-bottom: 1rem;
            }
            .btn-primary {
                font-weight: bold;
                font-size: 1.1rem;
                padding: 0.6rem 1.2rem;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
            }
            .btn-primary:hover {
                background-color: #0056b3;
                box-shadow: 0 0 15px rgba(255, 255, 255, 0.9);
            }
            .btn-warning,
            .btn-danger {
                color: white;
            }

            .navbar {
                background-color: #000;
                padding: 0.5rem 1rem;
            }

            .navbar .navbar-nav .nav-link {
                color: white;
                font-weight: 500;
                margin-right: 1rem;
            }

            .navbar .navbar-nav .nav-link:hover {
                color: #ccc;
            }

            .navbar-brand img {
                height: 50px;
            }

            .menu-icon {
                width: 30px;
                height: 30px;
            }

            .dropdown-menu.dark-dropdown {
                background-color: #222;
                color: white;
            }

            .dropdown-menu.dark-dropdown a.dropdown-item {
                color: white;
            }

            .dropdown-menu.dark-dropdown a.dropdown-item:hover {
                background-color: #444;
            }

            .espaço {
                height: 80px;
            }
        </style>
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
    </nav><nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

    <section class="espaço">
        
    </section>

    <div class="container">
        <h1 class="mb-4">Gestão de Filmes</h1>

        <a href="criar_filme.php" class="btn btn-primary">Criar Novo Filme</a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome Filme</th>
                    <th>ID Estado Filme</th>
                    <th>Descrição</th>
                    <th>ID Genero</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($filme = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $filme['idFilme']; ?></td>
                        <td><?php echo $filme['nomeFilme']; ?></td>
                        <td><?php echo $filme['idEstadoFilme']; ?></td>
                        <td><?php echo $filme['descricao']; ?></td>
                        <td><?php echo $filme['idGenero']; ?></td>
                        <td>
                            <img src="Imagens/<?php echo $filme['imagem']; ?>" alt="Imagem do Filme" style="width: 100px; height: auto; border-radius: 8px;">
                        </td>
                        <td>
                            <a href="editar_filme.php?id=<?= $filme['idFilme'] ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="eliminar_filme.php?id=<?= $filme['idFilme'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Tens a certeza que queres eliminar este filme?');">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

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