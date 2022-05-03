@extends('layouts.app')

@section('content')
    <div class=""  style="width: 90% !important; margin: auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Menular</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.create',$cafe->id) }}" class="btn btn-primary">Qo'shish</a>
                            </div>
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>taom nomi</th>
                                        <th>soni</th>
                                        <th>o`lchov birliki</th>
                                        <th>narxi</th>
                                        <th>amallar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->count }}</td>
                                            <td>{{ $menu->oneness }}</td>
                                            <td>{{ $menu->summ }}</td>

                                            <td>
                                                <form action="{{ route('admin.menu.destroy',$menu->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="" role="group">



                                                        <a class="btn btn-warning " href="{{route('admin.menu.edit',$menu->id) }}">
                                                                    <span class="btn-label">
                                                                       <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                                                    </span>
                                                        </a>

                                                        <button type="submit" class="btn btn-danger"><span class="btn-label">
                                                                    <i class="fa fa-trash"></i></span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Joylashuvlar</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.map_create',$cafe->id) }}" class="btn btn-primary">Qo'shish</a>
                            </div>
                            <div>


                                    @foreach($moves as $move)
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
                                            <div class="float-end my-2" align="center">
                                                <form class="float-end" action="{{ route('admin.move.destroy',$move->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="" role="group">
                                                        <a class="btn btn-warning " href="{{route('admin.move.edit',$move->id) }}">
                                                            <span class="btn-label">
                                                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                                                tahrirlash
                                                            </span>
                                                        </a>

                                                        <button type="submit" class=" btn btn-danger"><span class="btn-label">
                                                                                                        <i class="fa fa-trash"></i> o'chirish</span>
                                                        </button>
                                                    </div>
                                                </form></div>
                                        </div>
                                    @endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
