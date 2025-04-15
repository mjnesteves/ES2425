<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>A terminar sessão...</title>
	<link rel="stylesheet" href="pagina_login.css">
	<style>
		body {
			text-align: center;
			font-family: Arial, sans-serif;
			background-color:rgb(23, 36, 65);
			color: white;
			margin: 0;
			padding: 0;
		}

		#loading {
			font-size: 24px;
			margin-top: 100px;
		}
	</style>
</head>
<body>
	

	<div id="loading">A terminar sessão...</div>

	<script>
		setTimeout(function () {
			window.location.href = 'pagina_inicial.php';
		}, 1000);
	</script>

	
</body>
</html>
