<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;
use App\Repositories\catalogoServiciosRepository;
use App\Repositories\ServiciosOperadorRepository;
use App\Repositories\OperadorRepository;
use Input;
use Validator;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Session;
use App\Models\Review_Usuario_Servicio;
use App\Jobs\VerifyReview;
use App\Jobs\ContactosMail;
use DB;
use Mail;

class HomePublicController extends Controller {

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome(catalogoServiciosRepository $catalogoServicios) {
        // try {
        //     $ipUser = $this->getIp();
        //     //$location = json_decode(file_get_contents("http://ipinfo.io/" . $ipUser));
        //     $location = json_decode(file_get_contents("http://ipinfo.io/186.47.240.232"));
        // } catch (Exception $e) {
        //     $location = json_decode(file_get_contents("http://ipinfo.io/186.47.240.232"));
        // }
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        Session::put('device', $desk);
        $serviciosList = $catalogoServicios->getList();
        // $campos = ['id_catalogo_servicios','nombre_servicio','nombre_servicio_eng'];
        // $padresList = DB::table('catalogo_servicios')
        //                     ->select($campos)
        //                     ->where('estado_catalogo_servicios',1)
        //                     ->where('nivel',0)
        //                     ->get();
        // $headerCategories = $catalogoServicios->recursiveList($padresList,2);

        return view('site.blades.home-default',compact('serviciosList','headerCategories'));
        ;
    }

    //Logica para obtener sitemap de los sitios turisticos
    public function sitemap(PublicServiceRepository $gestion) {
        if (!\Cache::has('usuarioServicioCache')) {

            $usuarioServicioCache = $gestion->getSitemapUsuariosServicio();

            \Cache::put('usuarioServicioCache', $usuarioServicioCache, 4320);
        } else {
            $usuarioServicioCache = \Cache::get('usuarioServicioCache');
        }
        $content = View::make('Admin/sitemap', ['usuarioServicioCache' => $usuarioServicioCache]);
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }

    //Obtiene las descripcion de la atraccion elegida
    public function getTripDescripcion($nombre_atraccion, $id_atraccion, PublicServiceRepository $gestion) 
            {


        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        $gestion->saveVisita(null, $id_atraccion);

        $provincia = null;
        $canton = null;
        $parroquia = null;

        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        if ($atraccion != null) {
            if ($atraccion->id_catalogo_servicio == 11) {

                $eat = $gestion->getTripToDo($id_atraccion, 1);
                $sleep = $gestion->getTripToDo($id_atraccion, 2);
                $trips = $gestion->getotherTrips($id_atraccion);

                $imagenes = $gestion->getAtraccionImages($id_atraccion);
                //print_r($eat);
                //dd($eat);
                if ($id_atraccion == 1170) {
                    return view('public_page.front.Trip2')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                } elseif ($id_atraccion == 1171) {
                    return view('public_page.front.Trip3')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                } 
                 elseif ($id_atraccion == 1172) {
                    return view('public_page.front.Trip4')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                }
                
                elseif ($id_atraccion == 1173) {
                    return view('public_page.front.Trip5')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                }
                else {
                    return view('public_page.front.Trip1')->with('atraccion', $atraccion)
                                    ->with('imagenes', $imagenes)
                                    ->with('eat', $eat)
                                    ->with('sleep', $sleep)
                                    ->with('moretrips', $trips);
                }
            } else
                abort(404);
        } else
            abort(404);
    }
    
    
   
    
    
