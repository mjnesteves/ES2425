<?php

<<<<<<< HEAD
session_start();

if (isset($_SESSION["idUtilizador"])) {
=======
// Início da sessão
session_start();


if (isset($_SESSION["idUtilizador"])) {

    // Obter o ID do utilizador e criar a varável de sessão respetiva
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    $idUtilizador = $_SESSION["idUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;

    include "../basedados/basedados.h";

<<<<<<< HEAD
=======
    //Obter os dados do formulário da página editar_utilizador.php
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $dataNascimento = $_GET["dataNascimento"];
    $morada = $_GET["morada"];
    $telefone = $_GET["telefone"];

<<<<<<< HEAD
    $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$idUtilizador'";
    $res = mysqli_query($conn, $sql);
    $infoUtilizador = mysqli_fetch_array($res);
    $atualizar = true;
    $mensagens_erro = array();


=======
    //Consulta à base de dados 
    $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$idUtilizador'";
    $res = mysqli_query($conn, $sql);
    $infoUtilizador = mysqli_fetch_array($res);

    //Variável para validar a inserção dos dados
    $atualizar = true;
    //Array para guardar os erros gerados durante a validação dos dados
    $mensagens_erro = array();

    //Validação do nome
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    if (strcmp($nome, $infoUtilizador['nome']) != 0) {
        $atualizarNome = "UPDATE utilizador SET nome ='" . $nome . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarNome);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
<<<<<<< HEAD
=======
    // Validação do email
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    if (strcmp($email, $infoUtilizador['email']) != 0) {

        $atualizarEmail = "SELECT * FROM utilizador WHERE email = '$email'";
        $atualizarBD = mysqli_query($conn, $atualizarEmail);
        $consultaEmail = mysqli_fetch_array($atualizarBD);

<<<<<<< HEAD
        if ($consultaEmail > 0) {
            $atualizar = false;
=======
        //Se a consulta à base de dados devolver um resultado significa que já existe na base de dados 
        if ($consultaEmail == 1) {
            $atualizar = false;

            //Adiciona ao array a mensagem de erro
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
            array_push($mensagens_erro, "Escolha outro email");
        } else {
            $atualizarEmail = "UPDATE utilizador SET email ='" . $email . "' WHERE idUtilizador='$idUtilizador'";
            $atualizarBD = mysqli_query($conn, $atualizarEmail);
            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        }
    }
<<<<<<< HEAD
=======

    //Comparação entre a password inserida e a existente, se o resultado da comparação for diferente, atualiza na BD a nova password
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    if (strcmp($password, "") != 0) {
        $atualizarPassword = "UPDATE utilizador SET password ='" . md5($password) . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarPassword);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
<<<<<<< HEAD
=======

    //Comparação entre a password na Base de dados e a nova password, se for diferente, atualiza
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    if (strcmp($dataNascimento, $infoUtilizador['dataNascimento']) != 0) {
        $atualizarDataNascimento = "UPDATE utilizador SET dataNascimento ='" . $dataNascimento . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarDataNascimento);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
<<<<<<< HEAD
=======

    //Comparação entre a morada na Base de dados e a inserida, se for diferente, atualiza.
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    if (strcmp($morada, $infoUtilizador['morada']) != 0) {
        $atualizarMorada = "UPDATE utilizador SET morada ='" . $morada . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarMorada);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
<<<<<<< HEAD
    if (strcmp($telefone, $infoUtilizador['telefone']) != 0) {

=======

    //Comparação entre o numero de telefone na BD e a atual
    if (strcmp($telefone, $infoUtilizador['telefone']) != 0) {

        // Se o número for fora dos parâmetros, não aceita
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
        if ($telefone < 999999999 && $telefone > 111111111) {
            $atualizarTelefone = "UPDATE utilizador SET telefone ='" . $telefone . "' WHERE idUtilizador='$idUtilizador'";
            $atualizarBD = mysqli_query($conn, $atualizarTelefone);

            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        } else {
            $atualizar = false;
<<<<<<< HEAD
=======
            //Adiciona ao array a mensagem de erro
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
            array_push($mensagens_erro, "Numero de telefone invalido");
        }
    }

<<<<<<< HEAD
=======
    //Se a validação estiver correta, a mensagem de sucesso é adicionada ao array
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    if ($atualizar) {
        array_push($mensagens_erro, "Dados atualizados com sucesso");
    }

<<<<<<< HEAD
    $_SESSION['erros'] = $mensagens_erro;
=======
    //Estabelecer a variável de sessão e defini-la com o array dos erros
    $_SESSION['erros'] = $mensagens_erro;

    //Fazer o encode para JS  para ser utilizado no modal na página editar_utilizador.php
>>>>>>> 9efe70ac67c08fd5bafa53bb3e05e5ff8f42bafd
    echo json_encode($_SESSION['erros']);
} else {
    session_destroy();
    echo "<script>setTimeout(function(){ window.location.href = './pagina_inicial.php'; }, 0)</script>";
}
