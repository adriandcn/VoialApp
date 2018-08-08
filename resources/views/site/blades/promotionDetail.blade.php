<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    <style type="text/css">
    #owl-demo .item {
        background: #3fbf79;
        padding: 30px 0px;
        margin: 10px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }

    .customNavigation {

        text-align: center;
    } //use styles below to disable ugly selection
    .customNavigation a {
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
        <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;">
            <div class="shell">
                <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
                    <div class="page-title-text">Promoción en:
                        <br> {{$servicioData->nombre_servicio}}
                        <br>
                        <br> {{$promotion->nombre_promocion}}
                    </div>
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
                <!-- Breadcrumbs & Page title-->
        <section class="section-sm bg-white blog-wrap" style="padding-top: 0;">
          <div class="shell">
            <h1>{{$promotion->nombre_promocion}}</h1>
            <div class="range range-50 range-center range-sm-left">
              <div class="cell-lg-3 cell-sm-4 cell-xs-8 order-xs-last">
                <div class="blog-item">
                  <h6>Otras Promociones</h6>
                  <div class="flickr widget-flickrfeed group-flickr" data-photo-swipe-gallery="gallery" data-flickr-tags="tm-61140"><a class="flickr-item" data-photo-swipe-item="data-photo-swipe-item" href="https://farm5.staticflickr.com/4237/34455111694_25d41362b3_c.jpg" data-image_c="href" data-size="800x534" data-type="flickr-item"><img width="85" height="85" data-title="alt" src="https://farm5.staticflickr.com/4237/34455111694_25d41362b3_q.jpg" alt="Young man riding a mountain bike downhill style" data-image_q="src"></a><a class="flickr-item" data-photo-swipe-item="data-photo-swipe-item" href="https://farm5.staticflickr.com/4273/34455111384_57573662e4_c.jpg" data-image_c="href" data-size="800x481" data-type="flickr-item"><img width="85" height="85" data-title="alt" src="https://farm5.staticflickr.com/4273/34455111384_57573662e4_q.jpg" alt="Depositphotos_44532195_original" data-image_q="src"></a><a class="flickr-item" data-photo-swipe-item="data-photo-swipe-item" href="https://farm5.staticflickr.com/4210/34455111504_9bdfa9608e_c.jpg" data-image_c="href" data-size="800x546" data-type="flickr-item"><img width="85" height="85" data-title="alt" src="https://farm5.staticflickr.com/4210/34455111504_9bdfa9608e_q.jpg" alt="Bicycle accessories" data-image_q="src"></a><a class="flickr-item" data-photo-swipe-item="data-photo-swipe-item" href="https://farm5.staticflickr.com/4197/35258590426_5100554b38_c.jpg" data-image_c="href" data-size="800x534" data-type="flickr-item"><img width="85" height="85" data-title="alt" src="https://farm5.staticflickr.com/4197/35258590426_5100554b38_q.jpg" alt="Cycling" data-image_q="src"></a><a class="flickr-item" data-photo-swipe-item="data-photo-swipe-item" href="https://farm5.staticflickr.com/4216/34455111664_a5da8c674a_c.jpg" data-image_c="href" data-size="800x532" data-type="flickr-item"><img width="85" height="85" data-title="alt" src="https://farm5.staticflickr.com/4216/34455111664_a5da8c674a_q.jpg" alt="moutain bike man" data-image_q="src"></a><a class="flickr-item" data-photo-swipe-item="data-photo-swipe-item" href="https://farm5.staticflickr.com/4274/35298786275_8648413175_c.jpg" data-image_c="href" data-size="626x800" data-type="flickr-item"><img width="85" height="85" data-title="alt" src="https://farm5.staticflickr.com/4274/35298786275_8648413175_q.jpg" alt="Road racing bicycle woman" data-image_q="src"></a>
                  </div>
                </div>
              </div>
              <div class="cell-sm-8 cell-xs-12">
                <div class="post-classic">
                  <div class="post-classic-img-wrap">
                    <a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">
                      <img src="{!!asset('/images/icon')!!}/{{$servicioData->filename}}" alt="" width="770" height="407"></a>
                    </div>
                  <div class="post-classic-body">
                    <div class="unit unit-sm-top unit-vertival unit-sm-horizontal">
                      <div class="unit__left text-left text-sm-center">
                        <div class="unit unit-spacing-xs unit-vertical unit-middle">
                          <div class="unit__left">
                            <img class="img-circle" src="{!!asset('/')!!}images/icon/{{$servicioData->filename}}" alt="" width="70" height="70">
                          </div>
                          <div class="unit__body">
                            <a class="author-name" href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">
                              {{$servicioData->nombre_servicio}}
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="unit__body">
                        <time datetime="2017-03-25">March 25, 2017</time>
                        <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">Nimble 9 Boost – Now In Stock!</a></h6>
                        <p class="post-classic-text">
                          <span>{{$promotion->descripcion_promocion}}</span>
                        </p>
                        <style type="text/css">
                          .detail-promotion{
                            border-bottom: 1px solid #c8402c;
                            border-right: 1px solid #c8402c;
                            border-top: 1px solid #c8402c;
                            border-radius: 5px 0px 5px 0px;
                            font-weight: bold;
                            color: #162849;
                            padding-left: 6px;
                            padding-right: 5px;
                          }
                          .title-promotion{
                            color: #162849;
                            border-bottom: 1px solid #c8402c;
                          }
                        </style>
                        <p><h6><i class="fa fa-calendar"></i> &nbsp;&nbsp;Tiempo de duracción</h6></p>
                        <p>
                            <span class="title-promotion">{{trans('publico/labels.lblFechaDesde')}} : </span><span class="detail-promotion">{{$promotion->fecha_desde}}</span>
                        </p>
                        <p>
                            <span class="title-promotion">{{trans('publico/labels.lblFechaHasta')}} : </span> <span class="detail-promotion">{{$promotion->fecha_hasta}}</span>
                        </p>
                        <p><h6><i class="fa fa-money"></i> &nbsp;&nbsp;Beneficio</h6></p>
                        <p>
                            <span class="title-promotion">{{trans('publico/labels.lblPromotionPrecioNormal')}} : </span><span class="detail-promotion">{{$promotion->precio_normal}}</span>
                        </p>
                        <p>
                            <span class="title-promotion">{{trans('publico/labels.lblPromoDescuento')}} : </span> <span class="detail-promotion">{{$promotion->descuento}}</span>
                        </p>
                        <p>
                            <span class="title-promotion">Precio final : </span> <span class="detail-promotion">{{floatval($promotion->precio_normal)-floatval(($promotion->precio_normal)*($promotion->descuento/100))}}</span>
                        </p>

                        <p><h6><i class="fa fa-eye"></i> &nbsp;&nbsp;{{trans('publico/labels.lblPromotionObservations')}}</h6></p>
                        <p>
                            {{$promotion->observaciones_promocion}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
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
                            @section('contentImagenes') @show
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
                                            <div class="unit__left"><img class="img-circle" src="images/user-01-70x70.jpg" alt="" width="70" height="70" />
                                            </div>
                                            <div class="unit__body">
                                                <time datetime="{{$promotion->fecha_desde}}">{{trans('publico/labels.lblFechaDesde')}}</time>
                                                <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$promotion->fecha_desde}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-6 cell-sm-6 cell-xs-12">
                                    <div class="post-mini post-sidebar">
                                        <div class="unit unit-horizontal unit-spacing-md">
                                            <div class="unit__left"><img class="img-circle" src="images/user-03-70x70.jpg" alt="" width="70" height="70" />
                                            </div>
                                            <div class="unit__body">
                                                <time datetime="2017-04-07">{{trans('publico/labels.lblFechaHasta')}}</time>
                                                <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$promotion->fecha_hasta}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-6 cell-sm-6 cell-xs-12">
                                    <div class="post-mini post-sidebar">
                                        <div class="unit unit-horizontal unit-spacing-md">
                                            <div class="unit__left"><img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70" />
                                            </div>
                                            <div class="unit__body">
                                                <time datetime="2017-03-05">{{trans('publico/labels.lblPromotionPrecioNormal')}}</time>
                                                <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$promotion->precio_normal}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-6 cell-sm-6 cell-xs-12">
                                    <div class="post-mini post-sidebar">
                                        <div class="unit unit-horizontal unit-spacing-md">
                                            <div class="unit__left">
                                                <img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70" />
                                            </div>
                                            <div class="unit__body">
                                                <time datetime="2017-03-15">{{trans('publico/labels.lblPromoDescuento')}}</time>
                                                <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$promotion->descuento}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-6 cell-sm-6 cell-xs-12">
                                    <div class="post-mini post-sidebar">
                                        <div class="unit unit-horizontal unit-spacing-md">
                                            <div class="unit__left"><img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70" />
                                            </div>
                                            <div class="unit__body">
                                                <time datetime="2017-03-05">Precio Final</time>
                                                <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">
                                                  {{floatval($promotion->precio_normal)-floatval(($promotion->precio_normal)*($promotion->descuento/100))}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-12 cell-sm-12 cell-xs-12">
                                    <div class="post-mini post-sidebar">
                                        <div class="unit unit-horizontal unit-spacing-md">
                                            <div class="unit__left"><img class="img-circle" src="images/user-02-70x70.jpg" alt="" width="70" height="70" />
                                            </div>
                                            <div class="unit__body">
                                                <time datetime="2017-03-05">{{trans('publico/labels.lblPromotionObservations')}}</time>
                                                <h6><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$promotion->observaciones_promocion}}</a></h6>
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
        .btn-full-image {
            cursor: pointer;
            position: absolute;
            top: 45%;
            color: #c26933;
        }

        .btn-right {
            left: 0;
        }

        .btn-left {
            right: 0;
        }

        .btn-full-image:hover {
            color: #f7701e;
        }

        .modal-custom .modal-content {
            padding: 20px 40px 40px 30px;
            border: 0;
            border-radius: 0;
            box-shadow: 0 0 24px rgba(127, 131, 154, 0);
        }
        </style>
        <!-- Modal full image-->
        <div class="modal modal-custom fade" id="form-img-full" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 80%">
                <div class="modal-content" id="imgFull">
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