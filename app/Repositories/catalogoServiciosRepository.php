<?php



namespace App\Repositories;



use App\Models\User, App\Models\Role ,DB;

use App\Models\Usuario_Servicio;

use App\Models\Servicio_Establecimiento_Usuario;

use App\Models\Tendencia;



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

		$this->campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng','nivel','id_padre','image'];

		$this->arrayList = [];

		$this->arrayForAcordion = [];

		$this->tendenciasModel = new Tendencia();

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

		$serviciosList = DB::table('catalogo_servicios')

						->where('estado_catalogo_servicios',1)

						->where('nivel',1)

						->orderBy('orden','ASC')

						->get();

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
	                            ->orderBy('orden','ASC')
	                            ->limit(4)
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

            // Cargar mensaje                

        	$message_catalogo = DB::table('mensajes_catalogo')

                        ->select('mensaje')

                        ->where('estado',1)

                        ->where('id_catalogo',$value->id_catalogo_servicios)

                        ->get();

            if (count($message_catalogo) > 0) {

                $value->showMesage = true;

                $value->mensaje = $message_catalogo[0]->mensaje;

            }else{

            	$value->showMesage = false;

                $value->mensaje = null;

            }

        	if($value->nivel == 2){

            	array_push($this->arrayForAcordion,$value);

            }else{

            	$this->recursiveListForAcordion($childList);

            }

            if ($value->nivel == 1) {

            	$value->children = $this->arrayForAcordion;

				$this->arrayForAcordion = [];

            }

		}

		return $padresList;

	}



	public function getByCatalogoArray($array, $idSubCatalogo = null)

	{	

		$usuario_Servicio = new Usuario_Servicio();

		$campos_serv = ['usuario_servicios.id','nombre_servicio','detalle_servicio','images.filename','latitud_servicio','longitud_servicio'];

		// $finded = $usuario_Servicio->join('images', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')

		// 	->where('images.profile_pic', '=', 1)

		// 	->whereIn('id_catalogo_servicio', $array)->get();

		$servicio_establecimiento_usuario = new Servicio_Establecimiento_Usuario();

		$findedEstablesimientos = $servicio_establecimiento_usuario

			->select('id_usuario_servicio')

			->whereIn('id_servicio_est', $array)

			->groupBy('id_usuario_servicio')

			->get();

		$arrayEstServ = [];

		foreach ($findedEstablesimientos as $value) {

			array_push($arrayEstServ, $value->id_usuario_servicio);

		}

		$finded = $usuario_Servicio

			->leftJoin('images', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')

			->whereIn('usuario_servicios.id', $arrayEstServ)

			->where('id_catalogo_servicio',$idSubCatalogo)

			->where(function($query){
                 $query->where('images.profile_pic','=',1);
                 $query->where('images.estado_fotografia','=',1);
                 $query->where('images.id_catalogo_fotografia','=',1);
                 $query->orWhereNull('images.profile_pic');
            })

            ->select($campos_serv)
            ->groupBy('usuario_servicios.id')
			->get();

		return $finded;

	}



	private function getIp() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))

            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))

            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];

    }



    public function getTendencias($idCatalogo = null){

        if ($idCatalogo != 'all' && $idCatalogo != null) {

            $tendenciasList = $this->tendenciasModel

                        ->join('tendencias_catalogo','idtendencia','=','idtendencias')

                        ->where('tendencias.status',1)

                        ->where('idCatalogo',$idCatalogo)

                        ->get();

        }else{

            $tendenciasList = $this->tendenciasModel

                        ->where('status',1)

                        ->get();

        }

        

        foreach ($tendenciasList as $value) {

            $clics = DB::table('tendencias_clics')->where('idtendencia',$value->idtendencias)->count();

            $value->clics = $clics;

        }

        return $tendenciasList;

    }



	public function saveClickTendencias($idtendencia)

    {



        $ip = $this->getIp();

        if ($ip != '' || $ip != null) {

            $client = new Client();

            $res = $client->get('http://ip-api.com/json/186.46.201.39', ['fields' => '520191', 'lang' => 'en']);

            $status = $res->getStatusCode();

            if ($status == 200) {

                $result = json_decode($res->getBody());

                $query['provincia'] = $result->regionName;

                $query['canton'] = $result->city;

            }

        }else{

            $query['provincia'] = null;

            $query['canton'] = null;

        }

        $insert = DB::table('tendencias_clics')

            ->insert(

                        [

                            'idtendencia' => $idtendencia,

                            'provincia' => $query['provincia'],

                            'canton' => $query['canton']

                        ]

                    );

        return ['error' => !$insert];

    }



}

