function verificarCnpj(verificar_cnpj) {

    verificar_cnpj = verificar_cnpj.replace(/[^\d]+/g, '');




    if (verificar_cnpj == '') return false;
    if (verificar_cnpj.length != 14)
        return false;
    // Elimina verificar_cnpjs invalidos conhecidos
    if (verificar_cnpj == "00000000000000" ||
        verificar_cnpj == "11111111111111" ||
        verificar_cnpj == "22222222222222" ||
        verificar_cnpj == "33333333333333" ||
        verificar_cnpj == "44444444444444" ||
        verificar_cnpj == "55555555555555" ||
        verificar_cnpj == "66666666666666" ||
        verificar_cnpj == "77777777777777" ||
        verificar_cnpj == "88888888888888" ||
        verificar_cnpj == "99999999999999")
        return false;


    // Valida DVs
    tamanho = verificar_cnpj.length - 2
    numeros = verificar_cnpj.substring(0, tamanho);
    digitos = verificar_cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }

    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
    tamanho = tamanho + 1;
    numeros = verificar_cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }

    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
        return false;

    return true;

}
// if (verificar_verificar_cnpj.match(/[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2}/) == null) {
//     return false;
// }

function validar_escolas() {
    if ($("#cod_escola").val() != "") {

        return true;
    } else if ($("#nome_fantasia_esc").val() != "") {

        return true;
    } else if ($("#razao_social_esc").val() != "") {
        return true;
    } else {
        return false;
    }


}

// let cod_escola = $("#cod_escola").val();
// let razao_social_esc = $("#razao_social_esc").val();
// let nome_fantasia_esc = $("#nome_fantasia_esc").val();



//-------------------------- funções para estilizar campos do formulario -----

/**
 * Verifica uma validação com a função funcaoValidacao e, caso 
 * tenha um erro, inclui a classe CSS "item-error" no input 
 * e insere uma mensagem 
 *
 * @author Igor Augusto
 *
 * @param funcaoValidacao a função de validação a ser usada
 * @param mensagemErro a mensagem de erro a ser usada
 */

verifica_validacao = function(campo, funcaoValidacao, mensagemErro) {
    if (campo.next().hasClass("label-error")) {
        campo.next().remove();
    }
    // Verifica se é um CPF
    if (campo.val() != '' && funcaoValidacao(campo.val()) == false) {
        // Se for um CPF, incluir a label do erro e marca o item com a classe de erro
        campo.after("<div class='label-error'>" + mensagemErro + "</div>");
        campo.addClass("item-error");
    } else {
        // Se não for um CPF, remove a classe item-error
        campo.removeClass("item-error");
    }
}

// function aplicarCampoInvalido(el) {
//     el.css('color', 'red');
//     el.css('border', '2px solid red');
//     el.val('campo Inválido');
// }

// function resetarCampoInvalido(el) {
//     el.css('color', '#ccc');
//     el.css('border', '1px solid #cc');
//     el.val('');
// }

function validaEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


$(document).ready(function() {

    $("#cnpjCliente").mask("00.000.000/0000-00");


    //Eventos do Formulario

    $("#cnpjCliente:not(.no-validation)").change(function() { verifica_validacao($(this), verificarCnpj, "CNPJ inválido"); });
    $("#cod_escola:not(.no-validation)").change(function() { verifica_validacao($(this), validar_escolas, "codigo Invalido"); });
    $("#nome_fantasia_esc:not(.no-validation)").change(function() { verifica_validacao($(this), validar_escolas, "nome Fantasia invalido"); });
    $("#razao_social_esc:not(.no-validation)").change(function() { verifica_validacao($(this), validar_escolas, "razao social invalida"); });



    // mascara de data

    $("#nomeFantasia").mask("#", {
        maxlength: false,
        translation: {
            '#': { pattern: /[A-z a-y]/, recursive: true }
        }
    });

    $("#razaoSocial").mask("#", {
        maxlength: false,
        translation: {
            '#': { pattern: /[A-z a-y]/, recursive: true }
        }
    });




    $("#dataLimite").mask("99/99/9999");

    $("#cod_escola").mask("0000");

    $("#nome_fantasia_esc").mask("#", {
        maxlength: false,
        translation: {
            '#': { pattern: /[A-z a-y]/, recursive: true }
        }
    });

    $("#razao_social_esc").mask("#", {
        maxlength: false,
        translation: {
            '#': { pattern: /[A-z a-y]/, recursive: true }
        }
    });

});