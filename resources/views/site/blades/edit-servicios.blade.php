<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
  </head>
   <body>
    <!-- Page-->
    <div class="text-center text-sm-left page">
      <!-- Page preloader-->
      <div class="page-loader">
        <div>
          <div class="page-loader-body">
            <div class="center" id="loop1"></div>
            <div class="center" id="bike-wrapper">
              <div class="centerBike" id="bike"></div>
            </div>
            <h1>Voilapp</h1>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <!-- Modal-->
      @include('site.reusable.header')
      <!-- Breadcrumbs & Page title-->
      <section class="page-title breadcrumbs-elements page-title-inset-1">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">Hola, {!!session('user_name')!!}</div>
            <p class="big text-width-medium">Desde el panel de control de Mi cuenta tiene la capacidad de ver una instantánea de la actividad de su cuenta reciente y actualizar la información de su cuenta. Seleccione un enlace para ver o editar información.</p>
          </div>
        </div>
      </section>


      <?php
$prefix = "";
$operadorName = "";
$usuarioServicio->id = 0;
$usuarioServicio->nombre_servicio = '';
$usuarioServicio->detalle_servicio = '';
$usuarioServicio->detalle_servicio_eng = '';

$usuarioServicio->precio_desde = '';
$usuarioServicio->tags = '';
$usuarioServicio->precio_hasta = '';
$usuarioServicio->precio_anterior = '';
$usuarioServicio->precio_actual = '';
$usuarioServicio->descuento_servico = '';
$usuarioServicio->direccion_servicio = '';
$usuarioServicio->correo_contacto = '';
$usuarioServicio->pagina_web = '';
$usuarioServicio->nombre_comercial = '';
$usuarioServicio->tags = '';
$usuarioServicio->descuento_clientes = '';
$usuarioServicio->tags_servicio = '';
$usuarioServicio->observaciones = '';
$usuarioServicio->telefono = '';
$usuarioServicio->id_provincia = '';
$usuarioServicio->id_canton = '';
$usuarioServicio->id_parroquia = '';
$usuarioServicio->como_llegar1 = '';
$usuarioServicio->como_llegar2 = '';
$usuarioServicio->horario = '';

$usuarioServicio->id_usuario_operador = '';
$usuarioServicio->id_padre = '';

$usuarioServicio->fecha_ingreso = '';
$usuarioServicio->fecha_fin = '';
$usuarioServicio->como_llegar1_1 = '';
$usuarioServicio->como_llegar2_2 = '';
$usuarioServicio->latitud_servicio = -0.1806532;
$usuarioServicio->longitud_servicio = -78.46783820000002;

?>

@foreach ($usuarioServicio as $detalles)
<?php
$usuarioServicio->id = $detalles->id;
$usuarioServicio->nombre_servicio = trim($detalles->nombre_servicio);
$usuarioServicio->detalle_servicio = trim($detalles->detalle_servicio);
$usuarioServicio->detalle_servicio_eng = trim($detalles->detalle_servicio_eng);

$usuarioServicio->estado_servicio_usuario = trim($detalles->estado_servicio_usuario);
$usuarioServicio->id_catalogo_servicio = trim($detalles->id_catalogo_servicio);

$usuarioServicio->precio_desde = trim($detalles->precio_desde);
$usuarioServicio->precio_hasta = trim($detalles->precio_hasta);
$usuarioServicio->precio_anterior = trim($detalles->precio_anterior);
$usuarioServicio->precio_actual = trim($detalles->precio_actual);
$usuarioServicio->descuento_servico = trim($detalles->descuento_servico);
$usuarioServicio->tags = trim($detalles->tags);
$usuarioServicio->direccion_servicio = trim($detalles->direccion_servicio);
$usuarioServicio->correo_contacto = trim($detalles->correo_contacto);
$usuarioServicio->pagina_web = trim($detalles->pagina_web);
$usuarioServicio->nombre_comercial = trim($detalles->nombre_comercial);
$usuarioServicio->tags = trim($detalles->tags);
$usuarioServicio->descuento_clientes = $detalles->descuento_clientes;
$usuarioServicio->tags_servicio = trim($detalles->tags_servicio);
$usuarioServicio->id_provincia = $detalles->id_provincia;
$usuarioServicio->id_canton = $detalles->id_canton;
$usuarioServicio->id_parroquia = $detalles->id_parroquia;
$usuarioServicio->como_llegar1 = $detalles->como_llegar1;
$usuarioServicio->como_llegar2 = $detalles->como_llegar2;
$usuarioServicio->id_usuario_operador = $detalles->id_usuario_operador;
$usuarioServicio->horario = $detalles->horario;


