<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Criar Filme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">

</head>

<body>
    <?php include_once('nav_bar_menus.php'); ?>
    <?php

    // Buscar géneros
    $generos = [];
    $sqlGenero = "SELECT idGenero, descricao FROM generofilme";
    $resGenero = mysqli_query($conn, $sqlGenero);
    while ($row = mysqli_fetch_assoc($resGenero)) {
        $generos[] = $row;
    }

    // Buscar estados
    $estados = [];
    $sqlEstado = "SELECT idEstadoFilme, descricao FROM estadofilme";
    $resEstado = mysqli_query($conn, $sqlEstado);
    while ($row = mysqli_fetch_assoc($resEstado)) {
        $estados[] = $row;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeFilme = $_POST['nomeFilme'];
        $idEstadoFilme = $_POST['idEstadoFilme'];
        $descricao = $_POST['descricao'];
        $idGenero = $_POST['idGenero'];
        $classificacao = $_POST['classificacao'];

        // Calcular próximo idFilme com base no valor máximo atual
        $sql_max = "SELECT MAX(idFilme) AS max_id FROM filme";
        $result_max = mysqli_query($conn, $sql_max);
        $row = mysqli_fetch_assoc($result_max);
        $novo_id = $row['max_id'] + 1;

        // Verifica se foi feita submissão com imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
            $nomeTemporario = $_FILES['imagem']['tmp_name'];
            $imagem = basename($_FILES['imagem']['name']);
            $caminhoDestino = "Imagens/" . $imagem;

            // Move a imagem para a pasta /Imagens
            if (!move_uploaded_file($nomeTemporario, $caminhoDestino)) {
                echo "❌ Erro ao mover a imagem!";
                exit;
            }
        } else {
            echo "❌ É necessário enviar uma imagem!";
            exit;
        }

        $sql = "INSERT INTO filme (idFilme, nomeFilme, idEstadoFilme, descricao, idGenero, imagem, classificacao)
        VALUES ('$novo_id', '$nomeFilme', '$idEstadoFilme', '$descricao', '$idGenero', '$imagem', '$classificacao')";

        mysqli_query($conn, $sql);
        header("Location: pagina_gestao_filmes.php");
    }
    ?>

    <section class="vh-100 gradient-custom ">
        <div class="d-flex justify-content-center align-items-center h-100 ">
            <div class="container-cfilme mb-0 md-5 mt-0 md-4 pb-5">
                <h1 class="mb-4">Criar Novo Filme</h1>
                <form method="POST" enctype="multipart/form-data">
                    <label>Nome do Filme:</label>
                    <input type="text" name="nomeFilme" class="form-control" required>

                    <label>Estado do Filme:</label>
                    <select name="idEstadoFilme" class="form-control" required>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?= $estado['idEstadoFilme'] ?>"><?= $estado['descricao'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label>Descrição:</label>
                    <textarea name="descricao" class="form-control" rows="4" required></textarea>

                    <label>Género:</label>
                    <select name="idGenero" class="form-control" required>
                        <?php foreach ($generos as $genero): ?>
                            <option value="<?= $genero['idGenero'] ?>"><?= $genero['descricao'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Classificacao</label>
                     <?php classificacao ()
                     ?>


                    <label>Imagem (ficheiro):</label>
                    <input type="file" name="imagem" class="form-control" accept="image/*" required>

                    <button type="submit" class="btn btn-primary">Criar</button>
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