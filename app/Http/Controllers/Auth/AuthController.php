<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Repositories\OperadorRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Jobs\SendMail;
use App\Repositories\ServiciosOperadorRepository;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Input;
use Mail;
use DB;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller {

    protected $validationRules = [
        'username' => 'required|max:30|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:5',
        // 'g-recaptcha-response' => 'required|recaptcha',
    ];

    use AuthenticatesAndRegistersUsers,
        ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  App\Http\Requests\LoginRequest  $request
     * @param  App\Services\MaxValueDelay  $maxValueDelay
     * @param  Guard  $auth
     * @return Response
     */
    public function postLogin(
        LoginRequest $request, Guard $auth, ServiciosOperadorRepository $gestion) {


        $logValue = $request->input('log');

        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $throttles = in_array(
                ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return redirect('/login')
                            ->with('error', trans('front/login.maxattempt'))
                            ->withInput($request->only('log'));
        }

        $credentials = [
            $logAccess => $logValue,
            'password' => $request->input('password')
        ];

        if (!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect('/login')
                            ->with('error', trans('front/login.credentials'))
                            ->withInput($request->only('log'));
        }

        $user = $auth->getLastAttempted();
        if ($user->confirmed) {
            $request->session()->put('confirmado', 1);
        } else {
            $request->session()->put('confirmado', 0);
        }
        if (($user->confirmed) || ($user->valid)) {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }

            $auth->login($user, $request->has('memory'));

            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }


            $request->session()->put('user_name', $user->username);

            $email = $auth->user()->email;
            $nombre = $auth->user()->user_name;


            /* Busca si ya tiene servicios activos o no */

            //logica que comprueba si el usuario tiene servicios para ser modificados
            //caso contrario ingresa nuevos serviciosS
            $listServicios = $gestion->getServiciosidUsuario($user->id);
            if ($listServicios) {
                $data['id_usuario_op'] = $listServicios[0]->id_usuario_op;
                $request->session()->put('operador_id', $data['id_usuario_op']);
                //        $view = view('Registro.catalogoServicio', compact('data', 'listServicios'));
                $request->session()->put('tip_oper', $listServicios[0]->id_tipo_operador);


                return redirect('/detalleServicios')->with('user', $user->id);
                // return ($view);
            } else {

                return redirect('/myProfileOp')->with('user', $user->id);
            }
        } else {

            /* --------------------------------- */
            return redirect('/login')
                            ->with('error', trans('front/verify.again'))
                            ->withInput($request->only('log'));
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postRegister(Guard $auth, Request $request, UserRepository $user_gestion, OperadorRepository $operador_gestion, ServiciosOperadorRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        if ($inputData != "") {

            $userData = array(
                'username' => $formFields['username'],
                'email' => $formFields['email'],
                'password' => $formFields['password'],
                'email_confirmation' => $formFields['email_confirmation'],
            );
        } else {

            $userData = array(
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'email_confirmation' => $request->input('email_confirmation'),
            );
        }


        //Valida que los campos sean unicos y cumplan con los requerimientos
        $validator = Validator::make($userData, $this->validationRules);



        //Si el validador falla se ejecutan las acciones
        if ($validator->fails()) {

            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {
            $user = $user_gestion->store(
                    $userData, $confirmation_code = str_random(30)
            );



            //Se almacenan los datos por default del contacto, se pueden modificar cuando ya ingrese
            $operadorData = array(
                'nombre_contacto_operador_1' => $formFields['username'],
                'telf_contacto_operador_1' => "",
                'ip_registro_operador' => $this->getIp(),
                'email_contacto_operador' => $formFields['email'],
                'direccion_empresa_operador' => "",
                'id_usuario' => $user->id,
                'id_tipo_operador' => 3,
                'estado_contacto_operador' => 1,
                'id_usuario_op' => 0
            );


            //Almacena el operador y almacena en sesion su identificacion
            $operador = $operador_gestion->store($operadorData);
            $request->session()->put('operador_id', $operador->id);



            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            //Se realiza el login y redireccion
            $request->session()->put('user_name', $user->email);
            $auth->login($user);

            $email = $auth->user()->email;
            $nombre = $auth->user()->email;
            // try {
            //     // $this->dispatch(new SendMail($user));
            // } catch (Exception $e) {
                
            // }
            /* Busca si ya tiene servicios activos o no */

            //logica que comprueba si el usuario tiene servicios para ser modificados
            //caso contrario ingresa nuevos serviciosS
            $listServicios = $gestion->getServiciosidUsuario($user->id);

            if (!$user->confirmed) {
                $request->session()->put('confirmado', 0);
            }

            if ($listServicios) {

                $data['id_usuario_op'] = $listServicios[0]->id_usuario_op;
                $request->session()->put('operador_id', $data['id_usuario_op']);

                $request->session()->put('tip_oper', $listServicios[0]->id_tipo_operador);
                return redirect('/detalleServicios')->with('user', $user->id);
            } else {

                $returnHTML = ('/IguanaTrip/public/myProfileOp'); //->with('user', $user->id);
                return response()->json(array('success' => true, 'redirectto' => $returnHTML));
            }
        }
    }

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Handle a confirmation request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  string  $confirmation_code
     * @return Response
     */
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

    /**
     * Handle a resend request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    // public function getResend(
    // UserRepository $user_gestion, Request $request) {
    //     if ($request->session()->has('user_id')) {
    //         $user = $user_gestion->getById($request->session()->get('user_id'));

    //         return redirect('/')->with('ok', trans('front/verify.resend'));
    //     }

    //     return redirect('/');
    // }
    
    
    public function postLoginr(
        LoginRequest $request, Guard $auth, ServiciosOperadorRepository $gestion) {

        $logValue = $request->input('log');

        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $throttles = in_array(
                ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return response()->json(['error' => trans('front/login.maxattempt')]);   
        }

        $credentials = [
            $logAccess => $logValue,
            'password' => $request->input('password')
        ];

        if (!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }
            return response()->json(['error' => trans('front/login.credentials')]);
        }

        $user = $auth->getLastAttempted();

        if (($user->confirmed) || ($user->valid)) {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }

            $auth->login($user, $request->has('memory'));

            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            $request->session()->put('user_id',$user->id);

            $request->session()->put('user_name', $user->username);
            Session::put('roleId', $user->rol_id);
           
            $email = $auth->user()->email;
            $nombre = $auth->user()->user_name;


            /* Busca si ya tiene servicios activos o no */

            //logica que comprueba si el usuario tiene servicios para ser modificados
            //caso contrario ingresa nuevos serviciosS
            $listServicios = $gestion->getServiciosidUsuario($user->id);
            if ($listServicios) {
                $data['id_usuario_op'] = $listServicios[0]->id_usuario_op;
                // $request->session()->put('operador_id', $data['id_usuario_op']);
                $request->session()->put('operador_id', $data['id_usuario_op']);
                //        $view = view('Registro.catalogoServicio', compact('data', 'listServicios'));
                $request->session()->put('tip_oper', $listServicios[0]->id_tipo_operador);


                // return redirect('/mis-servicios')->with('user', $user->id);
                // return $data['id_usuario_op'];
                return response()->json(['error' => false , 'redirectto' => 'mis-servicios']);
                //return redirect('/detalleServiciosRes')->with('user', $user->id);
                // return ($view);
            } else {

                //return redirect('/myProfileOp')->with('user', $user->id);
                // return redirect('/aboutus')->with('user', $user->id);
                return response()->json(['error' => false , 'redirectto' => 'mis-servicios']);
                
            }
        } else {

            return response()->json(['error' => 'verifyMail']);
        }


        
    }
    
     public function sendActivationEmail($data){
        $correo_enviar = $data['email'];
        $nombre = $data['nombre'];
        Mail::send('site.emails.activation', $data, function($message) use ($correo_enviar,$nombre)
        {
            $message->from(env('MAIL_USERNAME'),'VoilApp.city');

            $message->to($correo_enviar,$nombre)->subject('Verifica tu cuenta');
        });
    }

    public function postRegisterr(Guard $auth, Request $request, UserRepository $user_gestion, OperadorRepository $operador_gestion, ServiciosOperadorRepository $gestion) {


        $inputData = Input::get('formData');
        
        parse_str($inputData, $formFields);
        if ($inputData != "") {

            $userData = array(
                'username' => $formFields['username'],
                'email' => $formFields['email'],
                'password' => $formFields['password'],
                'email_confirmation' => $formFields['email_confirmation'],
                'system' => $formFields['system'],
                // 'g-recaptcha-response' => $formFields['g-recaptcha-response']
            );
        } else {

            $userData = array(
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'email_confirmation' => $request->input('email_confirmation'),
                'system' => $formFields['system'],
                // 'g-recaptcha-response' => $formFields['g-recaptcha-response']
            );
        }


        //Valida que los campos sean unicos y cumplan con los requerimientos
        $validator = Validator::make($userData, $this->validationRules);

        //Si el validador falla se ejecutan las acciones
        if ($validator->fails()) {
            
           /*return redirect('/loginres')->with('error', trans('front/login.credentials'))
                                ->withInput($request->only('log'));    */
            return response()->json(array('fail' => true,
                            'errors' => $validator->getMessageBag()->toArray()
                ));
            }
         else {
            $user = $user_gestion->store(
                    $userData, $confirmation_code = str_random(30)
            );
                
         
            
            //Se almacenan los datos por default del contacto, se pueden modificar cuando ya ingrese
            $operadorData = array(
                'nombre_contacto_operador_1' => $formFields['username'],
                'telf_contacto_operador_1' => "",
                'ip_registro_operador' => $this->getIp(),
                'email_contacto_operador' => $formFields['email'],
                'direccion_empresa_operador' => "",
                'id_usuario' => $user->id,
                'id_tipo_operador' => 3,
                'estado_contacto_operador' => 1,
                'id_usuario_op' => 0
            );

            
            //Almacena el operador y almacena en sesion su identificacion
            $operador = $operador_gestion->store($operadorData);
            $request->session()->put('operador_id', $operador->id);



            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            //Se realiza el login y redireccion
            $request->session()->put('user_name', $user->email);
            $request->session()->put('user_id', $user->id);
            $auth->login($user);
              
            $email = $auth->user()->email;
            $nombre = $auth->user()->email;
            // Datos de email de activacion
             $data = [

                        'email' => $formFields['email'],
                        'nombre' => $formFields['name'],
                        'urlPage'   => config('global.serverDir'),
                        'title' => trans('front/verify.email-title'),
                        'body' => trans('front/verify.email-body'),
                        'link' => trans('front/verify.email-link'),
                        'linkPD' => trans('front/verify.email-msg-link'),
                        'confirmation_code' => $confirmation_code,
                        'linkUnsuscribe' => trans('front/verify.email-unsubscribe'),
                        'footer' => trans('front/verify.email-footer')

                    ];
            $this->sendActivationEmail($data);

            //logica que comprueba si el usuario tiene servicios para ser modificados
            //caso contrario ingresa nuevos serviciosS
            $listServicios = $gestion->getServiciosidUsuario($user->id);
            if ($listServicios) {

                $request->session()->put('operador_id', $operador->id);
                $request->session()->put('tip_oper', $listServicios[0]->id_tipo_operador);
                return redirect('/datos-de-operador')->with('user', $user->id);

            } else {

              $returnHTML = ('datos-de-operador');//->with('user', $user->id);
              return response()->json(array('success' => true, 'redirectto' => $returnHTML));
          
            }

        }
    }




}
