<!DOCTYPE html>
<html lang="pt">

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Editar Utilizador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
    </style>
</head>

<body>

    <?php

    session_start();

    include "../basedados/basedados.h";
    include './Constantes_Utilizadores.php';
    include "./funcoesAuxiliares.php";


    if (isset($_SESSION["idUtilizador"])) {
        $idUtilizador = $_SESSION["idUtilizador"];
        unset($_SESSION);
        $_SESSION["idUtilizador"] = $idUtilizador;

        $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$idUtilizador'";
        $res = mysqli_query($conn, $sql);
        $infoUtilizador = mysqli_fetch_array($res);

        $tipoUtilizador = $infoUtilizador['tipoUtilizador'];
        $nome = $infoUtilizador['nome'];
        $email = $infoUtilizador['email'];
        $password = $infoUtilizador['password'];
        $dataNascimento = $infoUtilizador['dataNascimento'];
        $morada = $infoUtilizador['morada'];
        $telefone = $infoUtilizador['telefone'];
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
                        <a class="dropdown-item" href="./logout.php">Terminar Sessão</a>
                    </div>
                </div>

            </div>
    </nav>


    <section class="vh-100 gradient-custom ">
        <div class="d-flex justify-content-center align-items-center h-100 mt-5">
            <div class="container mb-0 md-5 mt-0 md-4 pb-5">
                <h1 class="mb-4">Atualizar informacao de <?php echo ($nome) ?></h1>
                <form method="GET" id="formulario" action="./atualizarUtilzador.php">

                    <?php
                    if ($tipoUtilizador == ADMINISTRADOR) {
                        listaTipoUtilizadorAdmin($tipoUtilizador);
                    }
                    ?>

                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required value=<?php echo "'$nome'" ?>>

                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value=<?php echo "'$email'" ?>>

                    <label>Password</label>
                    <input type="password" name="password" class="form-control">

                    <label>Data de Nascimento</label>
                    <input type="date" name="dataNascimento" class="form-control" value=<?php echo "'$dataNascimento'" ?>>

                    <label>Morada</label>
                    <input type="text" name="morada" class="form-control" value=<?php echo "'$morada'" ?>>

                    <label>Contacto</label>
                    <input type="tel" name="telefone" class="form-control" value=<?php echo "'$telefone'" ?>>

                    <button type="submit" class="btn btn-primary mt-3" name="Registar">Atualizar</button>


                    <a href="pagina_gestao_filmes.php" class="btn btn-primary mt-3">Voltar</a>
                </form>

            </div>
            <div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="recuperarPassword" tabindex="-1" role="dialog" aria-labelledby="recuperarPassoword" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mt-1">
                    <h3 class="font-weight-bold text-secondary text-center" id=info>Informação</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="font-weight-bold text-secondary text-center" id=sessionResult> </h3>

                </div>
                <div class="modal-footer mx-auto">
                    <button id="ajaxButton" class="btn btn-primary" data-toggle="modal" data-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var mensagem;

        $("#formulario").on("submit", function(e) {
            var serializeData = $('#formulario').serialize();
            e.preventDefault();
            $.ajax({
                url: './atualizarUtilizador.php',
                type: 'GET',
                data: serializeData,
                success: function(data) {
                    mensagem = JSON.parse(data);
                    const screenToShow = document.getElementById('sessionResult')
                    mensagem.forEach(erro => {
                        const linha = document.createElement('p')
                        linha.innerText = erro
                        screenToShow.append(linha);
                    })
                    $("#recuperarPassword").modal('show');
                },
                error: function(data) {
                    alert("error");
                }
            });
        });


        $('#ajaxButton').on('click', function() {
            // Send Ajax request
            $.ajax({
                success: function(response) {
                    if (mensagem[0] === 'Dados atualizados com sucesso') {
                        window.location.href = 'index.php';
                    } else {
                        location.reload()
                    }
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong!');
                }
            });
        });
    </script>


    <footer class="footer">
        <div class="container-footer text-center align-items-center">
            <p class="footer-title">Codivideo</p>
            <p class="footer-text">© 2024-2025 Codivideo. Todos os direitos reservados.</p>
            <p class="footer-text"><a href="https://www.codivideo.pt">www.codivideo.pt</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>