<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Home default</title>
    @include('site.reusable.head')

   <!--  <script>
      $(document).ready(function() {
        new jBox('Tooltip', {
          attach: '.tooltip',
          // content: 'You can move your mouse here<br>and interact with this tooltip',
          closeOnMouseleave: true,
          closeButton: true
          // position:{x: 'right', y: 'center'}
        });
      });
    </script> -->
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="{{asset('/siteStyle/images/ie8-panel/warning_bar_0000_us.jpg')}}" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
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
      <!-- Swiper-->
      <section>
        <div class="swiper-container swiper-var-1 swiper-slider text-left" data-loop="false" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
          <div class="swiper-wrapper">
            <div class="swiper-slide" data-slide-bg="{{asset('/siteStyle/images/Catedral_metropolitana_Quito.jpg')}}">
              <div class="swiper-slide-caption">
                <div class="shell">
                  <div class="range">
                    <div class="cell-lg-6 cell-md-7 cell-sm-8" data-caption-animate="fadeInUp" data-caption-delay="100">
                      <div class="swiper__overlay swiper-overlay-end box-skew box-skew-var-2"><span class="box-skew__item"></span>
                        <div class="swiper-overlay-item-1">
                          <h1>Bienvenido a Voilapp.city</h1>
                          <h6>Somos una guia de todos los clientes que se puedan dar en la ciudad para poder agradar a los clientes</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- Swiper Pagination-->
          <div class="swiper-pagination"></div>
          <!-- Swiper Navigation-->
          <div class="swiper-button-prev fa-arrow-left"></div>
          <div class="swiper-button-next fa-arrow-right"></div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="heading-group">
            <h1>Sponsor 1</h1>
            <h6 class="text-regular">Pagados primer mes</h6>
          </div>
          <div class="isotope grid-masonry text-left column-offset-30" data-isotope-layout="masonry">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                <div class="post-masonry post-masonry-long post-content-dark bg-post-1 bg-image box-skew post-skew-right-bottom post-skew-var-1">
                  <div class="post-masonry-content">
                    <h4><a href="single-post.html">Cliente 1 <span class='text-regular'> Categoria A – <span class='text-primary'> Nombre Local </span></span></a></h4>
                    <time datetime="2017-08-20">August 20, 2017</time>
                  </div><a class="link-position link-dark link-right post-link" href="single-post.html">+</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                <div class="post-masonry post-masonry-short post-content-white bg-post-primary box-skew post-skew-left-top post-skew-var-2">
                  <div class="post-masonry-content">
                    <h4><a href="single-post.html">Cliente 2</a></h4>
                    <time datetime="2017-08-20">August 20, 2017</time>
                  </div><a class="link-position link-dark link-right post-link" href="single-post.html">+</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                <div class="post-masonry post-masonry-short post-content-white bg-post-primary-sec box-skew post-skew-right-bottom post-skew-var-3">
                  <div class="post-masonry-content">
                    <h4><a href="single-post.html">Cliente 3</a></h4>
                    <time datetime="2017-08-20">August 20, 2017</time>
                  </div><a class="link-position link-primary-sec-2 link-right post-link" href="single-post.html">+</a>
                </div>
              </div>
              <!-- @foreach ($operadores as $operador)
              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
                  <div class="post-masonry-content">
                    <h4><a href="#">{{$operador->nombre_empresa_operador}}</a></h4>
                   <strong>Nombre: {{$operador->nombre_contacto_operador_1}}</strong> <br>
                   <strong>Teléfono: {{$operador->telf_contacto_operador_1}}</strong><br> 
                   <strong>Email: {{$operador->email_contacto_operador}}</strong> <br>
                   <strong>Dirección: {{$operador->direccion_empresa_operador}}</strong> 
                  </div>
                  <a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/servicesOf')!!}/{{$operador->id_usuario_op}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                </div>
              </div>
              @endforeach -->
            </div>
          </div>
          <div class="wrap-button text-center text-md-right"><a class="button button-sm button-primary" href="blog.html">Ver más recomendados<span></span></a></div>
        </div>
      </section>
    @foreach ($serviciosList as $servicio)
    <section>
        <div class="parallax-container">
          <div class="material-parallax parallax">
            <img src="{{asset('/siteStyle/images/catalogo_servicios/bg-home-3-1920x1000.jpg')}}" alt="" width="1920" height="1000"/>
          </div>
          <div class="parallax-content section-lg context-dark">
            <div class="shell">
              <div class="range range-30">
                <div class="cell-sm-3 cell-xs-6">
                  <div class="box-counter box-counter-inset">
                    <a href="" onclick="getSubcatCatalogServicios('{{$servicio->id_catalogo_servicios}}')">
                      <h1>{{$servicio->nombre_servicio}}</h1>
                    </a>
                    <p class="box-counter-title"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <br>
    @endforeach
    <br>
    <section class="section-skew skew-4-elem section-skew-var-2 wow fadeInUp" data-wow-delay=".2s"><span class="section-skew__item"></span><span class="section-skew__item"></span>
        <!-- Owl Carousel-->
        <div class="owl-carousel video-carousel owl-nav-variant-3" data-items="1" data-stage-padding="0" data-margin="0" data-mouse-drag="false" data-nav="false" data-nav-custom="#owl-carousel-nav" data-dots="true">
          <div class="owl-item">
            <div class="post-video post-video-var-1 context-dark">
              <div class="post-video__image"><img src="{{asset('/siteStyle/images/video-1-1920x649.jpg')}}" alt="" width="1920" height="649"/>
              </div>
              <div class="post-video__body"><a class="link-control post-video__control" data-lightbox="iframe" href="https://www.youtube.com/watch?v=MwdrGkA315Y"><span class="link-control__inner"></span></a>
                <div class="post-video__caption">
                  <h1><a href="single-video.html">Our Latest Video</a></h1>
                  <h6>BeFaster Autumn MTB Series</h6>
                  <time class="heading-6" datetime="2017-09-22">22 September, 2017</time>
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item">
            <div class="post-video post-video-var-1 context-dark">
              <div class="post-video__image"><img src="{{asset('/siteStyle/images/video-2-1920x649.jpg')}}" alt="" width="1920" height="649"/>
              </div>
              <div class="post-video__body"><a class="link-control post-video__control" data-lightbox="iframe" href="https://www.youtube.com/watch?v=b1jxeI1oruM"><span class="link-control__inner"></span></a>
                <div class="post-video__caption">
                  <h1><a href="single-video.html">Our Latest Video</a></h1>
                  <h6>British 4X Series final 2017</h6>
                  <time class="heading-6" datetime="2017-09-22">22 September, 2017</time>
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item">
            <div class="post-video post-video-var-1 context-dark">
              <div class="post-video__image"><img src="{{asset('/siteStyle/images/video-3-1920x649.jpg')}}" alt="" width="1920" height="649"/>
              </div>
              <div class="post-video__body"><a class="link-control post-video__control" data-lightbox="iframe" href="https://www.youtube.com/watch?v=x2UPwp201k0"><span class="link-control__inner"></span></a>
                <div class="post-video__caption">
                  <h1><a href="single-video.html">Our Latest Video</a></h1>
                  <h6>Fabio Wibmer Rides Saalbach</h6>
                  <time class="heading-6" datetime="2017-09-22">22 September, 2017</time>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-navigation" id="owl-carousel-nav"><a class="prev material-icons-keyboard_backspace"></a><a class="next material-icons-keyboard_backspace"></a></div>
    </section>
    <br>
      <!-- Page Footer-->
      <script src="{{ asset('/siteStyle/js/procesos/catalogoServicios.js')}}"></script>
    @include('site.reusable.footer')
      @if (session()->has('okConfirm'))
        <script type="text/javascript">
          $(document).ready(function () {
            showAlert('Gracias!!','{{ session()->get("okConfirm") }}',null,'success','success');
          });
        </script>
      @endif
    </div>
    <!-- END PANEL-->
  </body>
</html>