
<?php

//calculo de idade

function calculoIdade($dataNascimento){

    $dataAtual = new DateTime((date("Y-m-d")));
    $dataNascimento =  new DateTime($dataNascimento);

    $aux = $dataAtual->diff($dataNascimento);

    $idade = $aux->y;
    return $idade;
}


function getDescricaoUtilizador($tipoUtilizador)
{

    switch ($tipoUtilizador) {
        case ADMINISTRADOR:
            return "Administrador";
        case EMPREGADO:
            return "Empregado";
        case CLIENTE:
            return "Cliente";
        case CLIENTE_APAGADO:
            return "Utilizador apagado";
        case CLIENTE_NAO_VALIDO:
            return "Cliente não validado";
    }
}

function listaTipoUtilizadorAdminCriar($tipoUtilizador)
{

    switch ($tipoUtilizador) {
        case ADMINISTRADOR:
            echo
            "<label>Tipo de Utilizador</label>" .
                "<select name='tipo' type='number' class='form-control mb-3'>" .
                "<option value='' selected disabled hidden>Selecionar</option>" .
                "<option value=1>" .  getDescricaoUtilizador(1) . "</option>" .
                "<option value=2>" .  getDescricaoUtilizador(2) . "</option>" .
                "<option value=3>" .  getDescricaoUtilizador(3) . "</option></select>";
            break;
    }
}

function listaTipoUtilizadorAdminEditar($tipo)
{
    switch ($tipo) {
        case ADMINISTRADOR:
            echo
            "<label>Tipo de Utilizador</label>" .
                "<select name='tipo' type='number' class='form-control mb-3'>" .
                "<option value='$tipo'>" .  getDescricaoUtilizador($tipo) . "</option>" .
                "<option value=2>" .  getDescricaoUtilizador(2) . "</option>" .
                "<option value=3>" .  getDescricaoUtilizador(3) . "</option></select>";
            break;
        case EMPREGADO:
            echo
            "<label>Tipo de Utilizador</label>" .
                "<select name='tipo' type='number' class='form-control mb-3'>" .
                "<option value='$tipo'>" .  getDescricaoUtilizador($tipo) . "</option>" .
                "<option value=1>" .  getDescricaoUtilizador(1) . "</option>" .
                "<option value=3>" .  getDescricaoUtilizador(3) . "</option></select>";
            break;
        case CLIENTE:
            echo
            "<label>Tipo de Utilizador</label>" .
                "<select name='tipo' type='number' class='form-control mb-3'>" .
                "<option value='$tipo'>" .  getDescricaoUtilizador($tipo) . "</option>" .
                "<option value=1>" .  getDescricaoUtilizador(1) . "</option>" .
                "<option value=2>" .  getDescricaoUtilizador(2) . "</option></select>";
            break;
    }
}




function classificacao (){

   echo
            
                "<select name='classificacao' type='number' class='form-control mb-3'>" .
                "<option value='classificacao' selected disabled hidden>Selecionar</option>" .
                "<option value=0>" .  "Menos de 18 anos" . "</option>" .
                "<option value=1>" .  "Igual ou maior de 18 anos" . "</option></select>"; 
            
}

function imagem($classificacao){

        switch ($classificacao) {
        case 1:
            echo"<img src='./Imagens/Icons/mais18.jpg' width=80 height=80>";
        break;
        default:
     
    }
}


function descricaoClassificacao($classificacao){

    switch($classificacao){
        case 0: 
            return "Menos de 18 anos";
            break;
        case 1:
            return "Igual ou maior de 18 anos";
            break;

    }
}





function editarClassificacao($classificacao){

    switch ($classificacao){
        case 0: 
            echo
            "<label>Classificacao</label>" .
                "<select name='classificacao' type='number' class='form-control mb-3'>" .
                "<option value='$classificacao'>" . descricaoClassificacao($classificacao) . "</option>" .
                "<option value=1>" . descricaoClassificacao(1)  . "</option>" . "</select>";
            break;
        case 1:
            echo
            "<label>Classificacao</label>" .
                "<select name='classificacao' type='number' class='form-control mb-3'>" .
                "<option value='$classificacao'>" . descricaoClassificacao($classificacao) . "</option>" .
                "<option value=0>" . descricaoClassificacao(0)  . "</option>" . "</select>";
            break;


    }

}





?>
