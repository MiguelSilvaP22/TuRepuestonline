<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Repuesto;
use App\Favorito;
use App\Compatibilidad;
use App\Marca;
use App\Venta;
use App\Evaluacion;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function ConfirmarVenta($id)
    {
        if(Auth::user())
        {
            $venta = Venta::find($id);
            $venta->estado_venta=2;
            $venta->save();
        }
        return redirect('/perfil');        
    }

    
    public function evaluarcomprador(Request $request)
    {
        $evaluacion = Evaluacion::All()->where('id_venta', $request->id_venta)->last();
        $evaluacion->nota_comprador_evaluacion=$request->rating;
        $evaluacion->save();
        if($evaluacion->nota_vendedor_evaluacion>0 && $evaluacion->nota_comprador_evaluacion>0)
        {
            $venta = Venta::find($request->id_venta);
            $venta->estado_venta=3;
            $venta->save();  
        }
        return redirect('/perfil');        
    }
    public function evaluarvendedor(Request $request)
    {
        $evaluacion = Evaluacion::All()->where('id_venta', $request->id_venta)->last();
        $evaluacion->nota_vendedor_evaluacion=$request->rating;
        $evaluacion->save();

        if($evaluacion->nota_vendedor_evaluacion>0 && $evaluacion->nota_comprador_evaluacion>0)
        {
            $venta = Venta::find($request->id_venta);
            $venta->estado_venta=3;
            $venta->save();
        }

        return redirect('/perfil');        
    }
}
