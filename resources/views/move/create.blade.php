@extends('layouts.app')

@section('content')

{{--    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.js'></script>--}}
{{--    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.css' rel='stylesheet' />--}}
    <div class="contianer w-50 m-auto p-4" style="background: #efefef">

{{--        <h4>siz o`z toyhonangizni qo`shing</h4>--}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h2>Google Map</h2>
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
                    <form action="{{route('admin.move.store')}}" method="post" id="boxmap">
                        @csrf
                        <input type="hidden" name="cafe_id" value="{{$id}}">
                        <div class="form-group">
                            <label for="title">move_name</label>
                            <input type="text" name="move_name" placeholder="Title" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="title">from_date</label>
                            <input type="date" name="from_date" placeholder="Description" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="title">to_date</label>
                            <input type="date" name="to_date" placeholder="Description" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="lat">lat</label>
                            <input type="text" name="lattitude"  id="latitude" value="0" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="lng">lng</label>
                            <input type="text" name="longitude" id="longitude" value="0" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Add Map" class="btn btn-success"/>
                        </div>
                    </form>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <div class="col-md-8">
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
        </div>





        <div id="map" style="height: 40vh !important;"></div>

        <!--
         The `defer` attribute causes the callback to execute after the full HTML
         document has been parsed. For non-blocking uses, avoiding race conditions,
         and consistent behavior across browsers, consider loading using Promises
         with https://www.npmjs.com/package/@googlemaps/js-api-loader.
        -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvFeBU4TjPHdFFD7qww2exhQRIoG1G-yg&callback=initMap&v=weekly"
            defer
        ></script>
        <script>
            function initMap() {
                const myLatlng = { lat: 41.5424787 , lng: 60.6315057 };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 10,
                    center: myLatlng,
                });
                // Create the initial InfoWindow.
                let infoWindow = new google.maps.InfoWindow({
                    content: "Click the map to get Lat/Lng!",
                    position: myLatlng,
                });

                infoWindow.open(map);
                // Configure the click listener.
                map.addListener("click", (mapsMouseEvent) => {
                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                    });
                    infoWindow.setContent(
                        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                    );
                    infoWindow.open(map);
                });
            }

            window.initMap = initMap;
        </script>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function executeExample(){
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,  showCancelButton: true,
                confirmButtonText: `Save`,
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });}
    </script>





{{--    <script>--}}
{{--        mapboxgl.accessToken = 'pk.eyJ1Ijoic2tpcHBlcmhvYSIsImEiOiJjazE2MjNqMjkxMTljM2luejl0aGRyOTAxIn0.Wyvywisw6bsheh7wJZcq3Q';--}}
{{--        var map = new mapboxgl.Map({--}}
{{--            container: 'map',--}}
{{--            style: 'mapbox://styles/mapbox/streets-v11',--}}
{{--            center: [ 60.6315057,41.5424787], //lng,lat 10.818746, 106.629179--}}
{{--            zoom: 7--}}
{{--        });--}}
{{--        --}}{{--var test ='<?php echo $dataArray;?>';  //ta nhận dữ liệu từ Controller--}}
{{--        var dataMap = JSON.parse(test); //chunky đổi nó về dạng mà Mapbox yêu cầu--}}

{{--        // ta tạo dòng lặp để for ra các đối tượng--}}
{{--        dataMap.features.forEach(function(marker) {--}}

{{--            //tạo thẻ div có class là market, để hồi chỉnh css cho market--}}
{{--            var el = document.createElement('div');--}}
{{--            el.className = 'marker';--}}

{{--            //gắn marker đó tại vị trí tọa độ--}}
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
