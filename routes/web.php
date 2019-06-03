<?php

use GuzzleHttp\Client;

//Route::get('/', 'EscolasController@index');

//Route::get('escolas/{id}', 'EscolasController@show');

Route::get('/principal', 'PrincipalControlador@principal');

Route::get('/clientes' , 'ClientesController@indexView');

Route::get('/clientes/{id}' , 'ClientesController@show');



