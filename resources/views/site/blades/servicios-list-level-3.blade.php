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
            <h1>Voilapp</h1>
          </div>
        </div>
      </div>
      @include('site.reusable.header')
      <section class="page-title breadcrumbs-elements page-title-inset-1">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">{{trans('publico/labels.catalogoServTitle')}}</div>
            <p class="big text-width-medium">{{trans('publico/labels.catalogoServDescription')}}</p>
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
                          <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-filter" data-toggle="modal" data-target="#filter">{{trans('publico/labels.btnFilter')}}<span></span></button>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white" id="initialRows">
        <div class="shell">
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @if(count($findedServ) == 0)
                <div class="col-xs-12" style="text-align: center;">
                  <h4><a href="single-post.html"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                </div>
              @else
                @foreach($findedServ as $servicio)
                  <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4" style="background: url('{!!asset('/images/icon/')!!}/{{$servicio->filename}}');
                          background-size: cover;
                          background-repeat: no-repeat;
                          min-height: 200px;">
                      <div class="post-masonry-content">
                        <h4><a href="{!!asset('/tokenDz$rip')!!}/{{$servicio->id}}">{{$servicio->nombre_servicio}}</a></h4>
                        <div style="overflow-x: hidden;">
                          {{str_limit($servicio->detalle_servicio, $limit = 500, $end = '...')}}
                        </div>
                      </div>
                      <a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/tokenDz$rip')!!}/{{$servicio->id}}"><i class="fa fa-info-circle" aria-hidden="true" style="color: #2f6890;"></i>
                      </a>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <div class="shell">
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

      <div class="modal modal-custom fade" id="filter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 80%;">
          <div class="modal-content">
            <div id="testboxForm">
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
                            <span class="badge" style="background-color: transparent;"><input type="checkbox" name="my-checkbox" id="{{$item->id_catalogo_servicios}}" data-size="mini" data-on-color="success" data-on-text="Si" data-off-text="No" class="checkboxServ"></span>
                          {{$item->nombre_servicio}}
                          </li>
                          @endforeach 
                        </ul>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" style="float: right;" href="#" onclick="searchServ({{request()->route('idCatalogo')}},{{request()->route('idSubCatalogo')}})">
                  Aplicar
                  <span></span>
              </a>
            </div>
            </div>
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
      </script>
      <!-- @include('site.reusable.footer') -->
    </div>
  </body>
</html>