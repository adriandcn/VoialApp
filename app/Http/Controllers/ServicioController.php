<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OperadorRepository;
use Validator;
use Illuminate\Support\Facades\Hash;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\ServiciosOperadorRepository;
use Illuminate\Support\Facades\Session;

//use App\Models\Catalogo_Servicio;

class ServicioController extends Controller {

    protected $validationRules = [
        //'nombre_empresa_operador' => 'required|max:255',
        'nombre_contacto_operador_1' => 'required|max:255',
        'direccion_empresa_operador' => 'required|max:255',
        'email_contacto_operador' => 'required|max:255',
        'telf_contacto_operador_1' => 'required|max:255'
    ];
    
      protected  $messages = [
        
        'nombre_contacto_operador_1.required' => 'El nombre del contacto es requerido',
          'direccion_empresa_operador.required' => 'La dirección del contacto es requerido',
          'email_contacto_operador.required' => 'El email del contacto es requerido',
          'telf_contacto_operador_1.required' => 'El teléfono del contacto es requerido'
    ];
    protected $validationUsuarioServicios = [
        'nombre_servicio' => 'required|max:255|',
        'id_provincia' => 'required'
            //'detalle_servicio' => 'required|max:255|',
            //'precio_desde' => 'required|max:255',
            //'precio_hasta' => 'required|max:255',
//			'precio_anterior' => 'required|max:255',
//			'precio_actual' => 'required|max:255',
//			'descuento_servico' => 'required|max:255',
            //'direccion_servicio' => 'required|max:255',
            //'correo_contacto' => 'required|max:255',
            //'pagina_web' => 'required|max:255',
//			'nombre_comercial' => 'required|max:255',
//			'tags' => 'required|max:255',
//			'descuento_clientes' => 'required|max:255',
//			'tags_servicio' => 'required|max:255'
    ];
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    public function Auth(Guard $auth, $view) {

        if ($auth->check()) {
            $view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
        } else {

            $view = view('auth.completeRegister');
        }
    }

    /**
     * Display a listing of the resource.
     * 	
     * @return \Illuminate\Http\Response
     */
    public function index(Guard $auth, OperadorRepository $operador_gestion) {
        
        if ($this->auth->guest())
        {
            
            
        }
        if ($auth->check()) {

            $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            $view = view('RegistroOperadores.registroStep1', compact('listOperadores')); // revisar debe redirecccionar a otro lado
        } else {
            $view = view('auth.completeRegister');
        }
        return $view;
    }
    
    
    public function registerMobile() {
        
        return view('mobile.logInMobile.registerMobile');
    }
    
    
    
        
    
    public function getMyProfileOp(Guard $auth, OperadorRepository $operador_gestion) {
        //
       
        if ($auth->check()) {
          
            $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            if($listOperadores)
                
            {$view = view('Welcome.myprofileOp', compact('listOperadores')); }
            else
            {
             $view = view('userservice');    
                
            }
            
        } else {
            $view = view('auth.completeRegister');
        }
        return $view;
    }

    
    
    

    public function step2(Guard $auth, OperadorRepository $operador_gestion) {
        if ($auth->check()) {
            $operador = $operador_gestion->getOperadorTipo($auth->user()->id, session('tip_oper'));
            $data['tipoOperador'] = session('tip_oper');
            $view = view('RegistroOperadores.registroStep2', compact('data', 'operador')); // revisar debe redirecccionar a otro lado
        } else {
            $view = view('auth.completeRegister');
        }


        return $view;
    }

    
    public function step3() {
        return view('Registro.catalogoServicio');
    }

