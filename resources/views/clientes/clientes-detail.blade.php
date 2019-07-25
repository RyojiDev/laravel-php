@extends('layouts.master') 
@section('body') 
@include('layouts.menu-lateral')


<div id=content>
<div id = "inner-content">
<div class="cliente-detail-page">
<div class="margin0auto h100vh row">
<div class="col-menu-client inner-content col-5">


<form action="" method="post">
{{ method_field('PUT') }}
{{ csrf_field()}}
<div class="form-header">
    <h5>{{$clientes->razao_social}}</h5>

<div class="form-group">


<div class="form-group">
<label for="cnpjCliente" class="control-label">CNPJ
</label>
<input name="cnpj" class="form-control" id="cnpjCLiente"
       value="{{$clientes->cnpj}}" placeholder = "CNPJ">
</div>
</div>
<div class="form-group">


<div class="form-group">
<label for="razaoSocial" class="control-label">Razão Social
</label>
<input name="razaoSocial" class="form-control" id="RazãoSocial"
      value="{{$clientes->razao_social}}"  placeholder = "Razão Social">
</div>
</div>

<div class="form-group">
<label for="nomeFantasia" class="control-label">Nome Fantasia
</label>
<input name="nomeFantasia"  class="form-control" id="nomeFantasia"
value="{{$clientes->nome_fantasia}}"placeholder="Nome Fantasia">
</div>
</div>



<div class="form-group">
<label for="dataLimite" class="control-label">Data Limite
<div class="DayPickerInput"><input class="form-control is-valid"
width="100%" name="data_limite" placeholder="DD/MM/AAAA"
type="date" class="form-control" id="dataLimite" value="{{ \Carbon\Carbon::parse($clientes->data_limite)->format('Y-m-d') }}"></div>
</label>
<div class="form-group">
<div class="flex-space-between">
    <button id="teste" type="button" class="btn btn-danger">
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
 {{{csrf_field()}}}


<script type="text/javascript">
$(document).ready(function(){
console.log(1+1)
$.ajaxSetup({
 headers:{
     'X-CSRF-TOKEN':"{{ csrf_token() }}"
 }
});

$("#teste").click(function(){
$.get('http://172.16.0.198:8080/gestor_api/clientes', function(data){
$("#clienteName").html(data.cliente.id);
});
});

});

 $.ajax({
        url : "{{url("/api/clientes")}}",
        type: "GET",
        dataType: "json",
        success: function(data){
          $("#dataLimite").val(data.clientes.data_limite);
            console.log(data);
        },
        error: function(){
            console.log("Erro na requisição");
        }  
    });

</script>

@endsection
</html>


