<?php
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

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>Codivideo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include_once('nav_bar_menus.php'); ?>

    <section class="espaço">

    </section>


    <?php
    ob_start();
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include "../basedados/basedados.h";

    if (!isset($_GET["genero"])) {
        echo "Género não especificado.";
        exit();
    }

    $idGenero = intval($_GET["genero"]);
    $generoNomeQuery = "SELECT descricao FROM generofilme WHERE idGenero = $idGenero";
    $generoNomeResult = mysqli_query($conn, $generoNomeQuery);
    $nomeGenero = mysqli_fetch_assoc($generoNomeResult)["descricao"];
    $query = "SELECT nomeFilme, imagem, descricao, idEstadoFilme FROM filme WHERE idGenero = $idGenero";
    $resultado = mysqli_query($conn, $query);
    ?>


    <section class="Filmes">
        <div class="container">
            <h2><strong>Filmes de <?php echo htmlspecialchars($nomeGenero); ?></strong></h2>
            <p>______________________________________</p>
            <div class="row">
                <?php
                if ($resultado && mysqli_num_rows($resultado) > 0) {
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
                } else {
                    echo "<p>Nenhum filme encontrado para este género.</p>";
                }
                ?>
            </div>
        </div>
    </section>


    <section class="espaço">

    </section>


    <?php include_once('footer.php'); ?>

    </section>


    <?php include_once('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>