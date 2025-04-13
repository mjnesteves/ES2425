<?php

// Início da sessão
session_start();


if (isset($_SESSION["idUtilizador"])) {

    // Obter o ID do utilizador e criar a varável de sessão respetiva
    $idUtilizador = $_SESSION["idUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;

    include "../basedados/basedados.h";

    //Obter os dados do formulário da página editar_utilizador.php
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $dataNascimento = $_GET["dataNascimento"];
    $morada = $_GET["morada"];
    $telefone = $_GET["telefone"];

    //Consulta à base de dados 
    $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$idUtilizador'";
    $res = mysqli_query($conn, $sql);
    $infoUtilizador = mysqli_fetch_array($res);
    $atualizar = true;
    $mensagens_erro = array();


    if (strcmp($nome, $infoUtilizador['nome']) != 0) {
        $atualizarNome = "UPDATE utilizador SET nome ='" . $nome . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarNome);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
    if (strcmp($email, $infoUtilizador['email']) != 0) {

        $atualizarEmail = "SELECT * FROM utilizador WHERE email = '$email'";
        $atualizarBD = mysqli_query($conn, $atualizarEmail);
        $consultaEmail = mysqli_fetch_array($atualizarBD);

        if ($consultaEmail > 0) {
            $atualizar = false;
            array_push($mensagens_erro, "Escolha outro email");
        } else {
            $atualizarEmail = "UPDATE utilizador SET email ='" . $email . "' WHERE idUtilizador='$idUtilizador'";
            $atualizarBD = mysqli_query($conn, $atualizarEmail);
            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        }
    }
    if (strcmp($password, "") != 0) {
        $atualizarPassword = "UPDATE utilizador SET password ='" . md5($password) . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarPassword);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
    if (strcmp($dataNascimento, $infoUtilizador['dataNascimento']) != 0) {
        $atualizarDataNascimento = "UPDATE utilizador SET dataNascimento ='" . $dataNascimento . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarDataNascimento);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
    if (strcmp($morada, $infoUtilizador['morada']) != 0) {
        $atualizarMorada = "UPDATE utilizador SET morada ='" . $morada . "' WHERE idUtilizador='$idUtilizador'";
        $atualizarBD = mysqli_query($conn, $atualizarMorada);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }
    if (strcmp($telefone, $infoUtilizador['telefone']) != 0) {

        if ($telefone < 999999999 && $telefone > 111111111) {
            $atualizarTelefone = "UPDATE utilizador SET telefone ='" . $telefone . "' WHERE idUtilizador='$idUtilizador'";
            $atualizarBD = mysqli_query($conn, $atualizarTelefone);

            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        } else {
            $atualizar = false;
            array_push($mensagens_erro, "Numero de telefone invalido");
        }
    }

    if ($atualizar) {
        array_push($mensagens_erro, "Dados atualizados com sucesso");
    }

    $_SESSION['erros'] = $mensagens_erro;
    echo json_encode($_SESSION['erros']);
} else {
    session_destroy();
    echo "<script>setTimeout(function(){ window.location.href = './index.php'; }, 0)</script>";
}
