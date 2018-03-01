<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    <style type="text/css">
      #owl-demo .item{
        background: #3fbf79;
        padding: 30px 0px;
        margin: 10px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
      }
      .customNavigation{
        text-align: center;
      }
      //use styles below to disable ugly selection
      .customNavigation a{
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      }
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
      <!-- Breadcrumbs & Page title-->
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
                <li>{{ trans('publico/labels.lblPathEditEventServ')}}</li>
                <li>{{ $servicio->nombre_servicio}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
          <div class="shell shell-inset-xs-15 shell-offset-left-xlg-50">
              <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-plus" href="../addEvent">
                Añadir Evento<span></span>
              </a>
              <br>
              <br>
              <hr>
              <div class="heading-group">
                  <h5><i class="fa fa-calendar"></i>&nbsp;&nbsp;Eventos</h5>
                  <h6 class="text-regular">descripcion eventos</h6>
              </div>
              <div class="range range-50">
                @if(count($listEventos) == 0)
                  <div class="col-xs-12" style="text-align: center;">
                    <h4><a href="single-post.html"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                  </div>
                @else
                @foreach ($listEventos as $evento)
                  <div class="cell-sm-3 cell-xs-6 wow rotate-custom rotate-custom-left" data-wow-delay=".15s">
                      <a class="layouts-link" href="../addEvent/{{$evento->id}}">
                        <img class="img-shadow" src="{{asset('/siteStyle/images/catalogo_servicios/bg-home-3-1920x1000.jpg')}}" alt="" width="270" height="393"/>
                        <div class="eventCard">
                          <h6 style="margin-top: 1px;">
                            <i class="fa fa-calendar"></i>&nbsp;&nbsp;{{$evento->nombre_evento}}
                          </h6>
                          <hr>
                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Fecha: {{$evento->created_at}}</h7><br>
                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Descripción: {{str_limit($evento->descripcion_evento, $limit = 100, $end = '...')}}</h7>
                        </div>
                      </a>
                  </div>
                @endforeach
                @endif
              </div>
          </div>
      </section>
      <section class="section-xs bg-white">
          <div class="shell shell-inset-xs-15 shell-offset-left-xlg-50">
              <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-plus" href="" data-toggle="modal" data-target="#form-modal-add-evento">
                Añadir Promoción<span></span>
              </a>
              <br>
              <br>
              <hr>
              <div class="heading-group">
                  <h5><i class="fa fa-calendar"></i>&nbsp;&nbsp;Promociones</h5>
                  <h6 class="text-regular">descripcion promociones</h6>
              </div>
              <div class="range range-50">
                @if(count($listEventos) == 0)
                  <div class="col-xs-12" style="text-align: center;">
                    <h4><a href="single-post.html"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                  </div>
                @else
                @foreach ($listPromociones as $promocion)
                  <div class="cell-sm-3 cell-xs-6 wow rotate-custom rotate-custom-left" data-wow-delay=".15s">
                      <a class="layouts-link" href="home-default.html">
                        <img class="img-shadow" src="{{asset('/siteStyle/images/catalogo_servicios/bg-home-3-1920x1000.jpg')}}" alt="" width="270" height="393"/>
                        <div class="eventCard">
                          <h6 style="margin-top: 1px;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{$promocion->nombre_evento}}</h6>
                          <hr>
                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Fecha: {{$promocion->created_at}}</h7><br>
                          <h7><i class="fa fa-dot"></i>&nbsp;&nbsp;Descripción: {{str_limit($promocion->descripcion_evento, $limit = 100, $end = '...')}}</h7>
                        </div>
                      </a>
                  </div>
                @endforeach
                @endif
              </div>
          </div>
      </section>
      <!-- Page Footer-->
      @include('site.reusable.footer')
      <!-- <script type="text/javascript">
        $(document).ready(function() {
            var owl = $("#owl-demo");
            owl.owlCarousel({
                items : 10 //10 items above 1000px browser width
                itemsDesktop : [500,5], //5 items between 1000px and 901px
                itemsDesktopSmall : [900,3], // betweem 900px and 601px
                itemsTablet: [600,2], //2 items between 600 and 0
                itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
            });
            owl.trigger('owl.play',10000);
            // Custom Navigation Events
            $(".next").click(function(){
              owl.trigger('owl.next');
            })
            $(".prev").click(function(){
              owl.trigger('owl.prev');
            })           
          });
      </script> -->
    </div>
    <!-- END PANEL-->
  </body>
</html>