@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}</div>
            @endif
            <form action="{{route('kategori.update',[$kategori->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="card">
                    <div class="card-header">Edit Kategori</div>

                <div class="card-body">
                    <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="{{$kategori->keterangan}}">
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