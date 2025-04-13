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

    <?php include "./nav_bar_menus.php"; ?>

    <section class="section-form-login-criar">
        <div class="container-login-criar">
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

                <button type="submit" class="btn btn-primary mt-3">Atualizar</button>


                <a href="pagina_inicial.php" class="btn btn-primary mt-3">Voltar</a>
            </form>

        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="mostra_modal" tabindex="-1" role="dialog" aria-labelledby="mostra_modal" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  mx-auto>
                    <h3 class=" font-weight-bold text-secondary text-center" id=info>Informação</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-auto">
                    <h3 class="font-weight-bold text-secondary text-center" id=editar_utilizador> </h3>
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
                    const screenToShow = document.getElementById('editar_utilizador')
                    mensagem.forEach(erro => {
                        const linha = document.createElement('p')
                        linha.innerText = erro
                        screenToShow.append(linha);
                    })
                    $("#mostra_modal").modal('show');
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
                        window.location.href = 'pagina_inicial.php';
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