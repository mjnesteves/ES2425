<?php
session_start();
include "../basedados/basedados.h";

// Verificar se o utilizador está autenticado
if (!isset($_SESSION['idUtilizador'])) {
    header("Location: login.php");
    exit();
}

// Função para limpar inputs
function limparInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Obter dados do formulário
$idUtilizador = $_SESSION['idUtilizador'];
$idFilme = isset($_POST['idFilme']) ? intval($_POST['idFilme']) : 0;
$idLoja = isset($_POST['idLoja']) ? intval($_POST['idLoja']) : 0;
$dataLevantamento = isset($_POST['data']) ? limparInput($_POST['data']) : '';
$dataReserva = date('Y-m-d');

// Validação dos dados
if ($idFilme <= 0 || $idLoja <= 0 || empty($dataLevantamento)) {
    $_SESSION['mensagem_popup'] = "<strong>Erro:</strong> Dados inválidos na reserva.";
    header("Location: pagina_inicial.php");
    exit();
}

// Verificar se a data de levantamento não é anterior à data atual
if (strtotime($dataLevantamento) < strtotime(date('Y-m-d'))) {
    $_SESSION['mensagem_popup'] = "<strong>Erro:</strong> A data de levantamento não pode ser anterior à data de hoje.";
    header("Location: pagina_inicial.php");
    exit();
}

// Verificar se filme existe
$sqlCheck = "SELECT COUNT(*) AS total FROM filme WHERE idFilme = ?";
$stmt = mysqli_prepare($conn, $sqlCheck);
mysqli_stmt_bind_param($stmt, "i", $idFilme);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
if (mysqli_fetch_assoc($res)['total'] == 0) {
    $_SESSION['mensagem_popup'] = "<strong>Erro:</strong> Filme não encontrado.";
    header("Location: pagina_inicial.php");
    exit();
}

// Verificar se loja existe
$sqlCheck = "SELECT COUNT(*) AS total FROM loja WHERE idLoja = ?";
$stmt = mysqli_prepare($conn, $sqlCheck);
mysqli_stmt_bind_param($stmt, "i", $idLoja);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
if (mysqli_fetch_assoc($res)['total'] == 0) {
    $_SESSION['mensagem_popup'] = "<strong>Erro:</strong> Loja não encontrada.";
    header("Location: pagina_inicial.php");
    exit();
}

//verifica o id anterior
$sqlMaxId = "SELECT MAX(idReserva) AS maxId FROM reserva";
$resultMaxId = mysqli_query($conn, $sqlMaxId);
$rowMaxId = mysqli_fetch_assoc($resultMaxId);
$novoId = $rowMaxId['maxId'] + 1;


// Inserir reserva
$sqlReserva = "INSERT INTO reserva (idReserva, idUtilizador, dataReserva, dataLevantamento, idFilme, idEstadoReserva, idLoja)
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sqlReserva);
$idEstadoReserva = 1; // 1 = válida
if (mysqli_stmt_bind_param($stmt, "iissiii",$novoId, $idUtilizador, $dataReserva, $dataLevantamento, $idFilme, $idEstadoReserva, $idLoja) &&
    mysqli_stmt_execute($stmt)) {

    // Buscar dados para a mensagem de confirmação
    $filme = "Filme desconhecido";
    $loja = "Loja desconhecida";
    $nome = "Utilizador";

    $sql = "SELECT nomeFilme FROM filme WHERE idFilme = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idFilme);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($res)) $filme = $row['nomeFilme'];

    $sql = "SELECT nomeLoja FROM loja WHERE idLoja = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idLoja);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($res)) $loja = $row['nomeLoja'];

    $sql = "SELECT nome FROM utilizador WHERE idUtilizador = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idUtilizador);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($res)) $nome = $row['nome'];

    $_SESSION['mensagem_popup'] = "Reserva confirmada para <strong>$filme</strong><br>Nome: <strong>$nome</strong><br>Levantamento: <strong>$dataLevantamento</strong> na loja <strong>$loja</strong>";
} else {
    $_SESSION['mensagem_popup'] = "<strong>Erro:</strong> Não foi possível concluir a reserva.";
}

header("Location: pagina_inicial.php?reserva=sucesso");
exit();
?>