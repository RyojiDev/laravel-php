@extends('layouts.master')

@section('body')
<div id="content">
<body>
<div class="container">
<h1> Escolas </h1>
@foreach ($escolas as $escolas)

<div class="panel panel-default">

<div class="panel-body">
<a href="/escolas/{{ $escolas->id }}">
    {{ $escolas->nome_fantasia}}
    </a>
</div>
</div>
@endforeach
</div>
</div>
 @endsection   
</body>
</html>