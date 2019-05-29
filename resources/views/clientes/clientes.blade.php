@extends('layouts.master')

@section('body')


<div id=content>
<div id = "inner-content">
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


    <button
class= "btn btn-sm btn-primary" role="button" onClick="novoCliente()">Novo Cliente</button>    <button type="button" class="floating-action-button shadow btn btn-primary">
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
    <form class="form-horizontal" id ="formCliente">
<div class="modal-header">
    <h5>Cadastrar Cliente</h5>
</div>
<div class="modal-body">
    <input type="hidden" id="id" class="form-control">
<div class="form-group">
<label for="cnpjCliente" class="control-label">CNPJ
</label>
<div class="input-group">
<input type="text" class="form-control" id="cnpjCliente"
        placeholder = "CNPJ">
</div>
<label for="nomeCliente" class="control-label">Razão Social
</label>
<input type="text" class="form-control" id="razaoSocial"
placeholder="Razão Social">
</div>


<div class="form-group">
<label for="nomeFantasia" class="control-label">Nome Fantasia
</label>
<div class="input-group">
<input type="text" class="form-control" id="nomeFantasia"
        placeholder = "Nome Fantasia">
</div>

<div class="form-group">
<label for="dataLimite" class="control-label">Data Limite
<div class="DayPickerInput"><input class="form-control is-valid"
width="100%" name="data_limite" placeholder="DD/MM/AAAA"
type="date" class="form-control" id="dataLimite"></div>
</label>
<div class="modal-footer">
    <button submit class="btn btn-primary">Salvar</button>
    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">
        Cancelar</button>
</div>
</form>
</div>


</div>
</div>
</div>
</div>
</div>
@endsection

 @section('javascript')

 <script type="text/javascript">

$.ajaxSetup({
 headers:{
     'X-CSRF-TOKEN':"{{ csrf_token() }}"
 }
});

function novoCliente(){
    $('#cnpjCliente').val('');
    $('#razaoSocial').val('');
    $('#nomeFantasia').val('');
    $('#dataLimite').val('');
    $('#dlgClientes').modal('show');
}

function montarLinha(c){
            let t = "2019-03-30T15:53:23.106+0000"
            const date = new Date(t);
            console.log(date.toLocaleDateString());
            var linha = "<tr>" +
            "<td>" + c.id + "</td>"+
            "<td>" + c.cnpj + "</td>"+
            "<td>" + c.razao_social + "</td>"+
            "<td>" + c.nome_fantasia + "</td>"+
            "<td>" + new Date(c.data_limite).toLocaleDateString();
 + "</td>"+

            "</td>"+
            "</tr>";

            return linha;
        }

function carregarClientes(){
    $.getJSON('/api/clientes', function(clientes) {
        for(var i=0;i<clientes.length;i++){
         linha = montarLinha(clientes[i]);
         $('#tabelaClientes>tbody').append(linha);

        }
    });
}

$(function(){
    carregarClientes();

})

</script>

@endsection
