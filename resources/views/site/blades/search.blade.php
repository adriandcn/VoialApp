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
            @if($despliegue != null)
            <p class="big text-width-medium">Se han encontrato <strong style="color: #c26933">{{$despliegue->total()}}</strong>
              @if($despliegue->total() == 1)
                resultado
              @else
                resultados
              @endif
               para : <strong style="color: #c26933">{{ app('request')->input('s') }}</strong>
             </p>
             @else
              <p class="big text-width-medium">No se han encontrato resultados
               para : <strong style="color: #c26933">{{ app('request')->input('s') }}</strong>
              </p>
             @endif
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-md-12">
              <div class="range range-60">
                <div class="cell-xs-12">
                  <h6>Búsqueda</h6>
                  <!-- <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php"> -->
                    <div class="range range-15">
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email">Criterio de busqueda</label>
                            <input class="form-input" id="txtQuery" type="text" name="txtQuery" value="{{app('request')->input('s')}}" >
                          </div>
                          <!-- <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-filter" data-toggle="modal" data-target="#filter">Aplicar filtros<span></span></button> -->
                          <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" onclick="sendSearch($('#txtQuery').val())">Buscar<span></span></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <br>
                      <hr>
                      <i class="fa fa-list"></i>&nbsp;&nbsp; Resultados
                      <br>
                      <br>
                    </div>
                    @if(count($despliegue) > 0 || $despliegue != null)
                          @foreach ($despliegue as $serv)
                             <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                              <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                                <div class="post-masonry-content">
                                  <h4><a href="{!!asset('/tokenDz$rip')!!}/{{$serv->id}}">{{$serv->nombre_servicio}}</a></h4>
                                  <div>
                                    {{str_limit($serv->detalle_servicio, $limit = 500, $end = '...')}}
                                  </div>
                                </div><a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/tokenDz$rip')!!}/{{$serv->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              </div>
                            </div>   
                          @endforeach
                      @else
                       <div class="col-xs-12" style="text-align: center;">
                        <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado resultados</a></h4>
                      </div>
                      @endif
                  <!-- </form> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="modal modal-custom fade" id="filter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 80%;">
          <div class="modal-content">
            <div id="testboxForm">
              <div class="modal-header">
              <h3 class="modal-title">
                Aplicar filtros
              </h3>
              </div>
            <div class="modal-body">
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="range range-15">
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email">Criterio de busqueda</label>
                            <input class="form-input" id="txtQuery" type="text" name="txtQuery" value="{{app('request')->input('s')}}" >
                          </div>
                        </div>
                      </div>
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email">
                              Tipos de establecimientos
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" style="float: right;" href="#" onclick="sendSearch($('#txtQueryModal').val())">
                  Buscar
                  <span></span>
              </a>
            </div>
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