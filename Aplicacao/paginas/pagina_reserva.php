<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>Codivideo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

    <?php include_once('nav_bar_menus.php');


    // Verificar se utilizador está logado
    if (!isset($_SESSION['idUtilizador'])) {
        header("Location: login.php");
        exit();
    }

    // Obter ID do filme via GET
    $idFilme = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Obter dados do filme
    $sqlFilme = "SELECT nomeFilme, imagem, descricao, idEstadoFilme, classificacao FROM filme WHERE idFilme = ?";
    $stmtFilme = mysqli_prepare($conn, $sqlFilme);
    mysqli_stmt_bind_param($stmtFilme, "i", $idFilme);
    mysqli_stmt_execute($stmtFilme);
    $resultFilme = mysqli_stmt_get_result($stmtFilme);
    $filme = mysqli_fetch_assoc($resultFilme);


    $idade = $_SESSION["idade"];
    $classificacao = $filme['classificacao'];


    echo("<script>console.log('PHP: " . $filme['classificacao'] . "');</script>");
    



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



    // Obter lista de lojas
    $sqlLojas = "SELECT idLoja, morada FROM loja";
    $resultLojas = mysqli_query($conn, $sqlLojas);
    ?>

    <section class="espaço"></section>
    <main>
        <section class="Filmes">
            <div class="container">
                <h2><strong>Reservar Filme</strong></h2>
                <p>______________________________________</p>

                <div class="row align-items-center justify-content-center">
                    <!-- Coluna da imagem -->
                    <div class="col-md-5 text-center">
                        <img src="Imagens/<?= htmlspecialchars($filme['imagem']) ?>"
                            alt="<?= htmlspecialchars($filme['nomeFilme']) ?>" class="poster-img">
                        <div class="imdb-box">Classificação IMDB <strong>7.0/10</strong></div>
                    </div>

                    <!-- Coluna do formulário -->
                    <div class="col-md-6">

                        <!-- Nome do filme -->
                        <h3 style="color: white; font-weight: bold;"><?= htmlspecialchars($filme['nomeFilme']) ?></h3>

                        <!-- Descrição do filme -->
                        <p style="color: #ccc; font-size: 16px; max-height: 150px; overflow-y: auto;">
                            <?= nl2br(htmlspecialchars($filme['descricao'])) ?>
                        </p>

                        <!-- Classificacao do filme -->

                             <p style="color: #ccc; font-size: 16px; max-height: 150px; overflow-y: auto;">
                            <?php imagem($classificacao) ?>
                            </p>

                        <?php 
                            if(isset($idUtilizador) &&
                            ($idade<18 && ($classificacao == 0) || 
                            ($idade>=18 && ($classificacao ==1 || $classificacao==0)))){
                            
                        ?>

                                               <!-- Estado do filme -->
                        <div
                            style="background-color: white; border-radius: 8px; padding: 6px 10px; margin: 10px 0; display: inline-flex; align-items: center;">
                            <span
                                style="width: 12px; height: 12px; background-color: <?= $estadoCor ?>; border-radius: 50%; display: inline-block; margin-right: 8px;"></span>
                            <span style="color: black;"><?= $estadoTexto ?></span>
                        </div>
                        

                        <form action="confirmar_reserva.php" method="post" class="form-box-reserva">
                            <input type="hidden" name="idFilme" value="<?= $idFilme ?>">
                            <input type="hidden" name="idUtilizador" value="<?= $_SESSION['idUtilizador'] ?>">

                            <label for="loja">Loja para levantamento:</label>
                            <select name="idLoja" class="form-control" required>
                                <option value="" disabled selected>Escolher loja</option>
                                <?php while ($loja = mysqli_fetch_assoc($resultLojas)): ?>
                                    <option value="<?= $loja['idLoja'] ?>"><?= htmlspecialchars($loja['morada']) ?></option>
                                <?php endwhile; ?>
                            </select>

                            <label for="data">Dia de levantamento:</label>
                            <input type="date" name="data" id="data_viagem" class="form-control" required>

                            <div class="text-center mt-4">
                                <?php if ($estadoTexto === 'Disponível'): ?>
                                    <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-secondary" disabled
                                        style="cursor: not-allowed;">Indisponível</button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>

                <?php

                        }
                ?>
                <div class="container" style="margin-top: 50px;">
                    <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </section>

    </main>

    <?php include_once('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Popup de erro -->
    <div id="popupErro" class="popup-confirma" style="display:none; background-color:#dc3545;">
        A data escolhida não pode ser anterior à data atual.
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form");
            const dataInput = document.getElementById("data_viagem");
            const popupErro = document.getElementById("popupErro");

            const hoje = new Date().toISOString().split("T")[0];
            dataInput.setAttribute("min", hoje); // bloqueia datas anteriores no calendário

            form.addEventListener("submit", function (e) {
                const dataEscolhida = new Date(dataInput.value);
                const hoje = new Date();
                hoje.setHours(0, 0, 0, 0);

                if (dataEscolhida < hoje) {
                    e.preventDefault();
                    popupErro.style.display = "block";
                    setTimeout(() => {
                        popupErro.style.display = "none";
                    }, 5000);
                }
            });
        });
    </script>


</body>

</html>