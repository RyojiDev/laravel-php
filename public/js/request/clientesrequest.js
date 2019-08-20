$(document).ready(function() {
    console.log("deu certo");

    var el = $('body');
    console.log(el);
    // var novadata = new Date()

    // var dia = novadata.getDate();
    // var mes = novadata.getMonth();
    // var ano = novadata.getFullYear();
    // novadata = +dia + '/' + (mes++) + '/' + ano;



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    const url = 'http://172.16.0.198:8080/gestor_api/';
    //const url = 'http://localhost:8080/';

    var url_atual = window.location.href;
    console.log(url_atual);
    url_clientes = url_atual.substring(32, 21);

    const url_atual_clientes = '/clientes';



    console.log(url_clientes);


    $("#dlgClientes").submit(function(e) {
        e.preventDefault()
    });


    //************************************************************ */
    // PEGA OS VALORES - METODO POST
    //************************************************************ */

    $("#salvar").click(function(event) {
        var verificar_cnpj = $("#cnpjCliente").val();

        if (verificarCnpj(verificar_cnpj) == false) {
            aplicarCampoInvalido($("#cnpjCliente"));
            return false;



        } else {

            alert("as condições foram atendidas para salvar");
            let cnpj = $("#cnpjCliente").val();
            let razao = $("#razaoSocial").val();
            let nome = $("#nomeFantasia").val();

            let data = $("#dataLimite").val();
            data = data.split('/').reverse().join('-');
            cnpj = cnpj.replace(/[^\d]+/g, "");




            let selectedClient = {
                'cnpj': cnpj,
                'data_limite': data,
                'nome_fantasia': nome,
                'razao_social': razao,



            }



            axios
                .post(url + "cliente", selectedClient)
                .then(function(response) {


                    $.growl.notice({ message: "Cliente Salvo Com sucesso!" });
                    linha = montarLinha(response.data)
                    $("#tabelaClientes").append(linha)



                })
                .catch(function(error) {
                    console.log(error);
                    $.growl.warning({ message: "Erro ao adicionar Cliente, por favor verifique os dados e tente novamente" });
                });


            $("#dlgClientes").modal('hide');


        }
        return false;
    });

    //*******************************************//
    //Requisição HTTP Axios - UPDATE
    //*******************************************//

    $("#btn_atualizar_cliente").click(function() {
        let id = $('#id').val();
        let cnpj = $("#cnpjCliente").val();
        let razao = $("#razaoSocial").val();
        let nome = $("#nomeFantasia").val();
        let data = $("#dataLimite").val();
        data = data.split('/').reverse().join('-');
        cnpj = cnpj.replace(/[^\d]+/g, "");


        let selectedClient = {
            'id': id,
            'cnpj': cnpj,
            'razao_social': razao,
            'nome_fantasia': nome,
            'data_limite': data
        }

        axios
            .put(url + "cliente", selectedClient)
            .then(function(response) {
                $.growl.notice({ message: "Cliente Alterado Com sucesso!" });
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });


    });

    //*******************************************//
    //------------Confirmar deletar--------------//
    //*******************************************//

    $("#btn_deletar_cliente").click(function() {
        $("#confirm_delete_cliente").modal('show');
    });







    //*******************************************//
    //Requisição HTTP Axios - DEletar
    //*******************************************//
    $("#deletar-clientes").click(function() {
        console.log("oi cheguei");
        let id = $('#id').val();

        let selectedClient = {
            'id': id,
            'cnpj': "",
            'razao_social': "",
            'nome_fantasia': "",
            'data_limite': ""
        }

        axios
            .delete(url + "cliente", {
                headers: {
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, OPTIONS",
                    "Access-Control-Allow-Header": "x-requested-with",
                    'Access-Control-Allow-Origin': '*'
                },
                data: selectedClient
            })
            .then(function(response) {
                console.log(response);
                $(window).attr('location', '/clientes')
            })
            .catch(function(error) {
                console.log(error);
                $.growl.warning({ message: "Erro ao deletar Cliente, se houver escola associada ao cliente, remova elas primeiro" });


            });






    });



    ///////////////////////////////////////////////





    //*******************************************//
    //      seleciona o botão que faz o cadastro dos clientes
    //*******************************************//
    $('#novoclientebotao').click(function() {
        novoCliente();
    });

    function novoCliente() {
        $('#cnpjCliente').val('');
        $('#razaoSocial').val('');
        $('#nomeFantasia').val('');
        $('#dataLimite').val('');
        $("#salvar").hide();
        $('#dlgClientes').modal('show');







    }

    //*******************************************//
    // CASO HOUVER CLIENTES, MONTA A LINHA COM OS DADOS
    //*******************************************//
    if (url_atual_clientes == url_clientes) {


        axios
            .get(url + "clientes")
            .then(function(response) {
                console.log(response);
                response.data.forEach(cliente => {
                    linha = montarLinha(cliente)
                    $("#tabelaClientes").append(linha)


                });


                $("#formCliente").submit(function(event) {

                    // $("#tabelaClientes").append(linha);
                    console.log(linha);

                    //criarCliente();





                });



            })
            .catch(function(error) {
                console.log(error);
            });

        function montarLinha(response) {
            let t = "2019-03-30T15:53:23.106+0000"
            const date = new Date(t);
            console.log(date.toLocaleDateString());
            var linha = "<tr>" +
                "<td><a href='/clientes/" + response.id + "'>" + response.id + "</a></td>" +
                "<td><a href='/clientes/" + response.id + "'>" + response.cnpj + "</td>" +
                "<td><a href='/clientes/" + response.id + "'>" + response.razao_social + "</td>" +
                "<td><a href='/clientes/" + response.id + "'>" + response.nome_fantasia + "</td>" +
                "<td>" + new Date(response.data_limite).toLocaleDateString(); +
            "</td>" +

            "</td>" +
            "</tr>";

            return linha;
        }

        $(".ordena").tablesorter();

    } else {
        console.log("a url é diferente por isso não executaremos essa instrução");
    }



    var url_atual = window.location.href;
    console.log(url_atual);
    id_url = url_atual.substring(35, 31);
    console.log(id_url);

    axios
        .get(url + "clientes" + "/" + id_url)
        .then(function(response) {
            console.log(response);
            $("#id").val(response.data.id);
            $("#cnpjCliente").val(response.data.cnpj);
            $("#razaoSocial").val(response.data.razao_social);
            $("#nomeFantasia").val(response.data.nome_fantasia);

            //$("#dataLimite").val(response.data.data_limite);
            $("#dataLimite").change(function() {
                let t = "2019-03-30T15:53:23.106+0000"
                const date = new Date(t);
                console.log(date.toLocaleDateString());


            });
            $("#dataLimite").val(new Date(response.data.data_limite).toLocaleDateString());
            $("#titulo_cliente").html(response.data.nome_fantasia);
            $("#titulo_cliente_span").html(response.data.nome_fantasia);

        })

    .catch(function(error) {
        console.log(error);
    });






    $(document).ready(function() {
        // $('#navmenu a').click(function(e) {

        //     e.preventDefault();
        //     //$('#containerteste').empty();
        //     var href = $(this).attr('href');
        //     $("#containerteste").load(href + "#containerteste");

        // });


        validarForm();

        $("#cnpjCliente").change(validarForm);
        $("#razaoSocial").change(validarForm);
        $("#nomeFantasia").change(validarForm);
        $("#dataLimite").change(validarForm);


    });



    $(function() {
        //carregarClientes();


    });

    // $("#formCliente").validate({
    //     rules: {
    //         required: true,
    //         cnpjCliente: {
    //             maxLength: 20,
    //             minLength: 10
    //         }
    //     }
    // });

    function validarForm() {

        if ($("#cnpjCliente").val().length > 0 && $("#razaoSocial").val().length > 0 && $("#nomeFantasia").val().length > 0 && $("#dataLimite").length > 0) {
            $("#salvar").show();
        } else {

            console.log("nao estou caindo no if");

        }
    }


});