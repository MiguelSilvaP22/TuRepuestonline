<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraMembresia extends Model
{
    protected $table = 'compramembresia';
    protected $primaryKey = 'id_compramembresia';
    const CREATED_AT = 'fecha_reg_compramembresia';
    const UPDATED_AT = 'fecha_mod_compramembresia';

}
