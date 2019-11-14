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

Route::get('/home/{empresa}', 'HomeController@index')->name('home');
Route::get('/carrito', 'CarritoController@index')->name('carrito');

//rutas
Route::middleware(['auth'])->group(function(){
	

	Route::get('products/{producto}', 'ProductController@show')->name('products.show');

	Route::post('/cart', 'CartDetailController@store');
	Route::delete('/cart', 'CartDetailController@destroy');
	Route::post('/order', 'CartController@update');

	//perfiles

	Route::get('perfil/{user}','PerfilController@show')->name('perfil.show');

	Route::put('perfil/{user}','PerfilController@update')->name('perfil.update');

	//asignar empresa a usuario

	Route::get('asignar','AsignarEmpresaController@index')->name('asignar.index');

	Route::put('asignar/{eu}','AsignarEmpresaController@update')->name('asignar.update');

	Route::post('asignar/','AsignarEmpresaController@store')->name('asignar.store');

	Route::delete('asignar/{eu}','AsignarEmpresaController@destroy')->name('asignar.destroy');

	Route::get('asignar/{eu}','AsignarEmpresaController@show')->name('asignar.show');


	//orders

	Route::get('orders','OrderController@index')->name('orders.index');

	Route::get('allorders','OrderController@allindex')->name('allorders.index');

	Route::put('orders/{order}','OrderController@update')->name('orders.update');

	Route::get('orders/{order}','OrderController@show')->name('orders.show');
	
	Route::delete('orders/{order}','OrderController@destroy')->name('orders.destroy');


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

	//Rutas de los productos

	Route::post('productos','ProductoController@store')->name('productos.store')
	->middleware('permission:productos.create');

	Route::get('productos/create','ProductoController@create')->name('productos.create')
	->middleware('permission:productos.create');

	Route::get('productos','ProductoController@index')->name('productos.index')
	->middleware('permission:productos.index');

	Route::put('productos/{producto}','ProductoController@update')->name('productos.update')
	->middleware('permission:productos.edit');

	Route::get('productos/{producto}','ProductoController@show')->name('productos.show')
	->middleware('permission:productos.show');

	Route::delete('productos/{producto}','ProductoController@destroy')->name('productos.destroy')
	->middleware('permission:productos.destroy');

	Route::get('productos/{producto}/edit','ProductoController@edit')->name('productos.edit')
	->middleware('permission:productos.edit');

	//Rutas de los proveedores

	Route::post('proveedores','ProveedorController@store')->name('proveedores.store')
	->middleware('permission:proveedores.create');

	Route::get('proveedores/create','ProveedorController@create')->name('proveedores.create')
	->middleware('permission:proveedores.create');

	Route::get('proveedores','ProveedorController@index')->name('proveedores.index')
	->middleware('permission:proveedores.index');

	Route::put('proveedores/{proveedor}','ProveedorController@update')->name('proveedores.update')
	->middleware('permission:proveedores.edit');

	Route::get('proveedores/{proveedor}','ProveedorController@show')->name('proveedores.show')
	->middleware('permission:proveedores.show');

	Route::delete('proveedores/{proveedor}','ProveedorController@destroy')->name('proveedores.destroy')
	->middleware('permission:proveedores.destroy');
	
	Route::get('proveedores/{proveedor}/edit','ProveedorController@edit')->name('proveedores.edit')
	->middleware('permission:proveedores.edit');

	//Rutas de los proveedores

	Route::post('compras','CompraController@store')->name('compras.store')
	->middleware('permission:compras.create');

	Route::get('compras/create','CompraController@create')->name('compras.create')
	->middleware('permission:compras.create');

	Route::get('compras','CompraController@index')->name('compras.index')
	->middleware('permission:compras.index');

	Route::put('compras/{compra}','CompraController@update')->name('compras.update')
	->middleware('permission:compras.edit');

	Route::get('compras/{compra}','CompraController@show')->name('compras.show')
	->middleware('permission:compras.show');

	Route::delete('compras/{compra}','CompraController@destroy')->name('compras.destroy')
	->middleware('permission:compras.destroy');
	
	Route::get('compras/{compra}/edit','CompraController@edit')->name('compras.edit')
	->middleware('permission:compras.edit');

	//Rutas de los mesas

	// Route::post('mesas','MesaController@store')->name('mesas.store')
	// ->middleware('permission:mesas.create');

	// Route::get('mesas/create','MesaController@create')->name('mesas.create')
	// ->middleware('permission:mesas.create');

	// Route::get('mesas','MesaController@index')->name('mesas.index')
	// ->middleware('permission:mesas.index');

	// Route::put('mesas/{mesa}','MesaController@update')->name('mesas.update')
	// ->middleware('permission:mesas.edit');

	// Route::get('mesas/{mesa}','MesaController@show')->name('mesas.show')
	// ->middleware('permission:mesas.show');

	// Route::delete('mesas/{mesa}','MesaController@destroy')->name('mesas.destroy')
	// ->middleware('permission:mesas.destroy');
	
	// Route::get('mesas/{mesa}/edit','MesaController@edit')->name('mesas.edit')
	// ->middleware('permission:mesas.edit');
});
