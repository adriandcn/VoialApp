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
            <h1>{{trans('publico/labels.tittleLoaderCategoSons')}}</h1>
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
            <div class="page-title-text">{{ trans('publico/labels.titleMapSearch')}}</div>
            <p class="big text-width-medium">{{ trans('publico/labels.descriptionMapSearch')}}</p>
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li>{{ trans('publico/labels.lblPathMapSearch')}}</li>
                <li>{{ session('tendenciaData')->nombre}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <?php
        $latitud_servicio = -0.1806532;
        $longitud_servicio = -78.46783820000002;
        $radio = 0;
      ?>
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
                <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" onclick="startAllServicesTendencia(event)">
                  {{trans('publico/labels.lblSearchAll')}}<span></span>
                </a>
                <a class="button button-primary button-icon button-icon-sm button-icon-right fa-search" onclick="searchByMap(event)" id="btnSearchMap">
                  {{trans('publico/labels.lblSearchNear')}}<span></span>
                </a>
            </div>
            </div>
          </div>
          <div id="sectionResult"></div>
        </div>
      </section>

      <section class="section-xs bg-white" id="resultsMap" style="display: none;">
        <div class="shell">
          <div class="heading-group" >
            <h4><i class="fa fa-search"></i> &nbsp;&nbsp;{{ trans('publico/labels.lblResult')}} ({{ session('tendenciaData')->nombre}})</h4>
          </div>
          <br>
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
             <div id="findedFilterMap"></div>
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
      <!-- Page Footer-->
      @include('site.reusable.footer')
      <script type="text/javascript">
        // $('#btnSearchMap').click();
        function startAllServicesTendencia(event){
          searchServIniTendencias(null);
        }
        startAllServicesTendencia();
      </script>
    </div>
    <!-- END PANEL-->
  </body>
</html>