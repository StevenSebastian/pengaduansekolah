@extends('admin.layouts.master')
@section('content')

<div class="col-lg-fixed">

    <div class="card">
      <div class="card-body">

      <h5 class="card-title">Beri Aspirasi</h5>

        <!-- Vertical Form -->
        @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif
        <form class="row g-3" action="{{route('aspirasi.store')}}" method="post">
          @csrf

          <div class="form-group">
                    <input type="hidden" name="pelaporan_id" value="{{$lapor->id}}">
                </div>

          <div class="col-md-12">
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

        <div class="col-12">
                  <label for="inputNanme4" class="form-label">FeedBack</label>
                  <textarea name="feedback" class="form-control
                    @error('feedback') is-invalid @enderror"></textarea>
                    @error('feedback')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="text-center">
            <br>
            <button type="submit" class="btn btn-primary">Beri Aspirasi</button>

                </div>
       
       
       
        <br>
        <br>


          </div>
        </form><!-- Vertical Form -->

      </div>
</div>
    </div>

@endsection
