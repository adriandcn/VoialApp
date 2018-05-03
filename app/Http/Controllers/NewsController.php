<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter_Catalogo;
use App\Models\Newsletter_Cclient;
use App\Models\Newsletter_Client_List;
use DB;

class NewsController extends Controller {

    public function __construct()
    {
        $this->catalogoNews = new Newsletter_Catalogo();
        $this->catalogoClient = new Newsletter_Cclient();
        $this->clientList = new Newsletter_Client_List();
    }
    /**
     * Display the home page.
     *
     * @return Response
     */
    public function getNewByCatalog(Request $request) {
        $list = [];
        if ($request->has('idCatalogo') && !$request->has('idSubCatalogo')) {
            $list = $this->catalogoNews
                    ->join('newsletter','newsletter.id_newsletter','=','newsletter_catalogo.id_newsletter')
                    ->where('id_catalogo',$request->idCatalogo)
                    ->groupBy('newsletter.id_newsletter')
                    ->get();
        }
        if ($request->has('idCatalogo') && $request->has('idSubCatalogo')) {
            $list = $this->catalogoNews
                    ->join('newsletter','newsletter.id_newsletter','=','newsletter_catalogo.id_newsletter')
                    ->where('id_catalogo',$request->idSubCatalogo)
                    ->groupBy('newsletter.id_newsletter')
                    ->get();
        }
        return response()->json(['error' => false ,'list' => $list]);
    }

    public function registerUserToNews(Request $request) {
        $inputData = $request->formData;
        parse_str($inputData, $formFields);
        // return ['error' => true, 'errors' => $formFields];
        if (array_key_exists('checkbox-news', $formFields) != 1) {
            return ['error' => true, 'errors' => ['emptyTags']];
        }
        if ($formFields['email_news'] == '' || $formFields['email_news'] == null) {
            return ['error' => true, 'errors' => ['emptyEmail']];
        }
        $existClient = $this->clientList
                        ->where('email_client',$formFields['email_news'])
                        ->count();
        if ($existClient > 0) {
            return ['error' => true, 'errors' => ['emailRegistered']];
        }
        $resTransaction = DB::transaction(function() use($formFields){
            $allSaved = true;

            foreach ($formFields['checkbox-news'] as $idNews) {
                $existClient = $this->clientList
                        ->where('email_client',$formFields['email_news'])
                        ->count();
                if ($existClient == 0) {
                    $client = $this->clientList;
                    $client->email_client = $formFields['email_news'];
                    $client->range_send = $formFields['range'];
                    $client->save();
                }else{
                    $client = $this->clientList->where('email_client',$formFields['email_news'])->first();
                }
               $exist = $this->catalogoClient
                        ->where('id_newsletter',$idNews)
                        ->where('id_newsletter_clients_list',$client->id_newsletter_clients_list)
                        ->count();
                if ($exist == 0) {
                    $item = new $this->catalogoClient;
                    $item->id_newsletter = intval($idNews);
                    $item->id_newsletter_clients_list = $client->id_newsletter_clients_list;
                    $res = $item->save();
                    if ($res != 1) {
                           $allSaved = false;
                    }
                }
            }
            if ($allSaved) {
                return ['error' => !$allSaved];
            }else{
                return ['error' => true, 'errors' => ['Save']];
            }
        });
        return response()->json($resTransaction);
    }
}
