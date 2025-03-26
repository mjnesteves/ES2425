<?php
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Erro de ligação: " . mysqli_connect_error());
}

if (!mysqli_select_db($conn, "codivideo")) {
    die("Base de dados não encontrada!");
}

echo "Ligação com sucesso à base de dados!";
?>