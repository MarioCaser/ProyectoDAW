<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/registro/{user?}', 'App\Http\Controllers\RegistroController@index')->name('registro');
Route::post('/registro', 'App\Http\Controllers\RegistroController@store')->name('registro');


Route::match(['get', 'post'], '/convert', function (Request $request) {
    //valores por defecto BTC y BUSD
    $from = $request->input('from', 'BTC');
    $to = $request->input('to', 'BUSD');
    $from = strtoupper($from);
    $to = strtoupper($to);

    $valid_currencies = array('BTC', 'ETH', 'BUSD', 'USDT', 'DOGE');

    // Validar monedas
    if (!in_array($from, $valid_currencies) || !in_array($to, $valid_currencies)) {
        $from = "BTC";
        $to = "USDT";
    }


    return redirect()->route('convert.index', ['from' => $from, 'to' => $to]);
})->name('convert');

Route::get('/convert/{from}/{to}', 'App\Http\Controllers\ConvertController@index')->name('convert.index');
Route::post('/convert', 'App\Http\Controllers\ConvertController@realizarConversion')->name('compra');
Route::post('/comprar', 'App\Http\Controllers\ConvertController@ponerOrden')->name('ponerOrden');

Route::get('/login/{user?}', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@store')->name('login');

Route::get('/depositar', 'App\Http\Controllers\DepositarController@index')->name('depositar');
Route::post('/depositar', 'App\Http\Controllers\DepositarController@index')->name('depositar');

Route::post('/deposito', 'App\Http\Controllers\DepositarController@deposito')->name('deposito');

Route::get('/earn', 'App\Http\Controllers\EarnController@index')->name('earn');
Route::post('/earn', 'App\Http\Controllers\EarnController@suscribir')->name('earn');

Route::get('/crud_saldos', 'App\Http\Controllers\crudSaldosController@index')->name('crud_saldos');
//Route::post('/crud_saldos', 'App\Http\Controllers\crudSaldosController@procesar')->name('crud_saldos');

Route::post('/eliminar_saldo', 'App\Http\Controllers\crudSaldosController@eliminar')->name('eliminar_saldo');
Route::post('/modificar_saldo', 'App\Http\Controllers\crudSaldosController@modificar')->name('modificar_saldo');
Route::post('/actualizar_saldo', 'App\Http\Controllers\crudSaldosController@actualizar')->name('actualizar_saldo');

Route::get('/crear_saldo', 'App\Http\Controllers\crudSaldosController@crearSaldo')->name('crear_saldo');
Route::post('/guardar_saldo', 'App\Http\Controllers\crudSaldosController@guardarSaldo')->name('guardar_saldo');

Route::get('/futuros', 'App\Http\Controllers\futurosController@index')->name('futuros');
Route::post('/futuros', 'App\Http\Controllers\futurosController@store')->name('futuros');

Route::get('/contacto', 'App\Http\Controllers\contactoController@index')->name('contacto');
Route::post('/contacto', 'App\Http\Controllers\contactoController@store')->name('contacto');

Route::get('/chat', 'App\Http\Controllers\chatController@index')->name('chat');
Route::post('/chat', 'App\Http\Controllers\chatController@store')->name('chat');

Route::get('/crud_chat', 'App\Http\Controllers\crudChatController@index')->name('crud_chat');
// Route::post('/crud_chat', 'App\Http\Controllers\crudChatController@store')->name('crud_chat');

Route::post('/chatAdmin', 'App\Http\Controllers\chatController@chatAdmin')->name('chatAdmin');


Route::post('/chatAdminMensaje', 'App\Http\Controllers\chatController@storeAdmin')->name('chatAdminMensaje');

Route::get('/resumen', 'App\Http\Controllers\resumenController@index')->name('resumen');
Route::post('/resumen', 'App\Http\Controllers\resumenController@store')->name('resumen');

Route::get('/resumen/spot', 'App\Http\Controllers\resumenController@saldoSpot')->name('saldoSpot');
Route::post('/resumen/spot', 'App\Http\Controllers\resumenController@saldoSpot')->name('saldoSpot');




Route::get('/resumen/historial', 'App\Http\Controllers\ConvertController@ordenes')->name('historial');
Route::get('/resumen/historial/ordenes', 'App\Http\Controllers\ConvertController@ordenes')->name('ordenes');
Route::get('/resumen/historial/historial_ordenes', 'App\Http\Controllers\ConvertController@historial_ordenes')->name('historial_ordenes');
Route::get('/resumen/historial/historial_operaciones', 'App\Http\Controllers\ConvertController@historial_operaciones')->name('historial_operaciones');


Route::get('/resumen/earn', 'App\Http\Controllers\resumenController@resumen_earn')->name('resumen_earn');


Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');


Route::get('/resumen/retirar', 'App\Http\Controllers\DepositarController@indexRetiro')->name('retirar');
Route::post('/resumen/retirar', 'App\Http\Controllers\DepositarController@indexRetiro')->name('retirar');

Route::post('/retiro', 'App\Http\Controllers\DepositarController@retiro')->name('retiro');

Route::get('/resumen/historial_productos_contratados', 'App\Http\Controllers\EarnController@historial_productos_contratados')->name('historial_productos_contratados');




// Route::get('/', function () {
//     return view('welcome');
// });



// Ruta para mostrar todos los comentarios
Route::get('/', 'App\Http\Controllers\CommentController@index')->name('comments.index');

// Ruta para almacenar un nuevo comentario
Route::post('/comments', 'App\Http\Controllers\CommentController@store')->name('comments.store')->middleware('auth');

// Ruta para eliminar un comentario
Route::delete('/comments/{comment}', 'App\Http\Controllers\CommentController@destroy')->name('comments.destroy')->middleware('auth');





Route::get('/crud_comments', 'App\Http\Controllers\crudCommentsController@index')->name('crud_comments.index');
Route::get('/crud_comments/create', 'App\Http\Controllers\crudCommentsController@create')->name('crud_comments.create');
Route::post('/crud_comments', 'App\Http\Controllers\crudCommentsController@store')->name('crud_comments.store');
Route::get('/crud_comments/{comment}', 'App\Http\Controllers\crudCommentsController@show')->name('crud_comments.show');
Route::get('/crud_comments/{comment}/edit', 'App\Http\Controllers\crudCommentsController@edit')->name('crud_comments.edit');
Route::put('/crud_comments/{comment}', 'App\Http\Controllers\crudCommentsController@update')->name('crud_comments.update');
Route::delete('/crud_comments/{comment}', 'App\Http\Controllers\crudCommentsController@destroy')->name('crud_comments.destroy');





Route::get('/crud_users', 'App\Http\Controllers\crudUsersController@index')->name('crud_users.index');
Route::get('/crud_users/create', 'App\Http\Controllers\crudUsersController@create')->name('crud_users.create');
Route::post('/crud_users', 'App\Http\Controllers\crudUsersController@store')->name('crud_users.store');
Route::get('/crud_users/{user}', 'App\Http\Controllers\crudUsersController@show')->name('crud_users.show');
Route::get('/crud_users/{user}/edit', 'App\Http\Controllers\crudUsersController@edit')->name('crud_users.edit');
Route::put('/crud_users/{user}', 'App\Http\Controllers\crudUsersController@update')->name('crud_users.update');
Route::delete('/crud_users/{user}', 'App\Http\Controllers\crudUsersController@destroy')->name('crud_users.destroy');


Route::get('/crud_productos', 'App\Http\Controllers\crudProductosController@index')->name('crud_productos.index');
Route::get('/crud_productos/create', 'App\Http\Controllers\crudProductosController@create')->name('crud_productos.create');
Route::post('/crud_productos', 'App\Http\Controllers\crudProductosController@store')->name('crud_productos.store');
Route::get('/crud_productos/{earn_disponible}', 'App\Http\Controllers\crudProductosController@show')->name('crud_productos.show');
Route::get('/crud_productos/{earn_disponible}/edit', 'App\Http\Controllers\crudProductosController@edit')->name('crud_productos.edit');
Route::put('/crud_productos/{earn_disponible}', 'App\Http\Controllers\crudProductosController@update')->name('crud_productos.update');
Route::delete('/crud_productos/{earn_disponible}', 'App\Http\Controllers\crudProductosController@destroy')->name('crud_productos.destroy');


Route::get('/crud_monedas', 'App\Http\Controllers\crudMonedasController@index')->name('crud_monedas.index');
Route::get('/crud_monedas/create', 'App\Http\Controllers\crudMonedasController@create')->name('crud_monedas.create');
Route::post('/crud_monedas', 'App\Http\Controllers\crudMonedasController@store')->name('crud_monedas.store');
Route::get('/crud_monedas/{coins}', 'App\Http\Controllers\crudMonedasController@show')->name('crud_monedas.show');
Route::get('/crud_monedas/{coins}/edit', 'App\Http\Controllers\crudMonedasController@edit')->name('crud_monedas.edit');
Route::put('/crud_monedas/{coins}', 'App\Http\Controllers\crudMonedasController@update')->name('crud_monedas.update');
Route::delete('/crud_monedas/{coins}', 'App\Http\Controllers\crudMonedasController@destroy')->name('crud_monedas.destroy');



Route::get('/crud_productos_contratados', 'App\Http\Controllers\crudProductosContratadosController@index')->name('crud_productos_contratados.index');
Route::get('/crud_productos_contratados/create', 'App\Http\Controllers\crudProductosContratadosController@create')->name('crud_productos_contratados.create');
Route::post('/crud_productos_contratados', 'App\Http\Controllers\crudProductosContratadosController@store')->name('crud_productos_contratados.store');
Route::get('/crud_productos_contratados/{earn_contratados}', 'App\Http\Controllers\crudProductosContratadosController@show')->name('crud_productos_contratados.show');
Route::get('/crud_productos_contratados/{earn_contratados}/edit', 'App\Http\Controllers\crudProductosContratadosController@edit')->name('crud_productos_contratados.edit');
Route::put('/crud_productos_contratados/{earn_contratados}', 'App\Http\Controllers\crudProductosContratadosController@update')->name('crud_productos_contratados.update');
Route::delete('/crud_productos_contratados/{earn_contratados}', 'App\Http\Controllers\crudProductosContratadosController@destroy')->name('crud_productos_contratados.destroy');

Route::get('/precios', 'App\Http\Controllers\preciosController@index')->name('precios');


Route::post('/cancelar_orden', 'App\Http\Controllers\ConvertController@cancelar_orden')->name('cancelar_orden');

Route::get('/obtener-saldo', 'App\Http\Controllers\BinanceController@obtenerSaldo');

Route::get('/obtener-transacciones', 'App\Http\Controllers\BinanceController@obtenerTransacciones');

Route::get('/limites-monedas', 'App\Http\Controllers\BinanceController@obtenerDetallesDeMonedas');