$usuarioServicio->como_llegar1_1 = $detalles->como_llegar1_1;
$usuarioServicio->como_llegar2_2 = $detalles->como_llegar2_2;
$usuarioServicio->fecha_ingreso = $detalles->fecha_ingreso;
$usuarioServicio->fecha_fin = $detalles->fecha_fin;
$usuarioServicio->id_padre = $detalles->id_padre;


$usuarioServicio->observaciones = trim($detalles->observaciones);
$usuarioServicio->telefono = $detalles->telefono;
$usuarioServicio->latitud_servicio = ($detalles->latitud_servicio == '') ? -0.1806532 : $detalles->latitud_servicio;
$usuarioServicio->longitud_servicio = ($detalles->longitud_servicio == '') ? -78.46783820000002 : $detalles->longitud_servicio;

?>
@endforeach

<?php $contadorPromo = count($promociones); $contadorEventos = count($eventos);   ?>

      <section class="section-sm section-md-bottom-50 bg-white">
        <div class="shell">
          <div class="range range-50 range-center">
            <div class="cell-md-4 cell-sm-6 cell-xs-8">
              <a href="" data-toggle="modal" data-target="#foto">
                <img src="{{asset('/siteStyle/images/add-image.png')}}" alt="" width="200" height="340"/>
              </a>
              <div class="post post-autor-wrap group-sm group-top">
                <div class="author-name">
                  <h6><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;Promociones y Eventos</h6>
                  <hr>
                </div>
                      <!-- <ul class="list-inline">
                        <li><a class="icon fa fa-sm fa-facebook icon-xxs" href="#"></a></li>
                        <li><a class="icon fa fa-sm fa-google-plus icon-xxs" href="#"></a></li>
                        <li><a class="icon fa fa-sm fa-linkedin icon-xxs" href="#"></a></li>
                        <li><a class="icon fa fa-sm fa-twitter icon-xxs" href="#"></a></li>
                      </ul> -->
              </div>
              <a class="button button-primary" href="">
                Promociones y Eventos<span></span>
              </a>
            </div>
            <div class="cell-md-8">
              <div class="post-single">
                <form class="rd-mailform" id="form-update-serv">
                  <input type="hidden" value="{!!$usuarioServicio->id!!}" name="id" id="id">
 <input type="hidden" value="{!!$id_catalogo!!}" name="id_catalogo" id="id_catalogo">
                    <div class="range range-15">
                      <div class="cell-sm-8">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-font "></i>&nbsp;&nbsp;Nombre Servicio</label>
                          <input class="form-input" id="contact-first-name" type="text" name="nombre_servicio" value="{{$usuarioServicio[0]->nombre_servicio}}" data-constraints="@Required">
                        </div>
                      </div>
                      <div class="cell-sm-4">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-lightbulb-o "></i>&nbsp;&nbsp;Servicio activo</label>
                          <input type="checkbox" id='estado_servicio_usuario' 
                                   name="estado_servicio_usuario" value="{!!$usuarioServicio->estado_servicio_usuario!!}"
                                   onchange="UpdateServicioActivo('{!!asset('/updateServicioActivo')!!}/{!!$usuarioServicio->id!!}')">
                        </div>
                      </div>
                      <div class="cell-xs-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-list"></i>&nbsp;&nbsp;Descripción del Servicio</label>
                          <textarea class="form-input" id="contact-message" name="detalle_servicio" data-constraints="@Required" >{{$usuarioServicio[0]->detalle_servicio}}</textarea>
                        </div>
                      </div>
                      <div class="cell-xs-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-list"></i>&nbsp;&nbsp;Descripción del Servicio (Ingles)</label>
                          <textarea class="form-input" id="contact-message" name="detalle_servicio_eng" data-constraints="@Required" >{{$usuarioServicio[0]->detalle_servicio_eng}}</textarea>
                        </div>
                      </div>
                      <div class="cell-sm-12">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Imagenes del servicio</label>
                          <input type="hidden" value="0" id="flag_image">
                          <div id="renderPartialImagenes">
                                        @section('contentImagenes')
                                        @show
                            </div> 
                        </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-info"></i>&nbsp;&nbsp;Información del Servicio</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-money"></i>&nbsp;&nbsp;Precio desde</label>
                          <input type="text" name="precio_desde" value="{!!$usuarioServicio->precio_desde!!}" class="form-input" title="Para realizar una segmentación adecuada de interesados, sería bueno que nos des el rango de precios de tu servicio. El valor es en dólares americanos" placeholder="Precio Desde">
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-money"></i>&nbsp;&nbsp;Precio hasta</label>
                          <input type="text" name="precio_hasta" value="{!!$usuarioServicio->precio_hasta!!}" class="form-input" placeholder="Precio Hasta">
                        </div>
                      </div>
                      <div class="cell-sm-12">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Direccion Servicio</label>
                          <input type="text" name="direccion_servicio" value="{!!$usuarioServicio->direccion_servicio!!}" class="form-input" placeholder="Dirección del Servicio">
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Horario atención</label>
                          <input type="text" name="horario" value="{!!$usuarioServicio->horario!!}" class="form-input" placeholder="Lunes a Viernes de 7AM a 8PM" title="Horario de atención">
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-phone"></i>&nbsp;&nbsp;Telefono</label>
                          <input type="text" name="telefono" value="{!!$usuarioServicio->telefono!!}" class="form-input" placeholder="Telefono del Servicio" title="El turista podrá comunicarse directamente contigo si así lo deseas">
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Correo del contacto</label>
                          <input type="text" name="correo_contacto" value="{!!$usuarioServicio->correo_contacto!!}" class="form-input" placeholder="Correo Contacto" title="Siempre es bueno tener un correo electrónico en el cual puedan pedirte más información sobre tu servicio">
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-globe"></i>&nbsp;&nbsp;Pagina Web</label>
                          <input type="text" name="pagina_web" value="{!!$usuarioServicio->pagina_web!!}" class="form-input" placeholder="URL" title="Si tienes una página web servirá mucho para tu credibilidad.">
                          </div>
                      </div>
                      <div class="cell-sm-12">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-hashtag"></i>&nbsp;&nbsp;Tag</label>
                          <input type="text" name="tags" value="{!!$usuarioServicio->tags!!}" class="form-input" placeholder="Palabras clave o referencias separadas por comas" title="#ruta del sol, #museos">
                          </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Detalle del Servicio y Como LLegar</label>
                          <h4 class="section-title">{{trans('front/responsive.ubicacion')}}</h4>
                                <div class="tab-container full-width style2">
                                     @include('reusable.maps1', ['longitud_servicio' => $usuarioServicio->longitud_servicio,'latitud_servicio'=>$usuarioServicio->latitud_servicio])  
                                </div>
                        </div>
                      </div>
                      <div class="cell-xs-6">
                        <div class="form-wrap">
                          <div class="form-group">
                              {!!Form::label('como_llegar1', 'Como llegar desde', array('class'=>'control-label-2'))!!}
                              <input type="text" name="como_llegar1_1" value="{!!$usuarioServicio->como_llegar1_1!!}" class="form-input"
                                     title="Como llegar" placeholder="Quito, GYE, Parque central ,etc">
                              <textarea class="form-input" id="como_llegar1" name="como_llegar1" class="input-text chng" placeholder="Detalle de como llegar a tu servicio" title="Ingresa un detalle de como llegar a tu local o servicio desde algún lugar conocido." rows="50">{!!trim($usuarioServicio->como_llegar1)!!}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="cell-xs-6">
                        <div class="form-wrap">
                          <div class="form-group">
                              {!!Form::label('como_llegar2', 'Como llegar desde', array('class'=>'control-label-2'))!!}
                              <input type="text" name="como_llegar2_2" value="{!!$usuarioServicio->como_llegar2_2!!}" class="form-input"
                                     title="Como llegar" placeholder="Cuenca, Manta, Parque central ,etc">
                              <textarea class="form-input" id="como_llegar2_2" name="como_llegar2" class="input-text chng" placeholder="Detalle de como llegar a tu servicio" rows="50">{!!trim($usuarioServicio->como_llegar2)!!}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <!--Select 2-->
                          <p class="text-label"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Provincia, Canton y Parroquia del lugar</p>
                          <div id="provincias"></div>
                      </div>
                      </div>



                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email"><i class="fa fa-font"></i>&nbsp;&nbsp;Servicio de Alimentacion & bebidas:</label>
                            @if($id_catalogo==1)
                            <h4 class="section-title">Servicio de Alimentacion & bebidas:</h4>
                            @elseif($id_catalogo==2)
                            @else
                            <h4 class="section-title">El servicio incluye:</h4>
                            @endif
                            <div class="tab-container full-width style2">
                                    <ul style="list-style: none">
                                 @foreach ($catalogoServicioEstablecimiento as $catalogo)
                                    <li>
                                        <input class="circulo chng" name="id_servicio_est[]" id="id_servicio_est[]" 
                                               value="{!!$catalogo->id!!}" type="checkbox" 
                                               data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/>
                                        {!!$catalogo->nombre_servicio_est!!}
                                    </li> 
                                @endforeach    
                                </ul>
                            </div>
                        </div>
                        </div>
                      </div>
                      <div class="cell-sm-12" id="ErrorDiv">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <div class="rowerror"></div>
                          </div>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-back" href="{{asset('/serviciosres')}}">Atras<span></span></a>
                          </div>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-floppy-o" onclick="UpdateServicioInfo1('form-update-serv', 'optional');" href="">Guardar<span></span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Modal FOTOGRAFIA-->
      <div class="modal modal-custom fade" id="foto" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 80%;">
          <div class="modal-content">
              <div id="testboxForm" class="foto">
                        <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarfoto')}}</h3>
              <!--<button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
                <span aria-hidden="true">&times;</span>
              </button>-->
            </div>
            <div class="modal-body">
                <div class="rowerrorM"> </div>
          {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}      
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_catalogo_fotografia" name="id_catalogo_fotografia" value="1">
                <input type="hidden" id="id_usuario_servicio" name="id_usuario_servicio" value="{!!$usuarioServicio->id!!}">
                <input type="hidden" id="id_auxiliar" name="id_auxiliar" value="{!!$usuarioServicio->id!!}">
                
                <div class="form-group">
                     <div class="dz-message">

                      </div>

                      <div class="fallback">
                          <input name="file" type="file" multiple />
                      </div>

                      <div class="dropzone-previews" id="dropzonePreview"></div>

                      <h4 style="text-align: center;color:#428bca;">Arrastra las imágenes aquí (Formato: jpg, tamaño max: 6Mb)  
                          <span class="glyphicon glyphicon-hand-down"></span></h4>
                </div>
             
            </div>
            {!! Form::close() !!}       
            <div class="modal-footer">
                <button type="button" id="nextbtn" class="btn btn-secondary" data-dismiss="modal" >{{trans('front/responsive.finalizar')}}</button>
                <!--<button type="button" id="nextbtn" class="btn btn-secondary" data-dismiss="modal"
                        onclick="GetDataAjaxImagenesRes('{!!$usuarioServicio->id!!}');" >{{trans('front/responsive.finalizar')}}</button>-->
               <!--<a class="btn btn-secondary" id="nextbtn"  href="#">Finalizar</a> -->
            </div>
                  
              </div>  

          </div>
        </div>
      </div>
      <!-- RD Parallax-->
