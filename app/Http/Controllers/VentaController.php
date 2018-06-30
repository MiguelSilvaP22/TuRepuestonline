<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Repuesto;
use App\Favorito;
use App\Compatibilidad;
use App\Marca;
use App\Venta;

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
}
