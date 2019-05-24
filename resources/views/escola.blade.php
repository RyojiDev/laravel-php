@extends('layouts.master')

@section('body')

<div id=content>
<div id = "inner-content">
<div class="clients-table-page inner-content">
<div class="flex-space-between">
<h4>Clientes</h4>
<div class="form-group">


  
 <table class="table shadow table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>CNPJ</th>
            <th>Razão Social</th>
            <th>Nome Fantasia</th>
            <th>Data limite</th>
            
    </tr>
    </thead>
    <tbody>
    @foreach ($escolas as $escolas)     
        <tr>
        <td>{{ $escolas->id}}</td>
        <td>{{ $escolas->nome_fantasia}} </td>

        <td>{{ $escolas->razao_social}} @endforeach</td>
        
        </tr>
       
    </tbody>
    </table>
    <button type="button" class="floating-action-button shadow btn btn-primary">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<div id="content">
<body>
<div class="container">
<h1> Escolas </h1>



<div class="panel panel-default">


</div>
</div>
</div>
</div>
 @endsection   
</body>
</html>