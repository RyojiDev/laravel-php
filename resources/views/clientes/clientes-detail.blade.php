@extends('layouts.master')

@section('body')





<div id=content>
<div id = "inner-content">
<div class="cliente-detail-page">
<div class="margin0auto h100vh row">
<div class="col-menu-client inner-content col-5">

@foreach ($clientes as $clientes)
<form class>
<div class="form-header">
    <h5>{{$clientes->nome_fantasia}}</h5>@endforeach

<div class="form-group">

<div class="input-group">
<div class="form-group">
<label for="cnpjCliente" class="control-label">CNPJ
</label>
<input type="text" class="form-control" id="cnpjCLiente"
        placeholder = "CNPJ">
</div>
</div>
<div class="form-group">

<div class="input-group">
<div class="form-group">
<label for="razaoSocial" class="control-label">Razão Social
</label>
<input type="text" class="form-control" id="RazãoSocial"
        placeholder = "Razão Social">
</div>
</div>

<div class="form-group">
<label for="nomeFantasia" class="control-label">Nome Fantasia
</label>
<input type="text" class="form-control" id="nomeFantasia"
placeholder="Nome Fantasia">
</div>
</div>



<div class="form-group">
<label for="dataLimite" class="control-label">Data Limite
<div class="DayPickerInput"><input class="form-control is-valid"
width="100%" name="data_limite" placeholder="DD/MM/AAAA"
type="date" class="form-control" id="dataLimite"></div>
</label>
<div class="form-group">
<div class="flex-space-between">
    <button type="button" class="btn btn-danger">
<span>Remover</span>
</button>
<button type="submit" class="btn btn-primary">
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

<script type="text/javascript">

$.ajaxSetup({
 headers:{
     'X-CSRF-TOKEN':"{{ csrf_token() }}"
 }
});


</script>
</html>


