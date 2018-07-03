<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function EliminarUsuario($id){
        $usuario = User::find($id);
        $usuario->estado_usuario =0;
        $usuario->save();
        return redirect('/perfil');
 
     }
}
