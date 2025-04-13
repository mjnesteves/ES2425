
<?php
session_start();

include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";

$nome = $_GET["nome"];
$email = $_GET["email"];
$password = $_GET["password"];
$dataNascimento = $_GET["dataNascimento"];
$morada = $_GET["morada"];
$telefone = $_GET["telefone"];
$mensagens_erro = array();


$sql = "SELECT email FROM utilizador WHERE email='$email'";
$consultaBD = mysqli_query($conn, $sql);
if (! $consultaBD) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}

$infoBD = mysqli_fetch_array($consultaBD);

if ($infoBD > 0) {
    
    array_push($mensagens_erro, "Escolha outro email");
    mysqli_close($conn);
  
} else {
    $sql = "INSERT INTO `utilizador` (`nome`,`email`, `password`, `tipoUtilizador`,`dataNascimento`, `morada`,`telefone`)
    VALUES ('" . $nome . "','" . $email . "','" . md5($password) . "', '3','" . $dataNascimento . "','" . $morada . "','" . $telefone . "');";
    $consultaBD = mysqli_query($conn, $sql);
    if (! $consultaBD) {
        die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
    }
    array_push($mensagens_erro, "Conta criada. Faça login!");
    mysqli_close($conn);
}

$_SESSION['erros'] = $mensagens_erro;
echo json_encode($_SESSION['erros']);

?>
