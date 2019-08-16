function verificarCnpj(verificar_cnpj) {


    if (verificar_cnpj == '') {
        return false;


    }
    if (verificar_cnpj.match(/[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2}/) == null) {
        return false;
    }


}

//-------------------------- funções para estilizar campos do formulario -----

function aplicarCampoInvalido(el) {
    el.css('color', 'red');
    el.css('border', '2px solid red');
    el.val('campo Inválido');
}

function resetarCampoInvalido(el) {
    el.css('color', '#ccc');
    el.css('border', '1px solid #cc');
    el.val('');
}


$(document).ready(function() {

    $("#cnpjCliente").mask("00.000.000/0000-00");


    //Eventos do Formulario



});