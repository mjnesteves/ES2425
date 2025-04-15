<<<<<<< HEAD
<?php
session_start();


include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";
include "./funcoesAuxiliares.php";


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
=======
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
<!DOCTYPE html>
<html lang="pt">

<head>
<<<<<<< HEAD
=======
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    <meta charset="UTF-8">
    <title>Criar Utilizador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

=======
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
</head>

<body>


<<<<<<< HEAD
    <section class="vh-100 gradient-custom ">
        <div class="d-flex justify-content-center align-items-center h-100 ">
            <div class="container-criar mb-0 md-5 mt-0 md-4 pb-5">
                <h1 class="mb-4">Novo Utilizador</h1>
                <form method="GET" action="./adicionarUtilizador.php">

                    <?php
                    if (isset($tipoUtilizador) && $tipoUtilizador == 1) {
                        listaTipoUtilizadorAdmin($tipoUtilizador);
                    }
                    ?>

                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required>

                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>

                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>

                    <label>Data de Nascimento</label>
                    <input type="date" name="dataNascimento" class="form-control" required>

                    <label>Morada</label>
                    <input type="text" name="morada" class="form-control" required>

                    <label>Contacto</label>
                    <input type="tel" name="telefone" class="form-control" required>

                    <button type="submit" class="btn btn-primary" name="Registar">Registar</button>


                    <a href="pagina_gestao_filmes.php" class="btn btn-primary mt-3">Voltar</a>
                </form>

            </div>
            <div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
=======
    <?php
    session_start();


    include "../basedados/basedados.h";
    include "./Constantes_Utilizadores.php";
    include "./funcoesAuxiliares.php";


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

    <?php include "./nav_bar_menus.php"; ?>


    <section class="section-form-login-criar">
        <div class="container-login-criar">
            <h1 class="mb-4">Novo Utilizador</h1>
            <form method="GET" id="formulario" action="./adicionarUtilizador.php">
                <?php
                if (isset($tipoUtilizador) && $tipoUtilizador == 1) {
                    listaTipoUtilizadorAdmin($tipoUtilizador);
                }
                ?>

                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>

                <label>Email</label>
                <input type="email" name="email" class="form-control" required>

                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                <label>Data de Nascimento</label>
                <input type="date" name="dataNascimento" class="form-control" required>

                <label>Morada</label>
                <input type="text" name="morada" class="form-control" required>

                <label>Contacto</label>
                <input type="tel" name="telefone" class="form-control" required>

                <button type="submit" class="btn btn-primary mt-3">Registar</button>


                <a href="pagina_inicial.php" class="btn btn-primary mt-3">Voltar</a>
            </form>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="mostra_modal" tabindex="-1" role="dialog" aria-labelledby="mostra_modal" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mt-1">
                    <h3 class="font-weight-bold text-secondary text-center" id=info>Informação</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="font-weight-bold text-secondary text-center" id="criar_utilizador"> </h3>

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
                url: './adicionarUtilizador.php',
                type: 'GET',
                data: serializeData,
                success: function(data) {
                    mensagem = JSON.parse(data);
                    const screenToShow = document.getElementById('criar_utilizador')
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
                    if (mensagem[0] === 'Conta criada. Faça login!') {
                        window.location.href = 'login.php';
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
  <?php include "./footer.php"; ?>


>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>