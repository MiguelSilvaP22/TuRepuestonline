<?php

namespace App\Http\Controllers;
use App\Repuesto;
use DB;
use Carbon\Carbon;
use App\Usuario;
use App\User;
use App\CompraMembresia;
use App\Venta;
use App\Membresia;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        if(Auth::user())
        { 
            if(Auth::user()->id_perfil==3)
            {
                $usuarios = User::all()->where('estado_usuario',1);
                $repuestos = Repuesto::all()->where('estado_repuesto',1);
                $membresias = Membresia::All()->sortBy('id_membresia')->pluck('nombre_membresia');
                $ventasMembresias[] = CompraMembresia::All()->where('estado_compramembresia', '1')->where('id_membresia',2)->count();
                $ventasMembresias[] = CompraMembresia::All()->where('estado_compramembresia', '1')->where('id_membresia',3)->count();
                $ventasMembresias[] = CompraMembresia::All()->where('estado_compramembresia', '1')->where('id_membresia',4)->count();
                $ventasMembresias[] = CompraMembresia::All()->where('estado_compramembresia', '1')->where('id_membresia',5)->count();
                $ventasMembresias[] = CompraMembresia::All()->where('estado_compramembresia', '1')->where('id_membresia',6)->count();
                $ventasMembresias[] = CompraMembresia::All()->where('estado_compramembresia', '1')->where('id_membresia',7)->count();

                $cantidadUsuarios[] = DB::table('usuario')
                                    ->whereMonth('fecha_reg_usuario', '=', date('5'))
                                    ->get()
                                    ->count();

                $cantidadUsuarios[] = DB::table('usuario')
                                    ->whereMonth('fecha_reg_usuario', '=', date('6'))
                                    ->get()
                                    ->count();

                $cantidadUsuarios[] = DB::table('usuario')
                                    ->whereMonth('fecha_reg_usuario', '=', date('7'))
                                    ->get()
                                    ->count();

                $catidadRepuestos[] = DB::table('repuesto')
                                    ->whereMonth('fecha_reg_repuesto', '=', date('5'))
                                    ->get()
                                    ->count();       
                                    
                $catidadRepuestos[] = DB::table('repuesto')
                                    ->whereMonth('fecha_reg_repuesto', '=', date('6'))
                                    ->get()
                                    ->count();

                $catidadRepuestos[] = DB::table('repuesto')
                                    ->whereMonth('fecha_reg_repuesto', '=', date('7'))
                                    ->get()
                                    ->count();
                
                unset($membresias[0]);
                \Debugbar::info($catidadRepuestos);
                return view('perfil.admin', compact('usuarios', 'repuestos','membresias', 'ventasMembresias', 'cantidadUsuarios','catidadRepuestos'));
            }
        }
        else{
            return redirect('/login');
        }
    }
}
