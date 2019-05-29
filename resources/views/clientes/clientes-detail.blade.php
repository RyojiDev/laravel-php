@extends('layouts.master')

@section('body')

<div id=content>
<div id = "inner-content">
<div class="cliente-detail-page">
<div class="margin0auto h100vh row">
<div class="col-menu-client inner-content col-5">

<form class>
<div class="form-header">
    <h5>{{}}</h5>
</div>
<div class="form-group">

<div class="input-group">
<input type="text" class="form-control" id="RazãoSocial"
        placeholder = "Razão Social">
</div>
<label for="nomeCliente" class="control-label">Nome Fantasia
</label>
<input type="text" class="form-control" id="nomeFantasia"
placeholder="Nome Fantasia">
</div>

<div class="flex-space-between"><button type="button" class="btn btn-danger">
<span>Remover</span></button><button type="submit" class="btn btn-primary">
<span>Atualizar</span></button></div>

<div class="form-group">
<label for="dataLimite" class="control-label">Data Limite
<div class="DayPickerInput"><input class="form-control is-valid"
width="100%" name="data_limite" placeholder="DD/MM/AAAA"
type="date" class="form-control" id="dataLimite"></div>
</label>
</div>
</form>
</div>
</div>
</div>






    <button type="button" class="floating-action-button shadow btn btn-primary">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>



<div class="container">
<div id="content">
<body>
<div class="container">
<h1></h1>



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
