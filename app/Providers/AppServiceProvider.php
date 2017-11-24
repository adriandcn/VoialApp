<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Services\Validation;
use App\Repositories\catalogoServiciosRepository;
use DB;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot(catalogoServiciosRepository $catalogoServicios)
	{
		// compartir datos con todas las vistas
	    $serviciosList = $catalogoServicios->getList();
        $campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng'];
        $padresList = DB::table('catalogo_servicios')
                            ->select($campos)
                            ->where('estado_catalogo_servicios',1)
                            ->where('id_padre',0)
                            ->get();
        $headerCategories = $catalogoServicios->recursiveList($padresList,2);
        View::share('serviciosList', $serviciosList);
        View::share('headerCategories', $headerCategories);
		Validator::resolver(function($translator, $data, $rules, $messages)
		{
		    return new Validation($translator, $data, $rules, $messages);
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
