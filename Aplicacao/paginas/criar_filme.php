<?php
include "basedados.h";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeFilme = $_POST['nomeFilme'];
    $idEstadoFilme = $_POST['idEstadoFilme'];
    $descricao = $_POST['descricao'];
    $idGenero = $_POST['idGenero'];
    $imagem = $_POST['imagem'];

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
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 1rem;
            margin-top: 2rem;
            max-width: 600px;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            margin-bottom: 1rem;
        }
        .btn-primary {
            font-weight: bold;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Criar Novo Filme</h1>
        <form method="POST">
            <label>Nome do Filme:</label>
            <input type="text" name="nomeFilme" class="form-control" required>

            <label>ID Estado Filme:</label>
            <input type="number" name="idEstadoFilme" class="form-control" required>

            <label>Descrição:</label>
            <textarea name="descricao" class="form-control" rows="4" required></textarea>

            <label>ID Género:</label>
            <input type="number" name="idGenero" class="form-control" required>

            <label>Imagem (ficheiro):</label>
            <input type="text" name="imagem" class="form-control">

            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="pagina_gestao_filmes.php" class="btn btn-primary mt-3">Voltar</a>
        </form>
    </div>
</body>
</html>