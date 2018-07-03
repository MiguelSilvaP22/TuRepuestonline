<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $primaryKey = 'id_empresa';
    const CREATED_AT = 'fecha_reg_empresa';
    const UPDATED_AT = 'fecha_mod_empresa';

    public function usuario()
    {
        return $this->belongsTo(User::Class, 'id_usuario');
    }
}
