@section('promocionesAtraccion')	

@if(count($promociones)>0)
<div class="widget banner-slider box">
    <div class="owl-carousel" style="background-color: #EDF6FF" data-itemsPerDisplayWidth="[[0, 1], [480, 2], [768, 1], [992, 1], [1200, 1]]" data-items="1">

        @foreach ($promociones as $promo)
        @if($ImgPromociones!=null)
        @foreach ($ImgPromociones as $img)
        @if($img->id_auxiliar==$promo->id)

        <a href="#">



            <div class="shortcode-banner">
               
                <img src="{{ asset('public/images/icon/'.$img->filename)}}" alt="{!!$promo->nombre_promocion!!}">
                <div class="shortcode-banner-content">
                    <h4 class="banner-title">{!!$promo->nombre_promocion!!}</h4>
                    <div class="details">
                        <p>{!!$promo->descripcion_promocion!!}</p>
                        
                        
                            <?php $date = date_create($promo->fecha_desde);
                                    $date2 = date_create($promo->fecha_hasta);
                                                             ?>
                              <span class="comment-date" style="color: #EB5D5E">{!!date_format($date, 'j F ')!!}-{!!date_format($date2, 'j F ')!!}</span>
                                                 
                    </div>
                    
                </div>
            </div>
        </a>
        @endif
        @endforeach
        @endif

        @endforeach






    </div>
    <div class="banner-text">
        <h2 class="banner-title">{{ trans('publico/labels.label43')}}</h2>

    </div>
</div>
@endif

@endsection

