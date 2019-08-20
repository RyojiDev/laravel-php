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

                $("#tabela_escolas_body").append("<tr id='" + value['id'] + "'>" +
                    "<td data-name='cod_esc'><a href='/escolas/" + value['id'] + "'>" + value['codigo_escola'] + "</a></td>" +
                    "<td data-name='razao_social'><a href='/escolas/" + value['id'] + "'>" + value['razao_social'] + "</a></td>" +
                    "<td data-name='nome_fantasia'><a href='/escolas/" + value['id'] + "'>" + value['nome_fantasia'] + "</a></td>" +
                    "<td><button class='btn btn-danger deletar_escolas'  data-id='" + value['id'] + "'>" + "<i class='far fa-trash-alt' >" + "</i></button></td>" +
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


    $("#cadastrar_escola_cliente").submit(function(e) {
        e.preventDefault();
    });

    $(".btn_cadastrar_escola").click(function() {
        $("#cadastrar_escola_cliente").modal('show');
    });

    console.log(url_atual);
    id_url = url_atual.substring(35, 31);
    console.log(id_url);



    $("#btn_salvar_cadastro_escola").click(function() {

        let cod_escola = $("#cod_escola").val();
        let razao_social_esc = $("#razao_social_esc").val();
        let nome_fantasia_esc = $("#nome_fantasia_esc").val();

        if (validar_escolas(cod_escola) == false) {

            alert("false");

        } else if (validar_escolas(razao_social_esc) == false) {
            alert("false");

        } else if (validar_escolas(nome_fantasia_esc) == false) {



            alert("false");
        } else {
            let cod_escola = $("#cod_escola").val();
            let razao_social_esc = $("#razao_social_esc").val();
            let nome_fantasia_esc = $("#nome_fantasia_esc").val();

            let selectedClient = {
                'codigo_escola': cod_escola,
                'razao_social': razao_social_esc,
                'nome_fantasia': nome_fantasia_esc,
            }

            axios
                .post(url + "escola" + "/" + id_url, selectedClient)
                .then(function(response) {
                    console.log(response);
                    $.growl.notice({ message: "Escola Cadastrada Com sucesso!" });
                    listar_escolas();

                })
                .catch(function(error) {
                    console.log(error);
                    $.growl.warning({ message: "erro ao adicionar escola, por favor verifique seus dados" });
                });
            $("#div_cadastrar_escola").hide();
            $("#tabela_escola").show();


            $("#cadastrar_escola_cliente").modal('hide');
            return false;
        }

    });


    $("#btn_adicionar_escola_fixo").click(function(event) {

        return false;


    });



    $(document).on('click', '.deletar_escolas', function(e) {


        $("#confirm_delete_escolas").modal('show');
        let element = $(this);
        $("#deletar-escolas").click(function() {



            let id = element.attr('data-id');

            $("#tr_id" + id).val();

            axios.delete(url + "escola", {
                    headers: {
                        "Content-Type": "application/json",
                        "Access-Control-Allow-Origin": '*'
                    },
                    data: {
                        "id": id,
                        "codigo_escola": "",
                        "razao_social": "",
                        "nome_fantasia": ""
                    }
                })
                .then(function(response) {
                    console.log(response);
                    // REMOVEU
                    $("tr#" + id).remove();
                    $("#confirm_delete_escolas").modal('hide');
                    $.growl.notice({ message: "Escola Deletada Com sucesso!" });





                })
                .catch(function(error) {
                    console.log(error);
                });
        });

    });



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

    function listar_escolas(response) {
        console.log(response);

        axios
            .get(url + "clientes" + "/" + id_url)
            .then(function(response) {
                console.log(response.data.escolas);
                if (response.data.escolas.length > 0) {

                    $("#tabela_escolas_body").html("");
                    $.each(response.data.escolas, function(key, value) {

                        var linha = $("#tabela_escolas_body").append("<tr id='" + value['id'] + "'>" +
                            "<td data-name='cod_esc'><a href='/escolas/" + value['id'] + "'>" + value['codigo_escola'] + "</a></td>" +
                            "<td data-name='razao_social'><a href='/escolas/" + value['id'] + "'>" + value['razao_social'] + "</a></td>" +
                            "<td data-name='nome_fantasia'><a href='/escolas/" + value['id'] + "'>" + value['nome_fantasia'] + "</a></td>" +
                            "<td><button class='btn btn-danger deletar_escolas'  data-id='" + value['id'] + "'>" + "<i class='far fa-trash-alt' >" + "</i></button></td>" +
                            "</tr>");
                    });
                }
                $("#tabela_escolas_body").append(linha);
            })
            .catch(function(error) {

            });




    }


});