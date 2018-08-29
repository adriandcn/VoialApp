@section('randomPromotions')
<style type="text/css">
        .owl-carousel{
          touch-action: manipulation;
        }
        .owl-stage{
          padding-left: 0px !important;
        }
        .owl-prev{
          left: 0;
          width: 0px;
          top: 30%;
        }
        .owl-next{
          top: 30%;
        }
        .fa-angle-left:before{
          /*content: none;*/
        }
        .owl-next{
          margin-left: 14% !important;
        }
        .fa-angle-right:before{
          /*content: none;*/
        }
        .owl-prev:before{
          content: none;
        }
        .owl-next:before{
          content: none;
        }
        .owl-theme .owl-controls .owl-buttons div{
          color: #162849;
          display: inline-block;
          zoom: 2;
          margin: 0px;
          padding: 0px 0px;
          font-size: 30px;
          -webkit-border-radius: 0;
          -moz-border-radius: 30px;
          border-radius: 0;
          background: transparent;
          filter: Alpha(Opacity=50);
          opacity: 1.5;
          font-weight: bold;
        }
      </style>
<div class="owl-carousel owl-theme carousel-promociones">
    @foreach($data as $promotion)
    <div class="panel-custom-group-wrap" style="margin-top: 3px; cursor: pointer;">
        <div class="panel-custom-group text-left" id="accordion1" role="tablist">
            <div class="panel panel-custom panel-custom-default" onclick="goToPromotion('{{asset("/")}}detalles-de-promocion/{{$promotion->id}}')">
                <div class="panel-custom-heading" style="text-align: center;">
                    <img class="img-shadow" src="{{asset('/images/icon')}}/{{$promotion->filename}}" alt="" width="270" height="393" />
                    <p class="panel-custom-title" style="font-size: 16px; margin: 20px; font-weight: bolder;">
                        <i class="fa fa-money"></i>&nbsp;&nbsp;{{$promotion->nombre_promocion}}
                    </p>
                    <h6 class="text-center" style="font-size: 14px; text-align: center; margin-bottom: 10px;">
                                Fecha desde: {{Carbon\Carbon::parse($promotion->fecha_desde)->format('d-m-y')}}<br>
                                Fecha hasta: {{Carbon\Carbon::parse($promotion->fecha_hasta)->format('d-m-y')}}
                          </h6>
                    <h6 style="text-align: center; font-size: 18px; ">
                            <a>Ver más</a>
                          </h6>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<script type="text/javascript">
var carouselPromotions = $('.carousel-promociones');
    carouselPromotions.owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 4,
        /* transitionStyle : "fade", */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });
    // window.current_page = 1;
    // carouselPromotions.on('changed.owl.carousel', function(event) {
    //     var items = event.item.count;
    //     var item = event.item.index;
    //     if (item == (items - 2)) {
    //         getMorePromotions("{!!asset('/getMorePromotions')!!}/{!!request()->route('idSubCatalogo')!!}", '.carousel-promociones');
    //     }
    // });
function getMorePromotions(url, carouselId) {
    $.ajax({
        type: 'GET',
        url: url,
        data: {
            'page': window.current_page + 1 // you might need to init that var on top of page (= 0)
        },
        dataType: 'json',
        success: function(data) {
            window.current_page = current_page + 1;
            var carouselSelector = $(carouselId);
            var imgs = [];
            $(data.morePromotions).each(function() {
                var its = $.trim($(this).html());
                if (its != undefined) {
                    imgs.push(its);
                }
            });
            itemsHTML = $.map(imgs, function(src) {
                if (src) {
                    return src;
                }
            });
            var items = $(itemsHTML.join(''));
            if (items.length > 0) {
                for (var i = 0; i < items.length; i++) {
                    if (items[i] != "") {
                        carouselSelector.owlCarousel('add', items[i]).owlCarousel('update');
                    }
                }

            }
        },
        error: function(data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function(i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}

function goToPromotion(url) {
    // var win = window.open(url);
    // win.focus();
    window.location.href = url;
}
</script>
@endsection