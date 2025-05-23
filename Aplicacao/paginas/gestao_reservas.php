<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>Gestão de Reservas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <main>
        <?php

        include_once('nav_bar_menus.php');

        // Verifica se está logado
        if (!isset($_SESSION['tipoUtilizador'])) {
            header("Location: pagina_login.php");
            exit();
        }

        // 👉 Processar atualização do estado (só se não for cliente)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idReserva'], $_POST['novoEstado']) && $_SESSION['tipoUtilizador'] !== CLIENTE) {
            $idReserva = intval($_POST['idReserva']);
            $novoEstado = intval($_POST['novoEstado']);

            $update = mysqli_prepare($conn, "UPDATE reserva SET idEstadoReserva = ? WHERE idReserva = ?");
            mysqli_stmt_bind_param($update, "ii", $novoEstado, $idReserva);
            mysqli_stmt_execute($update);
            mysqli_stmt_close($update);

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // Buscar todos os estados disponíveis
        $estados_result = mysqli_query($conn, "SELECT * FROM estadoreserva");
        $estados = [];
        while ($row = mysqli_fetch_assoc($estados_result)) {
            $estados[$row['idEstadoReserva']] = $row['descricao'];
        }

        // 👉 Mostrar só as reservas do próprio cliente
        if ($_SESSION['tipoUtilizador'] === "3") {
            $sql = "SELECT 
                r.idReserva,
                r.idEstadoReserva,
                u.nome AS nomeUtilizador,
                r.dataReserva,
                r.dataLevantamento,
                f.nomeFilme,
                e.descricao AS estadoReserva,
                l.morada
            FROM reserva r
            JOIN utilizador u ON r.idUtilizador = u.idUtilizador
            JOIN filme f ON r.idFilme = f.idFilme
            JOIN estadoreserva e ON r.idEstadoReserva = e.idEstadoReserva
            JOIN loja l ON r.idLoja = l.idLoja
            WHERE r.idUtilizador = ?
            ORDER BY r.idReserva ASC";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $_SESSION['idUtilizador']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        } else {
            // 👉 Admins e funcionários veem todas
            $sql = "SELECT 
                r.idReserva,
                r.idEstadoReserva,
                u.nome AS nomeUtilizador,
                r.dataReserva,
                r.dataLevantamento,
                f.nomeFilme,
                e.descricao AS estadoReserva,
                l.morada
            FROM reserva r
            JOIN utilizador u ON r.idUtilizador = u.idUtilizador
            JOIN filme f ON r.idFilme = f.idFilme
            JOIN estadoreserva e ON r.idEstadoReserva = e.idEstadoReserva
            JOIN loja l ON r.idLoja = l.idLoja
            ORDER BY r.idReserva ASC";

            $result = mysqli_query($conn, $sql);
        }
        ?>

        <section>
            <div class="container" style="margin-top: 50px;">
                <table class="table table-dark table-striped mt-3 cantos_tabela">
                    <thead>
                        <tr>
                            <th>ID Reserva</th>
                            <th>Nome Utilizador</th>
                            <th>Data Reserva</th>
                            <th>Data Levantamento</th>
                            <th>Filme</th>
                            <th>Loja</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!$result) {
                            echo "<tr><td colspan='7'>Erro ao buscar dados: " . mysqli_error($conn) . "</td></tr>";
                        } else {
                            while ($linha = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                <td>{$linha['idReserva']}</td>
                <td>{$linha['nomeUtilizador']}</td>
                <td>{$linha['dataReserva']}</td>
                <td>{$linha['dataLevantamento']}</td>
                <td>{$linha['nomeFilme']}</td>
                <td>{$linha['morada']}</td>
                <td>";

                                // Admins e funcionários podem editar o estado
                                if ($_SESSION['tipoUtilizador'] === '1' || $_SESSION['tipoUtilizador'] === '2'){
                                    echo "<form method='POST'>
                                    <input type='hidden' name='idReserva' value='{$linha['idReserva']}'>
                                     <select name='novoEstado' class='form-control select-com-seta' onchange='this.form.submit()'>";
                                    foreach ($estados as $id => $desc) {
                                        $selected = ($id == $linha['idEstadoReserva']) ? 'selected' : '';
                                        echo "<option value='$id' $selected>$desc</option>";
                                    }
                                    echo "</select>
                                        </form>";
                                } else {
                                    // Clientes só veem o texto
                                    echo "<span>{$linha['estadoReserva']}</span>";
                                }

                                echo "</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <?php include "./footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>