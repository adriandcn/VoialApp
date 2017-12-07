<?php

namespace App\Repositories;

use App\Models\User, App\Models\Role ,DB;
use App\Models\Usuario_Servicio;

class catalogoServiciosRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Role
	 */	
	protected $role;

	/**
	 * Create a new catalogoServiciosRepository instance.
	 *
   	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct()
	{
		$this->level = 0;
		$this->campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng','nivel'];
		$this->arrayList = [];
		$this->arrayForAcordion = [];
	}

	/**
	 * Save the User.
	 *
	 * @param  App\Models\User $user
	 * @param  Array  $inputs
	 * @return void
	 */
  	public function getList()
	{		
		$serviciosList = DB::table('catalogo_servicios')->where('estado_catalogo_servicios',1)->where('id_padre',0)->get();
		return $serviciosList;
	}

	public function recursiveList($padresList,$level)
	{	
		if ($level == null) {
			$maxLevel = DB::table('catalogo_servicios')->max('nivel');
			$level = $maxLevel;
		}
		if ($this->level < $level) {
			foreach ($padresList as $value) {
		        $childList = DB::table('catalogo_servicios')
	                            ->select($this->campos)
	                            ->where('estado_catalogo_servicios',1)
	                            ->where('id_padre',$value->id_catalogo_servicios)
	                            ->get();
				$value->child = $childList;
				$this->level++;
				$this->recursiveList($childList,$level);
			}
		}
		return $padresList;
	}

	public function recursiveListInArray($padresList,$level)
	{	
		if ($level == null) {
			$maxLevel = DB::table('catalogo_servicios')->max('nivel');
			$level = $maxLevel;
		}
		if ($this->level < $level) {
			foreach ($padresList as $child) {
	            	array_push($this->arrayList, $child);
	            }
			foreach ($padresList as $value) {
		        $childList = DB::table('catalogo_servicios')
	                            ->select($this->campos)
	                            ->where('estado_catalogo_servicios',1)
	                            ->where('id_padre',$value->id_catalogo_servicios)
	                            ->get();
				$this->level++;
				$this->recursiveListInArray($childList,$level);
			}
		}
		return $this->arrayList;
	}

	public function getDifferentThan($differentThan)
	{	
		$lista = DB::table('catalogo_servicios')
	                            ->select($this->campos)
	                            ->where('id_padre','!=',$differentThan)
	                            ->get();
		return $lista;
	}

	public function recursiveListForAcordion($padresList)
	{	

		foreach ($padresList as $value) {
	        $childList = DB::table('catalogo_servicios')
                            ->select($this->campos)
                            ->where('estado_catalogo_servicios',1)
                            ->where('id_padre',$value->id_catalogo_servicios)
                            ->get();
        	if($value->nivel == 3){
            	array_push($this->arrayForAcordion,$value);
            }else{
            	$this->recursiveListForAcordion($childList);
            }
            if ($value->nivel == 0) {
            	$value->children = $this->arrayForAcordion;
				$this->arrayForAcordion = [];
            }
		}
		return $padresList;
	}

	public function getByCatalogoArray($array)
	{	
		$usuario_Servicio = new Usuario_Servicio();
		$finded = $usuario_Servicio->whereIn('id_catalogo_servicio', $array)->get();
		return $finded;
	}


}
