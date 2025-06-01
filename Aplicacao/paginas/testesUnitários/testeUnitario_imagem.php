<?php
function imagem($classificacao){

        switch ($classificacao) {
        case 1:
            echo"<img src='./Imagens/Icons/mais18.jpg' width=80 height=80>";
        break;
        default:
     
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Teste - imagem()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
    </style>
</head>
<body>

<h2>Teste à função <code>imagem()</code></h2>

<h3>✔ Quando classificação = 1 (deve mostrar imagem +18)</h3>
<?php imagem(1); ?>

<h3>✖ Quando classificação = 0 (não deve mostrar imagem)</h3>
<?php imagem(0); ?>

<h3>✖ Quando classificação = 3 (também não deve mostrar imagem)</h3>
<?php imagem(3); ?>

<h3>✖ Quando classificação = 99 (também não deve mostrar imagem)</h3>
<?php imagem(99); ?>

</body>
</html>
