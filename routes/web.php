<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas
Route::middleware(['auth'])->group(function(){
	

	//Roles
	Route::post('roles','RoleController@store')->name('roles.store')
	->middleware('permission:roles.create');

	Route::get('roles','RoleController@index')->name('roles.index')
	->middleware('permission:roles.index');

	Route::get('roles/create','RoleController@create')->name('roles.create')
	->middleware('permission:roles.create');

	Route::put('roles/{role}','RoleController@update')->name('roles.update')
	->middleware('permission:roles.edit');

	Route::get('roles/{role}','RoleController@show')->name('roles.show')
	->middleware('permission:roles.show');

	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
	->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
	->middleware('permission:roles.edit');

	//Usuarios

	Route::get('users','UserController@index')->name('users.index')
	->middleware('permission:users.index');

	Route::put('users/{user}','UserController@update')->name('users.update')
	->middleware('permission:users.edit');

	Route::get('users/{user}','UserController@show')->name('users.show')
	->middleware('permission:users.show');

	Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
	->middleware('permission:users.destroy');

	Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
	->middleware('permission:users.edit');

	//Rutas de las empresas

	Route::post('empresas','EmpresaController@store')->name('empresas.store')
	->middleware('permission:empresas.create');

	Route::get('empresas/create','EmpresaController@create')->name('empresas.create')
	->middleware('permission:empresas.create');

	Route::get('empresas','EmpresaController@index')->name('empresas.index')
	->middleware('permission:empresas.index');

	Route::put('empresas/{empresa}','EmpresaController@update')->name('empresas.update')
	->middleware('permission:empresas.edit');

	Route::get('empresas/{empresa}','EmpresaController@show')->name('empresas.show')
	->middleware('permission:empresas.show');

	Route::delete('empresas/{empresa}','EmpresaController@destroy')->name('empresas.destroy')
	->middleware('permission:empresas.destroy');

	Route::get('empresas/{empresa}/edit','EmpresaController@edit')->name('empresas.edit')
	->middleware('permission:empresas.edit');

	//Rutas de las categorias

	Route::post('categorias','CategoriaController@store')->name('categorias.store')
	->middleware('permission:categorias.create');

	Route::get('categorias/create','CategoriaController@create')->name('categorias.create')
	->middleware('permission:categorias.create');

	Route::get('categorias','CategoriaController@index')->name('categorias.index')
	->middleware('permission:categorias.index');

	Route::put('categorias/{categoria}','CategoriaController@update')->name('categorias.update')
	->middleware('permission:categorias.edit');

	Route::get('categorias/{categoria}','CategoriaController@show')->name('categorias.show')
	->middleware('permission:categorias.show');

	Route::delete('categorias/{categoria}','CategoriaController@destroy')->name('categorias.destroy')
	->middleware('permission:categorias.destroy');

	Route::get('categorias/{categoria}/edit','CategoriaController@edit')->name('categorias.edit')
	->middleware('permission:categorias.edit');

	//Rutas de los ingredientes

	Route::post('ingredientes','IngredienteController@store')->name('ingredientes.store')
	->middleware('permission:ingredientes.create');

	Route::get('ingredientes/create','IngredienteController@create')->name('ingredientes.create')
	->middleware('permission:ingredientes.create');

	Route::get('ingredientes','IngredienteController@index')->name('ingredientes.index')
	->middleware('permission:ingredientes.index');

	Route::put('ingredientes/{ingrediente}','IngredienteController@update')->name('ingredientes.update')
	->middleware('permission:ingredientes.edit');

	Route::get('ingredientes/{ingrediente}','IngredienteController@show')->name('ingredientes.show')
	->middleware('permission:ingredientes.show');

	Route::delete('ingredientes/{ingrediente}','IngredienteController@destroy')->name('ingredientes.destroy')
	->middleware('permission:ingredientes.destroy');

	Route::get('ingredientes/{ingrediente}/edit','IngredienteController@edit')->name('ingredientes.edit')
	->middleware('permission:ingredientes.edit');
});
