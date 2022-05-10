@extends('layouts.app')

@section('content')

    <div class="contianer w-50 m-auto p-4" style="background: #efefef">


        <form action="{{ route('admin.menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="cafe_id" value="{{$menu->id}}">
            <div class="form-group">
                <label for="exampleInputEmail1">Nomi</label>
                <input type="text" name="name" class="form-control" value="{{$menu->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Soni</label>
                <input type="text" name="count" class="form-control" value="{{$menu->count}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="img1">O`lchov birliki</label>
                <input type="text" name="oneness" class="form-control" value="{{$menu->oneness}}" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">Bahosi</label>
                <input type="text" name="summ" required class="form-control" value="{{$menu->summ}}" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">Surati</label>
                <input type="file" name="img"  accept="image/png, image/gif, image/jpeg" class="form-control"  id="img1"  >
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
                title: 'Malumotlar yuborildi',
                // showDenyButton: true,  showCancelButton: true,
                // confirmButtonText: `Save`,
                // denyButtonText: `Don't save`,
            });}
    </script>
@endsection
