<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,App,URL;

class siteMapController extends Controller
{

    public function __construct(){
    }

    public function genSiteMap(Request $request){
        // create new sitemap object
        $sitemap = App::make("sitemap");
        // add items to the sitemap (url, date, priority, freq)
        $sitemap->add(URL::to('/'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('contacts'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('login'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('Register'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('catalogo-de-servicios'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('busqueda-por-tendencia'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('detalles-de-servicio'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('detalles-de-promocion'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('mis-servicios'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('crear-editar-servicio'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('administracion-de-promociones'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('crear-editar-promocion'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        $sitemap->add(URL::to('datos-de-operador'), date("Y/m/d hh:mm:ss"), '1.0', 'daily');
        // generate your sitemap (format, filename)
        $sitemap->store('xml', 'voilapp-site-map');
        // this will generate file voilapp-site-map.xml to your public folder
        return response()->json(['error' => false]);
    }

}
