<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
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
            <h1>{{trans('publico/labels.tittleLoaderDetails')}}</h1>
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
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li>
                  <a href="{{asset('/')}}">
                    {{ trans('publico/labels.lblHome')}}
                  </a>
                </li>
                <li>
                  <a href="{{asset('/catalogoServ')}}/{{$detalles->idcatPadre}}">
                    {{$detalles->catPadre}}
                  </a>
                </li>
                <li>
                  <a href="{{asset('/catalogoServ')}}/{{$detalles->idcatPadre}}/{{$detalles->idcatHijo}}">
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
              {{$detalles->nombre_servicio}}
            </div>
            <p class="big" style="word-break: break-all;">{{$detalles->detalle_servicio}}</p>
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
              <a class="button button-primary" href="">
                {{trans('back/admin.lblEvents')}}<span></span>
              </a>
              <br>
              <br>
              <hr>
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
               <!--  <div class="post-panel post-panel-gray group-post-panel group-center">
                  <span class="post-panel-item">
                    <span class="mdi mdi-md icon-primary mdi-playlist-play"></span>
                    <time datetime="2017-03-07" style="color:#c26933">{{$detalles->catPadre}} <i class="fa fa-angle-right"></i> {{$detalles->catHijo}} </time>
                  </span>
                </div> -->
                <!-- <h3>{{$detalles->nombre_servicio}}</h3> -->
                <!-- <hr> -->
                <!-- <p class="big">{{$detalles->detalle_servicio}}</p> -->
                <section class="section-xs bg-white">
                  <div class="shell">
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
<!--                               {{trans('publico/labels.lblHorario')}} :
                              @foreach($detalles->horario as $horario)
                                <h6 style="font-size: 14px;">{{$horario->dia}} : <br>{{trans('publico/labels.lblFromHorario')}} : {{$horario->desde}}, {{trans('publico/labels.lblToHorario')}} : {{$horario->hasta}} </h6>
                              @endforeach -->
                                {{trans('back/admin.titleComoLlegarDesdeForm')}} :<h6 style="font-size: 14px; word-break: break-all;"> {{$detalles->como_llegar1}}</h6>
                                {{trans('back/admin.titleComoLlegarServ')}}:<h6 style="font-size: 14px; word-break: break-all;"> {{$detalles->como_llegar1_1}}</h6>
                                <!-- {{trans('back/admin.titleComoLlegarDesdeForm')}} :<h6 style="font-size: 14px;"> {{$detalles->como_llegar2}}</h6>
                                {{trans('back/admin.titleComoLlegarServ')}} :<h6 style="font-size: 14px;"> {{$detalles->como_llegar2_2}}</h6> -->
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordionHHeadingH" role="tab">
                            <p class="panel-custom-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordionHCollapseH" aria-controls="accordionHCollapseH" aria-expanded="true"><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{trans('publico/labels.lblHorario')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordionHCollapseH" role="tabpanel" aria-labelledby="accordionHHeadingH">
                            <div class="panel-custom-body">
                              <!-- {{trans('publico/labels.lblHorario')}} : -->
                              @foreach($detalles->horario as $horario)
                                <h6 style="font-size: 14px;">{{$horario->dia}} : <br>{{trans('publico/labels.lblFromHorario')}} : {{$horario->desde}}, {{trans('publico/labels.lblToHorario')}} : {{$horario->hasta}} </h6>
                              @endforeach
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading2" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionH" href="#accordion1Collapse2" aria-controls="accordion1Collapse2"><i class="fa fa-envelope"></i>&nbsp;&nbsp;{{trans('publico/labels.titleContact')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse2" role="tabpanel" aria-labelledby="accordion1Heading2">
                            <div class="panel-custom-body">
                              {{trans('publico/labels.lblPhone')}} : <h6 style="font-size: 14px;"> {{$detalles->telefono}}</h6>
                              {{trans('publico/labels.lblWebPage')}} : <h6 style="font-size: 14px;">
                                <a href="{{$detalles->pagina_web}}" target="_new">{{$detalles->pagina_web}}</a></h6>
                              {{trans('publico/labels.lblEmail')}} :<h6 style="font-size: 14px;"> {{$detalles->correo_contacto}}</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading3" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">
                                <i class="fa fa-money"></i>&nbsp;&nbsp;{{trans('publico/labels.lblCosto')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="panel-custom-body">
                              {{trans('publico/labels.lblPrecioFrom')}} : <h6 style="font-size: 14px;"> {{$detalles->precio_desde}}</h6>
                                {{trans('publico/labels.lblPrecioTo')}} : <h6 style="font-size: 14px;">{{$detalles->precio_hasta}}</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading3" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4">
                                <i class="fa fa-group"></i>&nbsp;&nbsp;{{trans('back/admin.titleSocialRed')}}
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse4" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="panel-custom-body">
                              @foreach($detalles->redes as $red)
                                @if($red->url != '')
                                  <a class="tooltip" title="{{$red->nombre_red}}" style="display: inline;" href="{{$red->url}}" target="_black"><i class="fa fa-{{$red->icon}} fa-lg"></i></a>&nbsp;&nbsp;
                                @endif
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
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
          GetDataAjaxImagenesRes("{!!asset('/getImagesServicio')!!}/1/{!!$detalles->id!!}");
        });
      </script>
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>