        //Obtiene las descripcion de la atraccion elegida
    public function getDistributivo( PublicServiceRepository $gestion) 
            {


       $instituciones= $gestion->getinstituciones();


       
 
    
          foreach ($instituciones as $institucion) 
              
              {
             for ($dias = 1; $dias <= $institucion->Num_dias; $dias++) 
                    {
                for ($i = 1; $i <= $institucion->Num_sesiones; $i++) 
                    {
                    
                         $personas= $gestion->getpersonas();
                         
                           foreach ($personas as $persona) 
              
                            {
                              
                               if((trim(strtoupper($institucion->Provincia)) == trim(strtoupper($persona->Provincia))))
                               {
                                   
                               
                               if(trim(strtoupper($institucion->Canton)) == trim(strtoupper($persona->Canton)))
                               {
                               
                             //      if(trim(strtoupper($institucion->Parroquia)) == trim(strtoupper($persona->Parroquia)))
                               //{
                                   
                                   $cantidad_contada=0;
                                   $asignadoSesion= $gestion->getAsignadosSesion($institucion->id,$i,$dias);
                                 
                                   if($asignadoSesion!=null)
                                   {    
                                      $cantidad_contada= $asignadoSesion->num_asignados;
                                   }
                                   if($institucion->Num_asientos>$cantidad_contada)
                                   {
                                        
                                       
                                        $gestion->saveAsignadosSesion($institucion->id,$i,$dias);
                                      
                                        $gestion->saveAsignados($institucion->id,$persona->id,$i,$dias);
                                        $gestion->updatePersonaAsignado($persona->id);
                                       
                                   }
                                   
                               }
                              // }
                            }
                               
                            }
                               
                               
                            }
                    }
                           }
                         
                    
                    
                    }

               
            
    
    
    
    //busca dentro de un usuario servicios
    public function postFiltersCategoriaIntern(Request $request, PublicServiceRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $arrayFiltro = array();
        //obtengo los servicios ya almacenados de la bdd


        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if (strpos($key, 'act_') !== False) {
                $arrayFiltro[] = str_replace("act_", "", $key);
            }
        }

        $busquedaInicial = $gestion->getBusquedaInicialCatalogoFiltrosInternos($formFields['id_usuario_previo'], $formFields['searchCity'], $arrayFiltro, $formFields['min_price_i'], $formFields['max_price_i'], null, null, 100, 1);


        $busquedaInicialP = null;




