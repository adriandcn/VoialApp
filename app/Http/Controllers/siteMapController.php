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
        $sitemap->add(URL::to('home'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
        $sitemap->add(URL::to('page'), '2012-08-26T12:30:00+02:00', '1.0', 'monthly');








        // generate your sitemap (format, filename)
        $sitemap->store('xml', 'mysitemap');
        // this will generate file mysitemap.xml to your public folder
        return response()->json(['error' => false]);
    }

}
