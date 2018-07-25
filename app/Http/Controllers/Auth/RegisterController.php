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
    protected $redirectTo = '/registroCompleto';

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
        
        if( $data['tipoUsuario']==1)
        {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|unique:usuario|max:255',
                'password' => 'required|string|min:6|confirmed',
                'fono' => 'required|string|min:8|max:10',
                'run_personanatural' => 'required|string|unique:personanatural|max:255',
            ]);
        }

        if( $data['tipoUsuario']==2)
        {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|unique:usuario|max:255',
                'password' => 'required|string|min:6|confirmed',
                'fono' => 'required|string|min:8|max:10',
                'rut_empresa' => 'required|string|unique:empresa|max:255',
            ]);
        }
        
    }

    public function esRut($r = false){
        if((!$r) or (is_array($r)))
            return false; /* Hace falta el rut */
     
        if(!$r = preg_replace('|[^0-9kK]|i', '', $r))
            return false; /* Era código basura */
     
        if(!((strlen($r) == 8) or (strlen($r) == 9)))
            return false; /* La cantidad de carácteres no es válida. */
     
        $v = strtoupper(substr($r, -1));
        if(!$r = substr($r, 0, -1))
            return false;
     
        if(!((int)$r > 0))
            return false; /* No es un valor numérico */
     
        $x = 2; $s = 0;
        for($i = (strlen($r) - 1); $i >= 0; $i--){
            if($x > 7)
                $x = 2;
            $s += ($r[$i] * $x);
            $x++;
        }
        $dv=11-($s % 11);
        if($dv == 10)
            $dv = 'K';
        if($dv == 11)
            $dv = '0';
        if($dv == $v)
            return number_format($r, 0, '', '.').'-'.$v; /* Formatea el RUT */
        return false;
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
            $personanatural->run_personanatural = str_replace('.', '', $data['run_personanatural']);
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
            $empresa->rut_empresa = str_replace('.', '', $data['rut_empresa']);
            $empresa->fono_empresa = $data['fono'];
            $empresa->web_empresa = $data['web'];
            $empresa->estado_empresa = 1;
            $empresa->save();
        }
        return  $user;
    }

    
}
