<?php

namespace App\Http\Controllers;
use App\Repuesto;
use DB;
use Carbon\Carbon;
use App\Usuario;
use App\User;
use App\CompraMembresia;
use App\venta;
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
                return view('perfil.admin', compact('usuarios', 'repuestos'));
            }
        }
        else{
            return redirect('/login');
        }
    }
}
