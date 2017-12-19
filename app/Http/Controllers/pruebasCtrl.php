<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\catalogoServiciosRepository;
use DB;

class pruebasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(catalogoServiciosRepository $catalogoServicios)
    {   
        $campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng'];
        $padresList = DB::table('catalogo_servicios')
                            ->select($campos)
                            ->where('estado_catalogo_servicios',1)
                            ->where('nivel',0)
                            ->get();
        $headerCategories = $catalogoServicios->recursiveList($padresList,2);

        return response()->json(['data' => $headerCategories]);
    }
}
