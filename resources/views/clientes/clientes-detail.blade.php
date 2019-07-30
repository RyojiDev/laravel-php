@extends('layouts.master') 
@section('body') 
@include('layouts.menu-lateral')


<div id=content>
    <div id="inner-content">
        <div class="cliente-detail-page">
            <div class="margin0auto h100vh row">
                <div class="col-menu-client inner-content col-5">


                    <form name="formClientes" id="formClientes">

                        <div class="form-header">
                            <h5>{{$clientes->razao_social}}</h5>

                            <div class="form-group">

                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="{{$clientes->id}}" placeholder="id">
                                </div>

                                <div class="form-group">
                                    <label for="cnpjCliente" class="control-label">CNPJ
                                    </label>
                                    <input name="cnpj" pattern="/(^\d{3}\.\d{3}\.\d{3}\-\d{2}$)|(^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$)/"
 class="form-control" id="cnpjCliente" value="{{$clientes->cnpj}}"
                                        placeholder="CNPJ">
                                </div>
                            </div>
                            <div class="form-group">


                                <div class="form-group">
                                    <label for="razaoSocial" class="control-label">Razão Social
                                    </label>
                                    <input name="razaoSocial" class="form-control" id="razaoSocial"
                                        value="{{$clientes->razao_social}}" placeholder="Razão Social">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomeFantasia" class="control-label">Nome Fantasia
                                </label>
                                <input name="nomeFantasia" class="form-control" id="nomeFantasia"
                                    value="{{$clientes->nome_fantasia}}" placeholder="Nome Fantasia">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="dataLimite" class="control-label">Data Limite
                                <div class="DayPickerInput"><input class="form-control is-valid" width="100%"
                                        name="data_limite" placeholder="DD/MM/AAAA" type="date" class="form-control"
                                        id="dataLimite"
                                        value="{{ \Carbon\Carbon::parse($clientes->data_limite)->format('Y-m-d') }}">
                                </div>
                            </label>
                            <div class="form-group">
                                <div class="flex-space-between">
                                    <button id="deletar" type="button" class="btn btn-danger">
                                        <span>Remover</span>
                                    </button>
                                    <button id="atualizar" type="button" class="btn btn-primary">
                                        <span>Atualizar</span></button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="menus-client-col inner-content col" id="contentEscolas">
    <div class="nav nav-tabs nav-justified">

        <ul class="nav nav-tabs">
            <li class="active col"><a data-toggle="tab" href="#Escolas">Escolas</a></li>
            <li class="col"><a data-toggle="tab" href="#Menu">Menu</a></li>
            <li class="col"><a data-toggle="tab" href="#Outros">Outros</a></li>

        </ul>

        <div id="Escolas" class="tab-pane fade in active">
            <table class="table shadow table-striped table-bordered table-hover" id="tabelaEscolas">
                <thead>
                    <tr>
                        <th scope="col1">cod. Escola</th>
                        <th scope="col3">Razão Social</th>
                        <th scope="col4">Nome Fantasia</th>
                    </tr>
                </thead>
                <tbody>


                    <div id="Menu" class="tab-pane fade">

                    </div>
                    <div id="Outros" class="tab-pane fade">
                        <h3>Menu 2</h3>

                    </div>

        </div>
    </div>
</div>
</div>
</div>

          
 @endsection
 
 
 
 @section('javascript')
 {{{csrf_field()}}}

 {{ csrf_field() }}
 
 <script type="text/javascript">
$(document).ready(function () {
    console.log(1 + 1)

    const url = 'http://172.16.0.198:8080/gestor_api/';

    $("#deletar").click(function () {
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
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    $("#atualizar").click(function () {
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
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    });
    

    
    // $("#formClientes").validate({
    //                     rules:{
    //                         cnpjCliente: { 
    //                         maxLength: 20,
    //                         minLength: 10,
    //                         require: true
    //                     }
    //                     }
    //                 });
                });

    
                


</script>

@endsection
</html>


