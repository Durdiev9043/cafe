@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Shaxsiy kabinet</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.cafe.create') }}" class="btn btn-primary">Qo'shish</a>
                            </div>
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>to'yxona nomi</th>
                                        <th>telefon raqami</th>
                                        <th>surat</th>
                                        <th>amallar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cafes as $cafe)
                                        @if($cafe->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                                <tr>
                                                    <td><a href="{{ route('admin.cafe.show',$cafe->id) }}">{{ $cafe->name }}</a></td>
                                                    <td><a href="{{ route('admin.cafe.show',$cafe->id) }}">{{ $cafe->phone }}</a></td>
                                                    <td><img src="{{asset($cafe->img)}}" width="100px" alt=""> </td>
                                                    <td>
                                                        <form action="{{ route('admin.cafe.destroy',$cafe->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="" role="group">

                                                                <a class="btn btn-secondary " href="{{route('admin.cafe.edit',$cafe->id) }}">
                                                                    <span class="btn-label">
                                                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </span>
                                                                </a>

                                                                <a class="btn btn-warning " href="{{route('admin.cafe.edit',$cafe->id) }}">
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
                                        @endif

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
