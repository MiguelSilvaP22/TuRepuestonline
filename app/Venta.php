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
        return $this->belongsTo(Repuesto::Class, 'id_repuesto');
    }
    public function comprador()
    {
        return $this->belongsTo(Usuario::Class, 'id_usuario');
    }

    public function evaluacion()
    {
        return $this->hasMany(Evaluacion::Class, 'id_venta');
    }
}