        $view = View::make('public_page.partials.searchcategory', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();

            return response()->json(array('success' => true, 'sections' => $sections));
            //return  Response::json($sections['contentPanel']); 
        }






        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }
    
    
    
    
     
    //Obtiene los servicios por catalogo cercanos a la atraccion paginados
    public function getCatalosoServiciosSearchIntern(Request $request, PublicServiceRepository $gestion,$id, $id_catalogo, $ciudad) {
        //

        $busquedaInicial = $gestion->getBusquedaInicialCatalogoIntern($id,$id_catalogo, $ciudad, null, null, 500, 4);
//dd($busquedaInicial);


        $busquedaInicialP = null;

        if ($busquedaInicial != null) {
            if (Input::get('page') > $busquedaInicial->currentPage()) {

                $busquedaInicialP = $gestion->getBusquedaInicialCatalogoPadreIntern($id,$id_catalogo, $ciudad, Input::get('page'), $busquedaInicial->currentPage(), 100, 3);
            }
        }


        $view = View::make('public_page.partials.listServicesCategoria', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los top places paginados
    public function getTopPlaces(Request $request, PublicServiceRepository $gestion) {
        $topPlacesCosta = $gestion->getTopPlaces(100, 1);
        $topPlacesSierra = $gestion->getTopPlaces(100, 2);
        $topPlacesOriente = $gestion->getTopPlaces(100, 3);
        $topPlacesGalapagos = $gestion->getTopPlaces(100, 4);

        $view = View::make('public_page.partials.AllTopPlaces', array(
                    'topPlacesCosta' => $topPlacesCosta,
                    'topPlacesSierra' => $topPlacesSierra,
                    'topPlacesOriente' => $topPlacesOriente,
                    'topPlacesGalapagos' => $topPlacesGalapagos
        ));
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
    }

    //Obtiene los top places paginados
    public function getCercanosIntern(Request $request, PublicServiceRepository $gestion, $id_atraccion, $id_provincia, $id_canton, $id_parroquia) {
        //
        //saber cuales son los hijos de la atraccion principal si lo tiene
        //$related = $gestion->getHijosAtraccion($id_atraccion);
        $provincias = null;
        $canton = null;
        $parroquia = null;
        $evntParroquia = null;
        $prmoParroquia = null;
        $evntCanton = null;
        $prmoCanton = null;
        $evntProvincia = null;
        $prmoProvincia = null;
        if ($id_parroquia != 0) {
            $parroquia = $gestion->getParroquiaIntern($id_parroquia, $id_atraccion);
            if ($parroquia != null) {
                $evntParroquia = $gestion->getEventIntern($parroquia);
                $prmoParroquia = $gestion->getPromoIntern($parroquia);
            }
        }
        if ($id_canton != 0) {
            if ($parroquia != null) {
                if (Input::get('page') > $parroquia->currentPage()) {
                    $canton = $gestion->getCantonIntern($id_canton, $id_atraccion, $id_parroquia, Input::get('page'), $parroquia->currentPage());
                }
            } else {
                $canton = $gestion->getCantonIntern($id_canton, $id_atraccion, $id_parroquia, null, null);
            }
            if ($canton != null) {
                $evntCanton = $gestion->getEventIntern($canton);
                $prmoCanton = $gestion->getPromoIntern($canton);
            }
        }
        if ($id_provincia != 0) {
            if ($canton != null) {
                if ($parroquia != null) {
                    $page = $canton->currentPage() + $parroquia->currentPage();
                    $stop = $parroquia->currentPage();
                } else {
                    $page = $canton->currentPage();
                    $stop = $canton->currentPage();
                }
                if (Input::get('page') > ($page)) {
                    $provincias = $gestion->getProvinciaIntern($id_provincia, $id_atraccion, $id_canton, $id_parroquia, Input::get('page'), $stop);
                }
            } else {
                $provincias = $gestion->getProvinciaIntern($id_provincia, $id_atraccion, $id_canton, $id_parroquia, null, null);
            }
            if ($provincias != null) {
                $evntProvincia = $gestion->getEventIntern($provincias);
                $prmoProvincia = $gestion->getPromoIntern($provincias);
            }
        }
        $view = View::make('public_page.partials.cercanosIntern', array('parroquia' => $parroquia,
                    'evntParroquia' => $evntParroquia,
                    'prmoParroquia' => $prmoParroquia,
                    'canton' => $canton,
                    'provincias' => $provincias,
                    'evntCanton' => $evntCanton,
                    'prmoCanton' => $prmoCanton,
                    'evntProvincia' => $evntProvincia,
                    'prmoProvincia' => $prmoProvincia,
        ));
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
    }

    //Obtiene los top places paginados
    public function getbyCity(Request $request, PublicServiceRepository $gestion, $city) {
        //



        $eventosCloseProv = null;
        $eventosDepCloseProv = null;
        $eventosClose = null; //$gestion->getEventsIndepCity($city, 100, 10); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $eventosDepClose = $gestion->getEventsDepCity($city, 100, 10); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $PromoDepClose = null; //$gestion->getPromoDepCity($city, 100, 10); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);



        $view = View::make('public_page.partials.closeToMe', array('eventosClose' => $eventosClose,
                    'eventosCloseProv' => $eventosCloseProv,
                    'eventosDepClose' => $eventosDepClose,
                    'eventosDepCloseProv' => $eventosDepCloseProv,
                    'PromoDepClose' => $PromoDepClose));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los lugares cercanos acorde a una ubicacion paginados
    public function getcloseToMe(Request $request, PublicServiceRepository $gestion, $city) {


        $eventosCloseProv = null;
        $eventosDepClose = null;
        $eventosDepCloseProv = null;
        $PromoDepClose = null;
        $AtraccionesClose = null;
        //Existe una categoria que es independiente para crear eventos
        $eventosClose = null; //$gestion->getEventsIndepCity($city, 100, 12); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        //esos son eventos y promociones de los establecimientos
        $eventosDepClose = $gestion->getEventsDepCity($city, 100, 12); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $PromoDepClose = $gestion->getPromoDepCity($city, 100, 12); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);


        $AtraccionesClose = $gestion->getAtraccionesByCity($city, 100, 12);

        if ($AtraccionesClose == null) {
            $AtraccionesClose = $gestion->getAtraccionesByCity("Ecuador", 100, 12);
        }
        //$Inspiration = $gestion->getInspiration(100, 2);
        $Inspiration = null;


        if ($eventosClose != null) {

            if (Input::get('page') > $eventosClose->currentPage()) {
                $eventosCloseProv = $gestion->getEventsIndepProvince($city, Input::get('page'), $eventosClose->currentPage(), 100, 10);
            }
            if ($eventosDepClose != null) {
                if (Input::get('page') > $eventosDepClose->currentPage()) {
                    $eventosDepCloseProv = $gestion->getEventsDepProvince($city, Input::get('page'), $eventosDepClose->currentPage(), 100, 10);
                }
            }
        } else {

            $eventosCloseProv = $gestion->getEventsIndepProvince($city, null, null, 100, 4);
        }

        $view = View::make('public_page.partials.closeToMe', array('eventosClose' => $eventosClose,
                    'eventosCloseProv' => $eventosCloseProv,
                    'eventosDepClose' => $eventosDepClose,
                    'eventosDepCloseProv' => $eventosDepCloseProv,
                    'PromoDepClose' => $PromoDepClose,
                    'Inspiration' => $Inspiration,
                    'AtraccionesClose' => $AtraccionesClose,
                        )
                )
        ;

        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
    }

    //Obtiene las regiones del pais
    public function getRegiones(Request $request) {
        //
        //Al momento son quemadas 4 provincias
        //$listProvincias = $gestion->getProvincias();
        // $location=file_get_contents('http://freegeoip.net/json/200.125.245.238');

        $view = View::make('public_page.partials.regiones')->with('location', $location);

        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    //Obtiene las descripcion de la provincia elegida
    public function getProvinciaDescripcion($id_provincia, $id_image, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $provincias = $gestion->getProvinciaDetails($id_provincia);
        $imagenes = $gestion->getImageporProvincia($id_provincia);
        $ciudades = $gestion->getCiudades($id_provincia);
        $visitados = $gestion->getVisitadosProvincia($id_provincia);

        // $eventosProvincia = $gestion->getEventosProvincia($id_provincia);
        $explore = $gestion->getExplorer($id_provincia);

        return view('public_page.front.detalleProvincia')->with('provincias', $provincias)->with('imagenes', $imagenes)->with('ciudades', $ciudades)->with('explore', $explore)->with('visitados', $visitados);
    }

    //Obtiene las promociones de cada evento 
    public function getPromocionesAtraccion(Request $request, $id_atraccion, PublicServiceRepository $gestion) {
        //




        $ImgPromociones = null;
        $promociones = $gestion->getPromoAtraccion($id_atraccion);
        if ($promociones != null)
            $ImgPromociones = $gestion->getPromotionsImagenAtraccion($promociones);



        $view = View::make('public_page.partials.promocionesAtraccion', array('promociones' => $promociones, 'ImgPromociones' => $ImgPromociones));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los eventos de cada atraccion  de cada evento 
    public function getEventosAtraccion(Request $request, $id_atraccion, PublicServiceRepository $gestion) {
        //




        $Imgeventos = null;
        $eventos = $gestion->getEventosAtraccion($id_atraccion);
        if ($eventos != null)
            $Imgeventos = $gestion->getEventosImagenAtraccion($eventos);



        $view = View::make('public_page.partials.eventosAtraccion', array('eventos' => $eventos, 'Imgeventos' => $Imgeventos));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene las descripcion de la atraccion elegida
    public function getAtraccionDescripcion($nombre_atraccion, $id_atraccion, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        
        $ImgItiner = null;
        $explore = null;
        $visitados = null;

        $provincia = null;
        $canton = null;
        $parroquia = null;

        $errores = null;//$gestion->getErrores();


        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        
        if($atraccion!=null){
        $gestion->saveVisita(null, $id_atraccion);
        
        $tipoReviews = $gestion->getTiporeviews($id_atraccion);
        $imagenes = $gestion->getAtraccionImages($id_atraccion);


        $itinerarios = $gestion->getItinerAtraccion($id_atraccion);
        $related = $gestion->getHijosAtraccion($id_atraccion);
        $servicios = $gestion->getServicios($atraccion->id_provincia);
        $trips = $gestion->getTrips($atraccion->id_provincia);
        $operadores = $gestion->getOperadores($atraccion->id_provincia);

        if ($atraccion->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($atraccion->id_provincia);

        if ($atraccion->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($atraccion->id_canton);

        if ($atraccion->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($atraccion->id_parroquia);

        if ($related == null)
            $visitados = $gestion->getVisitadosProvincia($atraccion->id_provincia);




        if ($itinerarios != null)
            $ImgItiner = $gestion->getItinerImagenAtraccion($itinerarios);


        if (isset($atraccion->id_provincia))
            $explore = $gestion->getExplorer($atraccion->id);


        return view('public_page.front.detalleAtracciones')->with('atraccion', $atraccion)
                        ->with('imagenes', $imagenes)->with('explore', $explore)
                        ->with('itinerarios', $itinerarios)
                        ->with('ImgItiner', $ImgItiner)
                        ->with('related', $related)
                        ->with('visitados', $visitados)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
                        ->with('servicios', $servicios)
                        ->with('tipoReviews', $tipoReviews)
                ->with('trips', $trips)
                ->with('errores', $errores)
                ->with('operadores', $operadores);
        }
        else
        {
              abort(404); 
            
        }
    }

    /* ::           where: 'M' is statute miles (default)                         : */
    /* ::                  'K' is kilometers                                      : */
    /* ::                  'N' is nautical miles   
      public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
      return ($miles * 1.609344);
      } else if ($unit == "N") {
      return ($miles * 0.8684);
      } else {
      return $miles;
      }
      }
      : */

    //Obtiene los servicios por catalogo cercanos a la atraccion paginados
    public function getCatalosoServiciosSearch(Request $request, PublicServiceRepository $gestion, $id_catalogo, $ciudad) {
        //

        $busquedaInicial = $gestion->getBusquedaInicialCatalogo($id_catalogo, $ciudad, null, null, 500, 4);


        $busquedaInicialP = null;

        if ($busquedaInicial != null) {
            if (Input::get('page') > $busquedaInicial->currentPage()) {

                $busquedaInicialP = $gestion->getBusquedaInicialCatalogoPadre($id_catalogo, $ciudad, Input::get('page'), $busquedaInicial->currentPage(), 100, 3);
            }
        }


        $view = View::make('public_page.partials.searchcategory', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los servicios por catalogo cercanos a la atraccion paginados
    public function getCatalosoServicios(Request $request, PublicServiceRepository $gestion, $id_atraccion, $id_catalogo) {
        //

        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
    
        if ($id_catalogo == 11) {
            $catalogo1 = $gestion->getTripList($id_atraccion, $id_catalogo);
            $catalogo = $gestion->getDetailsServiciosAtraccionTrips($catalogo1, null, null, 10);
        } else {
            $catalogo1 = $gestion->getCatalogoDetails($id_atraccion, $id_catalogo);
            $catalogo = $gestion->getDetailsServiciosAtraccion($catalogo1, null, null, 4);
        }


        if ($atraccion->id_provincia != 0) {


            if (Input::get('page') > $catalogo->currentPage()) {

                $catalogo2 = $gestion->getCatalogoDetailsProvincia($atraccion, $id_catalogo, $catalogo1);
                $catalogo = $gestion->getDetailsServiciosAtraccion($catalogo2, Input::get('page'), $catalogo->currentPage(), 3);
            }
        }


        $view = View::make('public_page.partials.listServicesCategoria', array('catalogo' => $catalogo));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }
    
    
    
    //*************************************************************//
    //              NUEAVS FUNCIONES                               //
    //*************************************************************//    
    
    public function guardarError($id_usuario_servicio, $id_error, PublicServiceRepository $gestion) {
        
        
        $guardarError = $gestion->guardarError($id_usuario_servicio,$id_error);
        
        return response()->json(array('success' => true, 'guardar' => $guardarError));         
        
        
    }
    
    
    public function postError(Request $request, PublicServiceRepository $gestion) {

         $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        
                           
        
        $nuevoErrorContacto = $gestion->guardarErrorContacto($formFields['id_usuario_servicio'],$formFields['id_error'],
                        $formFields['nombres'],$formFields['email'],$formFields['telefono']);

        
        return response()->json(array('success' => true, 'redirectto' => $nuevoErrorContacto));
        
    }
    
    public function postContactos(Request $request,PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
      
        $nuevoContactenos = $gestion->guardarContactos($formFields['fistname'],$formFields['lastname'],$formFields['email'],$formFields['mensaje']);
        
        if($nuevoContactenos == true){
            $this->dispatch(new ContactosMail($formFields['fistname'],$formFields['lastname'],
                                            $formFields['email'],$formFields['mensaje']));
        }
        
      
        return response()->json(array('success' => true, 'redirectto' => $nuevoContactenos));
    }      




    //Obtiene las descripcion de la atraccion elegida
    public function getSearchHomeCatalogo(PublicServiceRepository $gestion, $id_catalogo, ServiciosOperadorRepository $gestionServ, OperadorRepository $operadorGestion) {

        $detalles = $gestion->obtenerDetallesServicio($id_catalogo);
        $listPromociones = $gestionServ->getPromocionesUsuarioServicio($id_catalogo);
        $listPropiedades = $operadorGestion->getCatalogoServicioEstablecimientoExistente($detalles->id_catalogo_servicio,$detalles->id);
        // return response()->json(['a' => $listPropiedades]);
        if ($detalles != null) {
            return view('site.blades.detail-service')
                            ->with('detalles', $detalles)
                            ->with('listPropiedades', $listPropiedades)
                            ->with('listPromociones', $listPromociones);
        } else {
            return redirect('/');
        }

    }

    //Obtiene las descripcion de la atraccion elegida
    public function getCatalogoDescripcion(PublicServiceRepository $gestion, $id_atraccion, $id_catalogo) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        Session::put('device', $desk);

        $catalogo = $gestion->getCatalogoDetail($id_catalogo);
        $ServicioPrevio = $gestion->getAtraccionDetails($id_atraccion);
        $servicios = $gestion->getServicios($ServicioPrevio->id_provincia);
        //$likes=$gestion->getlikes($ServicioPrevio->id);


        $provincia = null;
        $canton = null;
        $parroquia = null;

        if ($ServicioPrevio->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($ServicioPrevio->id_provincia);

        if ($ServicioPrevio->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($ServicioPrevio->id_canton);

        if ($ServicioPrevio->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($ServicioPrevio->id_parroquia);


        return view('public_page.front.listServices')
                        ->with('ServicioPrevio', $ServicioPrevio)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
                        ->with('servicios', $servicios)
                        ->with('id_catalogo', $id_catalogo)
                        ->with('catalogo', $catalogo);
    }

    //Obtiene todas las provincias de la region
    public function getRegionsId($id_region, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $provincias = $gestion->getRegionDetails($id_region);
        $imagenes = $gestion->getImageporRegion($id_region);



        return view('public_page.front.allRegions')->with('provincias', $provincias)->with('imagenes', $imagenes)->with('region', $id_region);
    }

    //Obtiene los top places paginados
    public function getConfirmReview($codigo, PublicServiceRepository $gestion) {
        $checkcode = $gestion->updateCodeReview($codigo);
        $rev_code = $gestion->getRevCode($codigo);

        return redirect('/tokenDc$rip/' . $rev_code->id_usuario_servicio);
    }

    public function getReviews(Request $request, PublicServiceRepository $gestion, $id_atraccion) {
        //

        $reviews = $gestion->getReviews($id_atraccion);
        $view = View::make('public_page.partials.reviews', array('reviews' => $reviews));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    public function getLikesSatisf(Request $request, PublicServiceRepository $gestion, $id_atraccion) {
        //

        $likes = $gestion->getlikes($id_atraccion);


        $view = View::make('public_page.partials.btnLike', array('likes' => $likes, 'atraccion' => $id_atraccion));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    public function postReviews(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);


        $validator = Validator::make($formFields, Review_Usuario_Servicio::$rules);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'message' => $validator->messages()->first(),
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            $verifyIp = $gestion->getReviewsIpEmail($formFields['id_atraccion'], $formFields['email_reviewer']);

            if ($verifyIp == null) {
                $root_array = array();
                //Arreglo de servicios prestados que vienen del formulario
                foreach ($formFields as $key => $value) {
                    //verifica si el arreglo de parametros es un catalogo
                    if (strpos($key, 'review_score') !== false) {
                        $root_array[$key] = $value;
                    }
                }

                $save_array = array();
                $codigo = str_random(30);
                foreach ($root_array as $key1 => $value1) {

                    $save_array['calificacion'] = $value1;
                    $save_array['nombre_reviewer'] = $formFields['nombre_reviewer'];
                    $save_array['email_reviewer'] = $formFields['email_reviewer'];
                    $save_array['id_usuario_servicio'] = $formFields['id_atraccion'];
                    $save_array['id_tipo_review'] = $formFields['id_tipo_review_' . substr($key1, 13)];
                    $save_array['confirmation_rev_code'] = $codigo;
                    $save_array['ip_reviewer'] = $this->getIp();
                    $review = $gestion->storeNew($save_array);
                }

                $this->dispatch(new VerifyReview($review));
            } else {
                return response()->json(array(
                            'fail' => true,
                            'message' => "Usted ya ha dejado un review anteriormente",
                            'errors' => $validator->getMessageBag()->toArray()
                ));
            }

            return response()->json(array(
                        'success' => true,
                        'message' => "Gracias por tu review, se ha enviado un correo electrónico a tu email para verificación"
            ));
        }
    }

    public function postFiltersCategoria(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $arrayFiltro = array();
        //obtengo los servicios ya almacenados de la bdd


        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if (strpos($key, 'act_') !== False) {
                $arrayFiltro[] = str_replace("act_", "", $key);
            }
        }


        $busquedaInicial = $gestion->getBusquedaInicialCatalogoFiltros($formFields['catalogo'], $formFields['searchCity'], $arrayFiltro, $formFields['min_price_i'], $formFields['max_price_i'], null, null, 100, 1);


        $busquedaInicialP = null;




        $view = View::make('public_page.partials.searchcategory', array('catalogo' => $busquedaInicial, 'catalogo2' => $busquedaInicialP));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();

            return response()->json(array('success' => true, 'sections' => $sections));
            //return  Response::json($sections['contentPanel']); 
        }






        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }

    public function postLikesS(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $ip = $this->getIp();
        $likesIP = $gestion->getlikesIp($formFields['ids'], $ip);

        if (count($likesIP) == 0 || $likesIP == null) {
            $gestion->storeLikes($formFields['ids'], $ip);
        }


        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }
    
    
    
    
    
    public function getAtraccionDescripcion1(PublicServiceRepository $gestion) {
        $agent = new Agent();

         $id_atraccion = session('usu_servicio');
         $id_catalogo = session('id_catalogo');
         
        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);

        $gestion->saveVisita(null,$id_atraccion);
        $ImgItiner = null;
        $explore = null;
        $visitados = null;

        $provincia = null;
        $canton = null;
        $parroquia = null;

        $tipoReviews = $gestion->getTiporeviews($id_atraccion);
        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        $imagenes = $gestion->getAtraccionImages($id_atraccion);


        $itinerarios = $gestion->getItinerAtraccion($id_atraccion);
        $related = $gestion->getHijosAtraccion($id_atraccion);
        $servicios = $gestion->getServicios($atraccion->id_provincia);

        if ($atraccion->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($atraccion->id_provincia);

        if ($atraccion->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($atraccion->id_canton);

        if ($atraccion->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($atraccion->id_parroquia);

        if ($related == null)
            $visitados = $gestion->getVisitadosProvincia($atraccion->id_provincia);




        if ($itinerarios != null)
            $ImgItiner = $gestion->getItinerImagenAtraccion($itinerarios);


        if (isset($atraccion->id_provincia))
            $explore = $gestion->getExplorer($atraccion->id);


        return view('responsive.detalleAtracciones')->with('atraccion', $atraccion)
                        ->with('imagenes', $imagenes)
                        ->with('explore', $explore)
                        ->with('itinerarios', $itinerarios)
                        ->with('related', $related)
                        ->with('visitados', $visitados)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
                        ->with('servicios', $servicios)
                        ->with('tipoReviews', $tipoReviews)

        ;
    }

    public function getLastServicesCreated(PublicServiceRepository $gestion)
    {
     
        $lastServices = $gestion->getLastServicesCreated();

        return response()->json(['data' => $lastServices]);
    }

    public function getLoginTemplate()
    {
        return view('site.blades.login');
    }

    public function getRegisterTemplate()
    {
        return view('site.blades.register');
    }

    public function sendEmailRestorePassword(Request $request)
    {
        $correo_enviar = $request->email;
        $existUser = DB::table('users')
        ->where('username',$correo_enviar)
        ->orWhere('email',$correo_enviar)->get();
        if (count($existUser) > 0) {
            $data['restore_code'] = str_random(30);
            $data['link'] = 'RECUPERAR';
            $correo_enviar = $existUser[0]->email;
            Mail::send('emails.auth.passwordRestore', $data, function($message) use ($correo_enviar)
            {
                $message->from("info@voilappbeta.com",'VoilApp');
                $message->to($correo_enviar,'')->subject('Restauración de contraseña');
            });
            DB::table('users')
            ->where('username',$correo_enviar)
            ->orWhere('email',$correo_enviar)->update(['code_restore' => $data['restore_code']]);
            return response()->json(['error' => false]);
        }else{
            return response()->json(['error' => true]);
        }
    }

    public function viewRestorePassword(catalogoServiciosRepository $catalogoServicios,$codeRestore)
    {
        $exist = DB::table('users')->where('code_restore',$codeRestore)->get();
        if (count($exist) > 0) {
            $email = $exist[0]->email;
            return view('site.blades.restore-pass',compact('email'));
        }else{
            return redirect('/');
        }
    }

    public function restorePassword(Request $request)
    {
        $update = DB::table('users')
            ->where('email',$request->email)->update(['password' => bcrypt($request->p),'code_restore' => null]);
        return response()->json(['error' => !$update]);
    }

    public function getViewArticles(Request $request ,$idArticle = null)
    {
        if ($idArticle != null) {
            $articlesFinded = DB::table('articlesDetail')
                    ->where('status',1)
                    ->where('id_article',$idArticle)
                    ->get();
            if (count($articlesFinded) > 0 ) {
                return view('site.blades.articlesBlogDetail',compact('article'));
            }else{
                return view('errors.404');
            }
        }else{
            $listArticles = DB::table('articles')
                    ->where('status',1)->get();
            return view('site.blades.articlesBlog',compact('listArticles'));
        }
    }

    public function getDetailPromotion($idPromotion = null ,ServiciosOperadorRepository $gestion)
    {
        if ($idPromotion != null) {
            $promotion = $gestion->getPromocion($idPromotion);
            $servicioData = $gestion->getServiciosOperadorporIdUsuarioServicio($promotion[0]->id_usuario_servicio);
            if (count($promotion) > 0 ) {
                $promotion = $promotion[0];
                $servicioData = $servicioData[0];
                return view('site.blades.promotionDetail',compact('promotion','servicioData'));
            }else{
                return view('errors.404');
            }
        }else{
            return redirect('/');
        }
    }

    public function getViewAboutUs()
    {
        return view('site.blades.contacts');
    }

    public function getViewTerms()
    {
        return view('site.blades.termsConditions');
    }

}
