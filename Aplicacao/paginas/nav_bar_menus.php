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
                <li class="nav-item">
                    <a class="nav-link" href="pagina_gestao_filmes.php">Filmes Gestao</a>
                </li>
            </ul>
        </div>

        <!-- Imagens à direita como botões -->
        <div class="d-flex align-items-center">

            <!-- Menu 1 (ícone de lista) -->
            <div class="dropdown custom-dropdown mr-3">
                <a href="#" id="menu1Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="imagens/list.svg" alt="Menu 1" class="menu-icon">
                </a>
                <div class="dropdown-menu dropdown-menu-right dark-dropdown" aria-labelledby="menu1Dropdown">
                    <div class="dropdown-header text-center text-info" style="font-size: 18px; font-weight: bold;">
                        Géneros:</div>
                    <a class="dropdown-item" href="genero.php?genero=1">Ação</a>
                    <a class="dropdown-item" href="genero.php?genero=2">Aventura</a>
                    <a class="dropdown-item" href="genero.php?genero=3">Comédia</a>
                    <a class="dropdown-item" href="genero.php?genero=4">Documentário</a>
                    <a class="dropdown-item" href="genero.php?genero=5">Desenhos Animados</a>
                    <a class="dropdown-item" href="genero.php?genero=6">Drama</a>
                    <a class="dropdown-item" href="genero.php?genero=7">Ficção Científica</a>
                    <a class="dropdown-item" href="genero.php?genero=8">Terror</a>
                    <a class="dropdown-item" href="genero.php?genero=9">Romance</a>
                </div>
            </div>

            <!-- Menu 2 (ícone de utilizador) -->
            <div class="dropdown custom-dropdown">
                <a href="#" id="menu2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="imagens/utilizador.svg" alt="Menu 2" class="menu-icon">
                </a>
                <div class="dropdown-menu dropdown-menu-right dark-dropdown" aria-labelledby="menu2Dropdown">
                    <div class="dropdown-header text-left text-info" style="font-size: 18px; font-weight: bold;">
                        Perfil:
                        <?php
                            if (isset($_SESSION['nome'])) {
                                echo '<span style="margin-left: 10px; color: #00a8e1;">' . htmlspecialchars($nome) . '</span>
                                <a class="dropdown-item" href="./editar_utilizador.php">Atualizar Dados Pessoais</a>
                                <a class="dropdown-item" href="logout.php">Terminar Sessão</a>
                                <a class="dropdown-item" href="login.php">Ajuda</a>';
                            }else{
                                echo '<span style="margin-left: 10px; color: #00a8e1;">' . htmlspecialchars("Visitante") . '</span>
                                <a class="dropdown-item" href="login.php">LOGIN</a>
                                 <a class="dropdown-item" href="login.php">Ajuda</a>';
                                
                            }
                            ?>
                    </div>
                    
                    
                </div>
            </div>

        </div>
</nav>