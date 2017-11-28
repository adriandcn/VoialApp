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
            <div class="page-title-text">Catalogo de servicios</div>
            <p class="big text-width-medium">En esta seccion usted puede visualizar los servicios disponibles de una categoria específica</p>
          </div>
        </div>
      </section>
     
      <section class="section-xs bg-white">
        <div class="shell">
         <!--  <div class="heading-group">
            <h1><i class="fa fa-list"></i> &nbsp;&nbsp;Catalogo de Servicios</h1>
            <h6 class="text-regular">Puedes crear servicio de las categorias que se muestran a continuación:</h6>
          </div> -->
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              @if(count($findedServ) == 0)
                <div class="col-xs-12" style="text-align: center;">
                  <h4><a href="single-post.html"><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado servicios para esta categoria</a></h4>
                </div>
              @else
                @foreach($findedServ as $servicio)
                  <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                      <div class="post-masonry-content">
                        <h4><a href="single-post.html">{{$servicio->nombre_servicio}}</a></h4>
                        <p>{{$servicio->detalle_servicio}}</p>
                      </div>
                      <a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/tokenDz$rip')!!}/{{$servicio->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
 <!--          <div class="wrap-button text-center text-md-right"><a class="button button-sm button-primary" href="blog.html">Ver más recomendados<span></span></a></div> -->
        </div>
      </section>

      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>