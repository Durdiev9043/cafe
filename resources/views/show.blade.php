@extends('layouts.app')

@section('content')
    <div class="container"  >
        <div class="row justify-content-center" style="margin: 0 !important;" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 class="d-inline-block">{{ $cafe->name }}</h3>
                        <div class="text-primary d-inline-block bg-light p-1 rounded" style="margin-left: 60% !important;">Biz bilan bog`lanish: {{ $cafe->phone }}</div></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div> @foreach($moves as $move)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $move->move_name }}</h5>
                                            <p class="card-text"></p>
                                            <p class="card-text"><small class="text-muted">{{ $move->from_date }} dan boshlab </small></p>
                                            <p class="card-text"><small class="text-muted">{{ $move->to_date }} gacha shu joyda bolamiz</small></p>
                                        </div>
                                        <div id="map" class="card-img-bottom" style="height: 200px !important;width: 100%" ></div>
                                        <script type="text/javascript">
                                            function initMap() {
                                                const myLatLng = { lat: {{ $move->lattitude }}, lng: {{ $move->longitude }} };
                                                const map = new google.maps.Map(document.getElementById("map"), {
                                                    zoom: 17,
                                                    center: myLatLng,
                                                    mapTypeId: 'satellite',
                                                });

                                                new google.maps.Marker({
                                                    position: myLatLng,
                                                    map,
                                                    title: "Hello Rajkot!",
                                                });
                                            }

                                            window.initMap = initMap;
                                        </script>

                                        <script type="text/javascript"
                                                src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>

                                        {{--                                        <img class="card-img-bottom" src="..." alt="Card image cap">--}}
                                    </div>
                                @endforeach
                                <table class="table table-hover mt-3">
                                    <thead>
                                    <tr>
                                        <th>taom nomi</th>
                                        <th>taom soni</th>
                                        <th>narxi</th>
                                        <th>o`lchov birliki</th>
                                        <th>surati</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->count }}</td>
                                            <td>{{ $menu->summ }}</td>
                                            <td>{{ $menu->oneness }}</td>
                                            <td><img src="{{asset($menu->img)}}" width="120px" alt=""></td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
