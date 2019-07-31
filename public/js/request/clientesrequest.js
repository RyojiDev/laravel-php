$(document).ready(function() {
    console.log("deu certo");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    const url = 'http://172.16.0.198:8080/gestor_api/';






    //************************************************************ */
    // PEGA OS VALORES - METODO POST
    //************************************************************ */
    // $("#salvar").click(function() {
    //     var cnpj = $('#cnpjCliente').val();
    //     var razao = $('#razaoSocial').val();
    //     var nome = $('#nomeFantasia').val();
    //     var data = $('#dataLimite').val();
    //     var token_key = $('input[name=_token]').val();
    //     $.ajax({
    //         type: "POST",
    //         url: '{{url("/api/clientes")}}',
    //         data: {
    //             '_token': token_key,
    //             'cnpj': cnpj,
    //             'razao_social': razao,
    //             'nome_fantasia': nome,
    //             'data_limite': data,
    //         },
    //         success: function(data) {
    //             alert('in_sucess');
    //             linha = montarLinha(data);
    //             $('#tabelaClientes>tbody').append(linha);
    //             $('#tabelaClientes>tbody').append(linha);

    //         }
    //     })
    // });


    $("#salvar").click(function() {
        let cnpj = $("#cnpjCliente").val();
        let razao = $("#razaoSocial").val();
        let nome = $("#nomeFantasia").val();
        let data = $("#dataLimite").val();

        let selectedClient = {
            'cnpj': cnpj,
            'razao_social': razao,
            'nome_fantasia': nome,
            'data_limite': data
        }

        axios
            .data(url + "cliente", {
                headers: {
                    "Content-Type": "application/json;charset=UTF-8",
                    "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, OPTIONS",
                    "Access-Control-Allow-Header": "x-requested-with",
                    'Access-Control-Allow-Origin': '*'
                },
                body: selectedClient
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });


    });

    //*******************************************//
    //Requisição HTTP Axios - UPDATE
    //*******************************************//

    $("#atualizar").click(function() {
        let id = $('#id').val();
        let cnpj = $("#cnpjCliente").val();
        let razao = $("#razaoSocial").val();
        let nome = $("#nomeFantasia").val();
        let data = $("#dataLimite").val();

        let selectedClient = {
            'id': id,
            'cnpj': cnpj,
            'razao_social': razao,
            'nome_fantasia': nome,
            'data_limite': data
        }

        axios
            .put(url + "cliente", {
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
            })
            .catch(function(error) {
                console.log(error);
            });


    });

    //*******************************************//
    //Requisição HTTP Axios - DEletar
    //*******************************************//
    $("#deletar").click(function() {
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
            })
            .catch(function(error) {
                console.log(error);
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

    function montarLinha(c) {
        let t = "2019-03-30T15:53:23.106+0000"
        const date = new Date(t);
        console.log(date.toLocaleDateString());
        var linha = "<tr>" +
            "<td><a href='/clientes/" + c.id.toString() + "'>" + c.id + "</a></td>" +
            "<td><a href='/clientes/" + c.id.toString() + "'>" + c.cnpj + "</td>" +
            "<td><a href='/clientes/" + c.id.toString() + "'>" + c.razao_social + "</td>" +
            "<td><a href='/clientes/" + c.id.toString() + "'>" + c.nome_fantasia + "</td>" +
            "<td>" + new Date(c.data_limite).toLocaleDateString(); +
        "</td>" +

        "</td>" +
        "</tr>";

        return linha;
    }

    function carregarClientes() {
        $.getJSON('/api/clientes', function(clientes) {
            for (var i = 0; i < clientes.length; i++) {
                console.log(clientes[i])
                linha = montarLinha(clientes[i]);
                $('#tabelaClientes>tbody').append(linha);

            }
            $("#formCliente").submit(function(event) {
                event.preventDefault();
                //  criarCliente();
                $("#dlgClientes").modal('hide');
            })
        });
    }




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
        carregarClientes();


    });

    $("#formCliente").validate({
        rules: {
            required: true,
            cnpjCliente: {
                maxLength: 20,
                minLength: 10
            }
        }
    });

    function validarForm() {

        if ($("#cnpjCliente").val().length > 0 && $("#razaoSocial").val().length > 0 && $("#nomeFantasia").val().length > 0 && $("#dataLimite").length > 0) {
            $("#salvar").show();
        } else {

            console.log("nao estou caindo no if");

        }
    }


});