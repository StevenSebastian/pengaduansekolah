@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}</div>
            @endif
            <form action="{{route('aspirasi.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Tambah Aspirasi</div>

                <div class="card-body">
                <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" readonly>
                        </div>

                        <div class="col-md-">
        <label for="inputNanme4" class="form-label">Status</label>
        <select name="status" class="form-control @error('status') is-invalid @enderror">
          <option value="">Pilih Status</option>
          <option value="menunggu">Menunggu</option>
          <option value="proses">Proses</option>
          <option value="selesai">Selesai</option>
          </select>
          @error('status')
          <strong>{{ $message }}</strong>
          @enderror
        </div>
            <br>
                    <div class="form-group">
                            <label for="feedback">Aspirasi</label>
                            <input type="text" name="feedback" class="form-control">
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