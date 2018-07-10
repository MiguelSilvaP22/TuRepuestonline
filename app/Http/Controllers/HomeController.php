<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;
use App\Favorito;
use App\Compatibilidad;
use App\Marca;
use App\Venta;
use App\Evaluacion;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repuestosSuper = DB::table('repuesto')
        ->where('repuesto.estado_repuesto', '=', 1)
        ->join('usuario', 'usuario.id_usuario', '=', 'repuesto.id_usuario')
        ->join('imagenrepuesto', 'imagenrepuesto.id_repuesto','=','repuesto.id_repuesto')
        ->join('categoriarepuesto','repuesto.id_categoriarepuesto','=','categoriarepuesto.id_categoriarepuesto')
        ->where('usuario.id_membresia', '=', 4)
        ->get()
        ->random(2);
        \Debugbar::info($repuestosSuper);

        $repuestosOro = DB::table('repuesto')
        ->where('repuesto.estado_repuesto', '=', 1)
        ->join('usuario', 'usuario.id_usuario', '=', 'repuesto.id_usuario')
        ->join('imagenrepuesto', 'imagenrepuesto.id_repuesto','=','repuesto.id_repuesto')
        ->join('categoriarepuesto','repuesto.id_categoriarepuesto','=','categoriarepuesto.id_categoriarepuesto')
        ->where('usuario.id_membresia', '=', 4)
        ->orwhere('usuario.id_membresia', '=', 3)
        ->orWhere('usuario.id_membresia', '=', 2)
        ->inRandomOrder()
        ->get()
        ->take(15);

        $repuestosNuevos = DB::table('repuesto')
        ->where('repuesto.estado_repuesto', '=', 1)
        ->join('usuario', 'usuario.id_usuario', '=', 'repuesto.id_usuario')
        ->join('imagenrepuesto', 'imagenrepuesto.id_repuesto','=','repuesto.id_repuesto')
        ->join('categoriarepuesto','repuesto.id_categoriarepuesto','=','categoriarepuesto.id_categoriarepuesto')
        ->where('usuario.id_membresia', '=', 3)
        ->orWhere('usuario.id_membresia', '=', 2)
        ->orderBy('repuesto.id_repuesto', 'desc')
        ->get()
        ->take(15);


        \Debugbar::info($repuestosNuevos);


        return view('welcome', compact('repuestosSuper','repuestosOro','repuestosNuevos'));
    }
}
