<?php

// Início da sessão
session_start();


if (isset($_SESSION["idUtilizador"])) {

    //ID do utilizador que tem sessão iniciada
    $idUtilizador = $_SESSION["idUtilizador"];
    $tipoUtilizador = $_SESSION["tipoUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;
    $_SESSION["tipoUtilizador"] = $tipoUtilizador;
    include "../basedados/basedados.h";
    include "./Constantes_Utilizadores.php";

    //Obter os dados do formulário da página editar_utilizador.php

    $id_a_atualizar = $_GET["id_a_atualizar"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $dataNascimento = $_GET["dataNascimento"];
    $morada = $_GET["morada"];
    $telefone = $_GET["telefone"];

    //Consulta à base de dados 
    $sql = "SELECT * FROM utilizador WHERE idUtilizador = '$id_a_atualizar'";
    $res = mysqli_query($conn, $sql);
    $infoUtilizador = mysqli_fetch_array($res);

    //Variável para validar a inserção dos dados
    $atualizar = true;
    //Array para guardar os erros gerados durante a validação dos dados
    $mensagens_erro = array();


    //Atualizar o tipo de Utilizador. Apenas válido para o Administrador
    if ($tipoUtilizador == ADMINISTRADOR) {
        $tipo = $_GET["tipo"];
        if (strcmp($tipo, $infoUtilizador['tipoUtilizador']) != 0) {
            $atualizarTipo = "UPDATE utilizador SET tipoUtilizador ='" . $tipo . "' WHERE idUtilizador='$id_a_atualizar'";
            $atualizarBD = mysqli_query($conn, $atualizarTipo);

            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        }
    }

    //Validação do nome
    if (strcmp($nome, $infoUtilizador['nome']) != 0) {
        $atualizarNome = "UPDATE utilizador SET nome ='" . $nome . "' WHERE idUtilizador='$id_a_atualizar'";
        $atualizarBD = mysqli_query($conn, $atualizarNome);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }

        if (isset($_SESSION['nome'])) {
            $_SESSION["nome"] = $infoUtilizador['nome'];
        }
    }
    // Validação do email
    if (strcmp($email, $infoUtilizador['email']) != 0) {

        $atualizarEmail = "SELECT * FROM utilizador WHERE email = '$email'";
        $atualizarBD = mysqli_query($conn, $atualizarEmail);
        $consultaEmail = mysqli_fetch_array($atualizarBD);

        //Se a consulta à base de dados devolver um resultado significa que já existe na base de dados 
        if ($consultaEmail != 0) {
            $atualizar = false;

            //Adiciona ao array a mensagem de erro
            array_push($mensagens_erro, "Escolha outro email");
        } else {
            $atualizarEmail = "UPDATE utilizador SET email ='" . $email . "' WHERE idUtilizador='$id_a_atualizar'";
            $atualizarBD = mysqli_query($conn, $atualizarEmail);
            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        }
    }

    //Comparação entre a password inserida e a existente, se o resultado da comparação for diferente, atualiza na BD a nova password
    if (strcmp($password, "") != 0) {
        $atualizarPassword = "UPDATE utilizador SET password ='" . md5($password) . "' WHERE idUtilizador='$id_a_atualizar'";
        $atualizarBD = mysqli_query($conn, $atualizarPassword);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }

    //Comparação entre a password na Base de dados e a nova password, se for diferente, atualiza
    if (strcmp($dataNascimento, $infoUtilizador['dataNascimento']) != 0) {
        $atualizarDataNascimento = "UPDATE utilizador SET dataNascimento ='" . $dataNascimento . "' WHERE idUtilizador='$id_a_atualizar'";
        $atualizarBD = mysqli_query($conn, $atualizarDataNascimento);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }

    //Comparação entre a morada na Base de dados e a inserida, se for diferente, atualiza.
    if (strcmp($morada, $infoUtilizador['morada']) != 0) {
        $atualizarMorada = "UPDATE utilizador SET morada ='" . $morada . "' WHERE idUtilizador='$id_a_atualizar'";
        $atualizarBD = mysqli_query($conn, $atualizarMorada);

        if (!$atualizarBD) {
            die('Could not get data: ' . mysqli_error($conn));
        }
    }

    //Comparação entre o numero de telefone na BD e a atual
    if (strcmp($telefone, $infoUtilizador['telefone']) != 0) {

        // Se o número for fora dos parâmetros, não aceita
        if ($telefone < 999999999 && $telefone > 111111111) {
            $atualizarTelefone = "UPDATE utilizador SET telefone ='" . $telefone . "' WHERE idUtilizador='$id_a_atualizar'";
            $atualizarBD = mysqli_query($conn, $atualizarTelefone);

            if (!$atualizarBD) {
                die('Could not get data: ' . mysqli_error($conn));
            }
        } else {
            $atualizar = false;
            //Adiciona ao array a mensagem de erro
            array_push($mensagens_erro, "Numero de telefone invalido");
        }
    }

    //Se a validação estiver correta, a mensagem de sucesso é adicionada ao array
    if ($atualizar ) {

        if($tipoUtilizador==ADMINISTRADOR){
            array_push($mensagens_erro, "Dados atualizados, Administrador");
        }else{
            array_push($mensagens_erro, "Dados atualizados com sucesso");
        }

        
    }

    //Estabelecer a variável de sessão e defini-la com o array dos erros
    $_SESSION['erros'] = $mensagens_erro;

    //Fazer o encode para JS  para ser utilizado no modal na página editar_utilizador.php
    echo json_encode($_SESSION['erros']);
} else {
    session_destroy();
    echo "<script>setTimeout(function(){ window.location.href = './pagina_inicial.php'; }, 0)</script>";
}
