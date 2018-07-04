<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function edit($id)
    {
        $usuario = User::find($id);
        \Debugbar::info($usuario->personanatural->last());
        return view('auth.update',compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function EliminarUsuario($id){
        $usuario = User::find($id);
        $usuario->estado_usuario =0;
        $usuario->save();
        return redirect('/perfil');
 
     }
}
