<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    const CREATED_AT = 'fecha_reg_motor';
    const UPDATED_AT = 'fecha_mod_motor';

}
