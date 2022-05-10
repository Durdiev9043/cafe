@extends('layouts.app')

@section('content')

    <div class="contianer w-50 m-auto p-4" style="background: #efefef">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Please check the form below for errors
            </div>
        @endif

        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cafe_id" value="{{$id}}">
            <div class="form-group">
                <label for="exampleInputEmail1">Nomi</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Miqdori</label>
                <input type="text" name="count" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="img1">O`lchov birliki</label>
                <input type="text" name="oneness" required class="form-control" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">Narxi</label>
                <input type="text" name="summ" required class="form-control" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">Surati</label>
                <input type="file" name="img" required accept="image/png, image/gif, image/jpeg"  class="form-control" id="img1"  >
            </div>
            <div class="form-group" align="center">
                <button  id="threeButtons" onclick="executeExample('threeButtons')" class="btn btn-primary mt-3">Saqlash</button>
            </div>
        </form>
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
