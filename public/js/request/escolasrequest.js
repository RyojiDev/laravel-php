$(document).ready(function() {

    const url = 'http://172.16.0.198:8080/gestor_api/';

    var url_atual = window.location.href;
    console.log(url_atual);
    id_url = url_atual.substring(35, 31);
    console.log(id_url);

    $("#botaoteste").hide();

    $("#tabs").tabs();

    axios
        .get(url + "clientes" + "/" + id_url)
        .then(function(response) {
            console.log(response);
            console.log(response.data.escolas["0"].codigo_escola);
            // $("#tabela_escolas").html("");
            if ($("#tabela_escola td").val() == "") {
                console.log("agora ta caindo na condição")
                $("#botaoteste").show();
            } else {




                $.each(response.data.escolas, function(key, value) {

                    $("#tabela_escolas").append("<tr>" +
                        "<td><a href='/escolas/" + value['id'] + "'>" + value['codigo_escola'] + "</a></td>" +
                        "<td><a href='/escolas/" + value['id'] + "'>" + value['razao_social'] + "</a></td>" +
                        "<td><a href='/escolas/" + value['id'] + "'>" + value['nome_fantasia'] + "</a></td>" +

                        "</tr>");
                });
            }


            // response.data.forEach(cliente => {
            //     linha = montarLinha(cliente)
            //     $("#tabela_escolas").append(linha)


            // });

            //$("#dataLimite").val(response.data.data_limite);


        })
        .catch(function(error) {
            console.log(error);
        });




    //------------------------------------listar - update -----------------------//

    var url_atual = window.location.href;
    console.log(url_atual);
    id_url = url_atual.substring(34, 30);
    console.log(`a url atual é ${id_url}`)


    axios
        .get(url + "escolas" + "/" + id_url)
        .then(function(response) {
            console.log(response);
            $("#cod_escola").val(response.data.codigo_escola);
            $("#razao_social_esc").val(response.data.razao_social);
            $("#nome_fantasia_esc").val(response.data.nome_fantasia);
        })
        .catch(function(error) {
            console.log(error);
        });
});