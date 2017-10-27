<?php

Route::get('/',function(){
	return view('welcome');

});

Route::resource('vereda','VeredaController');
Route::resource('administrador_finca','AdministradorController');
Route::resource('sitios','SitiosController');
Route::resource('productos','ProductosController');
Route::resource('ProductoUbicacion','ProductoUbicacionController');