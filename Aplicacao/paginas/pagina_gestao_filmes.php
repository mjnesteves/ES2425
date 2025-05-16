<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-utjQz5wVK8DTG0sA/DQUkP3StkOr9+tjWsrLjzmqMbS3ydI8RGmohqMyicAAlJfVL8Y2noX0k9HvlZ6MV2AZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php
    include_once('nav_bar_menus.php');


    if ($tipoUtilizador != ADMINISTRADOR && $tipoUtilizador != EMPREGADO) {
        header("Location: pagina_inicial.php");
        exit();
    }

    // Buscar os filmes da base de dados
    $sql = "SELECT f.idFilme, f.nomeFilme, f.descricao, f.imagem, 
               e.descricao AS estadoDescricao, 
               g.descricao AS generoDescricao
        FROM filme f
        JOIN estadofilme e ON f.idEstadoFilme = e.idEstadoFilme
        JOIN generofilme g ON f.idGenero = g.idGenero
        ORDER BY f.idFilme";

    $resultado = mysqli_query($conn, $sql);
    ?>

    <section class="espaço"></section>

    <section class="Filmes">
        <div class="container">
            <h1 class="mb-4">Gestão de Filmes</h1>
            <p>______________________________________</p>

            <a href="criar_filme.php" class="btn btn-primary">Criar Novo Filme</a>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome Filme</th>
                        <th>Estado Filme</th>
                        <th>Descrição</th>
                        <th>Genero</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filme = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $filme['idFilme']; ?></td>
                            <td><?php echo $filme['nomeFilme']; ?></td>
                            <td><?php echo $filme['estadoDescricao']; ?></td>
                            <td><?php echo $filme['descricao']; ?></td>
                            <td><?php echo $filme['generoDescricao']; ?></td>
                            <td>
                                <img src="Imagens/<?php echo $filme['imagem']; ?>" alt="Imagem do Filme"
                                    style="width: 100px; height: auto; border-radius: 8px;">
                            </td>
                            <td>
                                <a href="editar_filme.php?id=<?= $filme['idFilme'] ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="abrirModal(<?= $filme['idFilme'] ?>)">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="espaço"></section>
    
    <?php include_once('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Modal personalizada -->
    <div id="modalConfirmacao"
        style="display:none; position:fixed; top:30%; left:50%; transform:translateX(-50%); background:#111; color:white; padding:20px; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.8); z-index:999;">
        <h4 class="mb-3">Codivideo</h4>
        <p>🛑 Tens a certeza que queres eliminar este filme?</p>
        <div class="text-right">
            <button onclick="confirmarEliminacao()" class="btn btn-danger mr-2">Sim</button>
            <button onclick="fecharModal()" class="btn btn-danger">Cancelar</button>
        </div>
    </div>

    <script>
        let idFilmeAEliminar = null;

        function abrirModal(id) {
            idFilmeAEliminar = id;
            document.getElementById('modalConfirmacao').style.display = 'block';
        }

        function fecharModal() {
            document.getElementById('modalConfirmacao').style.display = 'none';
            idFilmeAEliminar = null;
        }

        function confirmarEliminacao() {
            if (idFilmeAEliminar !== null) {
                window.location.href = 'eliminar_filme.php?id=' + idFilmeAEliminar;
            }
        }
    </script>

</body>

</html>