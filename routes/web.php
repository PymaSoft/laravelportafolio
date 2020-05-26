<?php

// Escuchar las consultas que se hacen en la BD
/* DB::listen(function($query) {
  var_dump($query->sql);
}); */

/* Route::get('/', function () {
  return view('home');
})->name('home'); */

/* $portfolio = [
	['title' => 'Proyecto No. 1'],
	['title' => 'Proyecto No. 2'],
	['title' => 'Proyecto No. 3'],
	['title' => 'Proyecto No. 4'],
]; */

Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');
Route::view('/contacto', 'contact')->name('contact');
Route::post('/contact', 'MessageController@store')->name('message.store');

//Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('projects');
/* Route::get('/portafolio', 'ProjectController@index')->name('projects.index');
Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');
Route::post('/portafolio', 'ProjectController@store')->name('projects.store');
Route::get('/portafolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
Route::patch('/portafolio/{project}', 'ProjectController@update')->name('projects.update');
Route::delete('/portafolio/{project}', 'ProjectController@destroy')->name('projects.destroy'); */

Route::resource('portafolio', 'ProjectController')
        ->parameters(['portafolio' => 'project'])
        ->names('projects');

Route::get('categorias/{category}', 'CategoryController@show')->name('categories.show');
Auth::routes();
// Deshabilitar el registro de participantes
//Auth::routes(['register' => false]);