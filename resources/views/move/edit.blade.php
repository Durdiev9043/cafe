@extends('layouts.app')

@section('content')

    {{--    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.js'></script>--}}
    {{--    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.css' rel='stylesheet' />--}}
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5afb64b4-7bd0-45f6-a267-1a9bca293161" type="text/javascript"></script>
    <script src="event_properties.js" type="text/javascript"></script>
    <style>
        html, body, #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
    </style>
    <div class="contianer w-50 m-auto p-4" style="background: #efefef">
        <form action="{{route('admin.move.update',$move->id)}}" method="post" id="boxmap">
        {{--        <h4>siz o`z toyhonangizni qo`shing</h4>--}}
        <div class="container">

            <div class=" justify-content-center">
                <h2 align="center">Xaritadan o'z joylashuvingizni aniqlang va koordinatalarni ma'lumotlar maydoniga joylashtiring</h2>
                <div class="">

                    <h2></h2>
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

                        @method('PUT')
                        @csrf
                        <input type="hidden" name="cafe_id" value="{{$move->cafe_id}}">
                        <div class="form-group">
                            <label for="title">Manzil</label>
                            <input type="text" name="move_name" placeholder="manzil" value="{{ $move->move_name }}"  class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Qachondan boshlab</label>
                            <input type="date" name="from_date"  value="{{ $move->from_date }}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="title">Qachongacha</label>
                            <input type="date" name="to_date" value="{{ $move->to_date }}" class="form-control"/>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="lat">uzunlik</label>--}}
{{--                            <input type="text" name="lattitude"   id="lat" value="" class="form-control"/>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="lng">kenglik</label>--}}
{{--                            <input type="text" name="longitude" id="lng"  value="" class="form-control"/>--}}
{{--                        </div>--}}

                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <div class="">
                    <script type="text/javascript"
                            src="https://maps.google.com/maps/api/js?key=AIzaSyBvFeBU4TjPHdFFD7qww2exhQRIoG1G-yg"></script>
{{--                    &libraries=places&callback=initAutocomplete--}}



                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>






                </div>
            </div>
        </div>





        <div id="map" style="height: 40vh !important;"></div>
        <script>
            ymaps.ready(init);
            var myMap;

            function init () {
                myMap = new ymaps.Map("map", {
                    center: [{{$move->lattitude}},{{$move->longitude}}], // Углич
                    zoom: 17
                }, {
                    balloonMaxWidth: 200,
                    searchControlProvider: 'yandex#search'
                });

                // Обработка события, возникающего при щелчке
                // левой кнопкой мыши в любой точке карты.
                // При возникновении такого события откроем балун.
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


                // Обработка события, возникающего при щелчке
                // правой кнопки мыши в любой точке карты.
                // При возникновении такого события покажем всплывающую подсказку
                // в точке щелчка.
                myMap.events.add('contextmenu', function (e) {
                    myMap.hint.open(e.get('coords'), 'Кто-то щелкнул правой кнопкой');
                });

                // Скрываем хинт при открытии балуна.
                myMap.events.add('balloonopen', function (e) {
                    myMap.hint.close();
                });
            }
        </script>
        <div class="form-group p-2" align="center">
            <input type="submit"  name="submit" value="Saqlash" class="btn btn-success"/>
        </div>
        </form>
        <!--
         The `defer` attribute causes the callback to execute after the full HTML
         document has been parsed. For non-blocking uses, avoiding race conditions,
         and consistent behavior across browsers, consider loading using Promises
         with https://www.npmjs.com/package/@googlemaps/js-api-loader.
        -->
{{--        <script--}}
{{--            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvFeBU4TjPHdFFD7qww2exhQRIoG1G-yg&callback=initMap&v=weekly"--}}
{{--            defer--}}
{{--        ></script>--}}
{{--        <script>--}}
{{--            function initMap() {--}}
{{--                const myLatlng = { lat: 41.5424787 , lng: 60.6315057 };--}}
{{--                const map = new google.maps.Map(document.getElementById("map"), {--}}
{{--                    zoom: 10,--}}
{{--                    center: myLatlng,--}}
{{--                });--}}
{{--                // Create the initial InfoWindow.--}}
{{--                let infoWindow = new google.maps.InfoWindow({--}}
{{--                    content: "Click the map to get Lat/Lng!",--}}
{{--                    position: myLatlng,--}}
{{--                });--}}

{{--                infoWindow.open(map);--}}
{{--                // Configure the click listener.--}}
{{--                map.addListener("click", (mapsMouseEvent) => {--}}
{{--                    // Close the current InfoWindow.--}}
{{--                    infoWindow.close();--}}
{{--                    // Create a new InfoWindow.--}}
{{--                    infoWindow = new google.maps.InfoWindow({--}}
{{--                        position: mapsMouseEvent.latLng,--}}
{{--                    });--}}
{{--                    infoWindow.setContent(--}}
{{--                        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)--}}
{{--                    );--}}
{{--                    infoWindow.open(map);--}}
{{--                });--}}
{{--            }--}}

{{--            window.initMap = initMap;--}}
{{--        </script>--}}
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

@endsection

