<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use DB;
use App\Repositories\catalogoServiciosRepository;

class tendenciasController extends Controller
{
    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    public function __construct(){
      
        
    }

    public function getTendencias($idCatalogo = null,catalogoServiciosRepository $catalogoServRep){
        $tendenciasList = $catalogoServRep->getTendencias($idCatalogo);
        return response()->json(['error' => false,'list' => $tendenciasList]);
    }

    public function saveClickTendencias(Request $request)
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
                            'idtendencia' => $request->idtendencia,
                            'provincia' => $query['provincia'],
                            'canton' => $query['canton']
                        ]
                    );
        return response()->json(['error' => !$insert]);
    }
}
