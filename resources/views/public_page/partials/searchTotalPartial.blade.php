@section('SearchTotalPartial')	
    @if(count($despliegue) > 0 || $despliegue != null)
        @foreach ($despliegue as $cat)
        <?php
                $nombre = str_replace(' ', '-', $cat->nombre_servicio);
                $nombre = str_replace('/', '-', $nombre);
        ?>
           <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
            <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4">
              <div class="post-masonry-content">
                <h4><a href="single-post.html">{{$cat->nombre_servicio}}</a></h4>
                <p>{{$cat->detalle_servicio}}</p>
              </div><a class="link-position link-primary-sec-2 link-right post-link" onclick="setIdCatalogo('{{$cat->id_usuario_servicio}}')" href="#" data-toggle="modal" data-target="#form-modal-add-trip"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
          </div>   
        @endforeach  
    <?php echo $despliegue->render(); ?>
    @else
     <div class="col-xs-12" style="text-align: center;">
      <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado resultados</a></h4>
    </div>
    @endif
@endsection