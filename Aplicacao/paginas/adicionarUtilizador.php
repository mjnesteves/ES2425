
<?php
session_start();

include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";


if (isset($_SESSION["idUtilizador"])) {
    $idUtilizador = $_SESSION["idUtilizador"];
    $nome = $_SESSION["nome"];
    $tipoUtilizador = $_SESSION["tipoUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipoUtilizador"] = $tipoUtilizador;
}


//Dados do formulário

$nome = $_GET["nome"];
$email = $_GET["email"];
$password = $_GET["password"];
$dataNascimento = $_GET["dataNascimento"];
$morada = $_GET["morada"];
$telefone = $_GET["telefone"];

$sql = "SELECT email FROM utilizador WHERE email='$email'";
$consultaBD = mysqli_query($conn, $sql);
if (! $consultaBD) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}

$infoBD = mysqli_fetch_array($consultaBD);

if ($infoBD != 0) {

    //Adiciona ao array a mensagem de erro
    array_push($mensagens_erro, "Escolha outro email");
    mysqli_close($conn);
    echo " <script> alert ('ERRO!! Utilizador já registado! Escolha outro nome!') </script>";
    echo "<script> setTimeout(function () { window.location.href = './criar_utilizador.php'; }, 0)</script>";
} else {

    //Após a validação do email é adicionado o utilizador
    
    if (isset($tipoUtilizador) && ($tipoUtilizador = ADMINISTRADOR)) {
        
        //ADMINISTRADOR
        $tipo = $_GET["tipo"];

        $sql = "INSERT INTO `utilizador` (`nome`,`email`, `password`, `tipoUtilizador`,`dataNascimento`, `morada`,`telefone`)
        VALUES ('" . $nome . "','" . $email . "','" . md5($password) . "','".$tipo. "','" . $dataNascimento . "','" . $morada . "','" . $telefone . "');";
        $consultaBD = mysqli_query($conn, $sql);
        if (! $consultaBD) {
            die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
        }
         //Adiciona ao array a mensagem de erro
        array_push($mensagens_erro, "Utilizador Adicionado!");
    } else {

        //UTILIZADOR
        $sql = "INSERT INTO `utilizador` (`nome`,`email`, `password`, `tipoUtilizador`,`dataNascimento`, `morada`,`telefone`)
        VALUES ('" . $nome . "','" . $email . "','" . md5($password) . "', '3','" . $dataNascimento . "','" . $morada . "','" . $telefone . "');";
        $consultaBD = mysqli_query($conn, $sql);
        if (! $consultaBD) {
            die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
        }

          //Adiciona ao array a mensagem de erro
        array_push($mensagens_erro, "Conta criada. Faça login!");
    }


    
    mysqli_close($conn);
}
mysqli_close($conn);

?>
