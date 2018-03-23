<?php

namespace App\Repositories;

use App\Models\redesSociales;
use App\Models\redesSocialesServicio;

class redesSocialesRepository extends BaseRepository {
    /**
     * The Role instance.
     *
     * @var App\Models\Usuario Servicios
     */

    /**
     * Create a new ServiciosOperadorRepository instance.
     *
     * @param  App\Models\UserServicios $userservicios

     * @return void
     */
    public function __construct() {
        $this->redesSociales = new redesSociales();
        $this->redesSocialesServicio = new redesSocialesServicio();
    }

    //Entrega el arreglo de los servicios más visitados por provincia
    public function getRedes() {
        $result =  $this->redesSociales->select('nombre_red','idredes_sociales')->where('estado',1)->get();
        return $result;
    }

    public function storeRedes($data) {
        $result =  $this->redesSocialesServicio->insertGetId($data);
        return $result;
    }

    public function updateRed($id,$value) {
        $result =  $this->redesSocialesServicio->where('idservicio_redes_sociales',$id)->update(['url' => $value]);
        return $result;
    }

    public function getRedesServicio($id)
    {   
        $servicioRedes = $this->redesSocialesServicio
                            ->join('redes_sociales','redes_sociales.idredes_sociales','=','servicio_redes_sociales.idredes_sociales')
                            ->select('idservicio_redes_sociales','nombre_red','url','icon')
                            ->where('estado',1)
                            ->where('servicio_redes_sociales.id_usuario_servicio',$id)
                            ->get();
        if (count($servicioRedes) == 0) {
            $servicioRedes = $this->getRedes();
        }
        return $servicioRedes;
    }
}