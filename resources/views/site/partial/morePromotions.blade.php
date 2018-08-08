@section('morePromotions') 
	@foreach ($data as $promotion)
		<div>
  		<div class="panel-custom-group-wrap" style="margin-top: 3px;" onclick="goToPromotion('{{asset("/")}}detalles-de-promocion/{{$promotion->id}}')">
              <div class="panel-custom-group text-left" id="accordion1" role="tablist">
                  <div class="panel panel-custom panel-custom-default">
                      <div class="panel-custom-heading" style="text-align: center;">
                          <img class="img-shadow" src="{{asset('/images/icon')}}/{{$promotion->filename}}" alt="" width="270" height="393" />
                          <p class="panel-custom-title" style="font-size: 16px; margin: 20px; font-weight: bolder;">
                              <i class="fa fa-money"></i>&nbsp;&nbsp;{{$promotion->nombre_promocion}}
                          </p>
                      </div>
                      <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                          <div class="panel-custom-body" style="padding: 7px;">
                              Descripción :
                              <h6 style="font-size: 14px;"> {{$promotion->descripcion_promocion}}</h6> Fecha :
                              <h6 style="font-size: 14px; text-align: justify;">
                                {{$promotion->created_at}}
                              </h6> Descuento %:
                              <h6 style="font-size: 14px; text-align: justify;">
                                {{$promotion->descuento}}
                              </h6>
                              <h6 style="text-align: center; font-size: 18px; ">
                                <a>Ver más</a>
                              </h6>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
	    </div>
   @endforeach
@endsection