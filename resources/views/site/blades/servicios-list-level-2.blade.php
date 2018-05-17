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
      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: url('{{asset('/images/Fondos')}}/{{$dataCatalogo->image}}');background-position: center; background-size: cover;">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">{{$dataCatalogo->nombre_servicio}}</div>
            <p class="big text-width-medium">{{$dataCatalogo->descripcion}}</p>
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li>{{$dataCatalogo->nombre_servicio}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
     @if (count($tendenciasList) > 0)
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h4><i class="fa fa-star"></i> &nbsp;&nbsp;{{ trans('publico/labels.lblTendencias')}}</h4>
          </div>
          <br>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="isotope-filters isotope-filters-horizontal tabs-custom tabs-horizontal">
                  <ul class="nav-custom nav-custom-tabs">                
                    @foreach($tendenciasList as $tendencia)
                      <li>
                        <a href="#" onclick="sendSearchTendencias(event,'{{$tendencia->idtendencias}}')">{{$tendencia->nombre}}
                        </a>
                        <span></span>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
          </div>
        </div>
      </section>
      @endif
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h4><i class="fa fa-search"></i> &nbsp;&nbsp;Resultados</h4>
          </div>
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @if(count($exceptCatalogolist) == 0)
                <div class="col-xs-12" style="text-align: center;">
                  <h4>
                    <a href="">
                      <i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}
                    </a>
                  </h4>
                </div>
              @else
                @foreach($exceptCatalogolist as $servicio)
                  <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image" style="background: url('{!!asset('/images/Fondos/')!!}/{{$servicio->image}}')!important;
                        background-size: cover !important;
                        background-position: center center !important;
                        background-repeat: no-repeat !important;">
                      <div class="post-masonry-content">
                        <h4><a href="{!!asset('/catalogo-de-servicios')!!}/{{$idCatalogo}}/{{$servicio->id_catalogo_servicios}}">{{strtoupper($servicio->nombre_servicio)}}</a></h4>
                      </div>
                      <a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/catalogo-de-servicios')!!}/{{$idCatalogo}}/{{$servicio->id_catalogo_servicios}}"><i class="fa fa-info-circle" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </section>

      <section class="section-xs bg-white" id="resultsMoreCatalogos">
        <div class="shell">
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @if(count($catalogoServiciosExtra) == 0)
                <div class="col-xs-12" style="text-align: center;">
                  <h4>
                    <a href="">
                      <i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}
                    </a>
                  </h4>
                </div>
              @else
                @foreach($catalogoServiciosExtra as $servicioextre)
                  <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image" style="background: url('{!!asset('/images/Fondos/')!!}/{{$servicioextre->image}}')!important;
                        background-size: cover !important;
                        background-position: center center !important;
                        background-repeat: no-repeat !important;">
                      <div class="post-masonry-content">
                        <h4><a href="{!!asset('/catalogo-de-servicios')!!}/{{$idCatalogo}}/{{$servicioextre->id_catalogo_servicios}}">{{strtoupper($servicioextre->nombre_servicio)}}</a></h4>
                      </div>
                      <a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/catalogo-de-servicios')!!}/{{$idCatalogo}}/{{$servicioextre->id_catalogo_servicios}}"><i class="fa fa-info-circle" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </section>

                <section>
                  <div class="row">
                    <div class="col-xs-12" style="text-align: center;">
            <h4>
              <a href="" onclick="showMoreCatalogos(event,{{$idCatalogo}})">
                <i class="fa fa-plus"></i> &nbsp;&nbsp;{{trans('publico/labels.showMore')}}
              </a>
            </h4>
          </div>
                  </div>
                </section>
<br>
      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>