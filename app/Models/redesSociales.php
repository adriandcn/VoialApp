<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class redesSociales extends Model
{
    protected $table = 'redes_sociales';
    
    protected $fillable = array('idredes_sociales', 'nombre_red', 'estado', 'createat');
}
