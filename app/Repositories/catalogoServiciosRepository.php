<?php

namespace App\Repositories;

use App\Models\User, App\Models\Role ,DB;

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
		if ($this->level < $level) {
			$campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng'];
			foreach ($padresList as $value) {
		        $childList = DB::table('catalogo_servicios')
	                            ->select($campos)
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
}
