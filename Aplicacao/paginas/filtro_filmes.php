<?php
if (!isset($conn)) {
    include_once("basedados.h");
}
?>

<form method="get" class="filtros-filmes d-flex align-items-center flex-wrap">

    <!-- Género -->
    <div class="form-group d-flex align-items-center mb-0 mr-3">
        <label for="genero" class="mb-0 mr-2">Género:</label>
        <select class="form-control form-control-sm" id="genero" name="genero" onchange="this.form.submit()"  style="width: 200px;">
            <option value="">Todos os géneros</option>
            <?php
            $generos = mysqli_query($conn, "SELECT idGenero, descricao FROM generofilme ORDER BY descricao ASC");
            while ($g = mysqli_fetch_assoc($generos)) {
                $selected = (isset($_GET['genero']) && $_GET['genero'] == $g['idGenero']) ? 'selected' : '';
                echo "<option value='{$g['idGenero']}' $selected>" . htmlspecialchars($g['descricao']) . "</option>";
            }
            ?>
        </select>
    </div>

    <!-- Estado -->
    <div class="form-group d-flex align-items-center mb-0 mr-3">
        <label for="estado" class="mb-0 mr-2">Estado:</label>
        <select class="form-control form-control-sm" id="estado" name="estado" onchange="this.form.submit()"  style="width: 200px;">
            <option value="">Todos os estados</option>
            <?php
            $estados = mysqli_query($conn, "SELECT idEstadoFilme, descricao FROM estadofilme ORDER BY descricao ASC");
            while ($e = mysqli_fetch_assoc($estados)) {
                $estadoURL = strtolower($e['descricao']);
                $selected = (isset($_GET['estado']) && $_GET['estado'] == $estadoURL) ? 'selected' : '';
                echo "<option value='{$estadoURL}' $selected>" . htmlspecialchars($e['descricao']) . "</option>";
            }
            ?>
        </select>
    </div>

    <!-- Pesquisa -->
    <div class="form-group d-flex align-items-center mb-0 mr-3">
        <label for="pesquisa" class="mb-0 mr-2">Pesquisar:</label>
        <input type="text" class="form-control form-control-sm pesquisa-input" id="pesquisa" name="pesquisa"  style="margin-top: 15px;"
            placeholder="Título do filme"
            value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : '' ?>">
    </div>

    <!-- Botão -->
    <div class="form-group d-flex align-items-center mb-0">
        <button type="submit" class="btn btn-procurar btn-sm">Procurar</button>
    </div>
</form>