<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'id_venta';
    const CREATED_AT = 'fecha_reg_venta';
    const UPDATED_AT = 'fecha_mod_venta';

    public function repuesto()
    {
        return $this->hasMany(Repuesto::Class, 'id_repuesto');
    }
    public function comprador()
    {
        return $this->hasMany(Usuario::Class, 'id_usuario');
    }
}
