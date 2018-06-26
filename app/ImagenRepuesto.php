<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenRepuesto extends Model
{
    protected $table = 'imagenrepuesto';
    protected $primaryKey = 'id_imagenrepuesto';
    const CREATED_AT = 'fecha_reg_imagenrepuesto';
    const UPDATED_AT = 'fecha_mod_imagenrepuesto';
}
