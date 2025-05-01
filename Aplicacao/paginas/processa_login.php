<?php
session_start();

include "../basedados/basedados.h";
include './Constantes_Utilizadores.php';

if (isset($_GET["email"]) && isset($_GET["password"])) {

	//Dados do formulário
	$email = $_GET["email"];
	$password = $_GET["password"];

	//Array para guardar os erros gerados durante a validação dos dados
	$mensagem = array();

	//Consulta à base de dados
	$sql = "SELECT * FROM utilizador WHERE email = '$email' AND password = '" . md5($password) . "';";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
	}

	$linha = mysqli_fetch_array($retval);

	//Validação efetuada, estabelecer as variáveis de sessão para identificar o utilizador
	if ($linha != 0) {

		$tipoUtilizador = $linha["tipoUtilizador"];

		//Se o Utilizador já estiver registado no sistema mas não está válido ou está classificado como apagado

		if ($tipoUtilizador == CLIENTE_NAO_VALIDO || $tipoUtilizador == CLIENTE_APAGADO) {
			array_push($mensagem, "Contactar Administrador");
		} else {
			if (strcmp($linha["email"], $email) == 0 && strcmp($linha["password"], md5($password)) == 0) {
				$_SESSION["idUtilizador"] = $linha["idUtilizador"];
				$_SESSION["nome"] = $linha["nome"];
				$_SESSION["tipoUtilizador"] = $linha["tipoUtilizador"];

				//Array para guardar os erros gerados durante a validação dos dados
				array_push($mensagem, " Bem vindo, " . $_SESSION["nome"] . "");
			}
		}
	} else {

		//Array para guardar os erros gerados durante a validação dos dados
		array_push($mensagem, "Credenciais Invalidas!");
	}

	//Estabelecer a variável de sessão e defini-la com o array dos erros
	$_SESSION['mensagem'] = $mensagem;

	//Fazer o encode para JS  para ser utilizado no modal na página login.php
	echo json_encode($_SESSION['mensagem']);
} else {
	session_destroy();
	header("refresh:0;url = ./pagina_inicial.php");
}
