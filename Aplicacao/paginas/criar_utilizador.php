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

</head>

<body>


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

                    <button type="submit" class="btn btn-primary mt-3" name="Registar">Registar</button>


                    <a href="pagina_gestao_filmes.php" class="btn btn-primary mt-3">Voltar</a>
                </form>

            </div>
            <div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>