@extends('layouts.app')

@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5afb64b4-7bd0-45f6-a267-1a9bca293161" type="text/javascript"></script>
    <script src="geolocation_ip.js" type="text/javascript"></script>

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
                                        <th>surati</th>
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
                                            <td><img src="{{ asset($menu->img) }}" alt="" width="100px"></td>

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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Joylashuvlar</div>

                    <div class="card-body">

                        <div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.map_create',$cafe->id) }}" class="btn btn-primary">Qo'shish</a>
                            </div>
                            <div>


                                    @foreach($moves as $move)
                                        <div class="card">
                                            <div class="card-body" style="padding: 5px !important;">
                                                <h5 class="card-title">{{ $move->move_name }}</h5>
                                                <p class="card-text" style="margin-bottom: 5px !important;"><small class="text-muted">{{ $move->from_date }} dan boshlab </small></p>
                                                <p class="card-text" style="margin-bottom: 5px !important;"><small class="text-muted">{{ $move->to_date }} gacha shu joyda bolamiz</small></p>

                                            </div>
                                            <div id="map{{$move->id}}" class="card-img-bottom" style="height: 200px !important;width: 100%" ></div>
                                            <script type="text/javascript">

                                                ymaps.ready(init);

                                                function init() {
                                                    // ???????????? ?? ????????????????????????????, ???????????????????????? ???? IP
                                                    var geolocation = ymaps.geolocation,
                                                        // ????????????????????
                                                        coords = [{{$move->lattitude}}, {{$move->longitude}}],
                                                        myMap = new ymaps.Map('map{{$move->id}}', {
                                                            center: coords,
                                                            zoom: 17
                                                        });

                                                    myMap.geoObjects.add(
                                                        new ymaps.Placemark(
                                                            coords,
                                                            {
                                                                // ?? ????????????: ????????????, ??????????, ????????????.
                                                                balloonContentHeader: geolocation.country,
                                                                balloonContent: geolocation.city,
                                                                balloonContentFooter: geolocation.region
                                                            }
                                                        )
                                                    );
                                                }

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
