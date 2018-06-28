<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $primaryKey = 'id_modelo';
    const CREATED_AT = 'fecha_reg_modelo';
    const UPDATED_AT = 'fecha_mod_modelo';

    public function motores()
    {
        return $this->hasMany(Motor::Class, 'id_modelo');
    }
    public function marca()
    {
        return $this->belongsTo(Marca::Class, 'id_marca');
    }

    public function compatibilidad()
    {
        return $this->belongsToMany(Repuesto::Class, 'repuestomodelo', 'id_modelo', 'id_repuesto');
    }

}
