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
                <label for="exampleInputEmail1">nomi</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">soni</label>
                <input type="text" name="count" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="img1">o`lchov birliki</label>
                <input type="text" name="oneness" required class="form-control" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">bahosi</label>
                <input type="text" name="summ" required class="form-control" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">surati</label>
                <input type="file" name="img" required class="form-control" id="img1"  >
            </div>
            <div class="form-group" align="center">
                <button  id="threeButtons" onclick="executeExample('threeButtons')" class="btn btn-primary mt-3">yuborish</button>
            </div>
        </form>
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
@endsection
