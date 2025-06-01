<?php
define("ADMINISTRADOR", 1);
define("EMPREGADO", 2);
define("CLIENTE", 3);
define("CLIENTE_APAGADO", 4);
define("CLIENTE_NAO_VALIDO", 5);

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

// A função original a testar
function listaTipoUtilizadorAdminCriar($tipoUtilizador)
{
    switch ($tipoUtilizador) {
        case ADMINISTRADOR:
            echo
                "<label>Tipo de Utilizador</label>" .
                "<select name='tipo' type='number' class='form-control mb-3'>" .
                "<option value='' selected disabled hidden>Selecionar</option>" .
                "<option value=1>" .  getDescricaoUtilizador(1) . "</option>" .
                "<option value=2>" .  getDescricaoUtilizador(2) . "</option>" .
                "<option value=3>" .  getDescricaoUtilizador(3) . "</option></select>";
            break;
        default:
            echo "<p style='color:red;'>Apenas administradores podem ver esta lista.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Teste - listaTipoUtilizadorAdminCriar()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-control { padding: 5px; width: 250px; }
        .mb-3 { margin-bottom: 15px; }
    </style>
</head>
<body>

<h2>Teste da função <code>listaTipoUtilizadorAdminCriar()</code></h2>

<h3>✔ Quando é administrador (deve mostrar dropdown)</h3>
<?php listaTipoUtilizadorAdminCriar(ADMINISTRADOR); ?>

<h3>✖ Quando não é Administrador (deve mostrar aviso)</h3>
<?php listaTipoUtilizadorAdminCriar(!ADMINISTRADOR); ?>

</body>
</html>
