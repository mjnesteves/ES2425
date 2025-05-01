
<?php

//calculo de idade


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






?>
