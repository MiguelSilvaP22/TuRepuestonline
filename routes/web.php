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



Route::resource('repuesto', 'RepuestoController');

Route::get('/busqueda', 'RepuestoController@busquedaIndex')->name('repuesto.busqueda');
Route::get('/resultadoBusqueda', 'RepuestoController@resultadoBusqueda');
Route::get('/generarBusqueda', 'RepuestoController@generarBusquedaCategoria')->name('repuesto.BusquedaCategoria');
Route::get('/generarBusquedaMarca', 'RepuestoController@generarBusquedaMarca')->name('repuesto.BusquedaMarca');
Route::get('/busquedaNombreRepuesto/{id}', 'RepuestoController@busquedaNombreRepuesto',function($id)
{
    return $id;
});
//Repuestos


Route::get('/crearRepuesto', 'RepuestoController@create')->name('repuesto.crear');

Route::get('/detallerepuesto/{id}', 'RepuestoController@show',function($id)
{
    return $id;
});

Route::get('/eliminarRepuesto/{id}', 'RepuestoController@EliminarRepuesto',function($id)
{
    return $id;
});

Route::get('/editarRepuesto/{id}', 'RepuestoController@edit',function($id)
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
Route::resource('Venta', 'VentaController');

Route::post('postrequest', ['as' => 'postrequest', 'uses' => 'VentaController@evaluarvendedor']);
Route::post('postrequest2', ['as' => 'postrequest2', 'uses' => 'VentaController@evaluarcomprador']);



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
Route::resource('/perfil', 'PerfilController');
Route::get('/personanatural', 'PerfilController@PersonaNatural');
Route::get('/FormularioEmpresa', 'PerfilController@FormEmpresa');

Route::get('/favoritos', 'PerfilController@favoritos');
Route::get('/favoritos', 'PerfilController@favoritos');
Route::get('/solicitudMembresia/{id}', 'PerfilController@SolicitudMembresia',function($id)
{
    return $id;
});
Route::get('/activarMembresia/{id}', 'PerfilController@ActivarMembresia',function($id)
{
    return $id;
});

Route::get('/blog/{id}', 'PerfilController@blog',function($id)
{
    return $id;
});

//USUARIO
Route::resource('usuario', 'UsuarioController');

Route::get('/eliminarUsuario/{id}', 'UsuarioController@EliminarUsuario',function($id)
{
    return $id;
});
Route::get('/editarUsuario/{id}', 'UsuarioController@edit',function($id)
{
    return $id;
});

//ADMIN
Route::resource('admin', 'AdminController');


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

Route::get('/', 'HomeController@index')->name('home');
