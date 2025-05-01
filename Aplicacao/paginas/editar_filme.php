<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Editar Filme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

</head>

<body>
    <?php
    include_once('nav_bar_menus.php');


    if ($tipoUtilizador != ADMINISTRADOR && $tipoUtilizador != EMPREGADO) {
        header("Location: pagina_inicial.php");
        exit();
    }


    // escolhe géneros
    $generos = [];
    $sqlGenero = "SELECT idGenero, descricao FROM generofilme";
    $resGenero = mysqli_query($conn, $sqlGenero);
    while ($row = mysqli_fetch_assoc($resGenero)) {
        $generos[] = $row;
    }

    // escolhe estados
    $estados = [];
    $sqlEstado = "SELECT idEstadoFilme, descricao FROM estadofilme";
    $resEstado = mysqli_query($conn, $sqlEstado);
    while ($row = mysqli_fetch_assoc($resEstado)) {
        $estados[] = $row;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM filme WHERE idFilme = $id";
    $resultado = mysqli_query($conn, $sql);
    $filme = mysqli_fetch_assoc($resultado);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeFilme = $_POST['nomeFilme'];
        $idEstadoFilme = $_POST['idEstadoFilme'];
        $descricao = $_POST['descricao'];
        $idGenero = $_POST['idGenero'];

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $nomeTemporario = $_FILES['imagem']['tmp_name'];
            $imagem = basename($_FILES['imagem']['name']);
            $caminhoDestino = "Imagens/" . $imagem;

            // Move o ficheiro para a pasta /Imagens
            if (move_uploaded_file($nomeTemporario, $caminhoDestino)) {
                // Upload feito com sucesso
            } else {
                echo "Erro ao mover o ficheiro!";
                exit;
            }
        } else {
            // Nenhuma imagem nova foi enviada → manter a antiga
            $imagem = $_POST['imagemAntiga'];
        }

        $sql = "UPDATE filme SET 
            nomeFilme='$nomeFilme', 
            idEstadoFilme='$idEstadoFilme', 
            descricao='$descricao', 
            idGenero='$idGenero', 
            imagem='$imagem' 
            WHERE idFilme = $id";

        mysqli_query($conn, $sql);
        header("Location: pagina_gestao_filmes.php");
    }
    ?>
    <section class="vh-100 gradient-custom ">
        <div class="d-flex justify-content-center align-items-center h-100 mt-5">
            <div class="container-login-criar">


                <h1 class="mb-4">Editar Filme</h1>
                <form method="POST" enctype="multipart/form-data">
                    <label>Nome do Filme:</label>
                    <input type="text" name="nomeFilme" class="form-control" value="<?= $filme['nomeFilme'] ?>"
                        required>

                    <label>Estado do Filme:</label>

                    <select name="idEstadoFilme" class="form-control" required>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?= $estado['idEstadoFilme'] ?>"
                                <?= $filme['idEstadoFilme'] == $estado['idEstadoFilme'] ? 'selected' : '' ?>>
                                <?= $estado['descricao'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>


                    <label>Descrição:</label>
                    <textarea name="descricao" class="form-control" rows="4"
                        required><?= $filme['descricao'] ?></textarea>

                    <label>Género:</label>

                    <select name="idGenero" class="form-control" required>
                        <?php foreach ($generos as $genero): ?>
                            <option value="<?= $genero['idGenero'] ?>" <?= $filme['idGenero'] == $genero['idGenero'] ? 'selected' : '' ?>>
                                <?= $genero['descricao'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>


                    <label>Imagem (ficheiro):</label>
                    <input type="file" name="imagem" class="form-control" accept="image/*">
                    <input type="hidden" name="imagemAntiga" value="<?= $filme['imagem'] ?>">


                    <button type="submit" class="btn btn-primary">Guardar Alterações</button>
                    <a href="javascript:history.back()" class="btn btn-primary mt-3">Voltar</a>


                </form>
            </div>
        </div>

    </section>

    <?php include_once('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>