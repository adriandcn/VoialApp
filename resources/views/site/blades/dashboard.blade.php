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

      <!-- Tabs & Accordions-->

      <section class="section-xs bg-white">
        <div class="shell">
          <div class="range tabs-custom-wrap">
            <div class="cell-lg-10 cell-md-11">
              <h4>Menú principal</h4>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav-custom nav-custom-tabs">
                  <li class="active"><a href="#tabs-1-1" data-toggle="tab"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a><span></span></li>
                  <li><a href="#tabs-1-2" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Mi información</a><span></span></li>
                </ul>
              </div><br>
              <hr>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1-1">
                  <?php  
                      foreach($controlDashboard as $cd){
                          if($cd->catalogo_servicio == 1){
                              $cantidadResturant = $cd->cantidad;
                          }
                          if($cd->catalogo_servicio == 2){
                              $cantidadHotel = $cd->cantidad;
                          }
                          if($cd->catalogo_servicio == 3){
                              $cantidadTrip = $cd->cantidad;
                          }
                      }

                      $cantidadResturant; $cantidadHotel; $cantidadTrip;

                      $counts = array_count_values(array_column($listServiciosAll, 'id_catalogo_servicios'));
                      //print_r()
                      if(empty($counts[2])){
                          $hotel = 0; 
                          $cantidadHotel = 0;
                          $faltaHotel = $cantidadHotel - $hotel;
                          $faltaHotel1 = 0;
                          $arrayHotel = array();
                          $hotel1 = 0;
                      }else{
                        $hotel = $counts[2];
                        $faltaHotel = $cantidadHotel - $hotel;
                        $arrayHotel = array();
                        for($i = 0; $i <  $faltaHotel; $i++){
                            $arrayHotel[] = 0;
                        }
                      }

                      if(empty($counts[1])){
                        $restaurant = 0; 
                        $cantidadResturant = 0;
                        $faltaRest = $cantidadResturant - $restaurant;
                        $faltaRest1 = 0;
                        $arrayRest = array();
                        $restaurant1 = 0;
                      }else{
                         $restaurant = $counts[1];
                         $faltaRest = $cantidadResturant - $restaurant;
                        $arrayRest = array();
                        for($i = 0; $i <  $faltaRest;$i++){
                            $arrayRest[] = 0;
                        }
                      }

                      if(empty($counts[3])){
                          $trip = 0;
                          $cantidadTrip = 0;
                          $faltaTrip = $cantidadTrip - $trip;
                          $faltaTrip1 = 0;
                          $arrayTrip = array();
                          $trip1 = 0;
                      }else{
                        $trip = $counts[3];
                        $faltaTrip = $cantidadTrip - $trip;
                        $arrayTrip = array();
                        for($i = 0; $i <  $faltaTrip;$i++){
                            $arrayTrip[] = 0;
                        }
                      }
                     ?> 

                    @if (empty($listServiciosUnicos)) @endif
                    <?php $counter = 0; ?>
                        @foreach ($listServiciosUnicos as $servicios)
                        <?php $counter = $counter + 1; ?>
                            {!! Form::open(['url' => route('upload-postDetalleOperador'), 'id'=>$servicios->id_catalogo_servicios]) !!} @foreach ($listServiciosAll as $servicio) @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios) @if($servicio->nombre_servicio=="") @else @if($servicios->id_catalogo_servicios == 1) @if($restaurant == $restaurant)
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3">
                                    <div class="post-masonry-content">
                                        <h4>
                                          <a class="text-white" href=""> 
                                            {{ $servicio->nombre_servicio }}
                                          </a>
                                        </h4>
                                    </div>
                                    <a class="link-position link-primary-sec-2 link-right post-link" href="" onclick="AjaxContainerEdicionServicios({!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"><i class="fa fa-edit" style="color: white"></i></a>
                                </div>
                            </div>
                            @endif @endif @if($servicios->id_catalogo_servicios == 2) @if($hotel == $hotel)
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3">
                                    <div class="post-masonry-content">
                                        <h5>
                                          <a class="text-white" href=""> 
                                            {{ $servicio->nombre_servicio }}
                                          </a>
                                      </h5>
                                    </div>
                                    <a class="link-position link-primary-sec-2 link-right post-link" href="" onclick="AjaxContainerEdicionServicios({!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"><i class="fa fa-edit" style="color: white"></i></a>
                                </div>
                            </div>
                            @endif @endif @if($servicios->id_catalogo_servicios == 3) @if($trip == $trip)
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3">
                                    <div class="post-masonry-content">
                                        <h5>
                                          <a class="text-white" href=""> 
                                              {{ $servicio->nombre_servicio }}
                                          </a>
                                        </h5> 
                                    </div>
                                     <a class="link-position link-primary-sec-2 link-right post-link" href="" onclick="AjaxContainerEdicionServicios({!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"><i class="fa fa-edit" style="color: white"></i></a>
                                </div>
                            </div>
                            @endif @endif @endif @endif @endforeach {!! Form::close() !!} @endforeach @if(isset($hotel1))
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                              <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                                <div class="post-masonry-content">
                                  <h4><a href="single-post.html">{{trans('front/responsive.alojamiento')}}</a></h4>
                                </div><a class="link-position link-primary-sec-2 link-right post-link" href="#" data-toggle="modal" data-target="#form-modal-add-hotel"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                              </div>
                            </div>
                            @endif @if(isset($restaurant1))
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                              <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                                <div class="post-masonry-content">
                                  <h4><a href="single-post.html">{{trans('front/responsive.restaurant')}}</a></h4>
                                </div><a class="link-position link-primary-sec-2 link-right post-link" href="#" data-toggle="modal" data-target="#form-modal-add-restaurant"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                              </div>
                            </div>
                            @endif @if(isset($trip1))
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                              <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                                <div class="post-masonry-content">
                                  <h4><a href="single-post.html">{{trans('front/responsive.trip')}}</a></h4>
                                </div><a class="link-position link-primary-sec-2 link-right post-link" href="#" data-toggle="modal" data-target="#form-modal-add-trip"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                              </div>
                            </div>
                            @endif @if(count($arrayHotel)>0 || count($arrayRest)>0 || count($arrayTrip)>0)
                            <div id="account-dashboard" class="tab-content in active">
                                <div class="row view-account-information same-height add-clearfix">
                                    <hr class="color-light1" style="width:100%;">
                                    <div class="col-md-12 box">
                                        <h3 class="section-title" style="display:inline-table;">Servicios por Crear</h3>
                                        <h4 class="section-title" style="display:inline-table;padding-left: 10%;"> <strong>Alojamiento:</strong> <?php echo count($arrayHotel);?></h4>
                                        <h4 class="section-title" style="display:inline-table;padding-left: 10%;"> <strong>Resturant:</strong> <?php echo count($arrayRest);?></h4>
                                        <h4 class="section-title" style="display:inline-table;padding-left: 10%;"> <strong>Trip:</strong> <?php echo count($arrayTrip);?></h4>
                                    </div>
                                </div>
                            </div>
                            @endif @foreach ($arrayRest as $faltanRestaurant)
                            <div class="col-md-6 box" style="height:150% !important;margin-bottom: 5% !important;">
                                <div style="border: 2px solid #F0AD4E;width: 100%;">
                                    <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                      background-color:#F0AD4E;"> </div>
                                    <div style="margin-bottom: 5% !important;">

                                        <div style="width:20%;text-align: center;display: inline-table;">
                                            <i class="fa fa-cutlery fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                        </div>
                                        <div style="width:70%; display: inline-table;">

                                            <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                              {{trans('front/responsive.restaurant')}} 
                                            </h4>
                                        </div>
                                        <div style="width:100%;margin-top: 5%;">
                                            <a href="#" data-toggle="modal" data-target="#restaurant" class="btn btn-sm style4" style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                                <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                                <strong>{{trans('front/responsive.crear')}}</strong>
                                            </a>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach @foreach ($arrayHotel as $faltanHoteles)
                            <div class="col-md-6 box" style="height:150% !important;">
                                <div style="border: 2px solid #337AB7;width: 100%;">
                                    <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                    background-color:#337AB7;"> 
                                    </div>
                                    <div style="margin-bottom: 5% !important;">

                                        <div style="width:20%;text-align: center;display: inline-table;">
                                            <i class="fa fa-bed fa-5x" aria-hidden="true" style="padding:15%;"></i>
                                        </div>
                                        <div style="width:60%; display: inline-table;">
                                            <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                              {{trans('front/responsive.alojamiento')}} 
                                            </h4>
                                        </div>
                                        <div style="width:100%;margin-top: 5%;">
                                            <a href="#" data-toggle="modal" data-target="#hotel" class="btn btn-sm style4" style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                                <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                                <strong>{{trans('front/responsive.crear')}}</strong>
                                            </a>
                                            <br>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach @foreach ($arrayTrip as $faltanTrips)
                            <div class="col-md-6 box" style="height:150% !important;margin-bottom: 5% !important;">
                                <div style="border: 2px solid #D9534F;width: 100%;">
                                    <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
