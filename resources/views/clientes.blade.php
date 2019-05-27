@extends('layouts.master')

@section('body')


<div id=content>
<div id = "inner-content">
<div class="clients-table-page inner-content">
<div class="flex-space-between">
<h4>Clientes</h4>
<div class="form-group">


  
 <table class="table shadow table-striped table-bordered table-hover" id="minhaTabela">
    <thead>
        <tr>
            <th scope="col1">CNPJ</th>
            <th scope="col2">Razão Social</th>
            <th scope="col3">Nome Fantasia</th>
            <th scope="col4">Data limite</th>
            
    </tr>
    </thead>
    <tbody>
    @foreach ($clientes as $clientes)     
        <tr>
      
        <td button="text" onClick="novoCliente()">{{ $clientes->cnpj }}</td>
        <td  button="text" onClick="novoCliente()"> {{$clientes->razao_social}}</td>
        <td  button="text" onClick="novoCliente()">{{$clientes->nome_fantasia}}</td>
        <td  button="text" onClick="novoCliente()">{{$clientes->data_limite}}</td>
        
        </tr>
       
    </tbody>
    @endforeach
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

<div class="modal" tabindex="-1" role="dialog" id="dlgClientes">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <form class="form-horizontal" id ="formCliente">
<div class="modal-header">
    <h5>Cadastrar Cliente</h5>
</div>
<div class="modal-body">
    <input type="hidden" id="id" class="form-control">
<div class="form-group">
<label for="nomeCliente" class="control-label">CNPJ
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
<label for="nomeCliente" class="control-label">CNPJ
</label>
<div class="input-group">
<input type="text" class="form-control" id="cnpjCliente"
        placeholder = "CNPJ">
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
    <button class="btn btn-danger">Fechar</button>
</div>
</form>
</div>


</div>
</div>
<div class="container">
<div id="content">
<body>




<div class="panel panel-default">


</div>
</div>
</div>
</div>
@endsection

 @section('javascript')

 <script type="text/javascript">


function novoCliente(){
    $('#dlgClientes').modal('show');
}

   
</script>





