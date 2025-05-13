<?php

session_start();
include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";
include "./funcoesAuxiliares.php";

if (isset($_SESSION["idUtilizador"])) {
    $idUtilizador = $_SESSION["idUtilizador"];
    $nome = $_SESSION["nome"];
    $tipoUtilizador = $_SESSION["tipoUtilizador"];
    $idade = $_SESSION["idade"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipoUtilizador"] = $tipoUtilizador;
    $_SESSION["idade"] = $idade;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logotipo à esquerda -->
        <a class="navbar-brand" href="pagina_inicial.php">
            <img src="imagens/Codivideo Logo2.png" alt="Codivideo" style="height: 50px;">
        </a>

        <!-- Menu principal alinhado à esquerda -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="pagina_inicial.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pagina_filmes.php">Filmes</a>
                </li>
            </ul>
        </div>

        <!-- Imagens à direita como botões -->
        <div class="d-flex align-items-center">



            <!-- Menu 2 (ícone de utilizador) -->
            <div class="dropdown custom-dropdown">
                <a href="#" id="menu2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="imagens/utilizador.svg" alt="Menu 2" class="menu-icon">
                </a>
                <div class="dropdown-menu dropdown-menu-right dark-dropdown" aria-labelledby="menu2Dropdown">
                    <div class="dropdown-header text-left text-info" style="font-size: 18px; font-weight: bold;">

                        <?php
                        // Estas páginas têm de ser incluidas aqui senão as condições abaixo não funcionam. 
                        // RETIRAR TODOS OS INCLUDES que estiverem NAS OUTRAS PAGINAS.
                        // Se tiverem problemas, revejam o código nas Ferramentas de Desenvolvimento do Browser
                        


                        if (isset($idUtilizador) && isset($tipoUtilizador)) {


                            $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$idUtilizador'";
                            $res = mysqli_query($conn, $sql);
                            $infoUtilizador = mysqli_fetch_array($res);

                            //Independentemente do utilizador, cada um tem nome e tipo de utilizador
                            echo '
                            Nome:
                            <span style="margin-left: 10px; color: #00a8e1;">' . htmlspecialchars($infoUtilizador['nome']) . '</span></br>
                            Perfil:
                            <span style="margin-left: 10px; color: #00a8e1;">' . getDescricaoUtilizador($tipoUtilizador) . '</span>
                            <p></p>';

                            if ($tipoUtilizador == ADMINISTRADOR) {
                                echo '
                                    <a class="dropdown-item" href="./editar_utilizador.php?utilizador=' . $idUtilizador . '">Atualizar Dados Pessoais</a>
                                    <a class="dropdown-item" href="./gestao_utilizadores.php">Gestão de Utilizadores</a>
                                    <a class="dropdown-item" href="./gestao_reservas.php">Gestão de Reservas</a>
                                    <a class="dropdown-item" href="./pagina_gestao_filmes.php">Gestão de Filmes</a>
                                    <a class="dropdown-item" href="logout.php">Terminar Sessão</a>';

                            } else if ($tipoUtilizador == EMPREGADO) {

                                echo '
                                    <a class="dropdown-item" href="./editar_utilizador.php?utilizador=' . $idUtilizador . '">Atualizar Dados Pessoais</a>
                                    <a class="dropdown-item" href="./gestao_reservas.php">Gestão de Reservas</a>
                                    <a class="dropdown-item" href="./pagina_gestao_filmes.php">Gestão de Filmes</a>
                                    <a class="dropdown-item" href="logout.php">Terminar Sessão</a>';

                            } else if ($tipoUtilizador == CLIENTE) {

                                echo '
                                    <a class="dropdown-item" href="./editar_utilizador.php?utilizador=' . $idUtilizador . '">Atualizar Dados Pessoais</a>
                                    <a class="dropdown-item" href="./gestao_reservas.php">Gestão de Reservas</a>
                                    <a class="dropdown-item" href="ajuda.php">Ajuda</a>
                                    <a class="dropdown-item" href="logout.php">Terminar Sessão</a>';
                            }

                        } else {
                            echo '
                            Perfil:
                            <span style="margin-left: 10px; color: #00a8e1;">Visitante</span>
                            <p></p>
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="criar_utilizador.php">Criar Conta</a>
                            <a class="dropdown-item" href="ajuda.php">Ajuda</a>';
                        }



                        ?>
                    </div>
                </div>
            </div>
        </div>
</nav>