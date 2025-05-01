
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

function listaTipoUtilizadorAdmin($tipoUtilizador)
{

    switch ($tipoUtilizador) {
        case ADMINISTRADOR:
            echo
            "<label>Tipo de Utilizador</label>" .
                "<select name=$tipoUtilizador class='form-control mb-3'>" .
                "<option value=$tipoUtilizador>" . getDescricaoUtilizador($tipoUtilizador) . " </option>" .
                "<option value=2>" .  getDescricaoUtilizador(2) . "</option>" .
                "<option value=3>" .  getDescricaoUtilizador(3) . "</option></select>";
            break;
       
}

}



?>
