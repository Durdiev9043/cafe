@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>taom nomi</th>
                                        <th>taom soni</th>
                                        <th>narxi</th>
                                        <th>o`lchov birliki</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->count }}</td>
                                            <td>{{ $menu->summ }}</td>
                                            <td>{{ $menu->oneness }}</td>
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
