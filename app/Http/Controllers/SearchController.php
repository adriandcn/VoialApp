<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;
use Input;
use Validator;
use Jenssegers\Agent\Agent;
use App\Jobs\VerifyReview;
use Illuminate\Support\Facades\Session;
use App\Models\Review_Usuario_Servicio;
use App\Models\Tendencia;
use GuzzleHttp\Client;

class SearchController extends Controller
    {

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    // Obtiene los top places paginados
    public function getSearchTotal(Request $request, PublicServiceRepository $gestion)
        {
            $servicios = $gestion->getServiciosAll();
            $view = View::make('public_page.front.searchTotal', array(
                'servicios' => $servicios
            ));
            if ($request->ajax())
                {
                    $sections = $view->rendersections();
                    return Response::json($sections);
                }
              else
                {
                    return $view;
                }
        }
    //Busqueda por mapa
    public function getViewSearchMap(Request $request)
    {
        $view = View::make('site.blades.mapSearch');
        return $view;
    }

    public function searchAllInMap(Request $request,PublicServiceRepository $gestion){
        //save search
        $query['ip'] =  $this->getIp();
        $query['query'] = 'mapa';
        $query['usuario'] = ($request->session()->has('user_id')) ? $request->session()->get('user_name') : null;
        if ($query['ip'] != '' || $query['ip'] != null) {
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
        $query['radio'] = $request->radio;
        $idTendenciaS = Session::get('idTendenciaSearch');
        $gestion->saveQueryVisitor($query);
        $findedMap = $gestion->searchInMapTendencias($request->lat,$request->lng,$request->radio,$idTendenciaS);
        return response()->json(['error' => false,'data' => $findedMap]);
    }

    // Obtiene los terminos y condiciones
    public function getTermsConditions()
        {
            $view = View::make('public_page.general.termsConditions');
            return $view;
        }
    public function getAboutUs()
        {
            $view = View::make('public_page.general.aboutUs');
            return $view;
        }
    public function getMision()
        {
            $view = View::make('public_page.general.misionVision');
            return $view;
        }
    public function getServiciosOperadores()
        {
            $view = View::make('public_page.general.servicios_op');
            return $view;
        }
    public function getInvitacionOperadores()
        {
            $view = View::make('public_page.general.servicios_inv');
            return $view;
        }
    public function getSearch()

        {
            $view = View::make('site.blades.search');
            return $view;
        }
    public function getTotalSearchInside(Request $request, PublicServiceRepository $gestion)
        {
            if ($request->has('s')) {
                if ($request->s != '') {
                    $term = $request->s;
                    $busquedaTotal = $gestion->getSearchTotal($term,[4]);
                    $busquedaTotalPosts = $gestion->getSearchTotal($term,[5]);
                    //save search
                    $query['ip'] =  $this->getIp();
                    $query['query'] = $request->s;
                    $query['usuario'] = ($request->session()->has('user_id')) ? $request->session()->get('user_name') : null;
                    if ($query['ip'] != '' || $query['ip'] != null) {
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
                    $gestion->saveQueryVisitor($query);
                    $despliegue = [];
                    $desplieguePosts = [];
                    if ($busquedaTotal != null)
                    {
                        $despliegue = $gestion->paginateSearch($busquedaTotal,12);
                    }
                    if ($busquedaTotalPosts != null)
                    {
                        $desplieguePosts = $gestion->paginateSearchPosts($busquedaTotalPosts,12);
                    }
                }else{
                    $despliegue = [];
                }
                
            }else{
                $despliegue = [];
            }
            // return response()->json(['data' => $desplieguePosts->items()]);
            return View('site.blades.search', compact(
                'despliegue',
                'desplieguePosts'
            ));
        }
    public function postSearch(Request $request, PublicServiceRepository $gestion)
    {
        $this->getSearchTotal($request, $gestion);
    }

    public function getTendenciasView($idTendencia)
    {
        $dataTendencia = Tendencia::find($idTendencia);
        Session::put('idTendenciaSearch', $idTendencia);
        Session::put('tendenciaData', $dataTendencia);
        // return response()->json(['data' => Session::get('tendenciaData')]);
        return view('site.blades.tendenciasSearch');
    }
}
