<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compatibilidad extends Model
{
    protected $table = 'repuestomodelo';
    protected $primaryKey = 'id_repuestomodelo';
    const CREATED_AT = 'fecha_reg_repuestomodelo';
    const UPDATED_AT = 'fecha_mod_repuestomodelo';
}
