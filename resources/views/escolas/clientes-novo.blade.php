@extends('layouts.master')

@section('body')

@include('layouts.menu-lateral')

<div id = "content">


<a href="{{('/clientes')}}">Voltar</a>
{!! Form::open(["route" => 'clientes.store','class' => 'form']) !!}
<div class="form-group">
    {!! Form::text('cnpj',null,['class' => 'form-control', 'placeholder'=> 'cnpj'])!!}
</div>
<div class="form-group">
    {!! Form::text('razao_social',null,['class' => 'form-control','placeholder'=> 'razão social']) !!}
</div>
<div class="form-group">
    {!! Form::text('nome_fantasia',null,['class' => 'form-control','placeholder'=> 'nome fantasia']) !!}
</div>
<div class="form-group">
    {!! Form::date('data_limite',null,['class' => 'form-control','placeholder'=> 'data limite']) !!}
</div>
<div class="form-group">
   <input type="submit" value="enviar">
</div>

{!! Form::close()!!}
</div>

@endsection