<?php

Route::resource('categorias', 'CategoriaController');

Route::resource('productos', 'ProductoController');

Route::get('precios/categoria/{id}', 'PrecioController@getPreciosCategoria');


Route::get('/', 'HomeController@index');
