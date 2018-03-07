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
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Servicios</title>
    @include('site.reusable.head')
  </head>
   <body>
    <div class="text-center text-sm-left page">
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
      @include('site.reusable.header')
      <section class="page-title breadcrumbs-elements page-title-inset-1">
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
                <li><a href="{{asset('/')}}catalogoServ/{{$dataCatalogo->id_catalogo_servicios}}">{{$dataCatalogo->nombre_servicio}}</a></li>
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
                $radio = 100;
              ?>
              <div class="col-xs-12 col-sm-12 isotope-item">
                @include('reusable.searchMap', ['latitud_servicio' =>$latitud_servicio ,'longitud_servicio'=>$longitud_servicio,'radio'=>$radio]) 
              </div>
              <div class="col-xs-12 col-sm-12 isotope-item text-right">
                <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" href="" onclick="searchServ(event,{{request()->route('idCatalogo')}},{{request()->route('idSubCatalogo')}})" id="btnSearchMap">
                  {{trans('publico/labels.lblSearch')}}<span></span>
                </a>
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
      <script src="{{ asset('/siteStyle/js/core.min.js')}}"></script>
      <script src="{{ asset('/siteStyle/js/script.js')}}"></script>
      <script src="{{ asset('/siteStyle/sweetalert/sweetalert.js')}}"></script>
      <script src="{{ asset('/siteStyle/js/alertas.js')}}"></script>
      <script src="{{ asset('/siteStyle/js/Compartido.js')}}"></script> 
      <script src="{{ asset('/siteStyle/js/bootstrap-switch.js')}}"></script> 
      <script src="{{ asset('/siteStyle/js/underscore.js')}}"></script>
      <script type="text/javascript">
        $("[name='my-checkbox']").bootstrapSwitch();
        var idRouteCatalogo = {!!request()->route('idCatalogo')!!};
        var idRouteSubCatalogo = {!!request()->route('idSubCatalogo')!!};
        searchServIni(idRouteCatalogo,idRouteSubCatalogo);
      </script>
      @include('site.reusable.footer')
    </div>
  </body>
</html>