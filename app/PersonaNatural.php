<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaNatural extends Model
{
    protected $table = 'personanatural';
    protected $primaryKey = 'id_personanatural';
    const CREATED_AT = 'fecha_reg_personanatural';
    const UPDATED_AT = 'fecha_mod_personanatural';
}
