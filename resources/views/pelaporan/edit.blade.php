@extends('layouts.master')
@section('content')

<div class="col-lg-fixed">

    <div class="card">
      <div class="card-body">

      <h5 class="card-title">kategori Create</h5>

        <!-- Vertical Form -->
        @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif
        <form class="row g-3" action="{{route('pelaporan.update', [$lapor->id])}}" method="post" enctype="multipart/form-data">  
          @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif
    @csrf 
    {{method_field('PUT')}}
          <div class="row gy-4">

          <div class="col-12">
            <label for="inputNanme4" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="inputNanme4" value="{{$lapor->siswa->nama}}" readonly>
          </div>

          <div class="col-12">
            <label for="inputNanme4" class="form-label">Kategori</label>
            <input type="text" name="ket_kategori" class="form-control" id="inputNanme4" value="{{$lapor->kategori->ket_kategori}}" readonly>
          </div>


        <div class="col-md-12">
        <label for="inputNanme4" class="form-label">Lokasi</label>
        <textarea name="lokasi" class="form-control @error('lokasi') is-invalid @enderror">{{$lapor->lokasi}}
        </textarea>
        @error('lokasi')
        <strong>{{ $message }}</strong>
        @enderror
        </div>

        <div class="col-md-12">
        <label for="inputNanme4" class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{$lapor->keterangan}}
        </textarea>
        @error('keterangan')
        <strong>{{ $message }}</strong>
        @enderror
        </div>

        

        <div class="col-md-12 ">
        <label for="inputNanme4" class="form-label">Foto</label>
        <input type="file" name="foto"
        class="form-control @error('foto') is-invalid @enderror">
        @error('foto')
        <strong>{{ $message }}</strong>
        @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Laporan</button>
      </div>
    </form><!-- Vertical Form -->

      </div>
    </div>

@endsection
