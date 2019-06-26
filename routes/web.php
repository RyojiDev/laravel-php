<?php


//Route::get('/', 'EscolasController@index');

//Route::get('escolas/{id}', 'EscolasController@show');

Route::get('/', 'PrincipalControlador@principal');

Route::get('/clientes' , 'ClientesController@indexView');

Route::get('/clientes/{id}' , 'ClientesController@show');

Route::get('/menu','MenuCadastroController@index');
Route::get('/clientes-detail', 'ClientesController@indexdetailCliente');
