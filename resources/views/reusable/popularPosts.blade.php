@section('popularPost')
	@foreach($lastPosts as $recentP)
    <div class="post-mini post-sidebar">
      <div class="unit unit-horizontal unit-spacing-md">
        <div class="unit__left"><img class="img-circle" src="{{asset('images/PostIcon.png')}}" alt="" width="70" height="70">
        </div>
        <div class="unit__body">
          <time datetime="2017-03-25">{{$recentP->created_at}}</time>
          <h6><a href="{{asset('detalles-de-post')}}/{{$recentP->id}}">{{$recentP->title}}</a></h6>
        </div>
      </div>
    </div>
    @endforeach
@endsection