
<?php
session_start();

include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";

<<<<<<< HEAD
=======
//Dados do formulário
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
$nome = $_GET["nome"];
$email = $_GET["email"];
$password = $_GET["password"];
$dataNascimento = $_GET["dataNascimento"];
$morada = $_GET["morada"];
$telefone = $_GET["telefone"];

<<<<<<< HEAD

=======
//Array para guardar os erros gerados durante a validação dos dados
$mensagens_erro = array();

//Consulta à base de dados para apurar se já existe algum utilzador com o mesmo email
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
$sql = "SELECT email FROM utilizador WHERE email='$email'";
$consultaBD = mysqli_query($conn, $sql);
if (! $consultaBD) {
    die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
}

$infoBD = mysqli_fetch_array($consultaBD);

<<<<<<< HEAD
if ($infoBD != 0) {
    mysqli_close($conn);
    echo " <script> alert ('ERRO!! Utilizador já registado! Escolha outro nome!') </script>";
    echo "<script> setTimeout(function () { window.location.href = './criar_utilizador.php'; }, 0)</script>";
} else {
=======
if ($infoBD == 1) {

    //Adiciona ao array a mensagem de erro
    array_push($mensagens_erro, "Escolha outro email");
    mysqli_close($conn);
} else {

    //Após a validação do email é adicionado o utilizador
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    $sql = "INSERT INTO `utilizador` (`nome`,`email`, `password`, `tipoUtilizador`,`dataNascimento`, `morada`,`telefone`)
    VALUES ('" . $nome . "','" . $email . "','" . md5($password) . "', '3','" . $dataNascimento . "','" . $morada . "','" . $telefone . "');";
    $consultaBD = mysqli_query($conn, $sql);
    if (! $consultaBD) {
        die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
    }
<<<<<<< HEAD
    echo " <script> alert ('Conta criada. Faça login!') </script>";
    echo "<script> setTimeout(function () { window.location.href = './login.php'; }, 0)</script>";
}
mysqli_close($conn);
=======

    //Adiciona ao array a mensagem de erro
    array_push($mensagens_erro, "Conta criada. Faça login!");
    mysqli_close($conn);
}

//Estabelecer a variável de sessão e defini-la com o array dos erros
$_SESSION['erros'] = $mensagens_erro;

//Fazer o encode para JS  para ser utilizado no modal na página criar_utilizador.php
echo json_encode($_SESSION['erros']);
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd

?>
