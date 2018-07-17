<!DOCTYPE html>

<html class="wide wow-animation" lang="en">

  <head>

    <!-- Site Title-->

    <title>Servicios</title>

    @include('site.reusable.head')

    <style type="text/css">

      #owl-demo .item{

        background: #3fbf79;

        padding: 30px 0px;

        margin: 10px;

        color: #FFF;

        -webkit-border-radius: 3px;

        -moz-border-radius: 3px;

        border-radius: 3px;

        text-align: center;

      }

      .customNavigation{

        text-align: center;

      }

      //use styles below to disable ugly selection

      .customNavigation a{

        -webkit-user-select: none;

        -khtml-user-select: none;

        -moz-user-select: none;

        -ms-user-select: none;

        user-select: none;

        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);

      }

      .eventCard {

        border-bottom: 1px solid #ccc;

        border-left: 1px solid #ccc;

        border-right: 1px solid #ccc;

        padding: 7px;

        border-radius: 5px;

      }

    </style>

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

            <h1>{{trans('publico/labels.tittleLoaderDetails')}}</h1>

          </div>

        </div>

      </div>

      <!-- Page Header-->

      <!-- Modal-->

      @include('site.reusable.header')

      <!-- Breadcrumbs & Page title-->

      <!-- Breadcrumbs & Page title-->



      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;">

        <div class="shell">

          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>

            <div class="page-title-text">Promoción en: <br>

              {{$servicioData->nombre_servicio}} <br><br>

              {{$promotion->nombre_promocion}}</div>

            <!-- path sistema -->

            <br>

            <hr>

            <div>

              <span class="box-skew__item"></span>

              <ul class="breadcrumbs-custom">

                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>

                <li><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$servicioData->nombre_servicio}}</a></li>

                <li>{{$promotion->nombre_promocion}}</li>

              </ul>

            </div>

          </div>

        </div>

      </section>

      <section class="bg-white">

        <div class="shell">

          <div class="range range-50">

              <p class="big cell-md-12" style="text-align: justify;    margin-bottom: 40px;">{{$promotion->descripcion_promocion}}</p>

          </div>

        </div>

      </section>
      <section class="bg-white">
        <div class="shell">
          <div class="row">
              <div class="col-md-12">
                  <div id="renderPartialImagenes" style="margin: 0px 0% 0px 6%;">
                        @section('contentImagenes')
                        @show
                  </div>
              </div>
          </div>
        </div>
      </section>
      <section class="section-sm section-md-top-50 bg-white">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-lg-8 cell-md-9">
              <div class="post-single-item text-left">
                <h5>Más detalles</h5>
                <div class="range range-20">
                  <div class="cell-md-6 cell-sm-6 cell-xs-12">
                    <div class="post-mini post-sidebar">
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit__left"><img class="img-circle" src="images/user-01-70x70.jpg" alt="" width="70" height="70"/>
                        </div>
                        <div class="unit__body">
                          <time datetime="{{$promotion->fecha_desde}}">{{trans('publico/labels.lblFechaDesde')}}</time>
                          <h6><a href="single-post.html">{{$promotion->fecha_desde}}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cell-md-6 cell-sm-6 cell-xs-12">
                    <div class="post-mini post-sidebar">
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit__left"><img class="img-circle" src="images/user-03-70x70.jpg" alt="" width="70" height="70"/>
                        </div>
                        <div class="unit__body">
                          <time datetime="2017-04-07">{{trans('publico/labels.lblFechaHasta')}}</time>
                          <h6><a href="single-post.html">{{$promotion->fecha_hasta}}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cell-md-6 cell-sm-6 cell-xs-12">
                    <div class="post-mini post-sidebar">
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit__left"><img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70"/>
                        </div>
                        <div class="unit__body">
                          <time datetime="2017-03-05">{{trans('publico/labels.lblPromotionPrecioNormal')}}</time>
                          <h6><a href="single-post.html">{{$promotion->precio_normal}}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cell-md-6 cell-sm-6 cell-xs-12">
                    <div class="post-mini post-sidebar">
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit__left">
                          <img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70"/>
                        </div>
                        <div class="unit__body">
                          <time datetime="2017-03-15">{{trans('publico/labels.lblPromoDescuento')}}</time>
                          <h6><a href="single-post.html">{{$promotion->descuento}}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cell-md-6 cell-sm-6 cell-xs-12">
                    <div class="post-mini post-sidebar">
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit__left"><img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70"/>
                        </div>
                        <div class="unit__body">
                          <time datetime="2017-03-05">Precio Final</time>
                          <h6><a href="single-post.html">{{floatval($promotion->precio_normal)-floatval(($promotion->precio_normal)*($promotion->descuento/100))}}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cell-md-12 cell-sm-12 cell-xs-12">
                    <div class="post-mini post-sidebar">
                      <div class="unit unit-horizontal unit-spacing-md">
                        <div class="unit__left"><img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70"/>
                        </div>
                        <div class="unit__body">
                          <time datetime="2017-03-05">{{trans('publico/labels.lblPromotionObservations')}}</time>
                          <h6><a href="single-post.html">{{$promotion->observaciones_promocion}}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- Page Footer-->

      @include('site.reusable.footer')
      <style type="text/css">
        .btn-full-image{
          cursor: pointer;
          position: absolute;
          top: 45%;
          color: #c26933;
        }
        .btn-right{
          left: 0;
        }
        .btn-left{
          right: 0;
        }
        .btn-full-image:hover{
          color: #f7701e;
        }
        .modal-custom .modal-content{
          padding: 20px 40px 40px 30px;
          border: 0;
          border-radius: 0;
          box-shadow: 0 0 24px rgba(127, 131, 154, 0);
        }
      </style>

      <!-- Modal full image-->
          <div class="modal modal-custom fade" id="form-img-full" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 80%">
              <div class="modal-content" id="imgFull" >
                <!-- <a class="button" href="#" onclick="backImage()" style="position: absolute;
                bottom: 43%;"> -->
                  <i class="fa fa-arrow-left fa-3x btn-full-image btn-right" onclick="backImage()"></i><span></span>
                <!-- </a> -->
               <!-- <a class="button" href="#" onclick="nextImage()" style="position: absolute;
                bottom: 43%;
                right: -14%;"> -->
                  <i class="fa fa-arrow-right fa-3x btn-full-image btn-left" onclick="nextImage()"></i><span></span>
                <!-- </a> -->
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: white; top: 80%;"><span aria-hidden="true"></span></button>
              </div>
            </div>
          </div>
      <script type="text/javascript">
        GetDataAjaxImagenesRes("{!!asset('/getImagesServicio')!!}/2/{!!$promotion->id!!}");
      </script>

    </div>

    <!-- END PANEL-->

  </body>

</html>