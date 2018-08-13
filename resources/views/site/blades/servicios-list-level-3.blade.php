<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    @if(session('device') == 'mobile')
      <style type="text/css">
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
          display: inline-grid !important;
        }
      </style>
    @else
    <style type="text/css">
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
          display: flow-root !important;
        }
      </style>
    @endif
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
            <h1>{{trans('publico/labels.tittleLoaderCategoSons')}}</h1>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <!-- Modal-->
      @include('site.reusable.header')
      <!-- Breadcrumbs & Page title-->
      @if(session('device') == 'desk')
        <!-- Breadcrumbs & Page title-->
        <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: url('{{asset('/images/Fondos')}}/{{$dataSubCatalogo->image}}');background-position: center; background-size: cover;">
          <div class="shell">
            <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
              <div class="page-title-text">{{$dataSubCatalogo->nombre_servicio}}</div>
              <p class="big text-width-medium">{{$dataSubCatalogo->descripcion}}</p>
              <!-- path sistema -->
              <br>
              <hr>
              <div>
                <span class="box-skew__item"></span>
                <ul class="breadcrumbs-custom">
                  <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                  <li><a href="{{asset('/')}}catalogo-de-servicios/{{$dataCatalogo->id_catalogo_servicios}}">{{$dataCatalogo->nombre_servicio}}</a></li>
                  <li>{{$dataSubCatalogo->nombre_servicio}}</li>
                  <!-- <li>{{ trans('publico/labels.lblPathServicioList')}}</li> -->
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section class="section-xs bg-white">
          <div class="shell">
            <div class="range range-50">
              <div class="cell-md-12">
                <div class="range range-60">
                  <div class="cell-xs-12">
                      <div class="range range-15">
                        <div class="cell-sm-12">
                          <div class="form-inline form-inline-custom">
                            <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-filter" onclick="openFilterModal(event)">{{trans('publico/labels.btnFilter')}}<span></span></button>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section-xs bg-white">
          <div class="shell">
            <div class="row">
              <?php
                  $latitud_servicio = -0.1806532;
                  $longitud_servicio = -78.46783820000002;
                  $radio = 500;
                ?>
                <div class="col-xs-12 col-sm-12 isotope-item">
                  @include('reusable.searchMap', ['latitud_servicio' =>$latitud_servicio ,'longitud_servicio'=>$longitud_servicio,'radio'=>$radio]) 
                </div>
            </div>
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <div class="group-buttons-3 group-md-justify">
                  <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" onclick="startAllServices()">
                    {{trans('publico/labels.lblSearchAll')}}<span></span>
                  </a>
                  <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" href="" onclick="searchServ(event,{{request()->route('idCatalogo')}},{{request()->route('idSubCatalogo')}})" id="btnSearchMap">
                    {{trans('publico/labels.lblSearchNear')}}<span></span>
                  </a>
              </div>
              </div>
            </div>
            <div id="sectionResult"></div>
          </div>
        </section>
        <section class="section-xs bg-white">
          <div class="shell">
            <div class="heading-group" >
              <h4><i class="fa fa-search"></i> &nbsp;&nbsp;{{ trans('publico/labels.lblResult')}}</h4>
            </div>
            <br>
            <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
               <div id="findedFilter"></div>
               <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
          </div>
        </section>
        <div class="modal fade" id="filter" tabindex="-1" role="dialog" style="z-index: 99999; background: #00000099;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!-- <div id="testboxForm"> -->
                <div class="modal-header">
                  <h3 class="modal-title">
                    {{trans('publico/labels.btnFilter')}}
                  </h3>
                </div>
              <div class="modal-body">
                  <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                      <div class="range range-15">
                        <div class="cell-sm-12">
                          <div class="form-inline form-inline-custom">
                            <div class="form-wrap">
                              <label class="form-label-outside" for="contact-email">
                                {{trans('publico/labels.servTypes')}}
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <ul class="list-group">
                            @foreach($padresList as $item)
                            <li class="list-group-item">
                              <span class="badge" style="background-color: transparent;"><input type="checkbox" name="my-checkbox" id="{{$item->id}}" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" class="checkboxServ"></span>
                            {{$item->nombre_servicio_est}}
                            </li>
                            @endforeach 
                          </ul>
                        </div>
                      </div>
                    </form>
              </div>
              <div class="modal-footer">
                <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" style="float: right;" href="#" onclick="searchServ(event,{{request()->route('idCatalogo')}},{{request()->route('idSubCatalogo')}})">
                    Aplicar
                    <span></span>
                </a>
              </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      @endif
      @if(session('device') == 'mobile')
        <section class="section-xs bg-white" style="padding-top: 20px;">
          <div class="shell">
            <div class="panel-custom-group-wrap">
              <!-- <h4>{{$dataSubCatalogo->nombre_servicio}}</h4> -->
              <!-- Bootstrap collapse-->
              <div class="panel-custom-group text-left" id="accordion1" role="tablist">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading2" role="tab">
                    <p class="panel-custom-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse2" aria-controls="accordion1Collapse2">
                        <i class="fa fa-user-md"></i>&nbsp;&nbsp;{{$dataSubCatalogo->nombre_servicio}}
                      </a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion1Collapse2" role="tabpanel" aria-labelledby="accordion1Heading2">
                    <div class="panel-custom-body" style="padding: 0 0px 30px 0px !important;">
                        <!-- Breadcrumbs & Page title-->
                        <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: url('{{asset('/images/Fondos')}}/{{$dataSubCatalogo->image}}');background-position: center; background-size: cover;">
                          <div class="shell">
                            <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
                              <div class="page-title-text">{{$dataSubCatalogo->nombre_servicio}}</div>
                              <p class="big text-width-medium">{{$dataSubCatalogo->descripcion}}</p>
                              <!-- path sistema -->
                              <br>
                              <hr>
                              <div>
                                <span class="box-skew__item"></span>
                                <ul class="breadcrumbs-custom">
                                  <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                                  <li><a href="{{asset('/')}}catalogo-de-servicios/{{$dataCatalogo->id_catalogo_servicios}}">{{$dataCatalogo->nombre_servicio}}</a></li>
                                  <li>{{$dataSubCatalogo->nombre_servicio}}</li>
                                  <!-- <li>{{ trans('publico/labels.lblPathServicioList')}}</li> -->
                                </ul>
                              </div>
                            </div>
                          </div>
                        </section>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading3" role="tab">
                    <p class="panel-custom-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">
                        <i class="fa fa-money"></i>&nbsp;&nbsp;Promociones
                      </a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                    <div class="panel-custom-body" style="padding: 0 0px 30px 0px !important;">
                      <div class="owl-carousel owl-theme carousel-promociones">
                          @foreach($lastPromotions as $promotion)
                            <div class="panel-custom-group-wrap" style="margin-top: 3px;">
                              <!-- Bootstrap collapse-->
                              <div class="panel-custom-group text-left" id="accordion1" role="tablist">
                                  <!-- Bootstrap panel-->
                                  <div class="panel panel-custom panel-custom-default" onclick="goToPromotion('{{asset("/")}}detalles-de-promocion/{{$promotion->id}}')">
                                      <div class="panel-custom-heading" style="text-align: center;">
                                          <img class="img-shadow" src="{{asset('/images/icon')}}/{{$promotion->filename}}" alt="" width="270" height="393" />
                                          <p class="panel-custom-title" style="font-size: 16px; margin: 20px; font-weight: bolder;">
                                              <i class="fa fa-money"></i>&nbsp;&nbsp;{{$promotion->nombre_promocion}}
                                          </p>
                                      </div>
                                      <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                                          <div class="panel-custom-body" style="padding: 7px;">
                                              Descripción :
                                              <h6 style="font-size: 14px;"> {{$promotion->descripcion_promocion}}</h6> Fecha :
                                              <h6 style="font-size: 14px; text-align: justify;">
                                                {{$promotion->created_at}}
                                              </h6> Descuento %:
                                              <h6 style="font-size: 14px; text-align: justify;">
                                                {{$promotion->descuento}}
                                              </h6>
                                              <h6 style="text-align: center; font-size: 18px; ">
                                                <a>Ver más</a>
                                              </h6>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading4" role="tab">
                    <p class="panel-custom-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4">
                        <i class="fa fa-map-marker"></i>
                      &nbsp;&nbsp;Búsqueda mediante ubicación
                      </a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion1Collapse4" role="tabpanel" aria-labelledby="accordion1Heading4">
                    <div class="panel-custom-body" style="padding: 0 0px 30px 0px !important;">
                        <?php
                          $latitud_servicio = -0.1806532;
                          $longitud_servicio = -78.46783820000002;
                          $radio = 500;
                        ?>
                        <div class="col-xs-12 col-sm-12 isotope-item text-center" style=" margin-bottom: 30px;">
                          <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-filter" onclick="openFilterModal(event)">
                          {{trans('publico/labels.btnFilter')}}<span></span>
                          </button>
                        </div>
                        <div class="col-xs-12 col-sm-12 isotope-item">
                          @include('reusable.searchMap', ['latitud_servicio' =>$latitud_servicio ,'longitud_servicio'=>$longitud_servicio,'radio'=>$radio]) 
                        </div>
                        <div class="row">
                          <div class="col-md-6"></div>
                          <div class="col-md-6">
                            <div class="group-buttons-3 group-md-justify">
                              <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" onclick="startAllServices()">
                                {{trans('publico/labels.lblSearchAll')}}<span></span>
                              </a>
                              <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" href="" onclick="searchServ(event,{{request()->route('idCatalogo')}},{{request()->route('idSubCatalogo')}})" id="btnSearchMap">
                                {{trans('publico/labels.lblSearchNear')}}<span></span>
                              </a>
                          </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section-xs bg-white">
          <div class="shell">
            <div class="heading-group" >
              <h4><i class="fa fa-search"></i> &nbsp;&nbsp;{{ trans('publico/labels.lblResult')}}</h4>
            </div>
            <br>
            <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
               <div id="findedFilter"></div>
               <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
          </div>
        </section>
        <div class="modal fade" id="filter" tabindex="-1" role="dialog" style="z-index: 99999; background: #00000099;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!-- <div id="testboxForm"> -->
                <div class="modal-header">
                  <h3 class="modal-title">
                    {{trans('publico/labels.btnFilter')}}
                  </h3>
                </div>
              <div class="modal-body">
                  <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                      <div class="range range-15">
                        <div class="cell-sm-12">
                          <div class="form-inline form-inline-custom">
                            <div class="form-wrap">
                              <label class="form-label-outside" for="contact-email">
                                {{trans('publico/labels.servTypes')}}
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <ul class="list-group">
                            @foreach($padresList as $item)
                            <li class="list-group-item">
                              <span class="badge" style="background-color: transparent;"><input type="checkbox" name="my-checkbox" id="{{$item->id}}" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" class="checkboxServ"></span>
                            {{$item->nombre_servicio_est}}
                            </li>
                            @endforeach 
                          </ul>
                        </div>
                      </div>
                    </form>
              </div>
              <div class="modal-footer">
                <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" style="float: right;" href="#" onclick="searchServ(event,{{request()->route('idCatalogo')}},{{request()->route('idSubCatalogo')}})">
                    Aplicar
                    <span></span>
                </a>
              </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      @endif
      <!-- Page Footer-->
      @include('site.reusable.footer')
      <!-- <script src="{{ asset('/siteStyle/js/core.min.js')}}"></script> -->
      <!-- <script src="{{ asset('/siteStyle/js/script.js')}}"></script> -->
      <!-- <script src="{{ asset('/siteStyle/sweetalert/sweetalert.js')}}"></script> -->
      <!-- <script src="{{ asset('/siteStyle/js/alertas.js')}}"></script> -->
      <!-- <script src="{{ asset('/siteStyle/js/Compartido.js')}}"></script>  -->
      <script src="{{ asset('/siteStyle/js/bootstrap-switch.js')}}"></script> 
      <!-- <script src="{{ asset('/siteStyle/js/underscore.js')}}"></script> -->
      <script type="text/javascript" src="{{ asset('/public_components/components/OwlCarousel2/owl.carousel.min.js')}}"></script>
      <style type="text/css">
        .owl-carousel{
          touch-action: manipulation;
        }
        .owl-nav, .owl-dots{
          display: none;
        }
        .owl-stage{
          padding-left: 0px !important;
        }
      </style>
      <script type="text/javascript">
        $("[name='my-checkbox']").bootstrapSwitch();
        var idRouteCatalogo = {!!request()->route('idCatalogo')!!};
        var idRouteSubCatalogo = {!!request()->route('idSubCatalogo')!!};
        function startAllServices(){
          var carouselPromotions = $('.carousel-promociones');
          carouselPromotions.owlCarousel({
                  stagePadding: 25,
                  loop:false,
                  dotsContainer:false,
                  margin:10,
                  responsive:{
                      0:{
                          items:1
                      },
                      600:{
                          items:3
                      },
                      1000:{
                          items:5
                      }
                  }
              });
          window.current_page = 1;
          carouselPromotions.on('changed.owl.carousel', function(event) {
              var items     = event.item.count;
              var item  = event.item.index;
              if (item == (items - 2)) {
                getMorePromotions("{!!asset('/getMorePromotions')!!}/{!!request()->route('idSubCatalogo')!!}",'.carousel-promociones');
              }
          });
          searchServIni(idRouteCatalogo,idRouteSubCatalogo);
        }
        startAllServices();
        function getMorePromotions(url,carouselId){
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    'page': window.current_page + 1 // you might need to init that var on top of page (= 0)
                },
                dataType: 'json',
                success: function(data) {
                    window.current_page = current_page + 1;
                    var carouselSelector = $(carouselId);
                    var imgs = [];
                    $(data.morePromotions).each(function() {
                        var its = $.trim($(this).html());
                        if (its != undefined) {
                            imgs.push(its);
                        }
                    });
                    itemsHTML = $.map(imgs, function(src) {
                        if (src) {
                            return src;
                        }
                    });
                    var items = $(itemsHTML.join(''));
                    if (items.length > 0) {
                        for (var i = 0; i < items.length; i++) {
                            if (items[i] != "") {
                                carouselSelector.owlCarousel('add', items[i]).owlCarousel('update');
                            }
                        }

                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if (errors) {
                        $.each(errors, function(i) {
                            console.log(errors[i]);
                        });
                    }
                }
            });
        }

        function goToPromotion(url){
          var win = window.open(url, '_blank');
          win.focus();
        }
      </script>
    </div>
    <!-- END PANEL-->
  </body>
</html>