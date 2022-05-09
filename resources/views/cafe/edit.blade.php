@extends('layouts.app')

@section('content')

    <div class="contianer w-50 m-auto p-4" style="background: #efefef">

        <h4>Siz o`z kafengizni qo`shing</h4>
        <form action="{{ route('admin.cafe.update',$cafe->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Nomi</label>
                <input type="text" name="name" placeholder="Kafe nomi" class="form-control" value="{{$cafe->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telefon raqami</label>
                <input type="tel" name="phone" placeholder="977777777" pattern="[0-9]{9}" class="form-control" value="{{$cafe->phone}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="img1">Kafe suratini qo'shish</label>
                <input type="file" name="img" accept="image/png, image/gif, image/jpeg" class="form-control" id="img1"  >
            </div>
            <div class="form-group">
                <label for="img1">Holati</label>
               <select name="status" class="form-control">
                   <option value="0">active emas</option>
                   <option value="1">active</option>
               </select>
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
