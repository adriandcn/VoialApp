<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialize;
use App\Services\SocialFacebookAccountService;
use App\Repositories\UserRepository;
// use Illuminate\Contracts\Auth\Guard;
use App\Repositories\ServiciosOperadorRepository;
use App\Repositories\OperadorRepository;
use DB;
use Auth;

class SocialAuthFacebookController extends Controller
{
     /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect($action)
    {
        return Socialize::driver('facebook')->with(['state' => $action])->redirect();
    }

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(Request $request ,ServiciosOperadorRepository $gestion, UserRepository $user_gestion,OperadorRepository $operador_gestion)
    {
        session()->put('state', $request->input('state'));
        $user = Socialize::driver('facebook')->user();
        $dataLogin = DB::table('users')
                    ->where('email',$user->email)
                    ->select('id')
                    ->get();
        $action = request()->input('state');
        $loginAuto = false;
        //login automatico

        if ($action == 'R') {
            if (count($dataLogin) == 0) {
                //Crear cuenta
                $username = preg_replace('/\s+/', '', $user->name);
                $username = strtolower($username);
                $userData = array(
                    'username' => $username,
                    'email' => $user->email,
                    'password' => $username,
                    'email_confirmation' => $user->email,
                    'confirmed' => 1,
                    'system' => 'VOILAPP'
                );
                $userSaved = $user_gestion->store($userData);
                //Datos del Operador
                $operadorData = array(
                    'nombre_contacto_operador_1' => $user->name,
                    'telf_contacto_operador_1' => "",
                    'ip_registro_operador' => $this->getIp(),
                    'email_contacto_operador' => $user->email,
                    'direccion_empresa_operador' => "",
                    'id_usuario' => $userSaved->id,
                    'id_tipo_operador' => 3,
                    'estado_contacto_operador' => 1,
                    'id_usuario_op' => 0
                );
                $operador = $operador_gestion->store($operadorData);
                $operadorId = $operador->id;
                $operadorType = $operador->id_tipo_operador;
                $loginAuto = true;
                $dataLogin = $userSaved;
                $userId = $userSaved->id;
                // return response()->json(['data' => $operador]);
            }else{
                $dataLogin = $dataLogin[0];
                $dataOperador = DB::table('usuario_operadores')
                    ->where('id_usuario',$dataLogin->id)
                    ->select('id_tipo_operador','id_usuario_op')
                    ->first();
                $loginAuto = true;
                $operadorId = $dataOperador->id_usuario_op;
                $operadorType = $dataOperador->id_tipo_operador;
                $userId = $dataLogin->id;
            }
            
        }else{
            if (count($dataLogin) == 0) {
                return redirect('/')->with('userNotFoundFacebook', trans('publico/labels.alertFacebookLogIn',[ 'email' => $user->email]));
            }else{
                $dataLogin = $dataLogin[0];
                $dataOperador = DB::table('usuario_operadores')
                    ->where('id_usuario',$dataLogin->id)
                    ->select('id_tipo_operador','id_usuario_op')
                    ->first();
                $loginAuto = true;
                $operadorId = $dataOperador->id_usuario_op;
                $operadorType = $dataOperador->id_tipo_operador;
                $userId = $dataLogin->id;
            }
            
        }
        if ($loginAuto) {
            $loged = Auth::loginUsingId($dataLogin->id);
            //Datos de session
            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
                $request->session()->forget('operador_id');
            }
            $request->session()->put('user_id',$userId);
            $request->session()->put('user_name', $loged->username);
            $request->session()->put('operador_id', $operadorId);
            $request->session()->put('tip_oper', $operadorType);
            $listServicios = $gestion->getServiciosidUsuario($loged->id);
            if ($listServicios) {
                // $sessionData = $request->session()->all();
                // return response()->json(['data' => $sessionData]);
                if ($action == 'R') {
                  return redirect('/')->with('userRegisterOkFacebook', trans('publico/labels.alertFacebookRegister',[ 'username' => $userSaved->username, 'passwdr' => $userSaved->username]));
                }else{
                    return redirect('serviciosres');
                }
            } else {
                // $sessionData = $request->session()->all();
                // return response()->json(['data' => $sessionData]);
                if ($action == 'R') {
                  return redirect('/')->with('userRegisterOkFacebook', trans('publico/labels.alertFacebookRegister',[ 'username' => $userSaved->username, 'passwdr' => $userSaved->username]));
                }else{
                    return redirect('serviciosres');
                }
            }

        }
    }
}
