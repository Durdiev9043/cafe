@extends('layouts.app')

@section('content')

    <div class="contianer w-50 m-auto p-4" style="background: #efefef">

        <h4>siz o`z toyhonangizni qo`shing</h4>
        <form action="{{ route('admin.cafe.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <div class="form-group">
                <label for="exampleInputEmail1">nomi</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">telefon raqami</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
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
