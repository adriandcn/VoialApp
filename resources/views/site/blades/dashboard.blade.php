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
            <h1>{{ trans('back/admin.tittlePage')}}</h1>
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
            <div class="page-title-text">{{ trans('back/admin.saludo')}}, {!!session('user_name')!!}</div>
            <p class="big text-width-medium">{{ trans('back/admin.dashboardDescription')}}</p>
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li>{{ trans('publico/labels.lblPathMyServices')}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Tabs & Accordions-->

     
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h1><i class="fa fa-user"></i> &nbsp;&nbsp;{{ trans('back/admin.lblMyServices')}}</h1>
            <h6 class="text-regular">{{ trans('back/admin.descriptionMyServices')}}</h6>
          </div>
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @foreach ($listServiciosAll as $servicio)
              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3" style="background: url(images/icon/{{$servicio->filename}});
                          background-size: cover;
                          background-repeat: no-repeat;">
                      <div class="post-masonry-content">
                          <h4>
                            <a class="text-white" href="" onclick="AjaxContainerEdicionServicios(event,{!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"> 
                              {{ $servicio->nombre_servicio }}
                            </a>
                          </h4>
                          <div style="overflow-x: hidden;">
                          {{str_limit($servicio->detalle_servicio, $limit = 500, $end = '...')}}
                          </div>
                      </div>
                      <a class="link-position link-primary-sec-2 link-right post-link" href="" onclick="AjaxContainerEdicionServicios(event,{!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"><i class="fa fa-edit" style="color: white"></i></a>
                  </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
      
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h1><i class="fa fa-list"></i> &nbsp;&nbsp;{{ trans('back/admin.lblServicesList')}}</h1>
            <h6 class="text-regular">{{ trans('back/admin.descriptionServicesList')}}</h6>
          </div>
          <section class="section-xs bg-white">
            <div class="shell">
              <div class="panel-custom-group-wrap">
                <!-- Bootstrap collapse-->
                <div class="panel-custom-group text-left" id="accordion1" role="tablist">
                  @foreach($catalogoServicios as $servicio)
                  <!-- Bootstrap panel-->
                  <div class="panel panel-custom panel-custom-default">
                    <div class="panel-custom-heading" id="accordion1Heading{{$servicio->id_catalogo_servicios}}" role="tab">
                      <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse{{$servicio->id_catalogo_servicios}}" aria-controls="accordion1Collapse{{$servicio->id_catalogo_servicios}}"><strong>{{$servicio->nombre_servicio}} ({{count($servicio->children)}})</strong></a>
                      </p>
                    </div>
                    <div class="panel-custom-collapse collapse" id="accordion1Collapse{{$servicio->id_catalogo_servicios}}" role="tabpanel" aria-labelledby="accordion1Heading{{$servicio->id_catalogo_servicios}}">
                      <div class="panel-custom-body">
                          <div class="row">
                            @if($servicio->showMesage == true)
                            <div class="col-md-12" style="margin-bottom: 20px;">
                              <div class="alert alert-info" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                {{$servicio->mensaje}}
                              </div>
                            </div>
                            @endif
                            @foreach($servicio->children as $servChild)
                            <div class="col-sm-4" style="    margin-bottom: 10px;">
                              <button class="button-primary button" type="button" onclick="setIdCatalogo('{{$servChild->id_catalogo_servicios}}')" data-toggle="modal" data-target="#form-modal-add-trip">
                                {{$servChild->nombre_servicio}}<span></span>
                              </button>
                            </div>
                            @endforeach
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>
<!-- Modal Add -->
  <div class="modal modal-custom fade" id="form-modal-add-trip" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>{{ trans('back/admin.lblAddService')}}</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-add-trip" action="servicios/serviciosoperadormini1">
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="">
              <div class="form-wrap">
                <label class="form-label-outside" for="nombre_servicio"><i class="fa fa-font"></i>&nbsp;&nbsp;{{ trans('back/admin.lblNameServ')}}</label>
                <input class="form-input tooltip" id="nombre_servicio" type="text" name="nombre_servicio" title="{{ trans('back/admin.altNombre')}}" data-constraints="@Required">
              </div>
              <div class="form-wrap">
                <label class="form-label-outside" for="register-password-4"><i class="fa fa-list"></i>&nbsp;&nbsp;{{ trans('back/admin.lblDescriptionServ')}}</label>
               <textarea class="form-input tooltip" rows="5" name="detalle_servicio" id="detalle_servicio" data-constraints="@Required" title="{{ trans('back/admin.altDescription')}}"></textarea>
              </div>
              <br>
              <div class="rowErrorServStep1"></div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="AjaxContainerRegistroWithLoad1(event,'form-add-trip','trip')">
                  <div style="display: inline;" id="spinnerSaveTrip"><i class="fa fa-spinner fa-spin"></i></div>
                  {{trans('back/admin.btnSiguiente')}}<span></span>
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