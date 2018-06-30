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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('repuesto', 'RepuestoController');

Route::get('/busqueda', 'RepuestoController@busquedaIndex')->name('repuesto.busqueda');
Route::get('/resultadoBusqueda', 'RepuestoController@resultadoBusqueda');
Route::get('/generarBusqueda', 'RepuestoController@generarBusqueda')->name('repuesto.crear');

//Repuestos


Route::get('/crearRepuesto', 'RepuestoController@create')->name('repuesto.crear');

Route::get('/detallerepuesto/{id}', 'RepuestoController@show',function($id)
{
    return $id;
});



//Compatibilidad Automoviles

Route::get('/selectMarca', 'MarcaController@selectMarca')->name('marca.select');
Route::get('/selectModelo/{id}', 'MarcaController@selectModelo',function($id)
{
    return $id;
});
Route::get('/selectMotor/{id}', 'MarcaController@selectMotor',function($id)
{
    return $id;
});





//FAVORITOS
Route::get('/editarfavorito/{id}', 'RepuestoController@EditarFavorito',function($id)
{
    return $id;
});

//VENTA
Route::get('/venta/{id}', 'RepuestoController@VentaRepuesto',function($id)
{
    return $id;
});
Route::get('/favorito', 'RepuestoController@favoritos');

Route::get('/confirmarventa/{id}', 'VentaController@ConfirmarVenta',function($id)
{
    return $id;
});


//PERFIL
Route::resource('perfil', 'PerfilController');
Route::get('/personanatural', 'perfilController@PersonaNatural');



/*


Route::get('/editarArea/{id}', 'AreaController@edit',function($id) {
    return  $id;
  })
  ->name('area.edit');

  
Route::get('/desactivarArea/{id}', 'AreaController@confirmDestroy',function($id) {
    return  $id;
    })
    ->name('area.delete');  
    
    Route::get('/eliminarArea/{id}', 'AreaController@destroy',function($id) {
        return  $id;
        })
        ->name('area.destroy');  

Route::resource('area', 'AreaController');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
