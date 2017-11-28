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
            <div class="page-title-text">Bienvenido a {{$detalles->nombre_servicio}}</div>
            <p class="big text-width-medium">A continuacion se detallan aspectos más importantes del servicio 
            </p>
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
                Promociones y Eventos<span></span>
              </a>
              <br>
              <br>
              <hr>
              <a class="button button-facebook" href="#">
                <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Ubicación<span></span>
              </a>
              <br>
              <br>
              <div>
                @include('reusable.mapDetalleServicio', ['longitud_servicio' => $detalles->longitud_servicio,'latitud_servicio'=>$detalles->latitud_servicio])
              </div>
            </div>
            <div class="cell-md-8">
              <div class="post-single">
                <div class="post-panel post-panel-gray group-post-panel group-center">
                  <span class="post-panel-item">
                    <span class="mdi mdi-md icon-primary mdi-clock"></span>
                    <time datetime="2017-03-07">{{$detalles->created_at}}</time>
                  </span>
                  <!-- <a class="icon-link" href="single-post.html">
                    <span class="mdi mdi-md icon-primary mdi-comment-multiple-outline"></span>
                    <span>141</span>
                  </a> -->
                  <a class="icon-link" href="#">
                    <span class="mdi mdi-md icon-primary mdi-heart-outline"></span>
                    <span>0</span>
                  </a>
                  <!-- <a class="icon-link" href="#">
                    <span class="mdi mdi-md icon-primary mdi-share"></span>
                    <span>42</span>
                  </a> -->
                </div>
                <h1>{{$detalles->nombre_servicio}}</h1>
                <p class="big">{{$detalles->detalle_servicio}}</p>
                
                <section class="section-xs bg-white">
                  <div class="shell">
                    <div class="panel-custom-group-wrap">
                      <!-- Bootstrap collapse-->
                      <div class="panel-custom-group text-left" id="accordion1" role="tablist">
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                            <p class="panel-custom-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;¿Cómo llegar?
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                            <div class="panel-custom-body">
                              Dirección : <h6 style="font-size: 14px;"> {{$detalles->direccion_servicio}}</h6>
                                Horario : <h6 style="font-size: 14px;">{{$detalles->horario}}</h6>
                                Como llegar :<h6 style="font-size: 14px;"> {{$detalles->como_llegar1}}</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading2" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse2" aria-controls="accordion1Collapse2"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contacto
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse2" role="tabpanel" aria-labelledby="accordion1Heading2">
                            <div class="panel-custom-body">
                              Teléfono : <h6 style="font-size: 14px;"> {{$detalles->telefono}}</h6>
                              Página Web : <h6 style="font-size: 14px;">
                                <a href="{{$detalles->pagina_web}}" target="_new">{{$detalles->pagina_web}}</a></h6>
                              Correo :<h6 style="font-size: 14px;"> {{$detalles->correo_contacto}}</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Bootstrap panel-->
                        <div class="panel panel-custom panel-custom-default">
                          <div class="panel-custom-heading" id="accordion1Heading3" role="tab">
                            <p class="panel-custom-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">
                                <i class="fa fa-money"></i>&nbsp;&nbsp;Costo
                              </a>
                            </p>
                          </div>
                          <div class="panel-custom-collapse collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="panel-custom-body">
                              Precio desde : <h6 style="font-size: 14px;"> {{$detalles->precio_desde}}</h6>
                                Precio hasta : <h6 style="font-size: 14px;">{{$detalles->precio_hasta}}</h6>
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
      <!-- Modal full image-->
              <div class="modal modal-custom fade" id="form-img-full" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="width: 80%">
                  <div class="modal-content" id="imgFull" >
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true"></span></button>
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