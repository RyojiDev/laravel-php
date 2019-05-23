@extends('layouts.master')
@section('body')


<div id=content>
<div class= "card-body">
    <form action="/principal" >
       
        <div class="form-group">
        <label for="nomeCategoria">Nome da Categoria</label>
        <input type="text" class="form-control" name="nomeCategoria"
         value= ""
            id="nomeCategoria" placeholder="Categoria">

        </div>
        <button type="submit" class="btn btn-primary btn-sm">salvar</button>
        <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
    </form>
<div class="container">
<h1> Escolas </h1>


<div class="panel panel-default">
<div class="panel-header">
<h1>{{$escolas->nome_fantasia}}</h1>

</div>

<div class="panel-body">


{{ $escolas->razao_social }}
{{$escolas->nome_fantasia}}
{{$escolas->id}}
<br>
<a href="/Regressar"></a>
</div>
</div>
</div>

</div>
</div>
   @endsection
</html>
