<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    <style type="text/css">
      input[type=checkbox]
      {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        padding: 10px;
      }
    </style>
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
            <h1>{{ trans('back/admin.loaderPageServicios')}}</h1>
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
            <div class="page-title-text">{{ trans('back/admin.saludo')}}, {!!session('user_name')!!}</div>
            <p class="big text-width-medium">{{ trans('back/admin.dashboardDescription')}}</p>
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li><a href="{{asset('/serviciosres')}}">{{ trans('publico/labels.lblPathMyServices')}}</a></li>
                <li>{{ trans('publico/labels.lblPathEditServ')}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>


      <?php
$showsegList = 'false';
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
              <a class="button button-primary tooltip button-icon button-icon-sm button-icon-right fa-plus" title="{{ trans('back/admin.altAddImage')}}" href="" data-toggle="modal" data-target="#foto">
                {{ trans('back/admin.lblAddImage')}}<span></span>
              </a>
              <div id="renderPartialImagenes">
                  @section('contentImagenes')
                  @show
              </div> 
              <div class="post post-autor-wrap group-sm group-top">
                <div class="author-name">
                  <h6><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;{{ trans('back/admin.lblEvents')}} ({{$contadorPromo}})</h6>
                  <hr>
                </div>
              </div>
              <a class="button button-primary" href="{{asset('/eventPromotionsAdmin')}}/{{$usuarioServicio->id}}">{{ trans('back/admin.lblEvents')}}<span></span>
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
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-font "></i>&nbsp;&nbsp;{{ trans('back/admin.lblServiceName')}}</label>
                          <input class="form-input tooltip" id="contact-first-name" type="text" name="nombre_servicio" value="{{$usuarioServicio[0]->nombre_servicio}}" data-constraints="@Required" title="{{ trans('back/admin.altServiceName')}}">
                        </div>
                      </div>
                      <div class="cell-sm-4">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-lightbulb-o "></i>&nbsp;&nbsp;{{ trans('back/admin.lblestadoServicio')}}</label>
                          <input  class="tooltip" type="checkbox" id='estado_servicio_usuario' 
                                   name="estado_servicio_usuario" value="{!!$usuarioServicio->estado_servicio_usuario!!}"
                                   onchange="UpdateServicioActivo('{!!asset('/updateServicioActivo')!!}/{!!$usuarioServicio->id!!}')" title="{{ trans('back/admin.altestadoServicio')}}">
                        </div>
                      </div>
                      <div class="cell-xs-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-list"></i>&nbsp;&nbsp;{{ trans('back/admin.lblServDescription')}}</label>
                          <textarea class="form-input tooltip" id="contact-message" name="detalle_servicio" data-constraints="@Required" title="{{ trans('back/admin.altServDescription')}}">{{$usuarioServicio[0]->detalle_servicio}}</textarea>
                        </div>
                      </div>
                      <div class="cell-xs-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="descriptionEn">
                            <i class="fa fa-list"></i>&nbsp;&nbsp;{{ trans('back/admin.lblServDescriptionEng')}}</label>
                          <textarea class="form-input tooltip" id="descriptionEn" name="detalle_servicio_eng" data-constraints="@Required" title="{{ trans('back/admin.altServDescriptionEng')}}">{{$usuarioServicio[0]->detalle_servicio_eng}}</textarea>
                        </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-info"></i>&nbsp;&nbsp;{{ trans('back/admin.tittleServiceInfo')}}</label><br>
                            <label class="form-label-outside" id="msgPrecioError" for="contact-message" style="color: red;">
                            <i class="fa fa-info"></i>&nbsp;&nbsp;</label>
                        </div>
                      </div>
                      <div class="cell-sm-12">
                        <div class="form-wrap">
                           <label class="form-label-outside" for="contact-first-name"><i class="fa fa-money"></i>&nbsp;&nbsp;{{ trans('back/admin.lblRangoPrecio')}}</label>
                          <div id="keypress"></div>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                           <label class="form-label-outside" for="contact-first-name"><i class="fa fa-money"></i>&nbsp;&nbsp;{{ trans('back/admin.lblPrecioDesde')}}</label>
                          <input type="number" id="precio_desde" name="precio_desde" value="{!!$usuarioServicio->precio_desde!!}" class="form-input tooltip numsOnly" title="{{ trans('back/admin.altPrecioDesde')}}" placeholder="{{ trans('back/admin.placeHolderPDesde')}}">
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-money"></i>&nbsp;&nbsp;{{ trans('back/admin.lblPrecioHasta')}}</label>
                          <input type="number" id="precio_hasta" name="precio_hasta" value="{!!$usuarioServicio->precio_hasta!!}" class="form-input tooltip numsOnly" placeholder="{{ trans('back/admin.placeHolderPHasta')}}" title="{{ trans('back/admin.altPrecioHasta')}}">
                        </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{ trans('back/admin.tittleHorario')}}</label>
                          <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-calendar" data-toggle="modal" data-target="#form-modal-horario" href="" style="margin-top: 0;">{{ trans('back/admin.btnAddHorario')}}<span></span></a>
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-phone"></i>&nbsp;&nbsp;{{ trans('back/admin.lblTelefonoServ')}}</label>
                          <input type="text tooltip" name="telefono" value="{!!$usuarioServicio->telefono!!}" class="form-input tooltip numsOnly" title="{{ trans('back/admin.altTelefonoServ')}}" placeholder="{{ trans('back/admin.placeHolderPhoneEdit')}}">
                          <input type="hidden" name="flag_image" id="flag_image">
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-envelope"></i>&nbsp;&nbsp;{{ trans('back/admin.lblEmailServ')}}</label>
                          <input type="text" name="correo_contacto" value="{!!$usuarioServicio->correo_contacto!!}" class="form-input tooltip" placeholder="{{trans('back/admin.placeHolderEmailServ')}}" title="{{ trans('back/admin.altEmailServ')}}">
                          </div>
                      </div>
                      <div class="cell-sm-6">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-globe"></i>&nbsp;&nbsp;{{ trans('back/admin.lblWebPageServ')}}</label>
                          <input type="text" name="pagina_web" value="{!!$usuarioServicio->pagina_web!!}" class="form-input tooltip" placeholder="URL" title="{{ trans('back/admin.altWebPageServ')}}">
                          </div>
                      </div>
                      <div class="cell-sm-12">
                        <div class="form-wrap">
                            <p class="text-label"><i class="fa fa-users"></i>&nbsp;&nbsp;{{ trans('back/admin.titleSocialRed')}}</p>
                        </div>
                      </div>
                      @foreach($redesServicio as $red)
                        <div class="cell-sm-6">
                            <div class="form-wrap">
                            <label class="form-label-outside" for="contact-first-name"><i class="fa fa-{{$red->icon}}"></i>&nbsp;&nbsp;{{$red->nombre_red}}</label>
                            <input type="text" name="redes[{{$red->idservicio_redes_sociales}}]" value="{!!$red->url!!}" class="form-input tooltip" placeholder="URL" title="{{ trans('back/admin.altSocialRed')}} {{$red->nombre_red}}">
                            </div>
                        </div>
                      @endforeach
                      @if (count($tendenciasList) > 0)
                      <div class="cell-sm-12">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-first-name">
                              <i class="fa fa-star"></i>&nbsp;&nbsp;
                              {{ trans('publico/labels.lblTendencias')}}
                            </label>
                            <br>
                            <div class="owl-carousel owl-theme">
                              @foreach($tendenciasList as $tendencia)
                                <div class="item">
                                  <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-star text-center" onclick="updateHashtags(event,'{{$tendencia->hashtag}}','{{$tendencia->idtendencias}}')" href="" title="{{ trans('back/admin.altTendencias')}}">{{strtoupper($tendencia->nombre)}}<span></span></a>
                                </div>
                              @endforeach
                            </div>
                          </div>
                      </div>
                      @endif
                      <div class="cell-sm-12">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-hashtag"></i>&nbsp;&nbsp;{{ trans('back/admin.lblTagServ')}}</label>
                          <textarea class="form-input tooltip" id="txtHashtags" name="tags" placeholder="{{ trans('back/admin.placeHolderTagServ')}}" title="{{trans('back/admin.altTagServ')}}" rows="50">{!!trim($usuarioServicio->tags)!!}</textarea>
                          </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                            <!--Select 2-->
                            <p class="text-label"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ trans('back/admin.tittleProvCiud')}}</p>
                            <div id="provincias"></div>
                        </div>
                      </div>
                      <div class="cell-sm-12">
                          <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ trans('back/admin.lblDirServicio')}}</label>
                          <input type="text" name="direccion_servicio" value="{!!$usuarioServicio->direccion_servicio!!}" class="form-input tooltip" placeholder="Dirección del Servicio" title="{{ trans('back/admin.altDirServicio')}}">
                          </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <!-- <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ trans('back/admin.titleComoLlegarServ')}}</label> -->
                          <label class="form-label-outside" for="contact-message">
                            <i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{trans('front/responsive.ubicacion')}}</label>
                          <!-- <h4 class="section-title">{{trans('front/responsive.ubicacion')}}</h4> -->
                            <div class="tab-container full-width style2">
                                 @include('reusable.maps1', ['longitud_servicio' => $usuarioServicio->longitud_servicio,'latitud_servicio'=>$usuarioServicio->latitud_servicio])  
                            </div>
                        </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <div class="form-group">
                              <label class="form-label-outside" for="contact-email"><i class="fa fa-road"></i>&nbsp;&nbsp;{{ trans('back/admin.titleComoLlegarDesdeForm')}}</label>
                              {!!Form::label('', '', array('class'=>'control-label-2'))!!}
                              <input type="text" name="como_llegar1_1" value="{!!$usuarioServicio->como_llegar1_1!!}" class="form-input tooltip" title="{{ trans('back/admin.titleComoLlegarDesde')}}" placeholder="{{ trans('back/admin.placeHolderComoLlegarDesde')}}">
                              <br>
                              <textarea class="form-input tooltip" id="como_llegar1" name="como_llegar1" class="input-text chng" placeholder="{{ trans('back/admin.placeHolderDestalleComoLlegarDesde')}}" title="{{ trans('back/admin.altDestalleComoLlegarDesde')}}" rows="50">{!!trim($usuarioServicio->como_llegar1)!!}</textarea>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="cell-xs-6">
                        <div class="form-wrap">
                          <div class="form-group">
                              {!!Form::label('como_llegar2', trans('back/admin.titleComoLlegarDesdeForm'), array('class'=>'control-label-2'))!!}
                              <input type="text" name="como_llegar2_2" value="{!!$usuarioServicio->como_llegar2_2!!}" class="form-input tooltip" title="{{ trans('back/admin.titleComoLlegarDesde')}}" placeholder="{{ trans('back/admin.placeHolderComoLlegarDesde')}}">
                              <textarea class="form-input tooltip" id="como_llegar2_2" name="como_llegar2" class="input-text chng" placeholder="{{ trans('back/admin.placeHolderDestalleComoLlegarDesde')}}" title="{{ trans('back/admin.altDestalleComoLlegarDesde')}}" rows="50">{!!trim($usuarioServicio->como_llegar2)!!}</textarea>
                          </div>
                        </div>
                      </div> -->
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email"><i class="fa fa-list"></i>&nbsp;&nbsp;{{ trans('back/admin.titleServIcludesList')}}</label>
                            @if($id_catalogo==1)
                            <!-- <h4 class="section-title">Servicio de Alimentacion & bebidas:</h4> -->
                            @elseif($id_catalogo==2)
                            @else
                            <!-- <h4 class="section-title">{{ trans('back/admin.titleServIcludesList')}}</h4> -->
                            @endif
                            <div class="tab-container full-width style2">
                                <ul style="list-style: none">
                                 @foreach ($catalogoServicioEstablecimiento as $catalogo)
                                    @if($catalogo->id == 151 && $catalogo->estado_servicio_est_us == 1)
                                      <?php $showsegList = 'true'; ?>
                                    @endif
                                    @if($catalogo->id_padre == 0)
                                    <li style="margin-bottom: 12px;">
                                        <input class="circulo chng checkPropiedades" name="id_servicio_est[]" id="id_servicio_est[]" value="{!!$catalogo->id!!}" type="checkbox" namePropiedad="{!!$catalogo->nombre_servicio_est!!}" data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/>&nbsp;&nbsp;
                                        <strong>{!!$catalogo->nombre_servicio_est!!}</strong>
                                    </li>
                                    @else
                                      <li class="seg_{{$catalogo->id_padre}}" style="margin-left: 20px; margin-bottom: 12px;">
                                        <input class="circulo chng" name="id_servicio_est[]" id="id_servicio_est[]" value="{!!$catalogo->id!!}" type="checkbox" namePropiedad="{!!$catalogo->nombre_servicio_est!!}" data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/>&nbsp;&nbsp;
                                        <strong>{!!$catalogo->nombre_servicio_est!!}</strong>
                                      </li>
                                    @endif
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
                            <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-arrow-left" href="{{asset('/serviciosres')}}">{{ trans('back/admin.lblBtnBack')}}<span></span></a>
                          </div>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-floppy-o" onclick="UpdateServicioInfo1('form-update-serv', 'optional',true);" href="">{{ trans('back/admin.lblBtnSave')}}<span></span></a>
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
      <div class="modal fade" id="foto" tabindex="-1" role="dialog" style="z-index: 99999; background: #00000099;">
        <div class="modal-dialog" role="document" >
          <div class="modal-content">
              <div id="testboxForm" class="foto">
                        <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarfoto')}}</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4 style="text-align: center;color:#428bca;">{{trans('back/admin.descriptionAddImageModal')}}
                <span class="glyphicon glyphicon-hand-down"></span>
              </h4>
              <br>
              <div class="rowerrorM"> </div>
          {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}      
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_catalogo_fotografia" name="id_catalogo_fotografia" value="1">
                <input type="hidden" id="id_usuario_servicio" name="id_usuario_servicio" value="{!!$usuarioServicio->id!!}">
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" id="profile_pic" name="profile_pic" value="false">
                <input type="hidden" id="id_auxiliar" name="id_auxiliar" value="{!!$usuarioServicio->id!!}">
                <div class="form-group">
                     <div class="dz-message">
                      </div>
                      <div class="fallback">
                          <input name="file" type="file" multiple />
                      </div>
                      <div class="dropzone-previews" id="dropzonePreview"></div>
                </div>
            </div>
            {!! Form::close() !!}       
            <div class="modal-footer">
                <!-- <button type="button" id="nextbtn" class="btn button-primary" data-dismiss="modal" >{{trans('front/responsive.finalizar')}}</button> -->
                <!--<button type="button" id="nextbtn" class="btn btn-secondary" data-dismiss="modal"
                        onclick="GetDataAjaxImagenesRes('{!!$usuarioServicio->id!!}');" >{{trans('front/responsive.finalizar')}}</button>-->
               <!--<a class="btn btn-secondary" id="nextbtn"  href="#">Finalizar</a> -->
               <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-check" href="" data-dismiss="modal" id="nextbtn">{{trans('front/responsive.finalizar')}}<span></span></a>
            </div>
              </div>
          </div>
        </div>
      </div>
      <!-- MODAL horario -->
      <?php 
        $diasList = [
                      ['id' => '0' , 'nombre' => 'Lunes'],
                      ['id' => '1' , 'nombre' => 'Martes'],
                      ['id' => '2' , 'nombre' => 'Miercoles'],
                      ['id' => '3' , 'nombre' => 'Jueves'],
                      ['id' => '4' , 'nombre' => 'Viernes'],
                      ['id' => '5' , 'nombre' => 'Sabado'],
                      ['id' => '6' , 'nombre' => 'Domingo']
                    ]
      ?>
      <div class="modal fade" id="form-modal-horario" tabindex="-1" role="dialog" style="z-index: 99999; background: #00000099;">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
              <div class="modal-header">
                <h5>{{trans('back/admin.lblHorarioInput')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                  <div class="form-wrap">
                        <label class="form-label-outside" for="contact-first-name-2" style="color: #c26933ba;">24 Horas</label>
                        <span class="badge" style="background-color: transparent;"><input type="checkbox" name="my-checkbox" id="24_h" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No"></span>
                  </div>
                  <div class="range range-15">
                    @foreach($diasList as $dia)
                    <div class="cell-sm-4">
                      <div class="form-wrap" style="border: 1px solid #c26933ba; padding: 10px;">
                        <label class="form-label-outside" for="contact-first-name-2" style="color: #c26933ba;">{{$dia['nombre']}}</label>
                        <span class="badge" style="background-color: transparent;"><input type="checkbox" name="my-checkbox" id="{{$dia['id']}}" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" class="checkboxDays"></span><br>
                        <div style="color: #2f6890;">Desde:</div>
                        <input class="form-input" id="from_time{{$dia['id']}}" type="time" step="900" disabled>
                        <div style="color: #2f6890;">Hasta:</div>
                        <input class="form-input" id="to_time{{$dia['id']}}" type="time" step="900" disabled>
                      </div>
                    </div>
                    @endforeach 
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <div class="col-md-6">
                  <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-close" href="#" data-dismiss="modal" id="btnCloseModalH">
                      {{trans('front/responsive.cerrar')}}
                      <span></span>
                  </a>
                </div>
                <div class="col-md-6">
                  <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-floppy-o" href="#" onclick="saveHorario(event,{{$usuarioServicio->id}})">
                      {{trans('back/admin.lblBtnSave')}}
                      <span></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
      </div>
    <style type="text/css">
      .sweet-alert{
        z-index: 99999999;
      }
    </style>
      <!-- RD Parallax-->
<!--       <section class="bg-image-1 bg-image">
        <div style="min-height: 160px; padding-bottom: 37.9%;"></div>
      </section> -->
      <script>
      $(document).ready(function() {
        new jBox('Tooltip', {
          attach: '.tooltip',
          closeOnMouseleave: true,
          closeButton: true
        });
      });
    </script>
      <script type="text/javascript">
        $(document).ready(function () {

           $("#form-update-serv").on("focusout", "input", function(e){
              if ( e.type == "focusout" ) {
                  UpdateServicioInfo1('form-update-serv', 'optional',false);
              }
          });

          $("#form-update-serv").on("focusout", "textarea", function(e){
              if ( e.type == "focusout" ) {
                  UpdateServicioInfo1('form-update-serv', 'optional',false);
              }
          });

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
      {!! HTML::script('/packages/dropzone/dropzone.js') !!}
      {!! HTML::script('/assets/js/dropzone-config.js') !!} 
    </div>
      <script type="text/javascript">
        $("[name='my-checkbox']").bootstrapSwitch();
        if (noUiSlider) {
    var keypressSlider = document.getElementById('keypress');
    var input0 = document.getElementById('precio_desde');
    var input1 = document.getElementById('precio_hasta');
    var inputs = [input0, input1];

    noUiSlider.create(keypressSlider, {
        start: [0, 100],
        connect: false,
        range: {
            'min': 0,
            'max': 1000
        },
        tooltips: true,
        step: 1,
        format : wNumb({
            thousand: '.',
            decimals: 0
        })
    });

    keypressSlider.noUiSlider.on('update', function( values, handle ) {
        inputs[handle].value = values[handle];
    });

    function setSliderHandle(i, value) {
        var r = [null,null];
        r[i] = value;
        keypressSlider.noUiSlider.set(r);
    }

    // Listen to keydown events on the input field.
    inputs.forEach(function(input, handle) {

        input.addEventListener('change', function(){
            setSliderHandle(handle, this.value);
        });

        input.addEventListener('keydown', function( e ) {

            var values = keypressSlider.noUiSlider.get();
            var value = Number(values[handle]);

            // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
            var steps = keypressSlider.noUiSlider.steps();

            // [down, up]
            var step = steps[handle];

            var position;

            // 13 is enter,
            // 38 is key up,
            // 40 is key down.
            switch ( e.which ) {

                case 13:
                    setSliderHandle(handle, this.value);
                    break;

                case 38:

                    // Get step to go increase slider value (up)
                    position = step[1];

                    // false = no step is set
                    if ( position === false ) {
                        position = 1;
                    }

                    // null = edge of slider
                    if ( position !== null ) {
                        setSliderHandle(handle, value + position);
                    }

                    break;

                case 40:

                    position = step[0];

                    if ( position === false ) {
                        position = 1;
                    }

                    if ( position !== null ) {
                        setSliderHandle(handle, value - position);
                    }

                    break;
            }
        });
    });

    $('#precio_desde').click(function() {
     this.select();
    });
    $('#precio_hasta').click(function() {
     this.select();
    });

    var owl = $('.owl-carousel');
          owl.owlCarousel({
              loop:true,
              items:3,
              autoPlay:true,
              autoPlayTimeout:1000,
              autoPlayHoverPause:true,
              margin:10
          });
}
      </script>
      @if($showsegList == 'true')
        <script type="text/javascript">
          $('.seg_151').show();
        </script>
      @else
      <script type="text/javascript">
        $('.seg_151').hide();
      </script>
      @endif
    <!-- END PANEL-->
  </body>
</html>