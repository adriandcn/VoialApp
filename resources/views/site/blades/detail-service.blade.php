<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    <meta property="og:url"           content="{{Request::url()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{strtoupper($detalles->nombre_servicio)}}" />
    <meta property="og:description"   content="{{$detalles->detalle_servicio}}" />
    <meta property="og:image"         content="{{asset('/images/fullsize')}}/{{$detalles->filename}}" />
     <style type="text/css">
      .eventCard {
        border-bottom: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        padding: 7px;
        border-radius: 5px;
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
            <h1>{{trans('publico/labels.tittleLoaderDetails')}}</h1>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <!-- Modal-->
      @include('site.reusable.header')
      <!-- Breadcrumbs & Page title-->
      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li>
                  <a href="{{asset('/')}}">
                    {{ trans('publico/labels.lblHome')}}
                  </a>
                </li>
                <li>
                  <a href="{{asset('/catalogo-de-servicios')}}/{{$detalles->idcatPadre}}">
                    {{$detalles->catPadre}}
                  </a>
                </li>
                <li>
                  <a href="{{asset('/catalogo-de-servicios')}}/{{$detalles->idcatPadre}}/{{$detalles->idcatHijo}}">
                    {{$detalles->catHijo}}
                  </a>
                </li>
                <li>{{ strtoupper($detalles->nombre_servicio)}}</li>
              </ul>
            </div>
                      <!-- path sistema -->
            <br>
            <hr><br>
            <div class="page-title-text">
              {{strtoupper($detalles->nombre_servicio)}}
            </div>
          </div>
        </div>
      </section>
      <section class="bg-white">
        <div class="shell">
          <div class="range range-50">
              <p class="big cell-md-12" style="text-align: justify;">{{$detalles->detalle_servicio}}</p>
          </div>
        </div>
      </section>
      <section class="section-sm section-md-bottom-50 bg-white">
        <div class="shell">
          <div class="range range-50 range-center">
            <div class="cell-md-4 cell-sm-6 cell-xs-8">
              <div id="renderPartialImagenes">
                  @section('contentImagenes')
                  @show
              </div>
              <!-- <a class="button button-primary" href="">
                {{trans('back/admin.lblEvents')}}<span></span>
              </a>
              <br>
              <br>
              <hr> -->
              <a class="button button-facebook" href="#">
                <i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{trans('publico/labels.lblUbicacion')}}<span></span>
              </a>
              <br>
              <br>
              <div>
                @include('reusable.mapDetalleServicio', ['longitud_servicio' => $detalles->longitud_servicio,'latitud_servicio'=>$detalles->latitud_servicio])
              </div>
              <div id="test" class="google-maps"></div>
            </div>
            <div class="cell-md-8">
              <div class="post-single">
                <section class="section-xs bg-white">
                  <div class="shell">
                    <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button" data-size="large" data-mobile-iframe="true">
                      <a target="_blank" href="{{Request::url()}}" class="fb-xfbml-parse-ignore">Compartir</a>
                    </div>
                    <div class="panel-custom-group-wrap">
                      <!-- Bootstrap collapse-->
                      <div class="panel-custom-group text-left" id="accordion1" role="tablist">
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                            <p class="panel-custom-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{trans('publico/labels.lblComoLlegar')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                            <div class="panel-custom-body">
                              {{trans('back/admin.lblDirServicio')}} : <h6 style="font-size: 14px;"> {{$detalles->direccion_servicio}}</h6>
                                {{trans('back/admin.titleComoLlegarDesdeFormPublico')}} :<h6 style="font-size: 14px; text-align: justify;"> {{$detalles->como_llegar1_1}}</h6>
                                {{trans('back/admin.titleComoLlegarServPublico')}}:<h6 style="font-size: 14px; text-align: justify;"> {{$detalles->como_llegar1}}</h6>
                            </div>
                          </div>
                        </div>
                        @if(count($detalles->horario) > 0)
                          <!-- Bootstrap panel-->
                          <div class="panel panel-custom panel-custom-default">
                            <div class="panel-custom-heading" id="accordionHHeading2" role="tab">
                              <p class="panel-custom-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordionHCollapse2" aria-controls="accordionHCollapse2" aria-expanded="true"><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{trans('publico/labels.lblHorario')}}
                                </a>
                              </p>
                            </div>
                            <div class="panel-custom-collapse collapse" id="accordionHCollapse2" role="tabpanel" aria-labelledby="accordionHHeading2">
                              <div class="panel-custom-body">
                                <!-- {{trans('publico/labels.lblHorario')}} : -->
                                @foreach($detalles->horario as $horario)
                                  <h6 style="font-size: 14px;">{{$horario->dia}} : <br>{{trans('publico/labels.lblFromHorario')}} : {{$horario->desde}}, {{trans('publico/labels.lblToHorario')}} : {{$horario->hasta}} </h6>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        @endif
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading3" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3"><i class="fa fa-envelope"></i>&nbsp;&nbsp;{{trans('publico/labels.titleContact')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="panel-custom-body">
                              {{trans('publico/labels.lblPhone')}} : <h6 style="font-size: 14px;"> {{$detalles->telefono}}</h6>
                              {{trans('publico/labels.lblWebPage')}} : <h6 style="font-size: 14px;">
                                <a href="{{$detalles->pagina_web}}" target="_new">{{$detalles->pagina_web}}</a></h6>
                              {{trans('publico/labels.lblEmail')}} :<h6 style="font-size: 14px;"> {{$detalles->correo_contacto}}</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        @if($detalles->precio_desde != null && $detalles->precio_desde != '' && $detalles->precio_desde != 'No')
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading4" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4">
                                <i class="fa fa-money"></i>&nbsp;&nbsp;{{trans('publico/labels.lblCosto')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse4" role="tabpanel" aria-labelledby="accordion1Heading4">
                            <div class="panel-custom-body">
                              <h1> {{$detalles->precio_desde}}</h1>
                            </div>
                          </div>
                        </div>
                        @endif
                        <!-- Bootstrap panel-->
                        @if(count($detalles->redes) > 0)
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading5" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse5" aria-controls="accordion1Collapse5">
                                <i class="fa fa-group"></i>&nbsp;&nbsp;{{trans('back/admin.titleSocialRed')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse5" role="tabpanel" aria-labelledby="accordion1Heading5">
                            <div class="panel-custom-body">
                              @foreach($detalles->redes as $red)
                                @if($red->url != '')
                                  <a class="tooltip" title="{{$red->nombre_red}}" style="display: inline;" href="{{$red->url}}" target="_black"><i class="fa fa-{{$red->icon}} fa-lg"></i></a>&nbsp;&nbsp;
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </div>
                        @endif
                        @if(count($listPropiedades) > 0)
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading6" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse6" aria-controls="accordion1Collapse6">
                                <i class="fa fa-list"></i>&nbsp;&nbsp;{{trans('publico/labels.titleEstablecimiento')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse6" role="tabpanel" aria-labelledby="accordion1Heading6">
                            <div class="panel-custom-body">
                              @foreach($listPropiedades as $propiedad)
                                @if($propiedad->id_servicio_establecimiento_usuario != null)
                                  @if($propiedad->id_padre == 0)
                                    <h6 style="font-size: 14px;"> 
                                      <i class="fa-check"></i>&nbsp;&nbsp;{{$propiedad->nombre_servicio_est}}
                                    </h6>
                                  @else
                                    <h6 style="font-size: 12px; margin-left: 30px;"> 
                                      <i class="fa-asterisk"></i>&nbsp;&nbsp;{{$propiedad->nombre_servicio_est}}
                                    </h6>
                                  @endif
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </div>
                        @endif
                        <!-- Bootstrap panel-->
                        <?php
                          $tagsNoSpaces = str_replace(' ', '', $detalles->tags);
                          $tagsList = explode('#', $tagsNoSpaces);
                        ?>
                        @if( count($tagsList) > 0 && $tagsNoSpaces != '')
                          <div class="panel panel-custom panel-custom-default">
                            <div class="panel-custom-heading" id="accordion1Heading7" role="tab">
                              <p class="panel-custom-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse7" aria-controls="accordion1Collapse7">
                                  <i class="fa fa-hashtag"></i>&nbsp;&nbsp;{{trans('publico/labels.titleHashtags')}}
                                </a>
                              </p>
                            </div>
                            <div class="panel-custom-collapse collapse" id="accordion1Collapse7" role="tabpanel" aria-labelledby="accordion1Heading7">
                              <div class="panel-custom-body">
                                @foreach($tagsList as $tag)
                                @if($tag  != '')
                                  <h6 style="font-size: 14px;"><a href="{!!asset('/Search')!!}?s=#{{$tag}}">#{{$tag}}</a></h6>
                                @endif
                                @endforeach
                              </div>
                            </div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </section>
                @if(count($listPromociones) > 0)
                  <section class="section-xs bg-white">
                      <div class="shell shell-inset-xs-15 shell-offset-left-xlg-50">
                          <div class="heading-group">
                              <h5><i class="fa fa-money"></i>&nbsp;&nbsp;{{ trans('publico/labels.titlePromotions')}}</h5>
                          </div>
                          <div class="range range-50">
                            <div class="owl-carousel owl-theme">
                              @foreach ($listPromociones as $promotion)
                                <div class="item" style=" margin-right: 10px;">
                                      <a class="layouts-link" href="../detalles-de-promocion/{{$promotion->id}}">
                                        <img class="img-shadow" src="{{asset('/images/icon')}}/{{$promotion->filename}}" alt="" width="270" height="393"/>
                                        <div class="eventCard">
                                          <h6 style="margin-top: 1px;">
                                            <i class="fa fa-money"></i>&nbsp;&nbsp;{{$promotion->nombre_promocion}}
                                          </h6>
                                          <hr>
                                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Fecha: {{$promotion->created_at}}</h7><br>
                                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Descripción: {{str_limit($promotion->descripcion_promocion, $limit = 15, $end = '...')}}</h7>
                                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Descuento % : {{$promotion->descuento}}</h7>
                                        </div>
                                      </a>
                                </div>
                              @endforeach
                            </div>
                          </div>
                      </div>
                  </section>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
      <style type="text/css">
        .btn-full-image{
          cursor: pointer;
          position: absolute;
          top: 45%;
          color: #c26933;
        }
        .btn-right{
          left: 0;
        }
        .btn-left{
          right: 0;
        }
        .btn-full-image:hover{
          color: #f7701e;
        }
        .modal-custom .modal-content{
          padding: 20px 40px 40px 30px;
          border: 0;
          border-radius: 0;
          box-shadow: 0 0 24px rgba(127, 131, 154, 0);
        }
      </style>
      <!-- Modal full image-->
              <div class="modal modal-custom fade" id="form-img-full" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="width: 80%">
                  <div class="modal-content" id="imgFull" >
                    <!-- <a class="button" href="#" onclick="backImage()" style="position: absolute;
                    bottom: 43%;"> -->
                      <i class="fa fa-arrow-left fa-3x btn-full-image btn-right" onclick="backImage()"></i><span></span>
                    <!-- </a> -->
                   <!-- <a class="button" href="#" onclick="nextImage()" style="position: absolute;
                    bottom: 43%;
                    right: -14%;"> -->
                      <i class="fa fa-arrow-right fa-3x btn-full-image btn-left" onclick="nextImage()"></i><span></span>
                    <!-- </a> -->
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: white; top: 80%;"><span aria-hidden="true"></span></button>
                  </div>
                </div>
              </div>
      <!-- Page Footer-->
      <script type="text/javascript">
        $(document).ready(function () {
          GetDataAjaxImagenesRes("{!!asset('/getImagesServicio')!!}/1/{!!$detalles->id_usuario_servicio!!}");
          var owl = $('.owl-carousel');
          owl.owlCarousel({
              stagePadding: 50,
              loop:true,
              items:3,
              autoPlay:true,
              autoPlayTimeout:1000,
              autoPlayHoverPause:true,
              margin:10
          });
        });
      </script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12&appId=164878350792188&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>