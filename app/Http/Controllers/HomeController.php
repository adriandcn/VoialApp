<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Jobs\ChangeLocale;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Session;
use Lang,App,Language,DB;

class HomeController extends Controller {

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index(Guard $auth) {
        //	
        $agent = new Agent();
        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        Session::put('device', $desk);
        if ($auth->check()) {
            $user = $auth->user();
           // $view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
            return redirect('/servicios')->with('user', $user->id);
        } else {
            $view = view('auth.completeRegister');
        }
        return $view;
    }

    /**
     * Change language.
     *
     * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
     * @return Response
     */
    public function language(
    ChangeLocale $changeLocale) {
        $changeLocale->handle();
        App::setLocale(session('locale'));
        return redirect()->back();
    }
    
    
    public function indexres(Guard $auth) {
        //	
        $agent = new Agent();
        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }
        Session::put('device', $desk);
        if ($auth->check()) {
            $user = $auth->user();
           // $view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
            return redirect('/mis-servicios')->with('user', $user->id);
        } else {

            $view = view('responsive.completeRegister');
        }
        return $view;
    }

    
     public function getConfirm($confirmation_code) {

        $user = DB::table('users')->where('confirmation_code',$confirmation_code)->get();
        if (count($user) > 0) {

            $user = DB::table('users')

            ->where('confirmation_code',$confirmation_code)

            ->where('confirmed',false)

            ->update(['confirmation_code' => '','confirmed'=> true]);

            return redirect('/')->with('okConfirm', trans('front/verify.okConfirmation'));

        }else{

            return redirect('/');

        }
    }
}
