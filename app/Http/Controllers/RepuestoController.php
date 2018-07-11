<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repuesto;
use DB;
use Carbon\Carbon;

use App\Favorito;
use App\Compatibilidad;
use App\Marca;
use App\Modelo;
use App\Venta;
use App\Evaluacion;


use App\CategoriaRepuesto;
use App\ImagenRepuesto;

class RepuestoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $repuestos = Repuesto::all();
        $categoriasrepuestos = CategoriaRepuesto::all();
        return view('ecommerce.prueba',compact('repuestos','categoriasrepuestos'));

    }

    public function edit($id)
    {   
        if(Auth::user()){
            if(Auth::user()->id_perfil==3 ){
                $repuesto = Repuesto::find($id);
                $marcas = Marca::All()->sortBy('nombre_marca')->pluck('nombre_marca','id_marca');
                $marcas = Marca::All()->sortBy('nombre_marca')->pluck('nombre_marca','id_marca');

                \Debugbar::info($repuesto);
                $categoriasrepuestos = CategoriaRepuesto::All()->sortBy('nombre_categoriarepuesto')->pluck('nombre_categoriarepuesto','id_categoriarepuesto');
                return view('repuesto.update',compact('repuesto','categoriasrepuestos', 'marcas'));    
            }
            else{
                return redirect('/');
            }
        }        
        else{
            return redirect('/');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $repuesto = Repuesto::find($id);
        if(Auth::user()->id_perfil==3 || $repuesto->usuario->id_usuario =Auth::user()->id_usuario ){

            $repuesto->nombre_repuesto = $request->nombre_repuesto;
            $repuesto->id_categoriarepuesto = $request->id_categoriarepuesto;
            $repuesto->precio_repuesto = $request->precio_repuesto;
            $repuesto->stock_repuesto = $request->stock_repuesto;
            $repuesto->descripcion_repuesto = $request->descripcion_repuesto;
            $repuesto->estado_repuesto = 1;
            $repuesto->save();

            $compatibilidades = Compatibilidad::all()->where('id_repuesto', $id);
            foreach($compatibilidades as $comp){
                $comp->delete();
            }


            foreach($request->id_modelos as $key => $id_modelo){
                $compatibilidad = new Compatibilidad;
                $compatibilidad->id_modelo = $id_modelo;
                $compatibilidad->id_repuesto =  $repuesto->id_repuesto;
                $compatibilidad->estado_repuestomodelo =  1;
                $compatibilidad->save();
            }    
            if(Auth::user()->id_perfil==3)
            {
                return redirect('/admin');
            }
            if(Auth::user()->id_perfil==2)
            {
                return redirect('/perfil');
            }

        }
        else{
            return redirect('/');
        }

    }


    public function busquedaIndex(){
        
        $marcas = Marca::All()->sortBy('nombre_marca')->pluck('nombre_marca','id_marca');
        
        if(Auth::user())
        {
            $repuestos = Repuesto::where('id_usuario', '!=', Auth::user()->id_usuario)->where('estado_repuesto',1)->paginate(10);
        }else{
            $repuestos = Repuesto::where('estado_repuesto', 1)->paginate(10);
        }
        $categoriasrepuestos = CategoriaRepuesto::all();
        return view('busqueda.index',compact('repuestos','categoriasrepuestos','marcas'));
    }

    public function resultadoBusqueda(){

        if(Auth::user())
        {
            $repuestos = Repuesto::where('id_usuario', '!=', Auth::user()->id_usuario)->where('estado_repuesto',1)->paginate(10);
        }else{
            $repuestos = Repuesto::where('estado_repuesto',1)->paginate(10);
        }
        $categoriasrepuestos = CategoriaRepuesto::all();
        return view('busqueda.resultado',compact('repuestos','categoriasrepuestos'));
    }

    
    public function busquedaNombreRepuesto($nombre){
        $repuestos = Repuesto::where('estado_repuesto',1)->Where('nombre_repuesto','like','%'.$nombre.'%')->paginate(10);
        \Debugbar::info($repuestos);
        return view('busqueda.resultado',compact('repuestos'));   
    }
    public function generarBusquedaCategoria(){
        $input = request()->all();
        /*\Debugbar::info($input["id_categoria"][0]);
        $repuestos = Repuesto::all()->where('id_categoriarepuesto', $input["id_categoria"][0]);
        $final = $repuestos->merge(Repuesto::all()->where('id_categoriarepuesto', $input["id_categoria"][1]));
        \Debugbar::info($final);*/
        $repuestos = Repuesto::whereIn('id_categoriarepuesto', $input["id_categoria"])->where('estado_repuesto',1)->paginate(10);
        return view('busqueda.resultado',compact('repuestos','categoriasrepuestos'));   
    }

    public function generarBusquedaMarca(){
        $input = request()->all();

        /*\Debugbar::info($input["id_categoria"][0]);
        $repuestos = Repuesto::all()->where('id_categoriarepuesto', $input["id_categoria"][0]);
        $final = $repuestos->merge(Repuesto::all()->where('id_categoriarepuesto', $input["id_categoria"][1]));
        \Debugbar::info($final);*/

        if( $input["id_modelos"][0]==null)
        {
            $repuestos = DB::table('marca')
                        ->where("marca.id_marca", '=', $input["id_marca"])
                        ->join('modelo', 'modelo.id_marca', '=', 'marca.id_marca')
                        ->join('repuestomodelo', 'repuestomodelo.id_modelo', '=','modelo.id_modelo')
                        ->join('repuesto', 'repuestomodelo.id_repuesto', '=','repuesto.id_repuesto')
                        ->join('imagenrepuesto', 'imagenrepuesto.id_repuesto', '=','repuesto.id_repuesto')
                        ->paginate(10);
        }
        else{
            $repuestos = DB::table('marca')
                        ->where("marca.id_marca", '=', $input["id_marca"])
                        ->join('modelo', 'modelo.id_marca', '=', 'marca.id_marca')
                        ->where("modelo.id_modelo", '=', $input["id_modelos"][0])
                        ->join('repuestomodelo', 'repuestomodelo.id_modelo', '=','modelo.id_modelo')
                        ->join('repuesto', 'repuestomodelo.id_repuesto', '=','repuesto.id_repuesto')
                        ->join('imagenrepuesto', 'imagenrepuesto.id_repuesto', '=','repuesto.id_repuesto')
                        ->paginate(10);
        }

        return view('busqueda.resultadoMarca',compact('repuestos','categoriasrepuestos'));   
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $categoriasrepuestos = CategoriaRepuesto::All()->sortBy('nombre_categoriarepuesto')->pluck('nombre_categoriarepuesto','id_categoriarepuesto');
        
        return view('repuesto.CrearRepuesto',compact('categoriasrepuestos'));
    }

    public function store(Request $request)
    {
        $repuesto = new Repuesto;
        $repuesto->nombre_repuesto = $request->nombre_repuesto;
        $repuesto->id_categoriarepuesto = $request->id_categoriarepuesto;
        $repuesto->precio_repuesto = $request->precio_repuesto;
        $repuesto->stock_repuesto = $request->stock_repuesto;
        $repuesto->descripcion_repuesto = $request->descripcion_repuesto;
        $repuesto->estado_repuesto = 1;
        $repuesto->id_usuario = Auth::user()->id_usuario;
        $repuesto->save();

        if($_FILES['imagen_repuesto1']!= null)
        {
            $dir_subida = public_path()."/ecommerce/images/productos/";
            $ext = pathinfo($_FILES['imagen_repuesto1']['name'], PATHINFO_EXTENSION);
            $nombreImagenRepuesto =$repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_1.".$ext;
            $fichero_subido = $dir_subida .$nombreImagenRepuesto;
            
            if (move_uploaded_file($_FILES['imagen_repuesto1']['tmp_name'], $fichero_subido)) {
                $imagen = new ImagenRepuesto;
                $imagen->id_repuesto = $repuesto->id_repuesto;
                $imagen->nombre_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto;
                $imagen->ruta_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_1.".$ext;
                $imagen->estado_imagenrepuesto =1;
                $imagen->save();
            } 
        }

        if($_FILES['imagen_repuesto2']!= null)
        {
            $dir_subida = public_path()."/ecommerce/images/productos/";
            $ext = pathinfo($_FILES['imagen_repuesto2']['name'], PATHINFO_EXTENSION);
            $nombreImagenRepuesto =$repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_2.".$ext;
            $fichero_subido = $dir_subida .$nombreImagenRepuesto;
            
            if (move_uploaded_file($_FILES['imagen_repuesto2']['tmp_name'], $fichero_subido)) {
                $imagen = new ImagenRepuesto;
                $imagen->id_repuesto = $repuesto->id_repuesto;
                $imagen->nombre_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto;
                $imagen->ruta_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_2.".$ext;
                $imagen->estado_imagenrepuesto =1;
                $imagen->save();
            } 
        }

        if($_FILES['imagen_repuesto3']!= null)
        {
            $dir_subida = public_path()."/ecommerce/images/productos/";
            $ext = pathinfo($_FILES['imagen_repuesto3']['name'], PATHINFO_EXTENSION);
            $nombreImagenRepuesto =$repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_3.".$ext;
            $fichero_subido = $dir_subida .$nombreImagenRepuesto;
            
            if (move_uploaded_file($_FILES['imagen_repuesto3']['tmp_name'], $fichero_subido)) {
                $imagen = new ImagenRepuesto;
                $imagen->id_repuesto = $repuesto->id_repuesto;
                $imagen->nombre_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto;
                $imagen->ruta_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_3.".$ext;
                $imagen->estado_imagenrepuesto =1;
                $imagen->save();
            } 
        }

        foreach($request->id_modelos as $key => $id_modelo){
            $compatibilidad = new Compatibilidad;
            $compatibilidad->id_modelo = $id_modelo;
            $compatibilidad->id_repuesto =  $repuesto->id_repuesto;
            $compatibilidad->estado_repuestomodelo =  1;
            $compatibilidad->save();

        }
        return redirect('/perfil');
        
    }

    public function EditarFavorito($id){
        $favorito = Favorito::all()->where('id_repuesto', $id)->where('id_usuario', Auth::user()->id_usuario)->last();
        \Debugbar::info(Auth::user()->id_usuario);
        if($favorito!=null)
        {
            if($favorito->estado_favorito==1)
            {
                $favorito->estado_favorito =0;
                $favorito->save();
            }
            else{
                $favorito->estado_favorito =1;
                $favorito->save();
            }
        }
        else{
            $nuevoFavorito = new Favorito;
            $nuevoFavorito->id_usuario=Auth::user()->id_usuario;
            $nuevoFavorito->id_repuesto=$id;
            $nuevoFavorito->estado_favorito =1;
            $nuevoFavorito->save();
        }
    }

    public function favoritos(){
        $favoritos = Favorito::all()->where('id_usuario', Auth::user()->id_usuario)->where('estado_favorito', 1);
        return view('perfil.favoritos',compact('favoritos'));

    }

    public function VentaRepuesto($id){
        if(Auth::user())
        {
            $request = explode('+', $id);
            $venta = new Venta;
            $venta->id_usuario = Auth::user()->id_usuario;
            $venta->id_repuesto = $request[0];
            $venta->cantidad_venta = $request[1];
            $venta->estado_venta=1;
            $venta->save();
            if($venta->save()){
                $evaluacion = new Evaluacion;
                $evaluacion->id_venta = $venta->id_venta;
                $evaluacion->nota_comprador_evaluacion= 0;
                $evaluacion->nota_vendedor_evaluacion= 0;
                $evaluacion->estado_evaluacion= 1;
                $evaluacion->save();
            }
            return redirect('/perfil');
        }
        else{
            return redirect('/login');
        }
       
    }


       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = Carbon::now();
        $repuesto = Repuesto::all()->where('id_repuesto', $id)->last();
        if($now->diffInDays($repuesto->fecha_reg_repuesto->addDays($repuesto->usuario->membresia->dias_duracion_publidacion_membresia), false)>0){
            if(Auth::user()){
                $favorito = Favorito::all()->where('id_repuesto', $id)->where('id_usuario', Auth::user()->id_usuario)->last();
            }
            else{
                $favorito =null;
            }
            return view('repuesto.DetalleRepuesto',compact('repuesto', 'favorito'));

        }
        else{
            return view('repuesto.repuestoFinalizado');
        }
        
    }

    public function EliminarRepuesto($id)
    {
        if(Auth::user()){
            $repuesto = Repuesto::find($id);
            $repuesto->estado_repuesto =0;
            $repuesto->save();
            if(Auth::user()->id_perfil==3){
                return redirect('/admin');
            }
            else{
                return redirect('/perfil');
            }
        }
        else{
            return redirect('/login');
        }    
    }

}
