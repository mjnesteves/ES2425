<?php
// Função
function calculoIdade($dataNascimento){

    $dataAtual = new DateTime((date("Y-m-d")));
    $dataNascimento =  new DateTime($dataNascimento);

    $aux = $dataAtual->diff($dataNascimento);

    $idade = $aux->y;
    return $idade;
}

// Função para mostrar o resultado do teste
function testarCalculoIdade($dataTeste, $idadeEsperada) {
    $idadeCalculada = calculoIdade($dataTeste);

    if ($idadeCalculada === $idadeEsperada) {
        echo "<tr style='color: green;'>
                <td>$dataTeste</td>
                <td>$idadeEsperada</td>
                <td>$idadeCalculada</td>
                <td>✔ Teste OK</td>
              </tr>";
    } else {
        echo "<tr style='color: red;'>
                <td>$dataTeste</td>
                <td>$idadeEsperada</td>
                <td>$idadeCalculada</td>
                <td>✖ Teste Falhou</td>
              </tr>";
    }
}
// Calcula dinamicamente a idade esperada com base no ano atual
$anoAtual = date("Y");
$mesAtual = date("m");
$diaAtual = date("d");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Testes Unitários — calculoIdade()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Testes à função <code>calculoIdade()</code></h1>
    <p>Estes testes simulam diferentes datas de nascimento para verificar se a função calcula corretamente a idade do utilizador.</p>

    <table>
        <thead>
            <tr>
                <th>Data de Nascimento</th>
                <th>Idade Esperada</th>
                <th>Idade Calculada</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            testarCalculoIdade("2000-01-01", $anoAtual - 2000);
            testarCalculoIdade(date("Y-m-d"), 0);
            testarCalculoIdade("2010-05-29", $anoAtual - 2010 - (($mesAtual < 5 || ($mesAtual == 5 && $diaAtual < 29)) ? 1 : 0));
            testarCalculoIdade("2050-05-29", -($anoAtual - 2050));
            testarCalculoIdade("2007-05-29", $anoAtual - 2007 - (($mesAtual < 5 || ($mesAtual == 5 && $diaAtual < 29)) ? 1 : 0));
            ?>
        </tbody>
    </table>

    <p style="margin-top: 30px;">✔ <strong>Objetivo:</strong> Confirmar que a função retorna a idade correta para várias datas de nascimento, incluindo limites legais para +18.</p>

</body>
</html>
