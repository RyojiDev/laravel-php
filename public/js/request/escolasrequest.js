$(document).ready(function() {

    const url = 'http://172.16.0.198:8080/gestor_api/';

    var url_atual = window.location.href;
    console.log(url_atual);
    id_url = url_atual.substring(35, 31);
    console.log(id_url);




    axios
        .get(url + "clientes" + "/" + id_url)
        .then(function(response) {
            console.log(response);
            //console.log(response.data.escolas["0"].codigo_escola);
            // $("#tabela_escolas").html("");



            if (response.data.escolas.length == 0) {
                console.log("agora ta caindo na condição kkkkkkkkkkkkkkk");
                $("#tabela_escola").hide();
                $("#div_cadastrar_escola").show();


            } else {
                console.log("deu false");

            }





            $.each(response.data.escolas, function(key, value) {

                $("#tabela_escolas_body").append("<tr>" +
                    "<td><a href='/escolas/" + value['id'] + "'>" + value['codigo_escola'] + "</a></td>" +
                    "<td><a href='/escolas/" + value['id'] + "'>" + value['razao_social'] + "</a></td>" +
                    "<td><a href='/escolas/" + value['id'] + "'>" + value['nome_fantasia'] + "</a></td>" +

                    "</tr>");
            });




            // response.data.forEach(cliente => {
            //     linha = montarLinha(cliente)
            //     $("#tabela_escolas").append(linha)


            // });

            //$("#dataLimite").val(response.data.data_limite);


        })
        .catch(function(error) {
            console.log(error);
        });

    $("#btn_cadastrar_escola").click(function() {
        $(window).attr('location', '/escolas');


    });

    $("#btn_salvar_cadastro_escola").click(function() {


        let cod_escola = $("#cod_escola").val();
        let razao_social_esc = $("#razao_social_esc").val();
        let nome_fantasia_esc = $("#nome_fantasia_esc").val();

        let selectedClient = {
            'codigo_escola': cod_escola,
            'razao_social': razao_social_esc,
            'nome_fantasia': nome_fantasia_esc,
        }

        axios
            .post(url + "escolas", selectedClient)
            .then(function(response) {

            })
            .catch(function(error) {
                console.log(error);
            });
    });




    cod_escola
    razao_social_esc
    nome_fantasia_esc
    //------------------------------------listar - update -----------------------//

    // var url_atual = window.location.href;
    // console.log(url_atual);
    // id_url = url_atual.substring(34, 30);
    // console.log(`a url atual é ${id_url}`)


    // axios
    //     .get(url + "escolas" + "/" + id_url)
    //     .then(function(response) {
    //         console.log(response);
    //         $("#cod_escola").val(response.data.codigo_escola);
    //         $("#razao_social_esc").val(response.data.razao_social);
    //         $("#nome_fantasia_esc").val(response.data.nome_fantasia);
    //     })
    //     .catch(function(error) {
    //         console.log(error);
    //     });
});