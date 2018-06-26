<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;

class PerfilController extends Controller
{
    public function index()
    {
        $repuestos = Repuesto::all();
        return view('perfil.index',compact('repuestos'));

    }
}
