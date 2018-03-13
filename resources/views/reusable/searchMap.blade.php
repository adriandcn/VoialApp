
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
    <input type="text" id='searchmap' style="height: 27px; width: 100%;margin-bottom: 1%" class="form-input tooltip" title="{{ trans('back/admin.altSearchboxUbicacion')}}" placeholder="{{ trans('back/admin.placeHolderSearchboxUbicacion')}}">
    <div class="form-group">
    <label>{{ trans('back/admin.lblSearchRadio')}}</label>
    <input type="number" class='form-input tooltip' name='radio' value="{!!$radio!!}" id='radioSearch' title="{{ trans('back/admin.altSearchRadio')}}"/>
</div>
    <div id="map" class="tooltip" title="{{ trans('back/admin.altSearchMap')}}"></div>
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
    var latitud = {!!$latitud_servicio!!};
    var longitud = {!!$longitud_servicio!!};
    var radio = {!!$radio!!};
    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: latitud,
                lng: longitud

            },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {
                lat: latitud,
                lng: longitud
            },
            map: map,
            draggable: true
        });

        var searchCircle = new google.maps.Circle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          center: {lat: latitud, lng: longitud},
          radius: radio,
          editable: true,
          draggable: false
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
                searchCircle.setCenter(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);

        });
        google.maps.event.addListener(map, 'click', function(e) {
            var position = e.latLng;
            var lat = e.latLng.lat();
            var lng = e.latLng.lng();
            marker.setPosition(position);
            searchCircle.setCenter(position);
            $('#latitud_servicio').val(lat);
            $('#longitud_servicio').val(lng);
        });
        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng;
            searchCircle.setCenter(marker.getPosition());
            $('#latitud_servicio').val(lat);
            $('#longitud_servicio').val(lng);
        });

        google.maps.event.addListener(searchCircle, 'radius_changed', function () {
            $('#radioSearch').val(parseInt(searchCircle.getRadius()));
        });

        // google.maps.event.addListener(searchCircle, 'center_changed', function () {
        //     var lat = searchCircle.getCenter().lat();
        //     var lng = searchCircle.getCenter().lng();
        //     console.log(lat);
        //     console.log(lng);
        //     // marker.setPosition(new google.maps.LatLng(lat,lng));
        // });
     $('#radioSearch').keyup(function(){
        searchCircle.setRadius(parseInt($('#radioSearch').val()));
     });
    }
</script>
</head>

{!!HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDor7F0iN5YavbFiLRA7pY7L8-Rgl89GT8&signed_in=true&libraries=places&callback=initMap') !!}
{!!HTML::script('js/jquery_.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}






