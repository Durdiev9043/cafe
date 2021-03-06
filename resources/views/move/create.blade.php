@extends('layouts.app')

@section('content')

{{--    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.js'></script>--}}
{{--    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.css' rel='stylesheet' />--}}
    <div class="contianer w-50 m-auto p-4" style="background: #efefef">
        <form action="{{route('admin.move.store')}}" method="post" id="boxmap">
            @csrf
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5afb64b4-7bd0-45f6-a267-1a9bca293161" type="text/javascript"></script>
        <script src="event_properties.js" type="text/javascript"></script>
        <style>
            html, body, #map {
                width: 100%; height: 100%; padding: 0; margin: 0;
            }
        </style>
{{--        <h4>siz o`z toyhonangizni qo`shing</h4>--}}
        <div class="container">
            <div class="justify-content-center">
                <div class="">
                    <h2>Joylashuv qo`shish</h2>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

                        <input type="hidden" name="cafe_id" value="{{$id}}">
                        <div class="form-group">
                            <label for="title">Manzil</label>
                            <input type="text" name="move_name" placeholder="manzil" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Qachondan boshlab</label>
                            <input type="date" name="from_date" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Qachongach</label>
                            <input type="date" name="to_date" class="form-control"/>
                        </div>



                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <div class="">
                    <script type="text/javascript"
                            src="https://maps.google.com/maps/api/js?key=AIzaSyBvFeBU4TjPHdFFD7qww2exhQRIoG1G-yg&libraries=places&callback=initAutocomplete"></script>
                    <script>
                    <h2>Xaritadan o`z joylashuvingizni aniqlang va koordinatalarni malumotlar maydoniga joylashtiring</h2>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


                    <script>
                        $(document).ready(function () {
                            $("#latitudeArea").addClass("d-none");
                            $("#longtitudeArea").addClass("d-none");
                        });
                        google.maps.event.addDomListener(window, 'load', initialize);
                        function initialize() {
                            var input = document.getElementById('autocomplete');
                            var autocomplete = new google.maps.places.Autocomplete(input);
                            autocomplete.addListener('place_changed', function () {
                                var place = autocomplete.getPlace();
                                $('#latitude').val(place.geometry['location'].lat());
                                $('#longitude').val(place.geometry['location'].lng());
                                $("#latitudeArea").removeClass("d-none");
                                $("#longtitudeArea").removeClass("d-none");
                            });
                        }
                        console.log(place.geometry['location'].lng())
                    </script>



{{--                    <div id="map"></div>--}}
{{--                    <div id="map" style="height: 40vh !important;"></div>--}}
{{--                    <script--}}
{{--                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvFeBU4TjPHdFFD7qww2exhQRIoG1G-yg&callback=initMap&v=weekly"--}}
{{--                        defer--}}
{{--                    ></script>--}}
{{--                    <script>--}}
{{--                        function initMap() {--}}
{{--                            const myLatlng = { lat: -25.363, lng: 131.044 };--}}
{{--                            const map = new google.maps.Map(document.getElementById("map"), {--}}
{{--                                zoom: 4,--}}
{{--                                center: myLatlng,--}}
{{--                            });--}}
{{--                            // Create the initial InfoWindow.--}}
{{--                            let infoWindow = new google.maps.InfoWindow({--}}
{{--                                content: "Click the map to get Lat/Lng!",--}}
{{--                                position: myLatlng,--}}
{{--                            });--}}

{{--                            infoWindow.open(map);--}}
{{--                            // Configure the click listener.--}}
{{--                            map.addListener("click", (mapsMouseEvent) => {--}}
{{--                                // Close the current InfoWindow.--}}
{{--                                infoWindow.close();--}}
{{--                                // Create a new InfoWindow.--}}
{{--                                infoWindow = new google.maps.InfoWindow({--}}
{{--                                    position: mapsMouseEvent.latLng,--}}
{{--                                });--}}
{{--                                infoWindow.setContent(--}}
{{--                                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)--}}
{{--                                );--}}
{{--                                infoWindow.open(map);--}}
{{--                            });--}}
{{--                        }--}}

{{--                        window.initMap = initMap;--}}
{{--                    </script>--}}
                </div>
            </div>
            <div id="map" style="height: 40vh !important;"></div>

            <script>
                ymaps.ready(init);
                var myMap;

                function init () {
                    myMap = new ymaps.Map("map", {
                        center: [41.5424787,60.6315057 ], // ??????????
                        zoom: 11
                    }, {
                        balloonMaxWidth: 200,
                        searchControlProvider: 'yandex#search'
                    });

                    // ?????????????????? ??????????????, ???????????????????????? ?????? ????????????
                    // ?????????? ?????????????? ???????? ?? ?????????? ?????????? ??????????.
                    // ?????? ?????????????????????????? ???????????? ?????????????? ?????????????? ??????????.
                    myMap.events.add('click', function (e) {

                        if (!myMap.balloon.isOpen()) {
                            var coords = e.get('coords');
                            myMap.balloon.open(coords, {
                                contentHeader:'Sizning joylashuvingiz!',
                                contentBody:
                                    '<p>Sizning koordinatalaringiz: <input name="lattitude" style=" outline: none;border:none" value='+coords[0].toPrecision(6) +'> <input type="text" style=" outline: none;border:none" name="longitude" value='+ coords[1].toPrecision(6)+'>' + [
                                        // coords[0].toPrecision(6),
                                        // coords[1].toPrecision(6)
                                    ].join(', ') + '</p>',
                                contentFooter:'<sup>Joylashuv aniqlandi</sup>',

                            });

                        }
                        else {
                            myMap.balloon.close();
                        }
                    });


                    // ?????????????????? ??????????????, ???????????????????????? ?????? ????????????
                    // ???????????? ???????????? ???????? ?? ?????????? ?????????? ??????????.
                    // ?????? ?????????????????????????? ???????????? ?????????????? ?????????????? ?????????????????????? ??????????????????
                    // ?? ?????????? ????????????.
                    myMap.events.add('contextmenu', function (e) {
                        myMap.hint.open(e.get('coords'), '??????-???? ?????????????? ???????????? ??????????????');
                    });

                    // ???????????????? ???????? ?????? ???????????????? ????????????.
                    myMap.events.add('balloonopen', function (e) {
                        myMap.hint.close();
                    });
                }
            </script>
            <div class="form-group mt-2" align="center">
                <input type="submit" name="submit" value="saqlash" class="btn btn-success"/>
            </div>

        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function executeExample(){
                Swal.fire({
                    title: 'Malumotlar yuborildi',
                    // showDenyButton: true,  showCancelButton: true,
                    // confirmButtonText: `Save`,
                    // denyButtonText: `Don't save`,
                });}
        </script>



        </form>

        <!--
         The `defer` attribute causes the callback to execute after the full HTML
         document has been parsed. For non-blocking uses, avoiding race conditions,
         and consistent behavior across browsers, consider loading using Promises
         with https://www.npmjs.com/package/@googlemaps/js-api-loader.
        -->

    </div>






{{--    <script>--}}
{{--        mapboxgl.accessToken = 'pk.eyJ1Ijoic2tpcHBlcmhvYSIsImEiOiJjazE2MjNqMjkxMTljM2luejl0aGRyOTAxIn0.Wyvywisw6bsheh7wJZcq3Q';--}}
{{--        var map = new mapboxgl.Map({--}}
{{--            container: 'map',--}}
{{--            style: 'mapbox://styles/mapbox/streets-v11',--}}
{{--            center: [ 60.6315057,41.5424787], //lng,lat 10.818746, 106.629179--}}
{{--            zoom: 7--}}
{{--        });--}}
{{--        --}}{{--var test ='<?php echo $dataArray;?>';  //ta nh???n d??? li???u t??? Controller--}}
{{--        var dataMap = JSON.parse(test); //chunky ?????i n?? v??? d???ng m?? Mapbox y??u c???u--}}

{{--        // ta t???o d??ng l???p ????? for ra c??c ?????i t?????ng--}}
{{--        dataMap.features.forEach(function(marker) {--}}

{{--            //t???o th??? div c?? class l?? market, ????? h???i ch???nh css cho market--}}
{{--            var el = document.createElement('div');--}}
{{--            el.className = 'marker';--}}

{{--            //g???n marker ???? t???i v??? tr?? t???a ?????--}}
{{--            new mapboxgl.Marker(el)--}}
{{--                .setLngLat(marker.geometry.coordinates)--}}
{{--                .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups--}}
{{--                    .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))--}}
{{--                .addTo(map);--}}
{{--        });--}}

{{--    </script>--}}
{{--    <style>--}}
{{--        #map {--}}
{{--            width: 100%;--}}
{{--            height: 500px;--}}
{{--        }--}}
{{--        .marker {--}}
{{--            background-image: url('/images/point.png');--}}
{{--            background-repeat:no-repeat;--}}
{{--            background-size:100%;--}}
{{--            width: 50px;--}}
{{--            height: 100px;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--    </style>--}}
@endsection
