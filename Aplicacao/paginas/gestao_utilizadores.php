<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <title>Gestão de Utilizadores</title>
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


    if ($tipoUtilizador != ADMINISTRADOR ) {
        header("Location: pagina_inicial.php");
        exit();
    }
      ?>
      
      <section>
        <div class="container">

          <a href="./criar_utilizador.php" class="btn btn-primary mt-5">Criar Utilizador</a>

          <table class="table btn-primary table-dark cantos_tabela mt-3">

            <?php

            $sql = "SELECT * FROM utilizador";
            $retval = mysqli_query($conn, $sql);
            if (!$retval) {
              die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
            } ?>
            <tr>
              <th>ID</th>
              <th>Tipo</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Validar</th>
              <th>Editar</th>
              <th>Invalidar</th>
              <th>Eliminar</th>
            </tr>
            <?php
            while ($linha = mysqli_fetch_array($retval)) {
              echo "
                  <tr>
                    <td>" . $linha["idUtilizador"] . "</td>
                    <td>" . getDescricaoUtilizador($linha["tipoUtilizador"]) . "</td>
                    <td>" . $linha["nome"] . "</td>
                    <td>" . $linha["email"] . "</td>

                    ";
              //VALIDAR						
              if ($linha["tipoUtilizador"] == CLIENTE_NAO_VALIDO || $linha["tipoUtilizador"] == CLIENTE_APAGADO) {
                echo "	<td><a href='./GestaoUtilizadores/validarUtilizador.php?utilizador=" . $linha["idUtilizador"] . "' ><img src='./Imagens/Icons/validar.png' width=40 height=40></a></td>";
              } else
                echo "<td></td>";
              //EDITAR
              if ($linha["tipoUtilizador"] != CLIENTE_APAGADO) {
                echo "	<td><a href='./editar_utilizador.php?utilizador=" . $linha["idUtilizador"] . "' ><img src='./Imagens/Icons/editar.png' width=40 height=40></a></td>";
              } else
                echo "<td></td>";
              //INVALIDAR
              if ($linha["tipoUtilizador"] != ADMINISTRADOR && $linha["tipoUtilizador"] != EMPREGADO && $linha["tipoUtilizador"] != CLIENTE_APAGADO && $linha["tipoUtilizador"] != CLIENTE_NAO_VALIDO)
                echo "<td><a href='./GestaoUtilizadores/invalidarUtilizador.php?utilizador=" . $linha["idUtilizador"] . "' ><img src='./Imagens/Icons/invalidar.png' width=40 height=40></a></td>";
              else
                echo "<td></td>";
              //ELIMINAR
              if ($linha["tipoUtilizador"] != ADMINISTRADOR && $linha["tipoUtilizador"] != EMPREGADO && $linha["tipoUtilizador"] == CLIENTE)
                echo "<td><a href='./GestaoUtilizadores/eliminarUtilizador.php?utilizador=" . $linha["idUtilizador"] . "' ><img src='./Imagens/Icons/cancelar.png' width=40 height=40></a></td>";
              else
                echo "<td></td>";
              echo "</tr>";
            }
            echo "</table>";


            ?>

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