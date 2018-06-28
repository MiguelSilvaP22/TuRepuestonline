<?php

namespace App\Http\Controllers;
use App\Marca;
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
        $modelos = $marca->modelos->sortBy('nombre_modelo')->pluck('nombre_modelo', 'id_modelo');
        \Debugbar::info($modelos);
        return view('modelo.compatibilidad',compact('modelos'));
    }

    public function selectMotor($id){
        $modelo = Modelo::find($id);
        $motores = $modelo->motores->sortBy('nombre_motor')->pluck('cilindraje_motor', 'id_motor');
        return view('motor.compatibilidad',compact('motores'));
    }
}
