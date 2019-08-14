function verificarCnpj(verificar_cnpj) {

    if (verificar_cnpj == '') {
        return false;


    }
    if (verificar_cnpj.match(/[0-9]/) == null) {
        return false;
    }


}

//-------------------------- funções para estilizar campos do formulario -----

function aplicarCampoInvalido(el) {
    el.css('color', 'red');
    el.css('border', '2px solid red');
    el.val('campo Inválido');
}