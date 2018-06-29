<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repuesto;
use App\Favorito;
use App\Compatibilidad;
use App\Marca;
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

    public function busquedaIndex(){
        $repuestos = Repuesto::all();
        $categoriasrepuestos = CategoriaRepuesto::all();
        return view('busqueda.index',compact('repuestos','categoriasrepuestos'));
    }

    public function resultadoBusqueda(){
        $repuestos = Repuesto::all();
        $categoriasrepuestos = CategoriaRepuesto::all();
        return view('busqueda.resultado',compact('repuestos','categoriasrepuestos'));
    }

    public function generarBusqueda(){
        $input = request()->all();
        /*\Debugbar::info($input["id_categoria"][0]);
        $repuestos = Repuesto::all()->where('id_categoriarepuesto', $input["id_categoria"][0]);
        $final = $repuestos->merge(Repuesto::all()->where('id_categoriarepuesto', $input["id_categoria"][1]));
        \Debugbar::info($final);*/
        $repuestos = Repuesto::all()->whereIn('id_categoriarepuesto', $input["id_categoria"]);

        \Debugbar::info($repuestos);

        return view('busqueda.resultado',compact('repuestos','categoriasrepuestos'));   
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

        return view('repuesto.crearRepuesto',compact('categoriasrepuestos', 'marcas'));
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
        $repuesto->usuario = Auth::user()->id_usuario;
        $repuesto->save();

        if($_FILES['imagen_repuesto1']!= null)
        {
            $dir_subida = public_path()."/ecommerce/images/productos/";
            $ext = pathinfo($_FILES['imagen_repuesto1']['name'], PATHINFO_EXTENSION);
            $nombreImagenRepuesto =$repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_1_".$ext;
            $fichero_subido = $dir_subida .$nombreImagenRepuesto;
            
            if (move_uploaded_file($_FILES['imagen_repuesto1']['tmp_name'], $fichero_subido)) {
                $imagen = new ImagenRepuesto;
                $imagen->id_repuesto = $repuesto->id_repuesto;
                $imagen->nombre_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto;
                $imagen->ruta_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_1_".$ext;
                $imagen->estado_imagenrepuesto =1;
                $imagen->save();
            } 
        }

        if($_FILES['imagen_repuesto2']!= null)
        {
            $dir_subida = public_path()."/ecommerce/images/productos/";
            $ext = pathinfo($_FILES['imagen_repuesto2']['name'], PATHINFO_EXTENSION);
            $nombreImagenRepuesto =$repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_2_".$ext;
            $fichero_subido = $dir_subida .$nombreImagenRepuesto;
            
            if (move_uploaded_file($_FILES['imagen_repuesto2']['tmp_name'], $fichero_subido)) {
                $imagen = new ImagenRepuesto;
                $imagen->id_repuesto = $repuesto->id_repuesto;
                $imagen->nombre_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto;
                $imagen->ruta_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_2_".$ext;
                $imagen->estado_imagenrepuesto =1;
                $imagen->save();
            } 
        }

        if($_FILES['imagen_repuesto3']!= null)
        {
            $dir_subida = public_path()."/ecommerce/images/productos/";
            $ext = pathinfo($_FILES['imagen_repuesto3']['name'], PATHINFO_EXTENSION);
            $nombreImagenRepuesto =$repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_3_".$ext;
            $fichero_subido = $dir_subida .$nombreImagenRepuesto;
            
            if (move_uploaded_file($_FILES['imagen_repuesto3']['tmp_name'], $fichero_subido)) {
                $imagen = new ImagenRepuesto;
                $imagen->id_repuesto = $repuesto->id_repuesto;
                $imagen->nombre_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto;
                $imagen->ruta_imagenrepuesto = $repuesto->nombre_repuesto."_".$repuesto->id_repuesto."_3_".$ext;
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
        echo("OK");
        
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

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repuesto = Repuesto::all()->where('id_repuesto', $id)->last();
        $favorito = Favorito::all()->where('id_repuesto', $id)->where('id_usuario', Auth::user()->id_usuario)->last();
        \Debugbar::info($favorito);

        return view('repuesto.DetalleRepuesto',compact('repuesto', 'favorito'));
        
    }

}
