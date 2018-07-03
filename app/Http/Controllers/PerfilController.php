<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;
use DB;
use Carbon\Carbon;
use App\Usuario;
use App\User;

use App\CompraMembresia;

use App\venta;
use App\Membresia;

use Illuminate\Support\Facades\Auth;

use App\Evaluacion;



class PerfilController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        if(Auth::user())
        { 
            $repuestos = Repuesto::all()->where('id_usuario', Auth::user()->id_usuario);
            // dd($repuestos->last()->usuario->membresia);
            $usuario = Auth::user();

            $ventas = DB::table('venta')
                            ->join('repuesto', 'venta.id_repuesto', '=', 'repuesto.id_repuesto')
                            ->where('repuesto.id_usuario', '=', $usuario->id_usuario)
                            ->join('usuario', 'venta.id_usuario', '=', 'usuario.id_usuario')
                            ->join('personanatural', 'personanatural.id_usuario', '=','usuario.id_usuario')
                            ->join('evaluacion', 'venta.id_venta', '=','evaluacion.id_venta')
                            ->get();

            $ventasEmpresas = DB::table('venta')
            ->join('repuesto', 'venta.id_repuesto', '=', 'repuesto.id_repuesto')
            ->where('repuesto.id_usuario', '=', $usuario->id_usuario)
            ->join('usuario', 'venta.id_usuario', '=', 'usuario.id_usuario')
            ->join('empresa', 'empresa.id_usuario', '=','usuario.id_usuario')
            ->join('evaluacion', 'venta.id_venta', '=','evaluacion.id_venta')
            ->get();

            $evaluacionComprador = DB::table('evaluacion')
            ->join('venta', 'venta.id_venta', '=', 'evaluacion.id_venta')
            ->where('venta.id_usuario', '=',Auth::user()->id_usuario)
            ->get()
            ->pluck('nota_comprador_evaluacion')
            ->toArray();

            $evaluacionVendedor = DB::table('evaluacion')
            ->join('venta', 'venta.id_venta', '=', 'evaluacion.id_venta')
            ->join('repuesto', 'repuesto.id_repuesto', '=', 'venta.id_repuesto')
            ->join('usuario', 'repuesto.id_usuario', '=', 'usuario.id_usuario')
            ->where('usuario.id_usuario','=',Auth::user()->id_usuario)
            ->get()
            ->pluck('nota_vendedor_evaluacion')
            ->toArray();


            $expiracionMembresia = $usuario->membresia->fecha_reg_membresia->addYear()->diff($now);
            $compras = Venta::all()->where('id_usuario', Auth::user()->id_usuario);

            return view('perfil.index',compact('repuestos','usuario','now', 'ventas','ventasEmpresas', 'compras','expiracionMembresia','evaluacionVendedor','evaluacionComprador'));
                
        }
        else{
            return redirect('/login');
        }

    }

    public function PersonaNatural(){
        return view('auth.PersonaNatural');
    }
    public function FormEmpresa(){
        return view('auth.empresa');
    }

    public function SolicitudMembresia($id){
        $now = Carbon::now();
        $compramembresia = new CompraMembresia;
        $compramembresia->id_membresia = $id;
        $compramembresia->id_usuario = Auth::user()->id_usuario;
        $compramembresia->estado_compramembresia = 2;
        $compramembresia->save();
    }

    public function favoritos(){
        $favoritos = Auth::user()->favoritos->where('estado_favorito', 1);
        \Debugbar::info($favoritos);
        return view('perfil.favoritos', compact('favoritos'));

    }

    public function ActivarMembresia($id){
       $compramembresia = CompraMembresia::find($id);
       $compramembresia->fecha_activacion_compramembresia=Carbon::now();
       $compramembresia->estado_compramembresia=1;
       $compramembresia->save();

       $usuario = User::find($compramembresia->id_usuario);
       $usuario->id_membresia=$compramembresia->id_membresia;
       $usuario->save();
       return redirect('/perfil');

    }


    public function blog($id){
       
        $empresa = User::find($id)->empresa->last();
        \Debugbar::info($empresa);
        return view('perfil.blog', compact('empresa'));

    }
    
}
