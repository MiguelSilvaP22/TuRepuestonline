<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;
use App\Usuario;

use Illuminate\Support\Facades\Auth;



class PerfilController extends Controller
{
    public function index()
    {
        $repuestos = Repuesto::all()->where('id_usuario', Auth::user()->id_usuario);
        $usuario = Usuario::find(Auth::user()->id_usuario);
        return view('perfil.index',compact('repuestos','usuario'));

    }
}
