  @section('SearchServ')
  <div class="row">
    @if(count($inCatalogo) == 0)
      <div class="col-xs-12" style="text-align: center;">
        <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;Ups!! No se han encontrado servicios para los filtros aplicados</a></h4>
      </div>
    @else
      @foreach($inCatalogo as $servicio)
        <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
          <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image box-skew post-skew-right-top post-skew-var-4" style="background: url('{!!asset('/images/icon/')!!}/{{$servicio->filename}}');
                          background-size: cover;
                          background-repeat: no-repeat;">
            <div class="post-masonry-content">
              <h4><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicio->id_usuario_servicio}}">{{$servicio->nombre_servicio}}</a></h4>
              <p>{{$servicio->detalle_servicio}}</p>
            </div>
            <a class="link-position link-primary-sec-2 link-right post-link" href="{!!asset('/detalles-de-servicio')!!}/{{$servicio->id_usuario_servicio}}"><i class="fa fa-info-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      @endforeach
    @endif
  </div>
  @endsection