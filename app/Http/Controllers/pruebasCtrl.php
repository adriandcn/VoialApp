<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\catalogoServiciosRepository;
use App\Models\Usuario_Servicio;
use App\Models\SearchEngine;
use DB;

class pruebasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bulkDoctors(catalogoServiciosRepository $catalogoServicios)
    {   
        // $campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng'];
        // $padresList = DB::table('catalogo_servicios')
        //                     ->select($campos)
        //                     ->where('estado_catalogo_servicios',1)
        //                     ->where('nivel',0)
        //                     ->get();
        // $headerCategories = $catalogoServicios->recursiveList($padresList,2);
        $array = config('bulkData.rows');

        $transaction = DB::transaction(function() use($array){
            $arrayIdSaved = []; 
            foreach ($array as $value) {
                // echo $value['Nombre del Establecimiento'];
                $serv = new Usuario_Servicio();
                $serv->id_usuario_operador = 70;
                $serv->id_catalogo_servicio = $value['id_catalogo'];
                $serv->detalle_servicio = $value['Nombre del Establecimiento'];
                $serv->precio_desde = null;
                // $serv->precio_hasta = $value['precio_hasta'];
                // $serv->precio_anterior = $value['precio_anterior'];
                // $serv->precio_actual = $value['precio_actual'];
                // $serv->descuento_servico = $value['descuento_servico'];
                $serv->direccion_servicio = $value['Direccion concatenada'];
                $serv->longitud_servicio = -78.46783820000002;
                $serv->latitud_servicio = -0.1806532;
                $serv->estado_servicio = 1;
                // $serv->fecha_ingreso = $value['fecha_ingreso'];
                // $serv->fecha_fin = $value['fecha_fin'];
                $serv->id_parroquia = 0;
                $serv->correo_contacto = $value['Correo'];
                // $serv->pagina_web = $value['pagina_web'];
                // $serv->nombre_comercial = $value['nombre_comercial'];
                $serv->tags = "";
                $serv->calificacion_average = 0;
                $serv->prioridad = 0;
                $serv->num_visitas = 0;
                $serv->descuento_clientes = 0;
                $serv->estado_descuento_clientes = 0;
                $serv->estado_descuento_no_clientes = 0;
                $serv->nombre_servicio = $value['Nombre del Establecimiento'];
                // $serv->tags_servicio = $value['tags_servicio'];
                $serv->id_canton = 0;
                $serv->estado_servicio_usuario = 1;
                // $serv->observaciones = $value['observaciones'];
                $serv->telefono = $value['Telefonos_contacto'];
                $serv->id_provincia = 0;
                $serv->como_llegar1 = $value['Dirección'];
                $serv->como_llegar2_2 = $value['Dirección'];
                $serv->como_llegar1_1 = $value['Dirección'];
                $serv->como_llegar2 = $value['Dirección'];
                $serv->id_padre = 0;
                $serv->fecha_ultima_visita = date("Y/m/d");
                // $serv->horario = $value['horario'];
                // $serv->detalle_servicio_eng = $value['detalle_servicio_eng'];
                $serv->created_at = date("Y/m/d");
                $serv->updated_at = date("Y/m/d");
                $serv->cantidad_fotos = 5;
                $serv->save();
                $idSaved = $serv->id;
                $arrayItem = [
                    'id' => $idSaved,
                    'search' => $serv->nombre_servicio . ' ' . $serv->detalle_servicio . ' ' . $serv->tags,
                    'tags' => $serv->tags
                ];
                array_push($arrayIdSaved, $arrayItem);
            }

            foreach ($arrayIdSaved as $itemSaved) {
                $searchSave = new SearchEngine();
                $searchSave->id_usuario_servicio = $itemSaved['id'];
                $searchSave->search = $itemSaved['search'];
                $searchSave->estado_search = 1;
                $searchSave->tags = $itemSaved['tags'];
                // $searchSave->created_at = date("Y/m/d");
                // $searchSave->updated_at = date("Y/m/d");
                $searchSave->tipo_busqueda = 4;
                $searchSave->id_tipo = $itemSaved['id'];
                $searchSave->save();
            }

            return ['data' => $arrayIdSaved,'row' => count($arrayIdSaved) , 'idRows' => array_column($arrayIdSaved, 'id')];

        });
        return response()->json($transaction);
    }
    public function bulkHospitals(catalogoServiciosRepository $catalogoServicios)
    {   
        $array = config('bulkData.rows');

        $transaction = DB::transaction(function() use($array){
        $arrayIdSaved = []; 
        foreach ($array as $value) {
            $serv = new Usuario_Servicio();
            $serv->id_usuario_operador = 70;
            $serv->id_catalogo_servicio = $value['sub_cat'];
            $serv->detalle_servicio = $value['descripcion'];
            $serv->precio_desde = null;
            // $serv->precio_hasta = $value['precio_hasta'];
            // $serv->precio_anterior = $value['precio_anterior'];
            // $serv->precio_actual = $value['precio_actual'];
            // $serv->descuento_servico = $value['descuento_servico'];
            $serv->direccion_servicio = $value['direccion'];
            $serv->longitud_servicio = -78.46783820000002;
            $serv->latitud_servicio = -0.1806532;
            $serv->estado_servicio = 1;
            // $serv->fecha_ingreso = $value['fecha_ingreso'];
            // $serv->fecha_fin = $value['fecha_fin'];
            $serv->id_parroquia = $value['parroquia'];
            // $serv->correo_contacto = $value['Correo'];
            // $serv->pagina_web = $value['pagina_web'];
            // $serv->nombre_comercial = $value['nombre_comercial'];
            $serv->tags = "";
            $serv->calificacion_average = 0;
            $serv->prioridad = 0;
            $serv->num_visitas = 0;
            $serv->descuento_clientes = 0;
            $serv->estado_descuento_clientes = 0;
            $serv->estado_descuento_no_clientes = 0;
            $serv->nombre_servicio = $value['nombre'];
            // $serv->tags_servicio = $value['tags_servicio'];
            $serv->id_canton = $value['canton'];
            $serv->estado_servicio_usuario = 1;
            // $serv->observaciones = $value['observaciones'];
            $serv->telefono = $value['phone'];
            $serv->id_provincia = $value['provincia'];
            $serv->como_llegar1 = $value['Tu_debes'];
            // $serv->como_llegar2_2 = $value['Dirección'];
            $serv->como_llegar1_1 = $value['direccion'];
            // $serv->como_llegar2 = $value['Dirección'];
            $serv->id_padre = 0;
            $serv->fecha_ultima_visita = date("Y/m/d");
            // $serv->horario = $value['horario'];
            // $serv->detalle_servicio_eng = $value['detalle_servicio_eng'];
            $serv->created_at = date("Y/m/d");
            $serv->updated_at = date("Y/m/d");
            $serv->cantidad_fotos = 5;
            $serv->save();
            $idSaved = $serv->id;
            $arrayItem = [
                'id' => $idSaved,
                'search' => $serv->nombre_servicio . ' ' . $serv->detalle_servicio . ' ' . $serv->tags,
                'tags' => $serv->tags
            ];
            array_push($arrayIdSaved, $arrayItem);
        }

        foreach ($arrayIdSaved as $itemSaved) {
            $searchSave = new SearchEngine();
            $searchSave->id_usuario_servicio = $itemSaved['id'];
            $searchSave->search = $itemSaved['search'];
            $searchSave->estado_search = 1;
            $searchSave->tags = $itemSaved['tags'];
            // $searchSave->created_at = date("Y/m/d");
            // $searchSave->updated_at = date("Y/m/d");
            $searchSave->tipo_busqueda = 4;
            $searchSave->id_tipo = $itemSaved['id'];
            $searchSave->save();
        }

        return ['data' => $arrayIdSaved,'row' => count($arrayIdSaved) , 'idRows' => array_column($arrayIdSaved, 'id')];

    });
    
        return response()->json($transaction);
    }
}
