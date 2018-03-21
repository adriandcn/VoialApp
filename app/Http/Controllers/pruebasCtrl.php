<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\catalogoServiciosRepository;
use DB,Mail;

class pruebasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(catalogoServiciosRepository $catalogoServicios)
    {   
        $data = [
                'email' => 'fallsouls@hotmail.com',
                'nombre' =>'Alex',
                'confirmation_code' => '12312311d3qsda',
                'title'  => trans('front/verify.email-title'),
                'body'  => trans('front/verify.email-body'),
                'footer'  => trans('front/verify.email-footer'),
                'link'   => trans('front/verify.email-link'),
                'linkPD'   => trans('front/verify.email-msg-link'),
                'linkUnsuscribe'   => trans('front/verify.email-unsubscribe'),
                'urlPage' => config('global.urlHomeSite')
            ];
        // Mail::send('site.emails.activation', $data, function($message) use ($data)
        // {
        //     $message->from("info@voilappbeta.com",'VoilApp');
        //     $message->to($data['email'],$data['email'])->subject('Verifica tu cuenta');
        // });
        return view('site.emails.activation')
                ->with('body',$data['body'])
                ->with('linkPD',$data['linkPD'])
                ->with('footer',$data['footer'])
                ->with('confirmation_code',$data['confirmation_code'])
                ->with('link',$data['link'])
                ->with('linkUnsuscribe',$data['linkUnsuscribe'])
                ->with('title',$data['title'])
                ->with('urlPage',$data['urlPage']);
    }
}
