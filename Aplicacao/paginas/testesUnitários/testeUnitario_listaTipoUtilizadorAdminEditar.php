<?php
define("ADMINISTRADOR", 1);
define("EMPREGADO", 2);
define("CLIENTE", 3);
define("CLIENTE_APAGADO", 4);
define("CLIENTE_NAO_VALIDO", 5);

// Função auxiliar
function getDescricaoUtilizador($tipoUtilizador)
{
    switch ($tipoUtilizador) {
        case ADMINISTRADOR: return "Administrador";
        case EMPREGADO: return "Empregado";
        case CLIENTE: return "Cliente";
        case CLIENTE_APAGADO: return "Utilizador apagado";
        case CLIENTE_NAO_VALIDO: return "Cliente não validado";
    }
}

// Função principal
function listaTipoUtilizadorAdminEditar($tipo)
{
    switch ($tipo) {
        case ADMINISTRADOR:
            echo "<label>Tipo de Utilizador</label>
                  <select name='tipo' type='number' class='form-control mb-3'>
                      <option value='$tipo'>" . getDescricaoUtilizador($tipo) . "</option>
                      <option value=2>" . getDescricaoUtilizador(2) . "</option>
                      <option value=3>" . getDescricaoUtilizador(3) . "</option>
                  </select>";
            break;
        case EMPREGADO:
            echo "<label>Tipo de Utilizador</label>
                  <select name='tipo' type='number' class='form-control mb-3'>
                      <option value='$tipo'>" . getDescricaoUtilizador($tipo) . "</option>
                      <option value=1>" . getDescricaoUtilizador(1) . "</option>
                      <option value=3>" . getDescricaoUtilizador(3) . "</option>
                  </select>";
            break;
        case CLIENTE:
            echo "<label>Tipo de Utilizador</label>
                  <select name='tipo' type='number' class='form-control mb-3'>
                      <option value='$tipo'>" . getDescricaoUtilizador($tipo) . "</option>
                      <option value=1>" . getDescricaoUtilizador(1) . "</option>
                      <option value=2>" . getDescricaoUtilizador(2) . "</option>
                  </select>";
            break;
        default:
            echo "<p style='color:red;'>Tipo de utilizador inválido ou não editável.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Teste - listaTipoUtilizadorAdminEditar()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-control { padding: 5px; width: 250px; }
        .mb-3 { margin-bottom: 15px; }
    </style>
</head>
<body>

<h2>Testes à função <code>listaTipoUtilizadorAdminEditar()</code></h2>

<h3>✔ Quando o utilizador é ADMINISTRADOR</h3>
<?php listaTipoUtilizadorAdminEditar(ADMINISTRADOR); ?>

<h3>✔ Quando o utilizador é EMPREGADO</h3>
<?php listaTipoUtilizadorAdminEditar(EMPREGADO); ?>

<h3>✔ Quando o utilizador é CLIENTE</h3>
<?php listaTipoUtilizadorAdminEditar(CLIENTE); ?>

<h3>✖ Quando o tipo é inválido</h3>
<?php listaTipoUtilizadorAdminEditar(0); ?>

</body>
</html>
