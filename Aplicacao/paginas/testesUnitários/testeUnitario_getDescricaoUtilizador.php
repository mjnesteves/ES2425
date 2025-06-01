<?php

define("ADMINISTRADOR", 1);
define("EMPREGADO", 2);
define("CLIENTE", 3);
define("CLIENTE_APAGADO", 4);
define("CLIENTE_NAO_VALIDO", 5);
function getDescricaoUtilizador($tipoUtilizador)
{

    switch ($tipoUtilizador) {
        case ADMINISTRADOR:
            return "Administrador";
        case EMPREGADO:
            return "Empregado";
        case CLIENTE:
            return "Cliente";
        case CLIENTE_APAGADO:
            return "Utilizador apagado";
        case CLIENTE_NAO_VALIDO:
            return "Cliente não validado";
    }
}

// Função de teste
function testarDescricao($entrada, $esperado)
{
    $resultado = getDescricaoUtilizador($entrada);

    if ($resultado === $esperado) {
        echo "<tr style='color: green;'><td>$entrada</td><td>$esperado</td><td>$resultado</td><td>✔ OK</td></tr>";
    } else {
        echo "<tr style='color: red;'><td>$entrada</td><td>$esperado</td><td>$resultado</td><td>✖ Falhou</td></tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Testes - getDescricaoUtilizador()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h2>Testes à função <code>getDescricaoUtilizador()</code></h2>
<table>
    <thead>
        <tr>
            <th>Entrada</th>
            <th>Esperado</th>
            <th>Resultado</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        testarDescricao(ADMINISTRADOR, "Administrador");
        testarDescricao(EMPREGADO, "Empregado");
        testarDescricao(CLIENTE, "Cliente");
        testarDescricao(CLIENTE_APAGADO, "Utilizador apagado");
        testarDescricao(CLIENTE_NAO_VALIDO, "Cliente não validado");
        testarDescricao(0, null); // Teste com valor inválido
        testarDescricao("Codivideo", null); // Teste com valor inválido
        testarDescricao(1.2, null); // Teste com valor inválido
        ?>
    </tbody>
</table>
</body>
</html>

