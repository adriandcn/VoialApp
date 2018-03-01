<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
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
      <!-- Breadcrumbs & Page title-->
      <?php
        if(count($evento) == 0){
          $evento = (object) array(
            'id' => null,
            'id_usuario_servicio' => '',
            'id_fotografia' => '',
            'nombre_evento' => '',
            'descripcion_evento' => '',
            'observaciones_evento' => '',
            'estado_evento' => 1,
            'fecha_desde' => '',
            'fecha_hasta' => '',
            'longitud_evento' => -78.46783820000002,
            'latitud_evento' => -0.1806532,
            'tags' => '',
          );
        }else{
          $evento = (object) array(
            'id' => $evento[0]->id,
            'id_usuario_servicio' => $evento[0]->id_usuario_servicio,
            'id_fotografia' => $evento[0]->id_fotografia,
            'nombre_evento' => $evento[0]->nombre_evento,
            'descripcion_evento' => $evento[0]->descripcion_evento,
            'observaciones_evento' => $evento[0]->observaciones_evento,
            'estado_evento' => $evento[0]->estado_evento,
            'fecha_desde' => $evento[0]->fecha_desde,
            'fecha_hasta' => $evento[0]->fecha_hasta,
            'longitud_evento' => ($evento[0]->longitud_evento != '' || $evento[0]->longitud_evento != null)?$evento[0]->longitud_evento:-78.46783820000002,
            'latitud_evento' => ($evento[0]->latitud_evento != '' || $evento[0]->latitud_evento != null)?$evento[0]->latitud_evento:-0.1806532,
            'tags' => $evento[0]->tags
          );
          
        }
      ?>
      <section class="page-title breadcrumbs-elements page-title-inset-1">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">{{ trans('back/admin.lblEventAdmin')}}</div>
            <p class="big text-width-medium">{{ trans('back/admin.eventsDescription')}}</p>
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li><a href="{{asset('/serviciosres')}}">{{ trans('publico/labels.lblPathMyServices')}}</a></li>
                <li>{{ trans('publico/labels.lblPathAddEvent')}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <form class="rd-mailform" id="formAddEvent" action="{{$serverDir}}public/updateEvent" method="POST">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-md-4">
              <h6><i class="fa fa-map-marker"></i> {{trans('publico/labels.lblEventLocation')}}</h6>
              <div class="tab-container full-width style2">
                   @include('reusable.maps1', ['longitud_servicio' => $evento->longitud_evento,'latitud_servicio'=>$evento->latitud_evento])  
              </div>
            </div>
            <div class="cell-md-8">
              <div class="range range-60">
                <div class="cell-lg-10">
                  <h6><i class="fa fa-plus"></i> {{trans('publico/labels.lblAddEvent')}}</h6>
                  <!-- RD Mailform-->
                        <input type="hidden" name="id_evento" value="{{$evento->id}}">
                        <input type="hidden" name="id_usuario_servicio" value="{{$evento->id_usuario_servicio}}">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="id_fotografia">
                            id_fotografia
                          </label>
                          <input class="form-input" id="id_fotografia" type="text" name="id_fotografia" value="{{$evento->id_fotografia}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="pass">
                            nombre_evento
                          </label>
                          <input class="form-input" id="pass" type="text" name="nombre_evento" value="{{$evento->nombre_evento}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="descripcion_evento">
                            descripcion_evento
                          </label>
                          <input class="form-input" id="descripcion_evento" type="text" name="descripcion_evento" value="{{$evento->descripcion_evento}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="observaciones_evento">
                            observaciones_evento
                          </label>
                          <input class="form-input" id="observaciones_evento" type="text" name="observaciones_evento" value="{{$evento->observaciones_evento}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name">
                            <i class="fa fa-lightbulb-o "></i>&nbsp;&nbsp;{{ trans('back/admin.lblestadoServicio')}}
                          </label>
                          <input  class="tooltip checkboxDays" type="checkbox" id='estado_evento' name="estado_evento" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" checked="{{$evento->estado_evento}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="fecha_hasta">
                            fecha_desde_hasta
                          </label>
                          <input class="form-input" id="fecha_hasta" type="text" name="daterange" value="{{$evento->fecha_hasta}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="tags">
                            tags
                          </label>
                          <input class="form-input" id="tags" type="text" name="tags" value="{{$evento->tags}}">
                        </div>
                        <div class="rowerrorEvent" style="margin-top: 10px;"></div>
                        <div class="group-buttons-3 group-md-justify">
                          <button class="button-primary button" type="submit" onclick="saveEvento(event,{{{$evento->id}}})">
                            <div style="display: inline;" id="spinnerSave">
                              <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            {{ trans('publico/labels.btnSave')}}
                            <span></span></button>
                          <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-facebook" href="{{url('/redirect/L')}}" target="_blank">
                            {{ trans('publico/labels.btnCancel')}}
                            <span></span>
                          </a>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      </section>
      <!-- Page Footer-->
      @include('site.reusable.footer')
      <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
      <script type="text/javascript">
        $('input[name="daterange"]').daterangepicker(
          {
              locale: {
                format: 'YYYY-MM-DD'
              }
          });
        $("[name='estado_evento']").bootstrapSwitch();
      </script>
    </div>
    <!-- END PANEL-->
  </body>
</html>