background-color:#D9534F;"> </div>
                                    <div style="margin-bottom: 5% !important;">

                                        <div style="width:20%;text-align: center;display: inline-table;">
                                            <i class="fa fa-map-signs fa-5x" aria-hidden="true" style="padding:15%;"></i>
                                        </div>
                                        <div style="width:60%; display: inline-table;">

                                            <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
{{trans('front/responsive.trip')}} </h4>
                                        </div>
                                        <div style="width:100%;margin-top: 5%;">
                                            <a href="#" data-toggle="modal" data-target="#trip" class="btn btn-sm style4" style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                                <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                                <strong>{{trans('front/responsive.crear')}}</strong>
                                            </a>
                                            <br>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                </div>
                <div class="tab-pane fade" id="tabs-1-2">
                  <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly.</p>
                  <p>You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<!-- Modal Restauran -->
  <div class="modal modal-custom fade" id="form-modal-add-restaurant" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>Añadir Restaurant</h5>
            <hr>
          </div>
          <div class="modal-body" id="body-restaurant">
            <form class="rd-mailform" id="form-add-restaurant" action="servicios/serviciosoperadormini1">
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="1">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="1">
              <div class="form-wrap">
                <label class="form-label-outside" for="nombre_servicio"><i class="fa fa-font"></i>&nbsp;&nbsp;Nombre</label>
                <input class="form-input" id="nombre_servicio" type="text" name="nombre_servicio" data-constraints="@Required">
              </div>
              <div class="form-wrap">
                <label class="form-label-outside" for="register-password-4"><i class="fa fa-list"></i>&nbsp;&nbsp;Detalle</label>
                <input class="form-input" id="detalle_servicio" type="text" name="detalle_servicio" data-constraints="@Required">
              </div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="AjaxContainerRegistroWithLoad1('form-add-restaurant','restaurant')">
                  <div style="display: inline;" id="spinnerSave"><i class="fa fa-spinner fa-spin"></i></div>
                  {{trans('front/responsive.siguiente')}}<span></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<!-- Modal hotel -->
  <div class="modal modal-custom fade" id="form-modal-add-hotel" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="    width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>Añadir Alojamiento</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-add-hotel" action="servicios/serviciosoperadormini1">
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="2">
              <div class="form-wrap">
                <label class="form-label-outside" for="nombre_servicio">
                  <i class="fa fa-font"></i>&nbsp;&nbsp;Nombre
                </label>
                <input class="form-input" id="nombre_servicio" type="text" name="nombre_servicio" data-constraints="@Required">
              </div>
              <div class="form-wrap">
                <label class="form-label-outside" for="register-password-4">
                  <i class="fa fa-list"></i>&nbsp;&nbsp;Detalle
                </label>
                <input class="form-input" id="detalle_servicio" type="text" name="detalle_servicio" data-constraints="@Required">
              </div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="AjaxContainerRegistroWithLoad1('form-add-hotel','hotel')">
                  <div style="display: inline;" id="spinnerSaveHotel"><i class="fa fa-spinner fa-spin"></i></div>
                  {{trans('front/responsive.siguiente')}}<span></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Modal Trip -->
  <div class="modal modal-custom fade" id="form-modal-add-trip" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="    width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>Añadir Trip</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-add-trip" action="servicios/serviciosoperadormini1">
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="3">
              <div class="form-wrap">
                <label class="form-label-outside" for="nombre_servicio"><i class="fa fa-font"></i>&nbsp;&nbsp;Nombre</label>
                <input class="form-input" id="nombre_servicio" type="text" name="nombre_servicio" data-constraints="@Required">
              </div>
              <div class="form-wrap">
                <label class="form-label-outside" for="register-password-4"><i class="fa fa-list"></i>&nbsp;&nbsp;Detalle</label>
                <input class="form-input" id="detalle_servicio" type="text" name="detalle_servicio" data-constraints="@Required">
              </div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="AjaxContainerRegistroWithLoad1('form-add-trip','trip')">
                  <div style="display: inline;" id="spinnerSaveTrip"><i class="fa fa-spinner fa-spin"></i></div>
                  {{trans('front/responsive.siguiente')}}<span></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>