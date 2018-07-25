<?php

namespace App\Http\Controllers;
use App\User;
use App\PersonaNatural;
use App\Empresa;
use App\Repuesto;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function edit($id)
    {   
        if(Auth::user()){
            if(Auth::user()->id_perfil==3 || Auth::user()->id_usuario ==$id ){
                $usuario = User::find($id);
                return view('auth.update',compact('usuario'));    
            }
            else{
                return redirect('/');
            }
        }        
        else{
            return redirect('/');
        }
        
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
        $usuario = User::find($id);
        $usuario->save();
        if($usuario->id_perfil==1){
            $personanatural = PersonaNatural::all()->where('id_usuario', $id)->last();
            $personanatural->nombres_personanatural = $request->nombres;
            $personanatural->apellidos_personanatural =$request->Apellidos;
            $personanatural->fono_personanatural = $request->fono;
            $personanatural->save(); 
        }
        if($usuario->id_perfil==2){
            $empresa = Empresa::all()->where('id_usuario', $id)->last();
            $empresa->nombre_empresa = $request->nombres;
            $empresa->direccion_empresa = $request->direccion;
            $empresa->fono_empresa = $request->fono;
            $empresa->web_empresa = $request->web;
            $empresa->save();
        }

      
        if(Auth::user()->id_perfil==3){
            return redirect('/admin');
        }
        else{
            return redirect('/perfil');
        }

    }

    
    public function cambiarPass($id){

        if(Auth::user())
        {
            if(Auth::user()->id_perfil==3 || Auth::user()->id_usuario == $id){
                $usuario = User::find($id);
                return view('auth.updatePass',compact('usuario'));    
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function store(Request $request){
        if(Auth::user())
        {
            if(Auth::user()->id_perfil==3 || Auth::user()->id_usuario == $request->id_usuario){
                $usuario = User::find($request->id_usuario);
                $usuario->password = \Hash::make($request->contrasena);
                $usuario->save();
                return redirect('/perfil');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function EliminarUsuario($id){
        
        if(Auth::user()->id_perfil==3){
          
        $usuario = User::find($id);
        $usuario->estado_usuario =0;
        $repuestos = Repuesto::all()->where('id_usuario', $id);

        foreach ($repuestos as $repuesto){
            $repuesto->estado_repuesto =0;
            $repuesto->save();
        }
        $usuario->save();
        return redirect('/admin');
        }
        else{
            return redirect('/');

        }
 
     }
}
