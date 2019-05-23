<?php


Route::get('/', 'EscolasController@index');

Route::get('escolas/{id}', 'EscolasController@show');

Route::get('/principal', 'PrincipalControlador@principal');
