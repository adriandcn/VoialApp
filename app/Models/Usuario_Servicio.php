<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_Servicio extends Model
{
    //
    protected $table = 'usuario_servicios';
    public $timestamps = false;
    
    // id_usuario_operador
    // id_catalogo_servicio
    // detalle_servicio
    // precio_desde
    // precio_hasta
    // precio_anterior
    // precio_actual
    // descuento_servico
    // direccion_servicio
    // longitud_servicio
    // latitud_servicio
    // estado_servicio
    // fecha_ingreso
    // fecha_fin
    // id_parroquia
    // correo_contacto
    // pagina_web
    // nombre_comercial
    // tags
    // calificacion_average
    // prioridad
    // num_visitas
    // descuento_clientes
    // estado_descuento_clientes
    // estado_descuento_no_clientes
    // nombre_servicio
    // tags_servicio
    // id_canton
    // estado_servicio_usuario
    // observaciones
    // telefono
    // id_provincia
    // como_llegar1
    // como_llegar2_2
    // como_llegar1_1
    // como_llegar2
    // id_padre
    // fecha_ultima_visita
    // horario
    // detalle_servicio_eng
    // created_at
    // updated_at
    // cantidad_fotos
    
    /* Es la representacion de ELOQUENT de que el Usuaro Servico pertenece a un Usuario Operador
     * En el Modelo de Usuario Operador se encuentra la funcion inversa     */
    public function usuario_operador(){
        
     //   return $this->belongsTo('App\Models\Usuario_Operador');
        
    }
    
      public function catalogo_servicio(){
        
      //  return $this->belongsTo('App\Models\Catalogo_Servicio');
        
    }
}