    public function step4(Guard $auth, $id, $id_catalogo, ServiciosOperadorRepository $gestion) {
        session()->forget('parroquia_admin');
        //permisssion
        $permiso = $gestion->getPermiso($id);

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {


            return view('errors.404');
        }

        $operador_gestion = new OperadorRepository();

        $usuarioServicio = $operador_gestion->getUsuarioServicio($id);
        $Servicio = $operador_gestion->getServicio($id_catalogo);
        $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimientoExistente($id_catalogo, $id);
        if (count($catalogoServicioEstablecimiento) == 0)
            $catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimiento($id_catalogo);
        $ImgPromociones = $gestion->getImageOperador($id, 1);

        return view('RegistroOperadores.registroStep4', compact('usuarioServicio', 'catalogoServicioEstablecimiento', 'id_catalogo', 'ImgPromociones', 'Servicio'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postOperadores(Guard $auth,Request $request, OperadorRepository $operador_gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        
        $operadorData = array(
            //'nombre_empresa_operador' => $formFields['nombre_empresa_operador'],
            'nombre_contacto_operador_1' => $formFields['nombre_contacto_operador_1'],
            'telf_contacto_operador_1' => $formFields['telf_contacto_operador_1'],
            'ip_registro_operador' => $this->getIp(),
            'email_contacto_operador' => $formFields['email_contacto_operador'],
            'direccion_empresa_operador' => $formFields['direccion_empresa_operador'],
            'id_usuario' => $auth->user()->id,
            'id_tipo_operador' => $formFields['id_tipo_operador'],
            'estado_contacto_operador' => 1,
            'id_usuario_op' => $formFields['id_usuario_op']
        );
        $validator = Validator::make($operadorData, $this->validationRules, $this->messages);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            if ($formFields['id_usuario_op'] > 0) {
                $id_usuario_op = $formFields['id_usuario_op'];
                $request->session()->put('operador_id', $formFields['id_usuario_op']);

                $operador = $operador_gestion->update($operadorData);
            }
            
            else {
                $operador = $operador_gestion->store($operadorData);
                $request->session()->put('operador_id', $operador->id);
                $operadores = $operador_gestion->getLastIdInsert($operadorData);
                //foreach ($operadores as $operador)
                    $id_usuario_op = $operador->id_usuario_op;
                    
            }
        }
        $returnHTML = ('/IguanaTrip/public/userservice');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    public function postTipoOperadores(Request $request, OperadorRepository $operador_gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $request->session()->put('tip_oper', $formFields['tipo_operador']);
        $operadorData = array(
            'tipo_operador' => $formFields['tipo_operador'],
        );
        $returnHTML = ('operador');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function postTipoOperadoresProfile(Guard $auth,Request $request, OperadorRepository $operador_gestion) {

        Session::forget('operador_id');
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $request->session()->put('tip_oper', $formFields['tipo_operador']);
        $request->session()->put('operador_id', $formFields['operador_id']);
      
        
        
        $listOperadores = $operador_gestion->getOperador($auth->user()->id);
            if($listOperadores)
                
            {  
                $returnHTML = ('userservice');
                }
            else
            {
    
                $returnHTML = ('detalleServicios');
            }

        return response()->json(array('success' => true, 'redirectto' => $returnHTML)); 

    }

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    public function postUsuarioServicios(Request $request, OperadorRepository $usuarioSevicio_gestion , ServiciosOperadorRepository $gestion) {
        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        if (isset($formFields['id_servicio_est'])) {
            foreach ($formFields['id_servicio_est'] as $catalogo)
                $servicio_establecimiento_usuario[] = $catalogo;
        } else {
            $servicio_establecimiento_usuario[] = "";
        }

        if (!isset($formFields['fecha_ingreso']))
            $formFields['fecha_ingreso'] = '0000-00-00 00:00:00';
        if (!isset($formFields['fecha_fin']))
            $formFields['fecha_fin'] ='0000-00-00 00:00:00';

        if (!isset($formFields['id_provincia']))
            $formFields['id_provincia'] = 0;
        if (!isset($formFields['id_canton']))
            $formFields['id_canton'] = 0;
        if (!isset($formFields['id_parroquia']))
            $formFields['id_parroquia'] = 0;

        $usuarioServicioData = array(
                'nombre_servicio' => $formFields['nombre_servicio'],
                'detalle_servicio' => $formFields['detalle_servicio'],
            'detalle_servicio_eng' => $formFields['detalle_servicio_eng'],
                'precio_desde' => $formFields['precio_desde'],
                'precio_hasta' => $formFields['precio_hasta'],
    //    			'precio_anterior' => $formFields['precio_anterior'],
    //    			'precio_actual' => $formFields['precio_actual'],
    //    			'descuento_servico' => $formFields['descuento_servico'],
                'direccion_servicio' => $formFields['direccion_servicio'],
                'correo_contacto' => $formFields['correo_contacto'],
                'pagina_web' => $formFields['pagina_web'],
    //    			'nombre_comercial' => $formFields['nombre_comercial'],
                            'tags' => $formFields['tags'],
    //    			'descuento_clientes' => $formFields['descuento_clientes'],
                            'tags' => $formFields['tags'],
    //    			'observaciones' => $formFields['observaciones'],
                'telefono' => $formFields['telefono'],
                'latitud_servicio' => $formFields['latitud_servicio'],
                'longitud_servicio' => $formFields['longitud_servicio'],
                'id_usuario_servicio' => $formFields['id'],
                'id_provincia' => $formFields['id_provincia'],
                'id_canton' => $formFields['id_canton'],
                'id_parroquia' => $formFields['id_parroquia'],
                    'como_llegar1' => $formFields['como_llegar1'],
                    'como_llegar1_1' => $formFields['como_llegar1_1'],
                    'como_llegar2_2' => $formFields['como_llegar2_2'],
                    'como_llegar2' => $formFields['como_llegar2'],
                    'fecha_ingreso' => $formFields['fecha_ingreso'],
            'horario' => $formFields['horario'],
                    'fecha_fin' => $formFields['fecha_fin']
                
        );
        $validator = Validator::make($usuarioServicioData, $this->validationUsuarioServicios);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {

            //return $servicio_establecimiento_usuario;
            $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServicios($usuarioServicioData, $servicio_establecimiento_usuario, $formFields['id'], $formFields['id_catalogo']);
            
            if ($formFields['id'] == 0)
		{
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($formFields['id'], $search,4,$usuarioServicio->id);
            
		} else {
                 //update
                    $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio']." ".$formFields['tags'];            
                    $gestion->storeUpdateSerchEngine( $usuarioServicio,4,$formFields['id'],$search);
		}
             
        }
        $returnHTML = ('/IguanaTrip/public/servicios/serviciooperador/' . $formFields['id'] . '/' . $formFields['id_catalogo']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    public function postUsuarioServiciosMini(Request $request, OperadorRepository $usuarioSevicio_gestion, ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $usuarioServicioData = array(
            'nombre_servicio' => $formFields['nombre_servicio'],
            'detalle_servicio' => $formFields['detalle_servicio'],
            'id_usuario_operador' => $formFields['id_usuario_operador'],
            'id_catalogo_servicio' => $formFields['id_catalogo_servicio']
        );
        $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServiciosMini($usuarioServicioData);
    
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($usuarioServicio, $search,4,$usuarioServicio);
            
		
        $returnHTML = ('/IguanaTrip/public/servicios/serviciooperador/' . $usuarioServicio . '/' . $formFields['id_catalogo_servicio']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    
    public function postUsuarioServiciosMiniPadre(Request $request, OperadorRepository $usuarioSevicio_gestion, ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $usuarioServicioData = array(
            'nombre_servicio' => $formFields['nombre_servicio'],
            'detalle_servicio' => $formFields['detalle_servicio'],
            'id_usuario_operador' => $formFields['id_usuario_operador'],
            'id_catalogo_servicio' => $formFields['id_catalogo_servicio'],
            'id_padre' => $formFields['id_padre']
        );
        $usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServiciosMiniPadre($usuarioServicioData);
    
		//new       
                $search=$formFields['nombre_servicio']." ".$formFields['detalle_servicio'];            
            $gestion->storeSearchEngine($usuarioServicio, $search,4,$usuarioServicio);
            
		
        $returnHTML = ('/IguanaTrip/public/servicios/serviciooperador/' . $usuarioServicio . '/' . $formFields['id_catalogo_servicio']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    

}
