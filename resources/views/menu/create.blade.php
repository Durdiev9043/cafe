@extends('layouts.app')

@section('content')

    <div class="contianer w-50 m-auto p-4" style="background: #efefef">


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
