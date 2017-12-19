@section('contentImagenes')	

{!! HTML::style('css/calendar/ui-jquery.css') !!}
{!! HTML::style('css/imageAjax/owl.carousel.css') !!}
{!! HTML::style('css/imageAjax/owl.theme.css') !!}
{!! HTML::style('css/imageAjax/prettify.css') !!}
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
@if(isset($ImgPromociones) && count($ImgPromociones)>0)
{!! Form::open(['url' => route('delete-image1'),  'id'=>'deleteImage']) !!}
<br><br>
        <div class="product-images col-sm-12 box-lg">
            <div id="owl-demo" class="owl-carousel">
                @for ($i = 0; $i < count($ImgPromociones); $i++)
                <?php
                $url = "images/fullsize/" . $ImgPromociones[$i]->filename                
                ?>
                <div class="item-1" style="padding: 5%;">
                    <a href="#" onclick="setFullImage({{$i}},'{{asset($url)}}')" data-toggle="modal" data-target="#form-img-full">
                        <img src="{{asset($url)}}" href='#' class="img-res"/>
                    </a>
                </div>
                @endfor 
            </div>
        </div>
{!! Form::close() !!}
@endif

<script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>
<script>
    var arrayImg = {!!$ImgPromociones !!};
    var currentImage = 0;
    var urlBack = '';
    var urlNext = '';
    function backImage(){
        event.preventDefault();
        if (currentImage >= 1) {
            currentImage --;
        }else{
            currentImage = arrayImg.length -1;
        }
        urlBack = window.location.protocol + '//' + window.location.hostname + '/voialApp/public/images/fullsize/' + arrayImg[currentImage].filename;
        setFullImage(currentImage,urlBack);
    }
    function nextImage(){
        event.preventDefault();
        if (currentImage < (arrayImg.length -1)) {
            currentImage ++;
        }else{
            currentImage = 0;
        }
        urlNext = window.location.protocol + '//' + window.location.hostname + '/voialApp/public/images/fullsize/' + arrayImg[currentImage].filename;
        setFullImage(currentImage,urlNext);
    }
    function setFullImage($index,$url) {
        currentImage = $index;
        console.log($url);
       // $("#imgFull").attr("src",$url);
       $("#imgFull").css("background", 'url(' + $url + ')');
       $("#imgFull").css("background-repeat", 'no-repeat');
       $("#imgFull").css("background-size", 'contain');
       $("#imgFull").css("height", '-webkit-fill-available');
       $("#imgFull").css("background-position", 'center');
    }
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
            $("#flag_image").val('1');
            
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


