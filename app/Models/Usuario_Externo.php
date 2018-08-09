<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_Externo extends Model
{
    	protected $table = 'usuario_externo';
        protected $primaryKey = 'id_usuario_externo';
        public static $messages = [
	        'phone.required' => 'El campo Teléfono es requerido',
	        'age.required' => 'El campo Edad es requerido',
	        'email.required' => 'El campo Email es requerido'
	    ];
        public static $rules = [
	         'id_promo' => 'required',
	         'phone' => 'required',
	         'age' => 'required',
	         'email' => 'required'
	    ];
}
