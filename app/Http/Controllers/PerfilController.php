<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;
use DB;
use App\Usuario;
use App\venta;


use Illuminate\Support\Facades\Auth;



class PerfilController extends Controller
{
    public function index()
    {
        $repuestos = Repuesto::all()->where('id_usuario', Auth::user()->id_usuario);
        $usuario = Auth::user();

       /* \Debugbar::info($usuario->repuestos->last()->venta->last()->comprador);

       $*/
       $ventas = DB::table('venta')
                        ->join('repuesto', 'venta.id_repuesto', '=', 'repuesto.id_repuesto')
                        ->where('repuesto.id_usuario', '=', $usuario->id_usuario)
                        ->join('usuario', 'venta.id_usuario', '=', 'usuario.id_usuario')
                        ->join('personanatural', 'personanatural.id_usuario', '=','usuario.id_usuario')
                        ->get();
        \Debugbar::info($ventas);

        $compras = Venta::all()->where('id_usuario', Auth::user()->id_usuario);
        \Debugbar::info($compras);

        return view('perfil.index',compact('repuestos','usuario', 'ventas', 'compras'));

    }

    public function PersonaNatural(){
        return view('auth.PersonaNatural');
    }

    
}