<!--       <section class="bg-image-1 bg-image">
        <div style="min-height: 160px; padding-bottom: 37.9%;"></div>
      </section> -->
      <script type="text/javascript">
        $(document).ready(function () {
          $("#nextbtn").click(function() {
            $("#flag_image").val('1');
            
          });
          GetDataAjaxImagenesRes("{!!asset('/imagenesAjaxDescription1')!!}/1/{!!$usuarioServicio->id!!}");
          var check = $("#estado_servicio_usuario").val();
          if(check == 1){
              $( "#estado_servicio_usuario" ).prop( "checked", true );
          }

          ///Script para actualizar el container una vez que se hayan subido las imagenes
            setInterval( function() {
              if ($('#flag_image').val() == 1) {
                  // Save the new value
                 GetDataAjaxImagenesRes("{!!asset('/imagenesAjaxDescription1')!!}/1/{!!$usuarioServicio->id!!}");
                 $("#flag_image").val('0');
              }
              
              if ($('#flag_image_preview').val() == 0) {
                  //alert("Entro aqui");
                  $("#mostrarJS").show();
              }
            }, 100); 

        });
      </script>
      @if($usuarioServicio->id_provincia=='' )
      <script>
          $(document).ready(function () {
              GetDataAjaxProvincias1("{!!asset('/getProvincias1')!!}/0/0/0");
          });
      </script>
      @else
      <script>
        $(document).ready(function () {GetDataAjaxProvincias1("{!!asset('/getProvincias1')!!}/{!!$usuarioServicio->id_provincia!!}/{!!$usuarioServicio->id_canton!!}/{!!$usuarioServicio->id_parroquia!!}");
          });
      </script>
      @endif    
      <!-- Page Footer-->
      @include('site.reusable.footer')
      {!! HTML::style('/packages/dropzone/dropzone.css') !!}
      <!-- End Dropzone Preview Template -->
      {!! HTML::script('/packages/dropzone/dropzone.js') !!}
      {!! HTML::script('/assets/js/dropzone-config.js') !!} 
    </div>
    <!-- END PANEL-->
  </body>
</html>