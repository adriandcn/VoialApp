@section('SearchTotalPartial')	
@if(count($despliegue)>0 || $despliegue!=null)
   @foreach ($despliegue as $cat)
                       
                            
   
          <?php
                        $nombre = str_replace(' ', '-', $cat->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
   
   
                    
   <div class="TopPlace">
      
             <div class="iso-item filter-all filter-website ">
                                <article class="post">
                                    @if($cat->id_catalogo_servicio==11)
                                        <a href="{!!asset('/trip')!!}/{!!$nombre!!}/{!!$cat->id_usr_serv!!}"  onclick="$('.SearchTotalPartial1').LoadingOverlay('show');" class="product-image">
                                            
                                        <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                                        
                                        <span class="image-extras"></span>
                                    </a>
                                    <div class="portfolio-content">

                                        <h5 class="portfolio-title"><a href="{!!asset('/trip')!!}/{!!$nombre!!}/{!!$cat->id_usr_serv!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>
                                        @else
                                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usr_serv!!}"  onclick="$('.SearchTotalPartial1').LoadingOverlay('show');" class="product-image">
                                            
                                        <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                                        
                                        <span class="image-extras"></span>
                                    </a>
                                    <div class="portfolio-content">

                                        <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usr_serv!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>
                                        
                                        @endif
                                          @if($cat->precio_desde==0)
                                    <span class="product-price" style=" color: #eb3b50;
    float: left;
    font-size: 1.3333em;
    font-weight: 600;
    margin-right: 8px;" ><span class="currency-symbol"></span>FREE</span>
                                    @else
                                    <span class="product-price " style=" color: #eb3b50;
    float: left;
    font-size: 1.3333em;
    font-weight: 600;
    margin-right: 8px;" ><span class="currency-symbol">{{ trans('publico/labels.label59')}} $</span>{!!$cat->precio_desde!!}</span>
                                    @endif
                                        
                                    <br/>
                                    <br/>
                                    @if(isset($cat->nombreUbicacion))
                                        <span class="product-price" ><span class="currency-symbol"></span>{!!$cat->nombreUbicacion!!}</span>
                                    @endif
                                     
                                </div>
                                    
                                    
                                    
                                  
                            
                                    
                                    
                                    
                                </article>
                            </div>
   
                            
   </div>
   
   
                            @endforeach  
                            @endif
                            
            
                            
                  
                                @endsection
                                
                                
                                
                                
                                
                                
                                
                                  