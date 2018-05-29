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
        if(count($postData) == 0){
          $postData = (object) array(
            'id' => Session::get('idPostAdded'),
            'id_usuario_servicio' => '',
            'id_catalogo_tipo_fotografia' => 2,
            'descripcion_promocion' => '',
            'nombre_promocion' => '',
            'estado_promocion' => '',
            'fecha_desde' => '',
            'fecha_hasta' => '',
            'fecha_desde_hasta' => date("Y-m-d") . ' - ' . date("Y-m-d"),
            'tags' => '',
            'precio_normal' => '',
            'descuento' => 0,
            'codigo_promocion' => '',
            'observaciones_promocion' => '',
            'created_at' => '',
            'updated_at' => ''
          );
        }else{
          $postData = (object) array(
            'id' => $postData->id,
            'id_usuario_servicio' => $postData->id_usuario_servicio,
            'id_catalogo_tipo_fotografia' => 2,
            'descripcion_promocion' => $postData->descripcion_promocion,
            'nombre_promocion' => $postData->nombre_promocion,
            'estado_promocion' => $postData->estado_promocion,
            'fecha_desde' => $postData->fecha_desde,
            'fecha_hasta' => $postData->fecha_hasta,
            'fecha_desde_hasta' => $postData->fecha_desde . ' - ' .$postData->fecha_hasta,
            'tags' => $postData->tags,
            'precio_normal' => $postData->precio_normal,
            'descuento' => $postData->descuento,
            'codigo_promocion' => $postData->codigo_promocion,
            'observaciones_promocion' => $postData->observaciones_promocion
          );
        }
      ?>
      <section class="page-title breadcrumbs-elements page-title-inset-1">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">{{ trans('publico/labels.lblPostAdminAdd')}}</div>
            <p class="big text-width-medium">{{ trans('publico/labels.PostsDescription')}}</p>
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li><a href="{{asset('/mis-servicios')}}">{{ trans('publico/labels.lblPathMyServices')}}</a></li>
                <li><a href="../administracion-de-promociones/{{ Session::get('idUsServ') }}">{{ trans('publico/labels.lblPathPosts')}}</a></li>
                <li>{{ trans('publico/labels.lblPathAddPost')}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <form class="rd-mailform" id="formAddEvent" action="{{$serverDir}}public/updateEvent" method="POST">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-md-3">
                  <a class="button button-primary tooltip button-icon button-icon-sm button-icon-right fa-plus" title="{{ trans('back/admin.altAddImage')}}" href="" data-toggle="modal" data-target="#foto">
                    {{ trans('back/admin.lblAddImagePost')}}<span></span>
                  </a>
                  <br>
                  <br>
                  <hr>
                  <div id="renderImagesPost">
                  </div> 
            </div>
            <div class="cell-md-8">
              <div class="range range-60">
                <div class="cell-lg-10">
                  <h6><i class="fa fa-plus"></i> {{trans('publico/labels.lblAddPost')}}</h6>
                  <br>
                  <!-- RD Mailform-->
                        <input type="hidden" name="id" value="{{$postData->id}}">
                        <input type="hidden" name="id_usuario_servicio" value="{{$postData->id_usuario_servicio}}">
                        @if(Session::has('idUsServ')) 
                          <input type="hidden" name="id_usuario_servicio" value="{{ Session::get('idUsServ') }}">
                        @endif
                        <div class="form-wrap">
                          <label class="form-label-outside" for="pass">
                            <i class="fa fa-font "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostName')}}
                          </label>
                          <input class="form-input" id="pass" type="text" name="nombre_promocion" value="{{$postData->nombre_promocion}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="descripcion_promocion">
                            <i class="fa fa-font "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostDescripion')}}
                          </label>
                          <input class="form-input" id="descripcion_promocion" type="text" name="descripcion_promocion" value="{{$postData->descripcion_promocion}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="observaciones_promocion">
                            <i class="fa fa-eye "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostObservations')}}
                          </label>
                          <input class="form-input" id="observaciones_promocion" type="text" name="observaciones_promocion" value="{{$postData->observaciones_promocion}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="contact-first-name">
                            <i class="fa fa-lightbulb-o "></i>&nbsp;&nbsp;{{ trans('publico/labels.lblPostStatus')}}
                          </label><br>
                          <input  class="tooltip checkboxDays" type="checkbox" id='estado_promocion' name="estado_promocion" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" checked="{{$postData->estado_promocion}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="fecha_desde_hasta">
                            <i class="fa fa-calendar"></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostDate')}}
                          </label>
                          <input class="form-input" id="fecha_desde_hasta" type="text" name="daterange" value="{{$postData->fecha_desde_hasta}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="tags">
                            <i class="fa fa-hashtag "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostTags')}}
                          </label>
                          <input class="form-input" id="tags" type="text" name="tags" value="{{$postData->tags}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="precio_normal">
                            <i class="fa fa-hashtag "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostPrecioNormal')}}
                          </label>
                          <input class="form-input numsOnly" id="precio_normal" type="text" name="precio_normal" value="{{$postData->precio_normal}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="descuento">
                            <i class="fa fa-hashtag "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPromoDescuento')}}
                          </label>
                          <input class="form-input" id="descuentotxt" type="text" name="descuento" value="{{$postData->descuento}}">
                          <br>
                          <div id="slideDescuento"></div>
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="codigo_promocion">
                            <i class="fa fa-hashtag "></i>&nbsp;&nbsp; {{trans('publico/labels.lblPostCodigo')}}
                          </label>
                          <input class="form-input" id="codigo_promocion" type="text" name="codigo_promocion" value="{{$postData->codigo_promocion}}">
                        </div>
                        <div class="rowerrorPost" style="margin-top: 10px;"></div>
                        <div class="group-buttons-3 group-md-justify">
                          <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-plus" type="submit" onclick="saveEvento(event,'{{$postData->id}}')">
                            <div style="display: inline;" id="spinnerSave">
                              <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            {{ trans('publico/labels.lblbtnSave')}}
                            <span></span></button>
                          @if(Session::has('idUsServ')) 
                          <a class="button-primary button" href="../administracion-de-promociones/{{ Session::get('idUsServ') }}">
                            {{ trans('publico/labels.lblBtnCancel')}}
                            <span></span>
                          </a>
                          @else
                          <a class="button-primary button" href="../administracion-de-promociones/{{ Session::get('idUsServ') }}">
                            {{ trans('publico/labels.lblBtnCancel')}}
                            <span></span>
                          </a>
                          @endif
                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Modal FOTOGRAFIA-->
      <div class="modal fade" id="foto" tabindex="-1" role="dialog" style="z-index: 99999; background: #00000099;">
        <div class="modal-dialog" role="document" >
          <div class="modal-content">
              <div id="testboxForm" class="foto">
                        <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarfoto')}}</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}" onclick="GetDataAjaxImagenesPost('{!! $postData->id !!}')">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4 style="text-align: center;color:#428bca;">{{trans('back/admin.descriptionAddImageModal')}}
                <span class="glyphicon glyphicon-hand-down"></span>
              </h4>
              <br>
              <div class="rowerrorM"> </div>
              {!! Form::open(['url' => route('upload-event'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}      
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_catalogo_fotografia" name="id_catalogo_fotografia" value="2">
                @if(Session::has('idUsServ')) 
                  <input type="hidden" name="id_usuario_servicio" value="{{ Session::get('idUsServ') }}">
                @else
                  <input type="hidden" name="id_usuario_servicio" value="{{$postData->id_usuario_servicio}}">
                @endif
                <input type="hidden" id="id_auxiliar" name="id_auxiliar" value="{!!$postData->id!!}">
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" id="descripcion_fotografia" name="descripcion_fotografia" value="{!!$postData->descripcion_promocion!!}">
                <input type="hidden" id="es_principal" name="es_principal" value="true">
                <input type="hidden" id="profile_pic" name="profile_pic" value="0">
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
               <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-check" href="" data-dismiss="modal" id="nextbtn" onclick="GetDataAjaxImagenesPost('{!! $postData->id !!}')">{{trans('front/responsive.finalizar')}}<span></span></a>
            </div>
              </div>
          </div>
        </div>
      </div>
      <!-- MODAL horario -->
      </section>
      <!-- Page Footer-->
      @include('site.reusable.footer')
      <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
      <!-- Page Footer-->
      {!! HTML::style('/packages/dropzone/dropzone.css') !!}
      {!! HTML::script('/packages/dropzone/dropzone.js') !!}
      {!! HTML::script('/assets/js/dropzone-config.js') !!} 
      <script type="text/javascript">
        $('input[name="daterange"]').daterangepicker(
          {
              locale: {
                format: 'YYYY-MM-DD'
              }
          });
        $("[name='estado_promocion']").bootstrapSwitch();
        //Slide descuento
          if (noUiSlider) {
              var keypressSliderDescuento = document.getElementById('slideDescuento');
              var inputDescuento = document.getElementById('descuentotxt');
              var inputsPost = [inputDescuento];

              noUiSlider.create(keypressSliderDescuento, {
                  start: {{$postData->descuento}},
                  tooltips: true,
                  step: 5,
                  range: {
                    'min': 0,
                    'max': 50
                  }
              });

              keypressSliderDescuento.noUiSlider.on('update', function( values, handle ) {
                  inputsPost[handle].value = values[handle];
              });

              function setSliderHandle(i, value) {
                  var r = [null,null];
                  r[i] = value;
                  keypressSliderDescuento.noUiSlider.set(r);
              }

              // Listen to keydown events on the input field.
              inputsPost.forEach(function(input, handle) {

                  input.addEventListener('change', function(){
                      setSliderHandle(handle, this.value);
                  });

                  input.addEventListener('keydown', function( e ) {

                      var values = keypressSliderDescuento.noUiSlider.get();
                      var value = Number(values[handle]);

                      // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
                      var steps = keypressSliderDescuento.noUiSlider.steps();

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

              $('#inputDescuento').click(function() {
               this.select();
              });
          } 
      </script>

      <!-- @if($postData->id != null) -->
        <script type="text/javascript">
          var idPost = {!!$postData->id!!};
          GetDataAjaxImagenesPost(idPost);
        </script>
      <!-- @endif -->
  </body>
</html>