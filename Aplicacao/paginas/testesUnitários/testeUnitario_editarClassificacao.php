<?php
function editarClassificacao ($classificacao){
    switch ($classificacao) {
        case 0:
            echo "<select name='classificacao' type='number' class='form-control mb-3'>" .
             "<option value='$classificacao selected'>" .  "Menos de 18 anos" . "</option>" .
             "<option value=1>" .  "Igual ou maior de 18 anos" . "</option></select>"; 
             break;
        case 1:
            echo "<select name='classificacao' type='number' class='form-control mb-3'>" .
             "<option value='$classificacao selected '>" .  "Igual ou maior de 18 anos" . "</option>" .
              "<option value=0>" .  "Menos de 18 anos" . "</option></select>" ;
             break;
    }       
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Teste - editarClassificacao()</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-control { padding: 5px; width: 250px; }
        .mb-3 { margin-bottom: 15px; }
    </style>
</head>
<body>

<h2>Teste à função <code>editarClassificacao()</code></h2>

<h3>✔ Quando classificação é 0 (deve vir selecionado: "Menos de 18 anos")</h3>
<?php editarClassificacao(0); ?>

<h3>✔ Quando classificação é 1 (deve vir selecionado: "Igual ou maior de 18 anos")</h3>
<?php editarClassificacao(1); ?>

<h3>✖ Quando é um valor inválido (ex: 2)</h3>
<?php editarClassificacao(2); ?>

</body>
</html>