<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class redesSocialesServicio extends Model
{
    protected $table = 'servicio_redes_sociales';
    
    protected $fillable = array('idservicio_redes_sociales', 'id_usuario_servicio', 'idredes_sociales', 'url');
}
