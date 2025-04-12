<?php
include "../basedados/basedados.h";

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


    $sql = "INSERT INTO filme (nomeFilme, idEstadoFilme, descricao, idGenero, imagem)
            VALUES ('$nomeFilme', '$idEstadoFilme', '$descricao', '$idGenero', '$imagem')";
    mysqli_query($conn, $sql);
    header("Location: pagina_gestao_filmes.php");
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Criar Filme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        html,
        body {
            background-image: url('Imagens/background.png');
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 1rem;
            margin-top: 2rem;
            max-width: 600px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea,
        select {
            margin-bottom: 1rem;
        }

        .btn-primary {
            font-weight: bold;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
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

            <label>Imagem (ficheiro):</label>
            <input type="file" name="imagem" class="form-control" accept="image/*" required>

            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="pagina_gestao_filmes.php" class="btn btn-primary mt-3">Voltar</a>
        </form>
    </div>
</body>

</html>