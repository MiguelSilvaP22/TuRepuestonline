<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaRepuesto extends Model
{
    protected $table = 'categoriarepuesto';
    protected $primaryKey = 'id_categoriarepuesto';
    const CREATED_AT = 'fecha_reg_categoriarepuesto';
    const UPDATED_AT = 'fecha_mod_categoriarepuesto';
}
