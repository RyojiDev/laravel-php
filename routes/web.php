<?php


//Route::get('/', 'EscolasController@index');

//Route::get('escolas/{id}', 'EscolasController@show');

Route::get('/', 'PrincipalControlador@principal');

Route::get('/clientes' , 'ClientesController@indexView');
Route::post('/clientes/update', 'ClientesController@update');
Route::get('/clientes/{id}' , 'ClientesController@show');
Route::put('/clientes/update/{cliente}', 'ClientesController@update')->name('clientes.update');
Route::get('/menu','MenuCadastroController@index');
Route::get('/clientes-detail', 'ClientesController@indexdetailCliente');
Route::options('/clientes/destroy/{id}','ClientesController@destroy');

