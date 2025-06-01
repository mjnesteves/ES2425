<?php
function limparInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
function testarLimparInput($entrada, $esperado) {
    $resultado = limparInput($entrada);

    if ($resultado === $esperado) {
        echo "<tr style='color: green;'>
                <td><code>" . htmlentities($entrada) . "</code></td>
                <td><code>" . htmlentities($esperado) . "</code></td>
                <td><code>" . htmlentities($resultado) . "</code></td>
                <td>✔ Teste OK</td>
              </tr>";
    } else {
        echo "<tr style='color: red;'>
                <td><code>" . htmlentities($entrada) . "</code></td>
                <td><code>" . htmlentities($esperado) . "</code></td>
                <td><code>" . htmlentities($resultado) . "</code></td>
                <td>✖ Teste Falhou</td>
              </tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Testes à função limparInput()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h1> Testes à função <code>limparInput()</code></h1>
<p>Verifica se a função está a limpar corretamente os dados de entrada.</p>

<table>
    <thead>
        <tr>
            <th>Entrada Original</th>
            <th>Esperado</th>
            <th>Resultado Obtido</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        testarLimparInput("   Olá mundo!   ", "Olá mundo!");
        testarLimparInput("<script>alert('XSS')</script>", "&lt;script&gt;alert('XSS')&lt;/script&gt;");
        testarLimparInput("O\\'Reilly", "O'Reilly");
        testarLimparInput("  <b>Texto</b>  ", "&lt;b&gt;Texto&lt;/b&gt;");
        testarLimparInput("normal", "normal");
        ?>
    </tbody>
</table>

</body>
</html>
