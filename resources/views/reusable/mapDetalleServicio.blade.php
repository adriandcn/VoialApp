
<style>
    #map {
        width:100%;height:344px
    }
    .pac-container {
        background-color: #FFF;
        z-index: 2000;
        position: fixed;
        display: inline-block;
        float: left;
    }
</style>

<div class='form-group'>
    <input type="hidden" id='searchmap' style="height: 27px; width: 100%;margin-bottom: 1%" class="form-input">
    <a href="" target="_blank" onclick="openMap()" class="tooltip" title="Haz click sobre el mapa para ver mas detalles de ubicación">
        <div id="map" "></div>
    </a>
    
</div>
<div class="form-group">
    <input type="hidden" class='form-control input-sm' name='latitud_servicio' value="{!!$latitud_servicio!!}" id='latitud_servicio'/>
</div>
<div class="form-group">
    <input type="hidden" class='form-control input-sm' name='longitud_servicio' value="{!!$longitud_servicio!!}" id='longitud_servicio'/>
</div>


<script>

    var map;
    var infowindow;
    var latitud = {!!$latitud_servicio!!}
    var longitud = {!!$longitud_servicio!!}
    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: latitud,
                lng: longitud
            },
            zoom: 15,
            disableDefaultUI: true,
            draggable: false
        });

        var marker = new google.maps.Marker({
            position: {
                lat: latitud,
                lng: longitud
            },
            map: map,
            draggable: false
        });

        // var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        // google.maps.event.addListener(searchBox, 'places_changed', function () {
        //     var places = searchBox.getPlaces();
        //     var bounds = new google.maps.LatLngBounds();
        //     var i, place;
        //     for (i = 0; place = places[i]; i++) {
        //         bounds.extend(place.geometry.location);
        //         marker.setPosition(place.geometry.location);
        //     }
        //     map.fitBounds(bounds);
        //     map.setZoom(15);

        // });
        // google.maps.event.addListener(marker, 'position_changed', function () {
        //     var lat = marker.getPosition().lat();
        //     var lng = marker.getPosition().lng;
        //     $('#latitud_servicio').val(lat);
        //     $('#longitud_servicio').val(lng);
        // });
        
        google.maps.event.trigger(map, "resize");
    }

    initMap();
    
    function openMap(){
        event.preventDefault();
        var url = 'https://www.google.com/maps/search/?api=1&query=' + latitud + ',' + longitud
            var win = window.open(url, '_blank');
            win.focus();
    }
</script>
</head>

{!!HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDor7F0iN5YavbFiLRA7pY7L8-Rgl89GT8&signed_in=true&libraries=places&callback=initMap') !!}
{!!HTML::script('js/jquery_.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}






