
<?php
session_start();

include "../basedados/basedados.h";
include "./Constantes_Utilizadores.php";

$criadoPorAdmin = isset($_SESSION['idTipoUtilizador']) && $_SESSION['idTipoUtilizador'] == ADMINISTRADOR;

//Dados do formulário
$nome = $_GET["nome"];
$email = $_GET["email"];
$password = $_GET["password"];
$dataNascimento = $_GET["dataNascimento"];
$morada = $_GET["morada"];
$telefone = $_GET["telefone"];

//Array para guardar os erros gerados durante a validação dos dados
$mensagens_erro = array();

//Consulta à base de dados para apurar se já existe algum utilzador com o mesmo email
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
} else {

    //Após a validação do email é adicionado o utilizador
    $sql = "INSERT INTO `utilizador` (`nome`,`email`, `password`, `tipoUtilizador`,`dataNascimento`, `morada`,`telefone`)
    VALUES ('" . $nome . "','" . $email . "','" . md5($password) . "', '3','" . $dataNascimento . "','" . $morada . "','" . $telefone . "');";
    $consultaBD = mysqli_query($conn, $sql);
    if (! $consultaBD) {
        die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
    }

    //Adiciona ao array a mensagem de erro
    array_push($mensagens_erro, "Conta criada. Faça login!");
    mysqli_close($conn);
}

//Estabelecer a variável de sessão e defini-la com o array dos erros
$_SESSION['erros'] = $mensagens_erro;

//Fazer o encode para JS  para ser utilizado no modal na página criar_utilizador.php
echo json_encode($_SESSION['erros']);

?>
