<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos', 'ProductController@showProducts');
Route::get('/producto/{category}/{id}', 'ProductController@showOneProduct');
Route::get('/carrito/{id}', 'ProductsByCarController@show');
Route::get('/admin', 'HomeController@admin')->middleware('auth');

Route::get('/admin/inventario', 'ProductController@show')->middleware('auth');

Route::get('/admin/pedidos', 'PedidosController@show')->middleware('auth');
Route::get('/admin/usuarios', 'UsuariosController@showUsuarios')->middleware('auth');
Route::get('/admin/administradores', 'UsuariosController@showAdmins')->middleware('auth');
Route::get('/user/{id}', 'UsuariosController@usuariosValidation');
Route::get('/delete/{id}', 'ProductController@delete');
Route::get('/deleteFromCart/{id}', 'ProductsByCarController@delete');
Route::get('/pedidos/{id}', 'PedidosController@showById');

Route::post('/guardaUsuario','RegisterController@store');
Route::post('/guardaNuevaCategoria','CategoryController@store');
Route::post('/storeProduct','ProductController@store');
Route::post('/editProduct','ProductController@edit');
Route::post('/addToCart','ProductsByCarController@addToCart');
Route::post('/buyCart','PedidosController@buyCart');

//PDF Rutas
Route::get('/ver-compra/{user_id}/{pedido_id}', 'PedidosController@verPDF'); //Ver PDF
Route::get('/downloadPDF/{user_id}/{pedido_id}', 'PedidosController@createPDF'); //Creacion del Ticket de Compra