<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table = 'membresia';
    protected $primaryKey = 'id_membresia';
    const CREATED_AT = 'fecha_reg_membresia';
    const UPDATED_AT = 'fecha_mod_membresia';
}
