<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table = 'repuesto';
    protected $primaryKey = 'id_repuesto';
    const CREATED_AT = 'fecha_reg_repuesto';
    const UPDATED_AT = 'fecha_mod_repuesto';


    public function categoriaRepuesto()
    {
        return $this->belongsTo(CategoriaRepuesto::Class, 'id_categoriarepuesto');
    }

    public function imagenrepuesto()
    {
        return $this->hasMany(ImagenRepuesto::Class, 'id_repuesto');
    }

    public function compatibilidad()
    {
        return $this->belongsToMany(Modelo::Class, 'repuestomodelo', 'id_repuesto', 'id_modelo');
    }

    public function favorito()
    {
        return $this->belongsToMany(Usuario::Class, 'favorito', 'id_repuesto', 'id_usuario');
    }
}