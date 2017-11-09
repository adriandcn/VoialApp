@section('cercanos')	

<div class="TopPlace">
<!-Obtiene los cercanos a la parroquia->
@if(count($parroquia)>0 || $parroquia!=null)
@foreach ($parroquia as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif





<!-Obtiene los eventos cercanos a la parroquia->
@if(count($evntParroquia)>0 || $evntParroquia!=null)
@foreach ($evntParroquia as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif




<!-Obtiene las promociones cercanos a la parroquia->
@if(count($prmoParroquia)>0 || $prmoParroquia!=null)
@foreach ($prmoParroquia as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_promocion!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif










<!-Obtiene las lugares cercanos al canton->
@if(count($canton)>0 || $canton!=null)
@foreach ($canton as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif








<!-Obtiene las eventos cercanos al canton->
@if(count($evntCanton)>0 || $evntCanton!=null)
@foreach ($evntCanton as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif


<!-Obtiene las promociones cercanos al canton->
@if(count($prmoCanton)>0 || $prmoCanton!=null)
@foreach ($prmoCanton as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_promocion!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif

                

<!-Obtiene las lugares cercanos al provincia->
@if(count($provincias)>0 || $provincias!=null)
@foreach ($provincias as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif
                        
                        
                        




<!-Obtiene las eventos cercanos al provincia->
@if(count($evntProvincia)>0 || $evntProvincia!=null)
@foreach ($evntProvincia as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>Evento</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->catalogo_nombre!!}</span>


            </div>
        </article>
    </div>



@endforeach   
@endif

                                                
                        
</div>
@endsection
