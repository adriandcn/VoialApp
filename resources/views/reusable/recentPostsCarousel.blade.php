@section('recentPost')
 <div class="owl-carousel owl-theme carouselPosts" style="margin-top: 4%;
        margin-bottom: 4%;
        opacity: 1;
        display: block;
        border-bottom: 1px solid #16284929;
        border-top: 1px solid #16284929;
        padding-top: 20px;
        padding-bottom: 20px;
        ">
      @foreach($lastPosts as $recentP)
      <div class="item">
        <div class="post-mini post-sidebar">
          <div class="unit unit-horizontal unit-spacing-md">
            <div class="unit__left"><img class="img-circle" src="{{asset('images/PostIcon.png')}}" alt="" width="70" height="70">
            </div>
            <div class="unit__body">
              <time datetime="{{$recentP->created_at}}">{{$recentP->created_at}}</time>
              <span class="badge" style="color: white;
              background: #324a5e;
              font-size: 10px;
              margin-bottom: 2px;">
                {{$recentP->nombre_contacto_operador_1}}
              </span>
              <h6><a href="{{asset('detalles-de-post')}}/{{$recentP->id}}">{{$recentP->title}}</a></h6>
            </div>
          </div>
        </div>
      </div>
      @endforeach
  </div>

@endsection