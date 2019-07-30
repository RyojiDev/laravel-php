<!DOCTYPE html>
<html lang="pt-br">
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<title>Gestor Escolar</title>
@yield('head')
<link href="{{asset('css/configuracao.css')}}" rel="stylesheet">

<link href="{{asset('css/app.css')}}" rel="stylesheet">


@yield('css-view')

</head>

<body>
<div class="container" id="containerajax">

</div>


<main role="main">
@hasSection('body')
@yield('body')
@endif   

    @yield('conteudo-view')

</main>
   
<script src="{{asset('js/app.js')}}" rel="text/javascript"></script>
<script src="{{asset('js/date.js')}}" rel="text/javascript"></script>
<script src="{{asset('js/jquery.validate.min.js')}}" rel="text/javascript"></script>
<script src="{{asset('js/localization/messages_pt_BR')}}" rel="text/javascript"></script>



@hasSection("javascript")
    @yield('javascript')
@endif    
</div>



</body>


</html>
