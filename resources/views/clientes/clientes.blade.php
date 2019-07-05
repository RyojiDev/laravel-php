@extends('layouts.master') @section('body') @include('layouts.menu-lateral')

<meta name="csrf-token" content="{{ csrf_token() }}">


<div id="containerteste">
    <div id="content">
        <div id="inner-content">
            <div class="clients-table-page inner-content">
                <div class="flex-space-between">
                    <h4>Clientes</h4>
                    <div class="form-group">



                        <!--------------------------- Tabela de clientes - Retorno Da requisição GET da Api-------->

                        <table class="table shadow table-striped table-bordered table-hover" id="tabelaClientes">
                            <thead>
                                <tr>
                                    <th scope="col1">ID</th>
                                    <th scope="col2">CNPJ</th>
                                    <th scope="col3">Razão Social</th>
                                    <th scope="col4">Nome Fantasia</th>
                                    <th scope="col5">Data limite</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-----@foreach ($clientes as $clientes)
        <tr>

        <td button="text" onClick="novoCliente()">{{ $clientes->cnpj }}</td>
        <td  button="text" onClick="novoCliente()"> {{$clientes->razao_social}}</td>
        <td  button="text" onClick="novoCliente()">{{$clientes->nome_fantasia}}</td>
        <td  button="text" onClick="novoCliente()">{{$clientes->data_limite}}</td>

        </tr>
       --->


                            </tbody>
                            <!--@endforeach-->
                        </table>
                        <div>

                            <button id="novoclientebotao" class="btn btn-sm btn-primary" role="button">Novo Cliente</button> <button type="button" class="floating-action-button shadow btn btn-primary">

<a href="{{route('clientes.create')}}">Novo Cliente<span class="glyphicon glyphicon-plus"></span></a>
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!------------------------Modal do Casdastro de Cliente-------------------------->


    <div class="modal fade" tabindex="-1" role="dialog" id="dlgClientes">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formCliente">
                    <div class="modal-header">
                        <h5>Cadastrar Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="cnpjCliente" class="control-label">CNPJ
</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cnpjCliente" placeholder="CNPJ">
                            </div>
                            <label for="nomeCliente" class="control-label">Razão Social
</label>
                            <input type="text" class="form-control" id="razaoSocial" placeholder="Razão Social">
                        </div>


                        <div class="form-group">
                            <label for="nomeFantasia" class="control-label">Nome Fantasia
</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeFantasia" placeholder="Nome Fantasia">
                            </div>

                            <div class="form-group">
                                <label for="dataLimite" class="control-label">Data Limite
<div class="DayPickerInput"><input class="form-control is-valid"
width="100%" name="data_limite" placeholder="DD/MM/AAAA"
type="date" class="form-control" id="dataLimite"></div>
</label>
                                <div class="modal-footer">
                                    <button id="salvar" submit class="btn btn-primary">Salvar</button>
                                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">
        Cancelar</button>
                                </div>
                </form>
                </div>


                </div>
                </div>
            </div>


            @endsection @section('javascript') {{{csrf_field()}}}
            <script type="text/javascript">
                $(document).ready(function() {


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });

                    $('#novoclientebotao').click(function() {
                        novoCliente();
                    });

                    function novoCliente() {
                        $('#cnpjCliente').val('');
                        $('#razaoSocial').val('');
                        $('#nomeFantasia').val('');
                        $('#dataLimite').val('');
                        $('#dlgClientes').modal('show');
                    }

                    function montarLinha(c) {
                        let t = "2019-03-30T15:53:23.106+0000"
                        const date = new Date(t);
                        console.log(date.toLocaleDateString());
                        var linha = "<tr>" +
                            "<td><a href='/clientes-detail/" + c.id.toString() + "'>" + c.id + "</a></td>" +
                            "<td><a href='/clientes-detail/" + c.id.toString() + "'>" + c.cnpj + "</td>" +
                            "<td><a href='/clientes-detail/" + c.id.toString() + "'>" + c.razao_social + "</td>" +
                            "<td><a href='/clientes-detail/" + c.id.toString() + "'>" + c.nome_fantasia + "</td>" +
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



                    // function criarCliente(){
                    //     client =
                    //             { cnpj: $("#cnpjCliente").val(),
                    //              razao_social : $("#razaoSocial").val(),
                    //              nome_fantasia : $("#nomeFantasia").val(),
                    //              data_limite : $("#dataLimite").val()

                    // };

                    // $.ajax({
                    //     url: "api/clientes",
                    //     data: $('#formCliente').serialize(),
                    //     type: "POST",
                    //     dataType: "json",
                    //     success: function(data){
                    //          $("#formCliente").val(function(){
                    //                 linha = montarLinha(data);
                    //             $('#tabelaClientes>tbody').append(linha);
                    //         })

                    //     },
                    //     error: function() {
                    //         console.log('Erro na requisição');

                    //     }
                    //             });

                    // }

                    // $("#dlgClientes").submit(function(e){
                    //             e.preventDefault();

                    //             var formulario = $(this);
                    //             var retorno = inserirFormulario(formulario)
                    //         });
                    //             function inserirFormulario(dados){
                    //                 $.ajax({
                    //                     type: "POST",
                    //                      data:dados.serialize(),
                    //                     url:"/api/clientes",
                    //                     async:false
                    //                 }).then(sucesso,falha);
                    //                 function sucesso(data) {
                    //                     console.log(data);
                    //                 }
                    //                 function falha(){
                    //                     console.log("erro");
                    //                 }
                    //             }

                    $("#salvar").click(function() {
                        var cnpj = $('#cnpjCliente').val();
                        var razao = $('#razaoSocial').val();
                        var nome = $('#nomeFantasia').val();
                        var data = $('#dataLimite').val();
                        var token_key = $('input[name=_token]').val();
                        $.ajax({
                            type: "POST",
                            url: '{{url("/api/clientes")}}',
                            data: {
                                '_token': token_key,
                                'cnpj': cnpj,
                                'razao_social': razao,
                                'nome_fantasia': nome,
                                'data_limite': data,
                            },
                            success: function(data) {
                                alert('in_sucess');
                                linha = montarLinha(data);
                                $('#tabelaClientes>tbody').append(linha);
                                $('#tabelaClientes>tbody').append(linha);

                            }
                        })
                    });

                    $(document).ready(function() {
                        $('#navmenu a').click(function(e) {

                            e.preventDefault();
                            //$('#containerteste').empty();
                            var href = $(this).attr('href');
                            $("#containerteste").load(href + "#containerteste");

                        });
                    });

                    // //teste clicar menu
                    // $("#navclientes").click(function() {

                    //     $.get('/clientes', data => {
                    //         $('#containerteste').html(data)
                    //     })
                    //     return false;
                    // });

                    // $("#navcadastro").click(function() {


                    //     $.get('/menu', data => {
                    //         $('#containerteste').html(data)
                    //     })
                    // })




                    $(function() {
                        carregarClientes();

                    })

                });
            </script>

            @endsection
