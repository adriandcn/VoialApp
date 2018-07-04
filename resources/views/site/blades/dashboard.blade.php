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

      <style type="text/css">
        .select2-container{
              z-index: 9999999;
        }
      </style>
      <!-- Breadcrumbs & Page title-->
      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white; padding-bottom: 0px;">
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

      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;   padding-top: 25px;">
        <div class="shell">
          <div class="range tabs-custom-wrap">
            <div class="cell-lg-10 cell-md-11">
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav-custom nav-custom-tabs">
                  <li class="active"><a href="#tabs-2-1" data-toggle="tab"><i class="fa fa-user"></i> &nbsp;&nbsp;{{ trans('back/admin.lblMyServices')}}</a><span></span></li>
                  <li><a href="#tabs-2-2" data-toggle="tab"><i class="fa fa-plus"></i> &nbsp;&nbsp;{{ trans('back/admin.lblServicesList')}}</a><span></span></li>
                  @if(Auth::user()->role_id = 2)
                    <li>
                      <a href="#tabs-2-3" data-toggle="tab">
                        <i class="fa fa-file-text"></i> &nbsp;&nbsp;{{ trans('back/admin.lblAddPost')}}
                      </a>
                      <span></span>
                    </li>
                  @endif
                </ul>
              </div>
              <div class="cell-lg-10 cell-md-11">
              <div class="tab-content text-left">
                  <div class="tab-pane fade in active" id="tabs-2-1">
                    <div class="row">
                      <div class="heading-group">
                        <h1><i class="fa fa-user"></i> &nbsp;&nbsp;{{ trans('back/admin.lblMyServices')}}</h1>
                        <h6 class="text-regular">{{ trans('back/admin.descriptionMyServices')}}</h6>
                      </div>
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
                <div class="tab-pane fade" id="tabs-2-2">
                  <div class="heading-group">
                    <h1><i class="fa fa-list"></i> &nbsp;&nbsp;{{ trans('back/admin.lblServicesList')}}</h1>
                    <h6 class="text-regular">{{ trans('back/admin.descriptionServicesList')}}</h6>
                  </div>
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
                <div class="tab-pane fade" id="tabs-2-3">
                    @if(Auth::user()->role_id = 2)
                    <div class="row">
                      <div class="heading-group">
                        <h1><i class="fa fa-list"></i> &nbsp;&nbsp;{{ trans('back/admin.lblAddPost')}}</h1>
                        <h6 class="text-regular">{{ trans('back/admin.descriptionPostList')}}</h6>
                      </div>
                      <div class="col-lg-12 text-center" style="margin-top: 30px; margin-bottom: 25px;">
                          <button class="button-primary button" style="padding: 3px 0px 3px; margin-top: 7px;" type="button" onclick="openAddPost();">
                                Añadir post<span></span>
                          </button>
                      </div>
                     @foreach ($postList as $postItem)
                        <div class="col-xs-12 col-sm-4 isotope-item">
                            <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3" style="background: url({{asset('/images/postIcon.png')}});
                                    background-size: contain;
                                    background-repeat: no-repeat;
                                    cursor: pointer;
                                    background-position: center;">
                                <div class="post-masonry-content">
                                    <h6>
                                      <a class="text-white" href="" style="color: #fff;    text-shadow: 3px -1px 2px #1b1b1b;"> 
                                        {{ strtoupper($postItem->title) }}
                                      </a>
                                    </h6>
                                </div>
                                <div style="bottom: 20px !important; position: absolute;">
                                  <button class="button-primary button" style="padding: 3px 0px 3px; margin-top: 7px;" type="button" data-toggle="modal" onclick="openEditPost(event,{!!$postItem->id!!}, {!!session('operador_id')!!});">
                                          Editar post<span></span>
                                  </button>
                                </div>
                            </div>
                        </div>
                      @endforeach
                    </div>
                    @endif
                  </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>

      <!-- <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h1><i class="fa fa-list"></i> &nbsp;&nbsp;{{ trans('back/admin.lblServicesList')}}</h1>
            <h6 class="text-regular">{{ trans('back/admin.descriptionServicesList')}}</h6>
          </div>
          <section class="section-xs bg-white">
            <div class="shell">
              <div class="panel-custom-group-wrap">
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
      </section> -->
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
  <!-- Modal Add Post-->
  <div class="modal modal-custom fade" id="form-modal-add-post" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>{{ trans('back/admin.lblAddPost')}}</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-add-post" action="addPostRedactor">
              <input type="hidden"  class="id_operator" name="id_operator" value="{!!session('operador_id')!!}">
              <div class="form-wrap">
                <label class="form-label-outside" for="nombre_servicio">
                    <i class="fa fa-font"></i>&nbsp;&nbsp;{{ trans('back/admin.ServiceId')}}
                </label>
                <input class="form-input tooltip" id="id_servicio" type="text" name="id_servicio" title="{{ trans('back/admin.altServiceId')}}" data-constraints="@Required" required>
              </div>
              <br>
              <div class="rowErrorServStep1"></div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="saveAddPost(event,'form-add-post')">
                  <div style="display: inline;" id="spinnerSavePost"><i class="fa fa-spinner fa-spin"></i></div>
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
    <script type="text/javascript">
      $('#spinnerSavePost').hide();
      function openAddPost (){
        $('#form-modal-add-post').modal().show();
      }

      function openEditPost (event,idPost,idUsuarioOperador){
        var url = 'crear-editar-post/' + idUsuarioOperador + '/' + idPost;
        window.location.href = dirServer + 'public/' + url;
      }

      function saveAddPost(){
        $("#spinnerSavePost").show();
        var $form = $('#form-add-post'),
        data = $form.serialize(),
        url = $form.attr("action");
        var posting = $.post(url, { formData: data });
        posting.done(function(data) {
            if (!data.success) {
                showAlert('Error!', 'El servicio no existe ', null, 'warning', 'danger');
                $("#spinnerSavePost").hide();
                $('#form-modal-add-post').modal().hide();
            };
            if (data.success) {
                $("#spinnerSaveTrip").hide();
                window.location.href = dirServer + 'public/' + data.redirectto;
            } //success
        });
      }

    </script>
      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>