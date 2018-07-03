<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    const CREATED_AT = 'fecha_reg_usuario';
    const UPDATED_AT = 'fecha_mod_usuario';

    public function perfil()
    {
        return $this->belongsTo(Perfil::Class, 'id_perfil');
    }

    public function favorito()
    {
        return $this->belongsToMany(Repuesto::Class, 'favorito', 'id_usuario', 'id_repuesto');
    }

    public function repuestos()
    {
        return $this->hasMany(Repuesto::Class, 'id_usuario');
    }

    public function personanatural()
    {
        return $this->hasMany(PersonaNatural::Class, 'id_usuario');
    }
    public function empresa()
    {
        return $this->hasMany(Empresa::Class, 'id_usuario');
    }

    public function favoritos()
    {
        return $this->hasMany(favorito::Class, 'id_usuario');
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::Class, 'id_membresia');
    }



    use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'id_perfil', 'id_membresia',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
