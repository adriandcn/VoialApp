<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
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
      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;">
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
                            <div class="col-sm-6" style="    margin-bottom: 10px;">
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
                  <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3" style="background: url(images/fullsize/{{$servicio->filename}});
                          background-size: contain;
                          background-repeat: no-repeat;
                          cursor: pointer;
                          background-position: center;">
                      <div class="post-masonry-content">
                          <h4>
                            <a class="text-white" href="" > 
                              {{ strtoupper($servicio->nombre_servicio) }}
                            </a>
                          </h4>
                      </div>
                      <div style="bottom: 20px !important; position: absolute;">
                        <button class="button-primary button" style="padding: 3px 0px 3px; margin-top: 7px;" type="button" data-toggle="modal" onclick="AjaxListadoPosts(event,{!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});">
                                Escribir post<span></span>
                        </button>
                        <button class="button-primary button" style="padding: 3px 0px 3px; margin-top: 7px;" type="button" data-toggle="modal" onclick="AjaxContainerEdicionServicios(event,{!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});">
                                Editar<span></span>
                        </button>
                        @if(Auth::user()->role_id < 3)
                        <button class="button-primary button" style="padding: 3px 0px 3px; margin-top: 7px;" type="button" data-toggle="modal" data-target="#form-modal-copy-serv" onclick="setIdServicioTocopy({!! $servicio->id !!})">
                                Asignar a usuario<span></span>
                        </button>
                        @endif
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @if ($listServiciosAll->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($listServiciosAll->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $listServiciosAll->url(1) }}">Atras</a>
                    </li>
                    @for ($i = 1; $i <= $listServiciosAll->lastPage(); $i++)
                        <li class="{{ ($listServiciosAll->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $listServiciosAll->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($listServiciosAll->currentPage() == $listServiciosAll->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $listServiciosAll->url($listServiciosAll->currentPage()+1) }}" >Siguiente</a>
                    </li>
                </ul>
              @endif
            </div>
          </div>
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

<!-- Modal Copy -->
  <div class="modal modal-custom fade" id="form-modal-copy-serv" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>Ingresar el correo del usuario a mover</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-add-trip" action="servicios/moveSer">
              <div class="form-wrap">
                <label class="form-label-outside" for="email_copyServ"><i class="fa fa-font"></i>&nbsp;&nbsp;Email</label>
                <input class="form-input tooltip" id="email_copyServ" type="text" name="email_copyServ" title="Ingrese un correo" data-constraints="@Required">
              </div>
              <br>
              <div class="rowErrorServStep1"></div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="moveServTouser(event)">
                  <div style="display: inline;" id="spinnerMoveServ"><i class="fa fa-spinner fa-spin"></i></div>
                  Mover<span></span>
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