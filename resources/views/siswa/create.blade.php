@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}</div>
            @endif
            <form action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Tambah Siswa</div>

                <div class="card-body">
                    <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>     

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary">Tambah</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection