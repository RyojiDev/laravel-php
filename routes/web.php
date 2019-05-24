<?php


Route::get('/', 'EscolasController@index');

Route::get('escolas/{id}', 'EscolasController@show');

Route::get('/principal', 'PrincipalControlador@principal');

Route::get('/clientes' , 'ClientesController@index');

Route::get('/clientes/{id}' , 'ClientesController@show');

