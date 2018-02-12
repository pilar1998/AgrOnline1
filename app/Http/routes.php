<?php

Route::get('/',function(){
	return view('auth/login');

});

Route::resource('vereda','VeredaController');
Route::resource('administrador_finca','AdministradorController');
Route::resource('sitios','SitiosController');
Route::resource('productos','ProductosController');
Route::resource('ProductoUbicacion','ProductoUbicacionController');
Route::resource('mapa','MapaController');

Route::auth();

Route::resource('/home','HomeController@index');