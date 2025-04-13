<?php
session_start();

include "../basedados/basedados.h";
include './Constantes_Utilizadores.php';

if (isset($_GET["email"]) && isset($_GET["password"])) {

	$email = $_GET["email"];
	$password = $_GET["password"];
	$mensagem = array();


	$sql = "SELECT * FROM utilizador WHERE email = '$email' AND password = '" . md5($password) . "' AND tipoUtilizador != " . CLIENTE_APAGADO . ";";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
	}

	$row = mysqli_fetch_array($retval);

	if ($row > 0) {
		if (strcmp($row["email"], $email) == 0 && strcmp($row["password"], md5($password)) == 0) {
			$_SESSION["idUtilizador"] = $row["idUtilizador"];
			$_SESSION["nome"] = $row["nome"];
			$_SESSION["tipoUtilizador"] = $row["tipoUtilizador"];

			array_push($mensagem, " Bem vindo, " . $_SESSION["nome"] . "");
			
		} 
	} else {

		array_push($mensagem, "Credenciais Invalidas!");
	}

	$_SESSION['mensagem'] = $mensagem;
	echo json_encode($_SESSION['mensagem']);
} else {

	session_destroy();
	header("refresh:0;url = ./pagina_inicial.php");
}
