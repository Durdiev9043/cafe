@extends('layouts.app')

@section('content')

    <div class="contianer w-50 m-auto p-4" style="background: #efefef">


        <form action="{{ route('admin.menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="cafe_id" value="{{$menu->id}}">
            <div class="form-group">
                <label for="exampleInputEmail1">nomi</label>
                <input type="text" name="name" class="form-control" value="{{$menu->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">soni</label>
                <input type="text" name="count" class="form-control" value="{{$menu->count}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="img1">o`lchov birliki</label>
                <input type="text" name="oneness" class="form-control" value="{{$menu->oneness}}" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">bahosi</label>
                <input type="text" name="summ" required class="form-control" value="{{$menu->summ}}" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">surati</label>
                <input type="file" name="img" class="form-control"  id="img1"  >
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
