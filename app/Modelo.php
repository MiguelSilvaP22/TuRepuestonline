<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $primaryKey = 'id_modelo';
    const CREATED_AT = 'fecha_reg_modelo';
    const UPDATED_AT = 'fecha_mod_modelo';

}
