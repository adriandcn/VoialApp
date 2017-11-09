<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip | {!!$atraccion->nombre_servicio!!}</title>

        <link rel="shortcut icon" href="{{ asset('public/images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWaNaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="iWaNaTrip es experiencia de vida. Deja de ser turista, conviertete en viajero. Viaja por el mundo y descubre Ecuador">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="iWaNaTrip group">
        
        
<meta property="og:title" content="{!!$atraccion->nombre_servicio!!}" /> 
<meta property="og:description" content="iWaNaTrip | {!!$atraccion->nombre_servicio!!}" />
<meta property="og:image" content="{{ asset('public/images/icon/')}}/{{$imagenes[0]->filename}}" />
     
<link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}" />
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png')}}" />        

        <!-- Theme Styles -->

        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('public/js/sliderTop/jssor.slider.mini.js') !!}

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public/public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/responsive.css')}}">


        <!-- CSS for IE -->
        <!--[if lte IE 9]>
            <link rel="stylesheet" type="text/css" href="{{ asset('public_components/css/ie.css')}}" />
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->

        <style>
            
            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;
            }
            
                .mores {
    background-color: white;
    border-radius: 4px;
    color: #939faa;
    display: block;
    font-size: 12px;
    line-height: 1.42857;
    margin: 0 0 10px;
    padding: 9.5px;
    text-align: justify;
    
    word-break: inherit;
    word-wrap: inherit;
    font-family: arial;
     border: 0 solid;
     white-space: pre-line;       /* CSS 3 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -pre-line;      /* Opera 4-6 */
        white-space: -o-pre-line;    /* Opera 7 */
        word-wrap: inherit;       /* Internet Explorer 5.5+ */


}

        </style>
    </head>
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
            @include('public_page.reusable.banner', ['titulo' =>$atraccion->nombre_servicio])  

            <ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li class="active">{!!$atraccion->nombre_servicio!!}
                 
                </li>
            </ul>
        </div>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="product type-product">
                            <div class="row single-product-details ">
                                <div class="product-images col-sm-5 box-lg  ">
                                    <div id="sync1" class="owl-carousel images">
                                        <div class="post-slider style3 owl-carousel box">
                                            @foreach ($imagenes as $imagen)
                                            <?php $header= asset('public/images/fullsize/'.$imagen->filename)?>
                                            <a href="{{ asset('public/images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup">
                                                <img src="{{ asset('public/images/icon/'.$imagen->filename)}}" alt="{!!$atraccion->nombre_servicio!!}">
                                                
                                                @if($imagen->descripcion_fotografia!="")
                                                <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                                    <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>
                                                    
                                                </div>
                                                @endif
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div id="sync2" class="owl-carousel post-slider style3 thumbnails" data-items="4">
                                       
                                        
                                         @foreach ($imagenes as $imagen)
                                           
                                         
                                          <div class="item">
                                            <a href="#"><img src="{{ asset('public/images/icon/'.$imagen->filename)}}" alt="{!!$atraccion->nombre_servicio!!}"></a>
                                            
                                            
                                        </div>
                                       
                                            @endforeach
                                     
                                    </div>
                            
                                    
                                           @if(isset($explore) && count($explore)>0)
                                    <div class="social-wrap ">
                                        <label>{{ trans('publico/labels.label29')}}</label>
                                        <div class="social-icons">
                                            @foreach ($explore as $explor)
                                            <a href="#" class="social-icon" title="{!!$explor->nombre_servicio_est!!}"><i title="{!!$explor->nombre_servicio_est!!}" class="fa  has-circle" data-toggle="tooltip" data-placement="top" ><img style=" max-width: 60%;" class='activities' src="{{ asset('public/img/iconos/'.$explor->url_image)}}" alt="{!!$explor->nombre_servicio_est!!}"></i></a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    
                                       <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                                      <div class="social-wrap">
                                        <label>{{ trans('publico/labels.label77')}}</label>
                                        <div class="social-icons">
                                                <?php
                        $nombre = str_replace(' ', '-', $atraccion->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                                            <!--<a href="#" class="social-icon"><i class="fa fa-twitter has-circle" data-toggle="tooltip" data-placement="top" title=""></i></a>
                                            <a href="#" class="social-icon"><i class="fa fa-facebook has-circle" data-toggle="tooltip" data-placement="top" title=""></i></a>
                                            <a href="#" class="social-icon"><i class="fa fa-google-plus has-circle" data-toggle="tooltip" data-placement="top" title=""></i></a>-->
                                            <div class="fb-share-button" data-href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$atraccion->id!!}" data-layout="button_count"></div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="summary entry-summary col-sm-7 box-lg">
                                    <div class="clearfix">
                                        <h2 class="product-title entry-title">{!!$atraccion->nombre_servicio!!} </h2>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                    
                                    @if($provincia!=null )
                                     @if($canton!=null)
                                     @if($parroquia!=null)
                                
                                       <span class="product-price box">{!!$provincia->nombre!!}-{!!$canton->nombre!!}-{!!$parroquia->nombre!!}</span>
                                    
                                       
                                       @else
                                       <span class="product-price box">{!!$provincia->nombre!!}-{!!$canton->nombre!!}</span>
                                            @endif
                                     @else
                                      <span class="product-price box">{!!$provincia->nombre!!}</span>
                                
                                  
                                @endif
                                    
                                    @endif
                                    
                                     
                             
                                
                                    @if($atraccion->id_catalogo_servicio==1)
                                    <img src="{{ asset('public/img/ic_serv/comida_bebida.png')}}" title="Alimentación y bebidas" alt="alimentacion">
                                    @elseif($atraccion->id_catalogo_servicio==2)
                                    <img src="{{ asset('public/img/ic_serv/hospedaje.png')}}" title="Sleep" alt="hospedaje">
                                    @elseif($atraccion->id_catalogo_servicio==3)
                                    <img src="{{ asset('public/img/ic_serv/icon_viajes.png')}}" title="Tours" alt="viajes">
                                    @elseif($atraccion->id_catalogo_servicio==4)
                                    <img src="{{ asset('public/img/ic_serv/centro_turistico.png')}}" title="Turismo" alt="turismo">
                                    @endif
                                       @if(session('locale') == 'es' )
                                        <pre class="mores">{!!$atraccion->detalle_servicio!!}</pre>
                                        @elseif(session('locale') == 'en' && $atraccion->detalle_servicio_eng!='') 
                                        <pre class="mores">{!!$atraccion->detalle_servicio_eng!!}</pre>
                                        @else
                                        <pre class="mores">{!!$atraccion->detalle_servicio!!}</pre>

                                        @endif
                                    
                                    <div class="clearfix box" style=" width: 90%;  margin-left: 10%;">
                                            <div class="col-xs-12 col-lg-6">
                                                
                                                @if($provincia!=null)
                                                <img class='activities' src="{{ asset('public/img/Maps/')}}/{!!$atraccion->id_provincia!!}.png" title="{!!$provincia->nombre!!}" alt="{!!$provincia->nombre!!}">
                                               @else
                                                
                                                <img class='activities' src="{{ asset('public/img/Maps/')}}/0.png" title="Ecuador" alt="Ecuador">
                                                @endif
                                            </div>
                                        </div>
                              
                             
                                <div class="likes" id="likes">
                                    
                                    @section('likes')
                                @show
                                </div>
                                       
                                </div>
                            </div>
                            
                            
                            
                            <div class="woocommerce-tabs tab-container vertical-tab clearfix box">
                                <ul class="tabs">
                                    <li ><a href="#tab3-1" data-toggle="tab">{{ trans('publico/labels.label41')}}</a></li>
                                    <li class="active"><a href="#tab3-2" data-toggle="tab">{{ trans('publico/labels.label36')}}</a></li>
                                    <li  ><a href="#tab3-3" data-toggle="tab">Reviews</a></li>
                                    
                                    @if(count($itinerarios)>0)
                                    <li ><a href="#tab3-5" data-toggle="tab">{{ trans('publico/labels.label46')}}</a></li>
                                    @endif
                                   
                                </ul>
                                
                                <!-Info->
                                <div id="tab3-1" class="tab-content panel entry-content">
                                      <div class="tab-pane">
                                        
                                        @if($atraccion->direccion_servicio!="")
                                        <pre class="mores">{{ trans('publico/labels.label35')}}: {!!$atraccion->direccion_servicio!!}</pre>
                                        @endif
                                        
                                        @if($atraccion->horario!="")
                                        <pre class="mores">{{ trans('publico/labels.label75')}}: {!!$atraccion->horario!!}</pre>
                                        @endif
                                                            @if($atraccion->precio_desde!="")
                                        <pre class="mores">{{ trans('publico/labels.label73')}}: {!!$atraccion->precio_desde!!}</pre>
                                        @endif
                                                            @if($atraccion->precio_hasta!="")
                                        <pre class="mores">{{ trans('publico/labels.label74')}}: {!!$atraccion->precio_hasta!!}</pre>
                                        @endif
                                        
                                        @if($atraccion->telefono!="")
                                        <pre class="mores">{{ trans('publico/labels.label38')}}: {!!$atraccion->telefono!!}</pre>
                                        @endif
                                        @if($atraccion->correo_contacto!="")
                                        <pre class="mores">{{ trans('publico/labels.label39')}}: {!!$atraccion->correo_contacto!!}</pre>
                                        @endif
                                        @if($atraccion->pagina_web!="")
                                        <pre class="mores">{{ trans('publico/labels.label40')}}: {!!$atraccion->pagina_web!!}</pre>
                                        @endif
                                    </div>
                                </div>

                                
                                <!-Como llegar->
                                <div id="tab3-2" class="tab-content panel entry-content in active">
                                    <div class="tab-pane">
                                          @if(session('locale') == 'es' )
                                        <pre class="mores">{!!$atraccion->como_llegar1!!}</pre>
                                        <pre class="mores">{!!$atraccion->como_llegar1_1!!}</pre>
                                        
                                        @elseif(session('locale') == 'en' && $atraccion->como_llegar2!='') 
                                        <pre class="mores">{!!$atraccion->como_llegar2!!}</pre>
                                        <pre class="mores">{!!$atraccion->como_llegar2_2!!}</pre>
                                        @else
                                        <pre class="mores">{!!$atraccion->como_llegar1!!}</pre>
                                        <pre class="mores">{!!$atraccion->como_llegar1_1!!}</pre>

                                        @endif
                                        
                                        
                                        <div class="soap-google-map maps">
                                        
      
                
            </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                <!-Itinerarios->
                                   @if(count($itinerarios)>0)
                                <div id="tab3-5" class="tab-content panel entry-content ">
                                    <div class="tab-pane">
                                        <div id="comments">
                                            <h3>{{ trans('publico/labels.label46')}}</h3>
                                            <ol class="commentlist">

                                             
                                                
                                                @foreach ($itinerarios as $itiner)
                                                <li class="comment">

                                                    <div class="author-img">
                                                        @if($ImgItiner!=null)
                                                        @foreach ($ImgItiner as $img)
                                                        @if($img->id_auxiliar==$itiner->id)
                                                        <span><img src="{{ asset('public/images/icon/'.$img->filename)}}" alt=""></span>
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        <span><img src="http://placehold.it/100x100" alt=""></span>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content">
                                                        <h5 class="comment-author-name"><a href="#">{!!$itiner->nombre_itinerario!!}</a></h5>
                                                        <span data-toggle="tooltip" title="4" class="star-rating">
                                                            <span data-stars="4"></span>
                                                        </span>
                                                        <?php
                                                            $date = date_create($itiner->fecha_desde);
                                                            $date2 = date_create($itiner->fecha_hasta);
                                                             ?>

                        
                                                        <span class="comment-date">{!!date_format($date, 'j F ')!!}-{!!date_format($date2, 'j F ')!!}</span>
                                                        <div class="description">
                                                            <p>{!!$itiner->descripcion_itinerario!!}</p>
                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            
                                            </ol>
                                        </div>

                                    </div>
                                </div>
                                    @endif
                                    
                                    <div id="tab3-3" class="tab-content panel entry-content ">
                                    <div class="tab-pane">
                                        
                                            
                                                <div id="comments" class="var_comment" style="display: block;">
                                            
                                            <a href="#" class="btn btn-sm style1 btn-write-review"><i class="fa fa-pencil"></i>{{ trans('publico/labels.label71')}}</a>
                                            <h3>Reviews</h3>
                                            <ol class="commentlist review">
                                        
                                        @section('review')
                                @show
                                   </ol>
                                        </div>
                                        <div id="review_form">
                                            {!! Form::open(['url' => route('postReviews'),  'id'=>'preview']) !!}
                                                <a href="#" class="btn btn-sm style4 btn-back-reviews"><i class="fa fa-long-arrow-left"></i>Back To Reviews</a>
                                                <h3>Review “{!!$atraccion->nombre_servicio!!}”</h3>
                                                <input type="hidden" name="id_atraccion" id="review_score" value="{!!$atraccion->id!!}">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" name='nombre_reviewer' class="input-text full-width">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text"  name="email_reviewer" class="input-text full-width">
                                                        </div>
                                                         @foreach ($tipoReviews as $rev)
                                                         <input type="hidden" name="id_tipo_review_{!!$rev->id!!}" id="review_score" value="{!!$rev->id!!}">
                                                        <div class="form-group">
                                                            
                                                              @if(session('locale') == 'es' )
                                    <label>{!!$rev->tipo_review!!}</label>
                                    
                                    @else
                                    <label>{!!$rev->tipo_review_eng!!}</label>

                                    @endif
                        
                                                            
                                                            <span class="input-star-rating">
                                                                <input type="radio" value="5" name="review_score_{!!$rev->id!!}">
                                                                <input type="radio" value="4" name="review_score_{!!$rev->id!!}">
                                                                <input type="radio" value="3" name="review_score_{!!$rev->id!!}">
                                                                <input type="radio" value="2" name="review_score_{!!$rev->id!!}">
                                                                <input type="radio" value="1" name="review_score_{!!$rev->id!!}">
                                                            </span>
                                                        </div>
                                                         @endforeach
                                                       <!-- <div class="form-group">
                                                            <label>Your review</label>
                                                            <textarea class="input-text full-width" rows="5"></textarea>
                                                        </div>-->
                                                        <div class="form-group">
                                                            
                                                            
                                                            <a onclick="AjaxContainerRegistroLoadF('preview','tab-pane')" class="btn style1">Submit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    
                                
                                        
                                        <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreReviews">{{ trans('publico/labels.label72')}}</a>
                            </div>    
                                        
                                    </div>
                                </div>
                                    
                              
                            </div>

                        </div>
                        @if(count($related)>0)
                      <div class="product type-product">
                            <h4>{{ trans('publico/labels.label47')}}</h4>
                            <ul class="related products row add-clearfix">
                            
                                <!-Despliega los hijos que tiene una atraccion especifica ->                                

                                <?php $flag=0;?>
                                @for ($x = 0; $x < count($related); $x++)
                                    @if($flag==0)
                                         <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                              <?php
                        $nombre = str_replace(' ', '-', $related[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                                             <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$related[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                                  <div class="first-img">
                                                        <img alt="" src="{{ asset('public/images/icon/'.$related[$x]->filename)}}">
                                                  </div>
                                                    @if(isset($related[$x+1])&& $related[$x+1]->id_auxiliar==$related[$x]->id_auxiliar)
                                                  <div class="back-img">
                                                      <img alt="" src="{{ asset('public/images/icon/'.$related[$x+1]->filename)}}">
                                                  </div>
                                       <?php $flag=1;?>
                                        @endif
                                              </a>
                                    <div class="product-content">
                                        <?php
                        $nombre = str_replace(' ', '-', $related[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                                        <h5 class="product-title"><a  href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$related[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$related[$x]->nombre_servicio!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{!!$related[$x]->catalogo_nombre!!}</span>
                                       <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$related[$x]->nombre!!}</p>
                                        
                                    </div>
                                    
                                </li>
                                @else
                                <?php $flag=0;?>
                                  @endif
                                @endfor
                                
                                
                        
                        
                        
                            </ul>
                        </div>
                        @endif
                        
                        <div class="product type-product">
                            <h4>{{ trans('publico/labels.label28')}}</h4>
                            <ul class="related products row add-clearfix cercanos">
                                @section('cercanos')
                                @show
                            </ul>
                        </div>
                          <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImg">{{ trans('publico/labels.label31')}}</a>
                            </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3" >

                        @if(session('device')!='mobile')
                        <div class="main-mini-search-form full-width box">
                            {!! Form::open(['url' => route('min-search'),  'method' => 'get', 'id'=>'min-search']) !!}
                                            <div class="search-box">
                                                <input type="text" id="s"  placeholder="Search" name="s" value="">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        {!! Form::close() !!}
                        </div>
                        @endif
                        <div class="widget box">
                            <h4>{{ trans('publico/labels.label18')}}</h4>
                            <ul class="product-list-widget">
                                
                                @if(isset($servicios))
                                
                                @foreach ($servicios as $serv)
                                
                                <li>
                                    <div class="product-image">
                                        <a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">
                                            
                                            <img src="{{ asset('public/img/register/')}}/{!!$serv->id_catalogo_servicios!!}.jpg" alt="">
                                        </a>
                                    </div>
                                    
                                    
                                    <div class="product-content">
                                    
                                           @if(session('locale') == 'es' )
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio!!}</a></h6>
                                    
                                    @else
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio_eng!!}</a></h6>

                                    @endif
                                        
                                        <span class="product-price">{{ trans('publico/labels.label50')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                                
                            </ul>
                        </div>
                      
                        
                        <div class="promocionesAtraccion">
                              @section('promocionesAtraccion')
                                @show
                            
                        </div>

                        
                        <div class="eventosAtraccion">
                              @section('eventosAtraccion')
                                @show
                            
                        </div>
                        
                        
                        @if(session('device')!='mobile')
                        <div class="widget banner-slider box">
                            <div class="owl-carousel" data-itemsPerDisplayWidth="[[0, 1], [480, 2], [768, 1], [992, 1], [1200, 1]]" data-items="1">
                                <a href="#">
                                    <img src="{{ asset('public/img/rsz_00kwwk8s.jpg')}}" alt="">
                                </a>
                              
                            </div>
                        
                        </div>
                           
                        <div class="box">
                            <h4>Tags</h4>
                            <div class="tags">
                                @if($atraccion->tags!="")
                                <?php 
                            $tags = explode(",", $atraccion->tags);
                            ?>
                                  @foreach ($tags as $tag)
                                <a class="tag" href="#">{!!$tag!!}</a>
                                @endforeach
                                @endif
                                @if($provincia!=null)
                                <a class="tag" href="#">#{!!$provincia->nombre!!}</a>
                                @endif
                                @if($canton!=null)
                                <a class="tag" href="#">#{!!$canton->nombre!!}</a>
                                @endif
                                @if($parroquia!=null)
                                <a class="tag" href="#">#{!!$parroquia->nombre!!}</a>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                      
                   
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer" class="style4">
            <div class="callout-box style2">
                <div class="container">
                    <div class="callout-content">
                        <div class="callout-text">
                            <h4>{{ trans('publico/labels.label26')}}</h4>
                        </div>
                        <div class="callout-action">
                            <a onclick="$('.woocommerce').LoadingOverlay('show');" class="btn style4">{{ trans('publico/labels.label27')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
    {!! HTML::script('public/js/jquery.js') !!}
    {!!HTML::script('public/js/js_public/Compartido.js') !!}
    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('public/js/Compartido.js') !!}

    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-2.1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.noconflict.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/modernizr.2.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-ui.1.11.2.min.js')}}"></script>

    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/bootstrap.min.js')}}"></script>

    <!-- Magnific Popup core JS file -->
    <script type="text/javascript" src="{{ asset('public/public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

     
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.stellar.min.js')}}"></script>

    <!-- waypoint -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/waypoints.min.js')}}"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('public/public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>


<!-- Google Map Api -->
    <script type='text/javascript' src="{{ asset('public/public_components/js/map.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/gmap3.js')}}"></script>
    <script>
        
        
                                sjq(document).ready(function ($) {
                                    // Configure/customize these variables.
                                    var showChar = 100; // How many characters are shown by default
                                    var ellipsestext = "...";
                                    var moretext = "Show more >";
                                    var lesstext = "Show less";
                                    $('.more').each(function () {
                                        var content = $(this).html();
                                        if (content.length > showChar) {

                                            var c = content.substr(0, showChar);
                                            var h = content.substr(showChar, content.length - showChar);
                                            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                                            $(this).html(html);
                                        }

                                    });
                                    $(".morelink").click(function () {
                                        if ($(this).hasClass("less")) {
                                            $(this).removeClass("less");
                                            $(this).html(moretext);
                                        } else {
                                            $(this).addClass("less");
                                            $(this).html(lesstext);
                                        }
                                        $(this).parent().prev().toggle();
                                        $(this).prev().toggle();
                                        return false;
                                    });
                                });</script>
    <script>
        sjq(document).ready(function ($) {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: 1000,
                navigation: false,
                pagination: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200,
            });
            sync2.owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [991, 1],
                itemsTablet: [767, 2],
                itemsMobile: [479, 2],
                navigation: true,
                navigationText: false,
                pagination: false,
                responsiveRefreshRate: 100,
                afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                    el.find(".owl-wrapper").equalHeights();
                },
                afterUpdate: function (el) {
                    el.find(".owl-wrapper").equalHeights();
                }
            });
            function syncPosition(el) {
                var current = this.currentItem;
                $("#sync2")
                        .find(".owl-item")
                        .removeClass("synced")
                        .eq(current)
                        .addClass("synced")
                if ($("#sync2").data("owlCarousel") !== undefined) {
                    center(current)
                }
            }

            $("#sync2").on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).data("owlItem");
                sync1.trigger("owl.goTo", number);
            });
            function center(number) {
                var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                var num = number;
                var found = false;
                for (var i in sync2visible) {
                    if (num === sync2visible[i]) {
                        var found = true;
                    }
                }

                if (found === false) {
                    if (num > sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                    } else {
                        if (num - 1 === -1) {
                            num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                    }
                } else if (num === sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", sync2visible[1])
                } else if (num === sync2visible[0]) {
                    sync2.trigger("owl.goTo", num - 1)
                }
            }
            var $easyzoom = $('.product-images .easyzoom').easyZoom();
            var $easyzoomApi = $easyzoom.data('easyZoom');
        });</script>

    @if(session('device')!='mobile')
    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
                {$Duration: 1800, $Opacity: 2}
            ];
            var jssor_1_options = {
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1360);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });</script>

    <style>

        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background:url ("{!!asset("public/img/internas/b05.png")!!}") no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background:url("{!!asset("public/img/internas/a12.png")!!}") no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>
    
    @else
  <script>


jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
});
  

</script>
    @endif
    
    


    <script type="text/javascript">
        sjq(".soap-google-map").gmap3({
            map: {
                options: {
                     scrollwheel: false,

                    center: [{!!$atraccion->latitud_servicio!!},{!!$atraccion->longitud_servicio!!}],
                    zoom: 15,
					mapTypeControlOptions: {
						position: google.maps.ControlPosition.RIGHT_BOTTOM
					},
					zoomControlOptions: {
						position: google.maps.ControlPosition.LEFT_CENTER
					},
					panControlOptions: {
						position: google.maps.ControlPosition.LEFT_CENTER
					}
                }
            },
            marker:{
                values: [
                    {latLng:[ {!!$atraccion->latitud_servicio!!},{!!$atraccion->longitud_servicio!!}], data:"Ecuador"}
                    

                ]
                ,
                options: {
              
                 
    //draggable: false,


                    //icon: "{!!asset("img/CollageIsmage_opt.png")!!}",
                },
            }
        });
    </script>

    
    <script>
        $(document).ready(function () {
          
                GetDataAjaxPromociones("{!!asset('/tokenDc$ripPromo')!!}/{!!$atraccion->id!!}");
                GetDataAjaxEventos("{!!asset('/tokenDc$ripEvent')!!}/{!!$atraccion->id!!}");    
                GetLikes("{!!asset('/getLikesA')!!}/{!!$atraccion->id!!}");    
                GetReview("{!!asset('/getReviews')!!}/{!!$atraccion->id!!}?page=1");    
                GetDataAjaxCloseIntern("{!!asset('/getCercanosIntern')!!}/{!!$atraccion->id!!}/{!!$atraccion->id_provincia!!}/{!!$atraccion->id_canton!!}/{!!$atraccion->id_parroquia!!}");

            });
        
      $(".moreImg").click(function () {
                GetDataAjaxCloseIntern("{!!asset('/getCercanosIntern')!!}/{!!$atraccion->id!!}/{!!$atraccion->id_provincia!!}/{!!$atraccion->id_canton!!}/{!!$atraccion->id_parroquia!!}");
                
            });
            $(".moreReviews").click(function () {
                GetReview("{!!asset('/getReviews')!!}/{!!$atraccion->id!!}?page=1");    
                
            });
            
            


    </script>
<script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
     <script>
     @if(session('device')!='mobile')
      $(".maps").dblclick(function () {
          window.open('https://maps.google.com.ec/maps?saddr=My Location&daddr='  + {!!$atraccion->latitud_servicio!!} + ',' + {!!$atraccion->longitud_servicio!!},"_blank");
          
                
            });
    
    @else
   $(".maps").dblclick(function () {
    
    myNavFunc();
 });
 
 function myNavFunc(){
    // If it's an iPhone..
    
         window.open("maps://maps.google.com/maps?daddr={!!$atraccion->latitud_servicio!!},{!!$atraccion->longitud_servicio!!}");
    
}
 


    @endif
    </script>

   


</body>
</html>
