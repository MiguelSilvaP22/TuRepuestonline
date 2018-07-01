<?php

namespace App\Http\Controllers;
use App\Marca;
use DB;
use App\Modelo;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function selectMarca(){
        $marcas = Marca::All()->sortBy('nombre_marca')->pluck('nombre_marca','id_marca');
        return view('marca.compatibilidad',compact('marcas'));
    }

    public function selectModelo($id){
        $marca = Marca::find($id);

       /*$modelos = DB::selectRaw('modelo')
        ->select('(modelo.nombre_modelo," ",modelo.ano_modelo) as modelo_prueba')
        ->where('modelo.estado_modelo', '=', 1)
        ->where('modelo.id_marca', '=', $id)
        ->get()
        ->pluck('modelo_prueba', 'modelo.id_modelo');*/

        $modelos= Modelo::select('modelo.*', DB::raw('CONCAT(modelo.nombre_modelo," ",modelo.ano_modelo) as modelo_prueba'))
        ->where('modelo.estado_modelo', '=', 1)
        ->where('modelo.id_marca', '=', $id)
        ->pluck('modelo_prueba', 'modelo.id_modelo');

        /*$modelos = Modelo::selectRaw('CONCAT(nombre_modelo," ",ano_modelo) as modelo_prueba')->pluck('modelo_prueba', 'id_modelo');*/
        return view('modelo.compatibilidad',compact('modelos'));
    }

    public function selectMotor($id){
        $modelo = Modelo::find($id);
        $motores = $modelo->motores->sortBy('nombre_motor')->pluck('cilindraje_motor', 'id_motor');
        return view('motor.compatibilidad',compact('motores'));
    }
}
