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
          <div class="heading-group">
            <h1><i class="fa fa-user"></i> &nbsp;&nbsp;Tus Servicios creados</h1>
            <h6 class="text-regular">En esta sección se mostrarán los servicios que vayas creando.</h6>
          </div>
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @foreach ($listServiciosAll as $servicio)
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
              @endforeach
            </div>
          </div>
        </div>
      </section>
      
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h1><i class="fa fa-list"></i> &nbsp;&nbsp;Catalogo de Servicios</h1>
            <h6 class="text-regular">Puedes crear servicio de las categorias que se muestran a continuación:</h6>
          </div>
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @foreach($catalogoServicios as $servicio)
                <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                    <div class="post-masonry-content">
                      <h4><a href="single-post.html">{{$servicio->nombre_servicio}}</a></h4>
                    </div><a class="link-position link-primary-sec-2 link-right post-link" onclick="setIdCatalogo('{{$servicio->id_catalogo_servicios}}')" href="#" data-toggle="modal" data-target="#form-modal-add-trip"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
 <!--          <div class="wrap-button text-center text-md-right"><a class="button button-sm button-primary" href="blog.html">Ver más recomendados<span></span></a></div> -->
        </div>
      </section>
<!-- Modal Add -->
  <div class="modal modal-custom fade" id="form-modal-add-trip" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>Añadir Servicio</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-add-trip" action="servicios/serviciosoperadormini1">
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="">
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