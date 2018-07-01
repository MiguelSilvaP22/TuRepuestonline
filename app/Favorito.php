<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = 'favorito';
    protected $primaryKey = 'id_favorito';
    const CREATED_AT = 'fecha_reg_favorito';
    const UPDATED_AT = 'fecha_mod_favorito';

    public function repuesto()
    {
        return $this->belongsTo(Repuesto::Class, 'id_repuesto');
    }
}
