<?php
include "basedados.h";

$id = $_GET['id'];

$sql = "DELETE FROM filme WHERE idFilme = $id";
mysqli_query($conn, $sql);

header("Location: pagina_gestao_filmes.php");
?>