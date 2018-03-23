@section('contentImagenes')	

{!! HTML::style('css/calendar/ui-jquery.css') !!}
{!! HTML::style('css/imageAjax/owl.carousel.css') !!}
{!! HTML::style('css/imageAjax/owl.theme.css') !!}
{!! HTML::style('css/imageAjax/prettify.css') !!}
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
<input type="hidden" id="idPromotion" value="{{$idPromotion}}">
@if(isset($ImgPromociones) && count($ImgPromociones)>0)
{!! Form::open(['url' => route('delete-image1'),  'id'=>'deleteImage']) !!}
<br><br>
        <div class="product-images col-sm-12 box-lg" style="padding-left: 0px;">
            <div id="owl-demo" class="owl-carousel" style="border: 1px solid #c269337a; margin-bottom: 15px;">
                
                @foreach ($ImgPromociones as $imagen)

                <?php
                $url = "images/icon/" . $imagen->filename
                //$url = "images/fullsize/" . $imagen->filename;
                
                ?>
                <!--<div class="item-1" style="border: 1px solid black;width: 180px;padding: 5%;margin-right: 20px;"> -->
                <div class="item-1" style="padding: 5%;">
                    <img src="{!! asset('img/x.png')!!}" onclick='alertaConfirm({!!$imagen->id!!})' style=" width:35px; height:32px; position:absolute; top:2px; right:0px; cursor:pointer;" alt='' />
                    <img src="{{asset($url)}}" href='#' class="img-res"/ width="200" style="    margin-left: 21%;">
                      <br>
                    @if($imagen->profile_pic==1)       
                    vista previa: <input type='radio' id='ch_{!!$imagen->id!!}' name='ch' checked="checked"  onchange="AjaxSaveDetailsFotografiaProfile('deleteImage','{!!$imagen->id!!}',2)" value= "{!!$imagen->profile_pic!!}"/>
                     @else
                     vista previa: <input type='radio' id='ch_{!!$imagen->id!!}' name='ch' onchange="AjaxSaveDetailsFotografiaProfile('deleteImage','{!!$imagen->id!!}',2)" value= "{!!$imagen->profile_pic!!}"/>
                     @endif
                </div>
                @endforeach 
            </div>
        </div>
{!! Form::close() !!}
@endif

<!--{!! HTML::script('js/imageAjax/owl.carousel.js') !!} -->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
<script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
<script>
	 $(document).ready(function() {
		    $("#owl-demo").owlCarousel({
		    autoPlay: 5000,
		            items : 1,
		            itemsDesktop : [1199, 3],
		            itemsDesktopSmall : [979, 3]
		    });
	 });
         
</script>
<style>
    #owl-demo-1 .item-1{
        margin: 3px;
    }
    #owl-demo-1 .item-1 .img-res{
        display: block;
        width: 100%;
        height: 150px;
        
    }
</style>
<script>
                //Funcion para eliminación
            function alertaConfirm(id){
            var r = confirm("Está seguro de que desea eliminar esta imagen?");
                    if (r == true) {
            AjaxContainerRetrunMessageImagenRes("deleteImage", id);
            var idPromotion = $('#idPromotion').val();
            GetDataAjaxImagenesPromotion(idPromotion);
                    } else {
            txt = "Cancelado";
                    }
            }
	</script>


{!! HTML::script('js/imageAjax/bootstrap-collapse.js') !!}
{!! HTML::script('js/imageAjax/bootstrap-transition.js') !!}
{!! HTML::script('js/imageAjax/bootstrap-tab.js') !!}
{!! HTML::script('js/imageAjax/prettify.js') !!}
{!! HTML::script('js/imageAjax/application.js') !!}


@endsection


