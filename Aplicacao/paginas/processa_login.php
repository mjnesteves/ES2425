<?php
session_start();

include "../basedados/basedados.h";
include './Constantes_Utilizadores.php';

if (isset($_GET["email"]) && isset($_GET["password"])) {

<<<<<<< HEAD
	$email = $_GET["email"];
	$password = $_GET["password"];
	$mensagem = array();

	

=======
	//Dados do formulário
	$email = $_GET["email"];
	$password = $_GET["password"];

	//Array para guardar os erros gerados durante a validação dos dados
	$mensagem = array();

	//Consulta à base de dados
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
	$sql = "SELECT * FROM utilizador WHERE email = '$email' AND password = '" . md5($password) . "' AND tipoUtilizador != " . CLIENTE_APAGADO . ";";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro
	}

	$row = mysqli_fetch_array($retval);

<<<<<<< HEAD
	if($row !=0 ){
=======
	//Validação efetuada, estabelecer as variáveis de sessão para identificar o utilizador
	if ($row ==1 ) {
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
		if (strcmp($row["email"], $email) == 0 && strcmp($row["password"], md5($password)) == 0) {
			$_SESSION["idUtilizador"] = $row["idUtilizador"];
			$_SESSION["nome"] = $row["nome"];
			$_SESSION["tipoUtilizador"] = $row["tipoUtilizador"];
<<<<<<< HEAD
		}

		    //echo "<script> alert ('Fez Login!') </script>";
			array_push($mensagem, " Bem vindo, " .$_SESSION["nome"]. "" );
    		//echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";

	} else {
		array_push($mensagem, "Credenciais Invalidas!");
		//echo "<script> alert ('Credenciais Invalidas. Tente Novamente!') </script>";
		//echo "<script> setTimeout(function () { window.location.href = './login.php'; }, 0)</script>";
	}

	$_SESSION['mensagem'] = $mensagem;
    echo json_encode($_SESSION['mensagem']);

	 
} else {
	session_destroy();
	header("refresh:0;url = ./pagina_inicial.php");
}
?>
=======

			//Array para guardar os erros gerados durante a validação dos dados
			array_push($mensagem, " Bem vindo, " . $_SESSION["nome"] . "");
			
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
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
