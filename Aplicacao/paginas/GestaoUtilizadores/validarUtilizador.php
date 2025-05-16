<!-- 
    Esta página atualiza o tipo de utilizador, de "Cliente não Válido" para "Cliente",
alterando o seu tipo de 4 para 3, conforme definido nas constantes de utilizador. 

    Apenas o Administrador, através da sua gestão de utilizadores, tem acesso a esta função.
-->

<?php

session_start();

include "../../basedados/basedados.h";
include "../Constantes_Utilizadores.php";


if (isset($_SESSION["idUtilizador"])) {
    $idUtilizador = $_SESSION["idUtilizador"];
    $nome = $_SESSION["nome"];
    $tipoUtilizador = $_SESSION["tipoUtilizador"];
    unset($_SESSION);
    $_SESSION["idUtilizador"] = $idUtilizador;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipoUtilizador"] = $tipoUtilizador;

    if($_SESSION["tipoUtilizador"]==ADMINISTRADOR){
            $utilizador = $_GET["utilizador"];
            $sql = "UPDATE utilizador SET tipoUtilizador = '3' WHERE idUtilizador='$utilizador'";
            $res = mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("Location:../gestao_utilizadores.php");
    }else{
        session_destroy();
        echo "<script>setTimeout(function(){ window.location.href = '../logout.php'; }, 0)</script>";
    }

}else{
    session_destroy();
    echo "<script>setTimeout(function(){ window.location.href = '../logout.php'; }, 0)</script>";
}
?>