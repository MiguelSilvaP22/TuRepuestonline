<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\PersonaNatural;
use App\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:usuario|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = user::create([
            'email' => $data['email'],
            'id_perfil' => $data['tipoUsuario'],
            'id_membresia' => 1,
            'estado_usuario' => 1,
            'password' => Hash::make($data['password']),
        ]);
        
        if( $data['tipoUsuario']==1)
        {
            $personanatural = new PersonaNatural;
            $personanatural->id_usuario = $user->id_usuario;
            $personanatural->nombres_personanatural = $data['name'];
            $personanatural->apellidos_personanatural = $data['apellidos'];
            $personanatural->run_personanatural = $data['run'];
            $personanatural->fono_personanatural = $data['fono'];
            $personanatural->estado_personanatural = 1;
            $personanatural->save();
        }

        if( $data['tipoUsuario']==2)
        {
            $empresa = new Empresa;
            $empresa->id_usuario = $user->id_usuario;
            $empresa->nombre_empresa = $data['name'];
            $empresa->direccion_empresa = $data['direccion'];
            $empresa->rut_empresa = $data['rut'];
            $empresa->fono_empresa = $data['fono'];
            $empresa->web_empresa = $data['web'];
            $empresa->estado_empresa = 1;
            $empresa->save();
        }
        return  $user;
    }

    
}
