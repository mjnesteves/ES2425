<?php
session_start();

include "../basedados/basedados.h";
include './Constantes_Utilizadores.php';

if (isset($_GET["email"]) && isset($_GET["password"])) {

	$email = $_GET["email"];
	$password = $_GET["password"];
	$mensagem = array();

<<<<<<< HEAD

=======
	
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e

	$sql = "SELECT * FROM utilizador WHERE email = '$email' AND password = '" . md5($password) . "' AND tipoUtilizador != " . CLIENTE_APAGADO . ";";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
	}

	$row = mysqli_fetch_array($retval);

<<<<<<< HEAD
	if ($row != 0) {
=======
	if($row !=0 ){
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e
		if (strcmp($row["email"], $email) == 0 && strcmp($row["password"], md5($password)) == 0) {
			$_SESSION["idUtilizador"] = $row["idUtilizador"];
			$_SESSION["nome"] = $row["nome"];
			$_SESSION["tipoUtilizador"] = $row["tipoUtilizador"];
<<<<<<< HEAD

			//echo "<script> alert ('Fez Login!') </script>";
			array_push($mensagem, " Bem vindo, " . $_SESSION["nome"] . "");
			//echo "<script> setTimeout(function () { window.location.href = './index.php'; }, 0)</script>";
		} 
	} else {

=======
		}

		    //echo "<script> alert ('Fez Login!') </script>";
			array_push($mensagem, " Bem vindo, " .$_SESSION["nome"]. "" );
    		//echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";

	} else {
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e
		array_push($mensagem, "Credenciais Invalidas!");
		//echo "<script> alert ('Credenciais Invalidas. Tente Novamente!') </script>";
		//echo "<script> setTimeout(function () { window.location.href = './login.php'; }, 0)</script>";
	}

	$_SESSION['mensagem'] = $mensagem;
<<<<<<< HEAD
	echo json_encode($_SESSION['mensagem']);
} else {

	session_destroy();
	header("refresh:0;url = ./index.php");
}
=======
    echo json_encode($_SESSION['mensagem']);

	 
} else {
	session_destroy();
	header("refresh:0;url = ./pagina_inicial.php");
}
?>
>>>>>>> 1173f7f13e2ecf70a98170a73cfe3c46b0f4800e
