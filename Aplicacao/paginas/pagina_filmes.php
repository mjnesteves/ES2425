<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>Codivideo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php 
    include_once('nav_bar_menus.php');

    $where = [];
    $params = [];
    $nomeGenero = "";

    // Filtro por género
    if (isset($_GET['genero']) && is_numeric($_GET['genero'])) {
        $idGenero = intval($_GET['genero']);
        $where[] = "idGenero = ?";
        $params[] = $idGenero;

        $resGenero = mysqli_query($conn, "SELECT descricao FROM generofilme WHERE idGenero = $idGenero");
        if ($resGenero && mysqli_num_rows($resGenero) > 0) {
            $nomeGenero = mysqli_fetch_assoc($resGenero)['descricao'];
        }
    }

    // Filtro por estado
    if (isset($_GET['estado'])) {
        $estadoTexto = strtolower($_GET['estado']);
        $idEstado = match ($estadoTexto) {
            "disponivel" => 1,
            "reservado" => 2,
            "alugado" => 3,
            default => null
        };
        if ($idEstado !== null) {
            $where[] = "idEstadoFilme = ?";
            $params[] = $idEstado;
        }
    }

    // Filtro por pesquisa
    if (isset($_GET['pesquisa']) && $_GET['pesquisa'] !== "") {
        $pesquisa = "%" . $_GET['pesquisa'] . "%";
        $where[] = "nomeFilme LIKE ?";
        $params[] = $pesquisa;
    }

    // Query base
    $sql = "SELECT idFilme, nomeFilme, imagem, idEstadoFilme FROM filme";
    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    // Preparar e executar a query
    $stmt = mysqli_prepare($conn, $sql);
    if (!empty($params)) {
        $types = implode('', array_map(function($param) {
            return is_int($param) ? 'i' : 's';
        }, $params));
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    ?>

    <main>
    
        <section class="Filmes">
            <div class="container" style="margin-top: 50px;">
                <h2><strong>Filmes <?= $nomeGenero ? 'de ' . htmlspecialchars($nomeGenero) : '' ?></strong></h2>
                <hr>
                <p>______________________________________</p>

                <?php include_once "filtro_filmes.php"; ?>

                <div class="row">
                    <?php
                    if (!$resultado) {
                        echo "<p class='text-danger'>Erro ao obter filmes: " . mysqli_error($conn) . "</p>";
                    } elseif (mysqli_num_rows($resultado) === 0) {
                        echo "<p class='text-white pl-3'>Nenhum filme encontrado com os filtros aplicados.</p>";
                    } else {
                        while ($filme = mysqli_fetch_assoc($resultado)) {
                            $estado = intval($filme['idEstadoFilme']);
                            $estadoTexto = '';
                            $estadoCor = '';

                            switch ($estado) {
                                case 1:
                                    $estadoTexto = 'Disponível';
                                    $estadoCor = 'bg-success';
                                    break;
                                case 2:
                                    $estadoTexto = 'Reservado';
                                    $estadoCor = 'bg-warning';
                                    break;
                                case 3:
                                    $estadoTexto = 'Alugado';
                                    $estadoCor = 'bg-danger';
                                    break;
                            }

                            echo '<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="filmes">
                                    <img src="imagens/' . htmlspecialchars($filme['imagem']) . '" alt="' . htmlspecialchars($filme['nomeFilme']) . '" class="img-fluid mb-2">
                                    <p class="filmes-titulo"><strong>' . htmlspecialchars($filme['nomeFilme']) . '</strong></p>
                                    <div class="rounded py-1 px-2 mb-2 d-flex align-items-center justify-content-center bg-light">
                                        <span class="rounded-circle ' . $estadoCor . ' d-inline-block mr-2" style="width: 12px; height: 12px;"></span>
                                        <span class="text-dark">' . $estadoTexto . '</span>
                                    </div>
                                    <a href="pagina_reserva.php?id=' . $filme['idFilme'] . '" class="btn btn-primary btn-block">Ver Filme</a>
                                </div>
                              </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>

    <?php include_once('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
