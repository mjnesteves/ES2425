
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
<<<<<<< HEAD
$mensagens_erro = array();
=======
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e


$sql = "SELECT email FROM utilizador WHERE email='$email'";
$consultaBD = mysqli_query($conn, $sql);
if (! $consultaBD) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}

$infoBD = mysqli_fetch_array($consultaBD);

<<<<<<< HEAD
if ($infoBD > 0) {
    
    array_push($mensagens_erro, "Escolha outro email");
    mysqli_close($conn);
  
=======
if ($infoBD != 0) {
    mysqli_close($conn);
    echo " <script> alert ('ERRO!! Utilizador já registado! Escolha outro nome!') </script>";
    echo "<script> setTimeout(function () { window.location.href = './criar_utilizador.php'; }, 0)</script>";
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e
} else {
    $sql = "INSERT INTO `utilizador` (`nome`,`email`, `password`, `tipoUtilizador`,`dataNascimento`, `morada`,`telefone`)
    VALUES ('" . $nome . "','" . $email . "','" . md5($password) . "', '3','" . $dataNascimento . "','" . $morada . "','" . $telefone . "');";
    $consultaBD = mysqli_query($conn, $sql);
    if (! $consultaBD) {
        die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
    }
<<<<<<< HEAD
    array_push($mensagens_erro, "Conta criada. Faça login!");
    mysqli_close($conn);
}

$_SESSION['erros'] = $mensagens_erro;
echo json_encode($_SESSION['erros']);
=======
    echo " <script> alert ('Conta criada. Faça login!') </script>";
    echo "<script> setTimeout(function () { window.location.href = './login.php'; }, 0)</script>";
}
mysqli_close($conn);
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e

?>
