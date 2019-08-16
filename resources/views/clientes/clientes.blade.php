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

                        <table class="table shadow table-striped table-bordered table-hover ordena" id="tabelaClientes">
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

                            <button id="novoclientebotao" class="btn btn-sm btn-primary" role="button">Novo
                                Cliente</button> 
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
                <form name="formCliente" class="form-horizontal" id="formCliente">
                    <div class="modal-header">
                        <h5>Cadastrar Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="cnpjCliente" class="control-label">CNPJ
                            </label>
                            <div class="input-group">
                                <input required type="text"
                                    class="form-control" id="cnpjCliente" name="cnpjCliente" placeholder="00.000.000/0000-00">
                            </div>
                            <label for="nomeCliente" class="control-label">Razão Social
                            </label>
                            <input required type="text" class="form-control" id="razaoSocial" name="razaoSocial"
                                placeholder="Razão Social">
                        </div>


                        <div class="form-group">
                            <label for="nomeFantasia" class="control-label">Nome Fantasia
                            </label>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="nomeFantasia" name="nomeFantasia"
                                    placeholder="Nome Fantasia">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="dataLimite" class="control-label">Data Limite
                                    <div class="input-group date">
                                        <input required type="text" class="form-control" id="dataLimite"
                                            placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>


                            </div>
                            </label>
                            <div class="modal-footer">
                                <button id="salvar" type="submit" class="btn btn-success">Salvar</button>
                                <button type="cancel" class="btn btn-secondary" data-dismiss="modal">
                                    Cancelar</button>
                            </div>
                </form>
            </div>


        </div>
    </div>
    </div>


            @endsection 
            
            @section('javascript')

            <script type="text/javascript">


              

            </script>

            @endsection
