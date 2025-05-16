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

    <main>

        <?php
        //<!-- NAVBAR -->
        include_once('nav_bar_menus.php');

        // Preparar filtros
        $where = [];
        $params = [];

        // Filtro por género
        $nomeGenero = "";
        if (isset($_GET["genero"]) && is_numeric($_GET["genero"])) {
            $idGenero = intval($_GET["genero"]);
            $where[] = "idGenero = ?";
            $params[] = $idGenero;

            $generoNomeQuery = "SELECT descricao FROM generofilme WHERE idGenero = $idGenero";
            $generoNomeResult = mysqli_query($conn, $generoNomeQuery);
            if ($generoNomeResult && mysqli_num_rows($generoNomeResult) > 0) {
                $nomeGenero = mysqli_fetch_assoc($generoNomeResult)["descricao"];
            }
        }

        // Filtro por estado
        if (isset($_GET["estado"])) {
            $estadoTexto = strtolower($_GET["estado"]);
            $idEstado = match ($estadoTexto) {
                "disponivel" => 1,
                "reservado" => 2,
                "alugado" => 3,
                default => null,
            };
            if ($idEstado !== null) {
                $where[] = "idEstadoFilme = ?";
                $params[] = $idEstado;
            }
        }

        // Construção da query SQL
        $sql = "SELECT idFilme, nomeFilme, imagem, descricao, idEstadoFilme FROM filme";
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $stmt = mysqli_prepare($conn, $sql);
        if (!empty($params)) {
            $types = str_repeat("i", count($params));
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        ?>

        <section class="espaço"></section>

        <section class="Filmes">
            <div class="container">
                <h2><strong>Filmes <?= $nomeGenero ? 'de ' . htmlspecialchars($nomeGenero) : '' ?></strong></h2>
                <p>______________________________________</p>

                <!-- Menu dropdown com géneros e estados -->
                <div class="row" style="margin-left: 10px;">
                    <?php include_once "escolhe_genero.php"; ?>
                </div>

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
                            }



                            echo '<div class="col-lg-3 col-md-6 col-sm-12">
                <div class="filmes">
                    <img src="imagens/' . htmlspecialchars($filme['imagem']) . '" alt="' . htmlspecialchars($filme['nomeFilme']) . '">
                    <p class="filmes-titulo"><strong>' . htmlspecialchars($filme['nomeFilme']) . '</strong></p>
                    <div style="background-color: #f0f0f0; border-radius: 8px; padding: 6px 10px; margin-bottom: 10px; display: flex; align-items: center; justify-content: center;">
                        <span style="width: 12px; height: 12px; background-color: ' . $estadoCor . '; border-radius: 50%; display: inline-block; margin-right: 8px;"></span>
                        <span style="color: black;">' . $estadoTexto . '</span>
                    </div>
                    <a href="pagina_reserva.php?id=' . $filme['idFilme'] . '" class="btn btn-primary">Ver Filme</a>
                </div>
              </div>';
                        }
                    } else {
                        echo "<p style='color: white;'>Nenhum filme encontrado com os filtros selecionados.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- FOOTER -->
    <?php include_once('footer.php'); ?>

    <!-- JS para funcionamento do menu dropdown Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

</body>

</html>