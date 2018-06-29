<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';
    protected $primaryKey = 'id_marca';
    const CREATED_AT = 'fecha_reg_marca';
    const UPDATED_AT = 'fecha_mod_marca';

    public function modelos()
    {
        return $this->hasMany(Modelo::Class, 'id_marca');
    }

}
